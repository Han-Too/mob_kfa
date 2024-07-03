<?php

namespace App\Http\Controllers\Api;

use App\Helpers\BackOffice;
use App\Helpers\Utils;
use App\Http\Controllers\Controller;
use App\Http\Controllers\RestController;
use App\Http\Resources\MerchantDocument as ResourcesMerchantDocument;
use App\Mail\AccountMail;
use App\Mail\ApprovalMail;
use App\Models\Applicant;
use App\Models\DokumenApplicant;
use App\Models\Merchant;
use App\Models\MerchantBranch;
use App\Models\MerchantDocument;
use App\Models\MerchantPayment;
use App\Models\MerchantProof;
use App\Models\MerchantSignature;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class MerchantController extends RestController
{
    public function list()
    {
        $data = Merchant::with('payments')->where('user_id', auth('sanctum')->user()->id)->get();
        $data->transform(function ($merchant) {
            $merchant->pdf_pengajuan_merchant = url('form-merchant/' . $merchant->token_applicant);
            $merchant->pdf_pengajuan_edc = url('form-edc/' . $merchant->token_applicant);
            return $merchant;
        });
        return RestController::sendResponse('Berhasil mengambil data pengajuan', $data);
    }

    public function show($token)
    {
        $user = auth('sanctum')->user();
        if (!$user) {
            return RestController::sendError('Unauthorized', [], 401);
        }

        $data = Merchant::with('payments')
            ->where('user_id', $user->id)
            ->where('token_applicant', $token)
            ->first();

        if (!$data) {
            return RestController::sendError('Gagal mengambil data pengajuan', [], 404);
        }

        $data->pdf_pengajuan_merchant = url('form-merchant/' . $data->token_applicant);
        $data->pdf_pengajuan_edc = url('form-edc/' . $data->token_applicant);
        $data->referal_code = $user->referal_code;

        return RestController::sendResponse('Berhasil mengambil data pengajuan', $data);
    }

    public function store(Request $request)
    {
        $user = Auth::user();
        $fiturTransaksi = $request->fitur_transaksi;
        DB::beginTransaction();
        try {
            $omset = str_replace('.', '', $request->omset_rata_rata);
            $merchant = Merchant::create([
                'token_applicant' => Str::uuid(),
                'merchant_id' => null,
                'user_id' => $user->id,
                'nama_merchant' => $request->nama_merchant,
                'pengajuan_sebagai' => $request->pengajuan_sebagai,
                'tahun_berdiri' => $request->tahun_berdiri,
                'jenis_usaha' => $request->jenis_usaha,
                'mcc' => $request->mcc,
                'fitur_transaksi' => $fiturTransaksi,
                'bisnis_email' => $request->bisnis_email,
                'bisnis_no_hp' => $request->bisnis_no_hp,
                'alamat_bisnis' => $request->alamat_bisnis,
                'tempat_bisnis' => $request->tempat_bisnis,
                'store_url' => $request->store_url,
                'status_tempat_usaha' => $request->status_tempat_usaha,
                'nama_pemilik_merchant' => $request->nama_pemilik_merchant,
                'tempat_lahir' => $request->tempat_lahir,
                'tanggal_lahir' => $request->tanggal_lahir,
                'alamat_sesuai_ktp' => $request->alamat_sesuai_ktp,
                'alamat_domisili' => $request->alamat_domisili,
                'kewarganegaraan' => $request->kewarganegaraan,
                'email' => $request->email,
                'nomor_identitas' => $request->nomor_identitas,
                'nomor_hp' => $request->nomor_hp,
                'npwp' => $request->npwp,
                'nama_pengurus_merchant' => $request->nama_pengurus_merchant,
                'kewarganegaraan_pengurus' => $request->kewarganegaraan_pengurus,
                'nomor_identitas_pengurus' => $request->nomor_identitas_pengurus,
                'npwp_pengurus' => $request->npwp_pengurus,
                'email_pengurus' => $request->email_pengurus,
                'nomor_hp_pengurus' => $request->nomor_hp_pengurus,
                'nama_bank' => $request->nama_bank,
                'nomor_rekening_bank_penampung' => $request->nomor_rekening_bank_penampung,
                'nama_pemilik_rekening_merchant_badan_usaha' => $request->nama_pemilik_rekening_merchant_badan_usaha,
                'email_settlement' => $request->email_settlement,
                'lat' => $request->lat,
                'longitude' => $request->longitude,
                'm_lat' => $request->m_lat,
                'm_lng' => $request->m_lng,
                'status_approval' => 'New Request',
                'jenis_produk' => $request->jenis_produk,
                'omset_rata_rata' => $omset,
                'status_setting_mid' => null,
                'status_setting_tid' => null,
                'status_setting_mdr' => null,
                'status_inject_edc' => null,
                'status_pin_key' => null,
                'status_tes_transaksi' => null,
                'status_qc' => null,
                'alamat_pejabat_berwenang' => $request->alamat_pejabat_berwenang,
                'npwp_merchant_badan_usaha' => $request->npwp_merchant_badan_usaha,
                'status_ekspedisi' => null,
                'jenis_kelamin_pemilik' => $request->jenis_kelamin_pemilik,
                'jenis_kelamin_pengurus' => $request->jenis_kelamin_pengurus,
                'sumber_data' => 'Mobile',
                'catatan' => null,
                'status' => 'active',
                'dokumen_lengkap' => false,
                'status_tanda_tangan' => false,
                'username' => Utils::generateUsername($request->nama_merchant),
                'password' => $user->bo_password,
                'pin' => $user->bo_pin,
            ]);

            if ($merchant) {
                $applicant = Applicant::create([
                    'token_applicant' => $merchant->token_applicant,
                    'layer_id' => 2,
                    'internal_status' => 'New Request',
                    'updated_by' => $user->id
                ]);
                $payments = explode(', ', $fiturTransaksi);
                foreach ($payments as $key => $value) {
                    $merchantPayment = MerchantPayment::create([
                        'token_applicant' => $merchant->token_applicant,
                        'payment' => $value,
                        'status_approval' => 'New Request',
                        'internal_status' => 'New Request',
                        'notes' => '',
                        'updated_by' => $user->id,
                        'layer_id' => 2
                    ]);
                }

                $docs = DokumenApplicant::where('status', 'active')->where('type', $merchant->pengajuan_sebagai)->get();
                foreach ($docs as $key => $value) {
                    $merchantDocument = MerchantDocument::create([
                        'token_applicant' => $merchant->token_applicant,
                        'document_id' => $value->id,
                        'image' => null,
                        'status_approval' => null,
                        'notes' => null,
                        'updated_by' => 1,
                        'layer_id' => 2
                    ]);
                }

                Utils::addHistory($merchant->token_applicant, 'New Request', '', 'merchant', $merchant->id, );

                $checkUsername = BackOffice::checkUsername($merchant->username);
                if ($checkUsername !== 200) {
                    DB::rollBack();
                    return RestController::sendError('Username already used or duplicate!');
                }

                // $integrated = $this->addMerchantBO($merchant->token_applicant);

                // if (!$integrated) {
                //     DB::rollBack();
                //     return RestController::sendError('Gagal pengajuan merchant');
                // }
                $app = Applicant::where('token_applicant', $merchant->token_applicant)->first();

                // SUbmitted

                Mail::to($merchant->email)->cc([$merchant->bisnis_email, $merchant->email_pengurus])->send(new ApprovalMail($merchant, $app));
                // Mail::to($merchant->email)->send(new ApprovalMail($merchant, $app));
                // Mail::to($merchant->bisnis_email)->send(new ApprovalMail($merchant, $app));
                // Mail::to($merchant->email_pengurus)->send(new ApprovalMail($merchant, $app));

                // Account
                Mail::to($merchant->email)->cc([$merchant->bisnis_email, $merchant->email_pengurus])->send(new AccountMail($merchant, $app));
                // Mail::to($merchant->email)->send(new AccountMail($merchant, $app));
                // Mail::to($merchant->bisnis_email)->send(new AccountMail($merchant, $app));
                // Mail::to($merchant->email_pengurus)->send(new AccountMail($merchant, $app));

                DB::commit();
                return RestController::sendResponse('Berhasil pengajuan merchant', $merchant);
            }
            DB::rollBack();
            return RestController::sendError('Gagal pengajuan merchant');
        } catch (\Throwable $th) {
            dd($th);
            Log::info($th);
            DB::rollBack();
            return RestController::sendError('Gagal pengajuan merchant');
        }
    }

    public function update(Request $request)
    {
        $user = Auth::user();
        $now = Carbon::now();
        $fiturTransaksi = $request->fitur_transaksi;
        DB::beginTransaction();
        try {
            $omset = str_replace('.', '', $request->omset_rata_rata);
            $merchant = Merchant::where('token_applicant', $request->token_applicant)->update([
                'nama_merchant' => $request->nama_merchant,
                'pengajuan_sebagai' => $request->pengajuan_sebagai,
                'tahun_berdiri' => $request->tahun_berdiri,
                'jenis_usaha' => $request->jenis_usaha,
                'mcc' => $request->mcc,
                'fitur_transaksi' => $fiturTransaksi,
                'bisnis_email' => $request->bisnis_email,
                'bisnis_no_hp' => $request->bisnis_no_hp,
                'alamat_bisnis' => $request->alamat_bisnis,
                'tempat_bisnis' => $request->tempat_bisnis,
                'store_url' => $request->store_url,
                'status_tempat_usaha' => $request->status_tempat_usaha,
                'nama_pemilik_merchant' => $request->nama_pemilik_merchant,
                'tempat_lahir' => $request->tempat_lahir,
                'tanggal_lahir' => $request->tanggal_lahir,
                'alamat_sesuai_ktp' => $request->alamat_sesuai_ktp,
                'alamat_domisili' => $request->alamat_domisili,
                'kewarganegaraan' => $request->kewarganegaraan,
                'email' => $request->email,
                'nomor_identitas' => $request->nomor_identitas,
                'nomor_hp' => $request->nomor_hp,
                'npwp' => $request->npwp,
                'nama_pengurus_merchant' => $request->nama_pengurus_merchant,
                'kewarganegaraan_pengurus' => $request->kewarganegaraan_pengurus,
                'nomor_identitas_pengurus' => $request->nomor_identitas_pengurus,
                'npwp_pengurus' => $request->npwp_pengurus,
                'email_pengurus' => $request->email_pengurus,
                'nomor_hp_pengurus' => $request->nomor_hp_pengurus,
                'nama_bank' => $request->nama_bank,
                'nomor_rekening_bank_penampung' => $request->nomor_rekening_bank_penampung,
                'nama_pemilik_rekening_merchant_badan_usaha' => $request->nama_pemilik_rekening_merchant_badan_usaha,
                'email_settlement' => $request->email_settlement,
                'lat' => $request->lat,
                'longitude' => $request->longitude,
                'm_lat' => $request->m_lat,
                'm_lng' => $request->m_lng,
                'jenis_produk' => $request->jenis_produk,
                'omset_rata_rata' => $omset,
                'alamat_pejabat_berwenang' => $request->alamat_pejabat_berwenang,
                'npwp_merchant_badan_usaha' => $request->npwp_merchant_badan_usaha,
                'jenis_kelamin_pemilik' => $request->jenis_kelamin_pemilik,
                'jenis_kelamin_pengurus' => $request->jenis_kelamin_pengurus,
                'sumber_data' => 'Mobile',
                'status' => 'active',
                'updated_at' => $now,
                'updated_by' => $user->name,
                'status_detail' => 'Updated',
                'catatan_detail' => "Merchant detail updated",
                'alasan_detail' => null
            ]);

            if ($merchant) {
                $applicant = Applicant::where('token_applicant', $request->token_applicant)->update([
                    'layer_id' => 2,
                    'updated_by' => $user->id,
                ]);


                $payments = explode(', ', $fiturTransaksi);
                $existingPayments = MerchantPayment::where('token_applicant', $request->token_applicant)->where('status', 'active')->pluck('payment')->toArray();

                foreach ($payments as $key => $value) {

                    if (!in_array($value, $existingPayments)) {
                        $merchantPayment = MerchantPayment::create([
                            'token_applicant' => $request->token_applicant,
                            'payment' => $value,
                            'status_approval' => 'New Request',
                            'internal_status' => 'New Request',
                            'notes' => '',
                            'updated_by' => $user->id,
                            'layer_id' => 2
                        ]);
                    }
                }

                foreach ($existingPayments as $existingPayment) {
                    if (!in_array($existingPayment, $payments)) {
                        MerchantPayment::where('token_applicant', $request->token_applicant)
                            ->where('payment', $existingPayment)
                            ->update([
                                'status' => 'inactive'
                            ]);
                    }
                }

                DB::commit();
                return RestController::sendResponse('Berhasil perbarui data merchant', $merchant);
            }

            DB::rollBack();
            return RestController::sendError('Gagal perbarui data merchant');
        } catch (\Throwable $th) {
            DB::rollBack();
            return RestController::sendError('Gagal perbarui data merchant');
        }
    }

    public function checkBo(Request $request)
    {
        $user = Auth::user();

        try {
            $salt = 'BtDMQ7RfNVoRzWGjS2DK';
            $decPass = BackOffice::decrypt($salt, $user->bo_password);
            $decPin = BackOffice::decrypt($salt, $user->bo_pin);
            $encPass = BackOffice::encrypt($salt, $decPass);
            $encPin = BackOffice::encrypt($salt, $decPin);

            $merchant_id = BackOffice::registerToBackOffice($encPass, $request->email, $request->username, $encPin, $request->nama_merchant);
            return RestController::sendResponse('Berhasil', $merchant_id);
        } catch (\Throwable $th) {
            dd($th);
        }
    }

    public function addMerchantBO($token_applicant)
    {
        $user = Auth::user();
        try {
            $salt = 'BtDMQ7RfNVoRzWGjS2DK';
            $decPass = BackOffice::decrypt($salt, $user->bo_password);
            $decPin = BackOffice::decrypt($salt, $user->bo_pin);

            $encPass = BackOffice::encrypt($salt, $decPass);
            $encPin = BackOffice::encrypt($salt, $decPin);


            $merchant = Merchant::where('token_applicant', $token_applicant)->first();

            $merchant_id = BackOffice::registerToBackOffice($encPass, $merchant->email, $merchant->username, $encPin, $merchant->nama_merchant);
            if ($merchant_id) {
                $merchant->merchant_id = $merchant_id;
                if ($merchant->save()) {
                    return true;
                }
                return false;
            }
            return false;
        } catch (\Throwable $th) {
            dd($th);
            return false;
        }
    }

    public function documents(Request $request)
    {
        $merchant = Merchant::where('token_applicant', $request->token_applicant)->first();

        if ($merchant) {
            $documents = MerchantDocument::with('document')->where('token_applicant', $request->token_applicant)->get();
            $signature = MerchantSignature::where('token_applicant', $request->token_applicant)->get();
            $data = $documents->merge($signature);
            // dd($documents);
            return RestController::sendResponse('List dokumen pengajuan merchant', $data);
        }
        return RestController::sendError('Data merchant tidak ditemukan');
    }

    public function uploadDocument(Request $request)
    {
        $image = null;
        $type = null;
        DB::beginTransaction();
        try {
            $merchantDocument = MerchantDocument::where('token_applicant', $request->token_applicant)->where('document_id', $request->document_id)->first();

            if ($merchantDocument) {
                if ($request->has('file')) {
                    if ($request->file->getClientOriginalExtension() === 'pdf' && $request->file->getClientMimeType() === 'application/pdf') {
                        // if ($request->file->getClientMimeType() === 'application/pdf') {
                        $image = Utils::uploadFile($request->file);
                    } else {
                        $image = Utils::uploadImageOri($request->file);
                    }
                    if (!$image) {
                        DB::rollBack();
                        return RestController::sendError('Gagal upload dokumen, tunggu beberapa saat lagi');
                    }
                    $type = substr($image, -3);
                }
                $merchant = Merchant::where('token_applicant', $request->token_applicant)->first();
                if ($merchant->status_approval == 'Reject') {
                    $countReject = MerchantDocument::where('token_applicant', $request->token_applicant)->where('document_id', '!=', $request->document_id)->where('status_approval', 'Reject')->count();

                    if ($countReject == 0) {
                        $merchant->status_approval = 'Updated';
                        $merchant->save();
                    }
                    $merchantDocument->status_approval = 'Updated';
                    $merchantDocument->notes = '';

                    $applicant = Applicant::where('token_applicant', $request->token_applicant)->first();
                    $applicant->internal_status = 'Updated';
                    $applicant->layer_id = 2;
                    $applicant->save();
                    Utils::addHistory($request->token_applicant, 'Updated', 'Dokumen diupload ulang', 'document', $merchantDocument->id);
                }

                $merchantDocument->image = $image;
                $merchantDocument->type = $type;
                if ($merchantDocument->save()) {
                    $this->checkDocument($request->token_applicant, $request->document_id);
                    DB::commit();
                    return RestController::sendResponse('Berhasil upload dokumen', $image);
                }
                DB::rollBack();
                return RestController::sendResponse('Gagal upload dokumen');
            }
            DB::rollBack();
            return RestController::sendResponse('Dokumen tidak ditemukan');
        } catch (\Throwable $th) {
            DB::rollBack();
            return RestController::sendResponse('Gagal upload dokumen');
        }
    }

    public function checkDocument($token, $docId)
    {
        $merchant = Merchant::where('token_applicant', $token)->first();

        $curTotal = MerchantDocument::where('token_applicant', $token)->where('image', null)->count();

        if ($curTotal < 1) {
            $merchant->dokumen_lengkap = true;
            $merchant->save();
        }
        return true;
    }

    public function uploadSignature(Request $request)
    {
        $image = null;
        DB::beginTransaction();
        try {
            if ($request->has('file')) {
                $image = Utils::uploadImageOri($request->file);
            }
            $merchant = Merchant::where('token_applicant', $request->token_applicant)->first();

            $sign = MerchantSignature::where('token_applicant', $request->token_applicant)->first();
            if (!$sign) {
                $upload = MerchantSignature::create([
                    'token_applicant' => $request->token_applicant,
                    'image' => $image,
                    'status' => 'active'
                ]);
                if ($upload) {
                    $merchant->status_tanda_tangan = true;
                    $merchant->save();
                    DB::commit();
                    return RestController::sendResponse('Berhasil upload tanda tangan', $image);
                }
                DB::rollBack();
                return RestController::sendError('Gagal upload tanda tangan');
            }
            $sign->image = $image;
            if ($sign->save()) {
                $merchant->status_tanda_tangan = true;
                $merchant->save();
                DB::commit();
                return RestController::sendResponse('Berhasil upload tanda tangan', $image);
            }
            DB::rollBack();
            return RestController::sendError('Gagal upload tanda tangan');
        } catch (\Throwable $th) {
            DB::rollBack();
            return RestController::sendError('Gagal upload tanda tangan');
        }
    }

    public function proofOfPayment(Request $request)
    {
        $image = null;
        DB::beginTransaction();
        try {
            if ($request->has('file')) {
                $image = Utils::uploadImageOri($request->file);
            }
            $proof = MerchantProof::where('token_applicant', $request->token_applicant)->update([
                'status' => 'deleted'
            ]);
            $upload = MerchantProof::create([
                'token_applicant' => $request->token_applicant,
                'description' => $request->description,
                'url' => $image,
                'status' => 'active',
                'type' => 'payment',
                'upload_by' => Auth::user()->id
            ]);
            if ($upload) {
                DB::commit();
                return RestController::sendResponse('Berhasil upload bukti pembayaran', $upload);
            }
            DB::rollBack();
            return RestController::sendError('Gagal upload bukti pembayaran');
        } catch (\Throwable $th) {
            DB::rollBack();
            return RestController::sendResponse('Gagal upload bukti pembayaran');
        }
    }

    public function getPayment($token)
    {
        DB::beginTransaction();
        try {
            $proof = MerchantProof::select('url', 'description', 'created_at as upload_at')->where('status', 'active')->where('token_applicant', $token)->first();

            if (!$proof) {
                DB::rollBack();
                return RestController::sendError('Gagal ambil bukti pembayaran');
            }

            DB::commit();
            return RestController::sendResponse('Berhasil ambil bukti pembayaran', $proof);
        } catch (\Throwable $th) {
            DB::rollBack();
            return RestController::sendResponse('Gagal ambil bukti pembayaran');
        }
    }

    public function branchList($token)
    {
        $data = MerchantBranch::where('token_applicant', $token)->get();

        return RestController::sendResponse('Berhasil mengambil data pengajuan', $data);
    }

    public function branchStore(Request $request)
    {
        $user = Auth::user();
        $merchant = Merchant::where('token_applicant', $request->token_applicant)->first();
        if (!$merchant) {
            return RestController::sendError('Merchant tidak ditemukan!');
        }
        DB::beginTransaction();
        try {

            $branch = MerchantBranch::create([
                'token_applicant' => $request->token_applicant,
                'alamat' => $request->alamat,
                'user_id' => $user->id,
                'layer_id' => 2,
                'kebutuhan_edc' => $request->kebutuhan_edc,
                'status' => 'New Request',
                'internal_status' => 'New Request',
                'notes' => null,
                'update_by' => $user->id,
                'alamat_pengiriman' => $request->alamat_pengiriman,
                'nama_pic' => $request->nama_pic,
                'no_tlp_pic' => $request->no_telp_pic,
                'tipe' => $request->tipe,
                'nomor_seri' => $request->nomor_seri
            ]);
            if ($branch) {
                DB::commit();
                return RestController::sendResponse("Berhasil tambah cabang", $branch);
            }
            DB::rollBack();
            return RestController::sendError("Gagal tambah merchant");
        } catch (\Throwable $th) {
            DB::rollBack();
            return RestController::sendError("Gagal tambah merchant");
        }
    }

    public function checkSignature($id)
    {
        try {
            $signature = MerchantSignature::where("token_applicant", $id)->select("image", "status_approval", "notes")->first();
            return RestController::sendResponse('Berhasil Mendapatkan Data', $signature);
        } catch (\Throwable $th) {
            dd($th);
        }
    }
}
