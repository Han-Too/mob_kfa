<?php

namespace App\Http\Controllers;

use App\Exports\ApplicantExport;
use App\Helpers\BackOffice;
use App\Helpers\Utils;
use App\Mail\ApprovalMail;
use App\Models\Applicant;
use App\Models\DokumenApplicant;
use App\Models\HistoryApproval;
use App\Models\MasterLayer;
use App\Models\Merchant;
use App\Models\MerchantBranch;
use App\Models\MerchantDocument;
use App\Models\MerchantPayment;
use App\Models\MerchantProof;
use App\Models\MerchantSignature;
use App\Models\Reason;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Facades\Excel;

class ApplicantController extends Controller
{
    public function index(Request $request)
    {
        $dateRange = $request->query('dateRange');

        if ($dateRange) {
            $dateRangeArray = explode(" - ", $dateRange);

            $startDate = date('Y-m-d', strtotime($dateRangeArray[0]));
            $endDate = date('Y-m-d', strtotime($dateRangeArray[1]));

            $data = Merchant::with('workflow')
                ->where('dokumen_lengkap', true)
                ->where('status', '!=', 'deleted')
                ->whereDate('created_at', '>=', $startDate)
                ->whereDate('created_at', '<=', $endDate)
                ->orderByDesc('created_at')
                ->get();
        } else {
            $data = Merchant::with('workflow')
                ->where('dokumen_lengkap', true)
                ->where('status', '!=', 'deleted')
                ->orderByDesc('created_at')
                ->get();
        }

        return view('admin.applicants.index', compact('data'));
    }

    public function status($status)
    {
        $sts = Utils::getStatusBySlug($status);
        $data = Merchant::with('workflow')->where('status', '!=', 'deleted')->where('status_approval', $sts)->where('dokumen_lengkap', true)->orderByDesc('created_at')->get();
        return view('admin.applicants.index', compact('data'));
    }

    public function show($token)
    {
        $user = Auth::user();
        $data = Merchant::with('user', 'workflow', 'payments')->where('token_applicant', $token)->first();
        $tokenApp = $data->token_applicant;
        $documents = MerchantDocument::with('document')->where('token_applicant', $data->token_applicant)->orderByDesc('created_at')->get();
        $historyDocument = HistoryApproval::with('document')->where('token_applicant', $data->token_applicant)->where('flag', 'document')->where('user_id', $user->id)->orderBy('created_at')->get();
        $allDocHis = HistoryApproval::with('document','signature')->where('token_applicant', $data->token_applicant)->where('flag', 'document')->orderByDesc('created_at')->get();
        $merchantApproval = HistoryApproval::where('token_applicant', $data->token_applicant)->where('flag', 'merchant')->where('user_id', $user->id)->orderByDesc('created_at')->first();
        $historyApproval = HistoryApproval::where('token_applicant', $data->token_applicant)->where('flag', 'merchant')->orderBy('created_at')->get();
        $historyApprovalDesc = HistoryApproval::where('token_applicant', $data->token_applicant)->where('flag', 'merchant')->orderByDesc('created_at')->get();
        $sign = MerchantSignature::where('token_applicant', $data->token_applicant)->orderByDesc('created_at')->first();

        $payments = MerchantPayment::where('token_applicant', $data->token_applicant)->where('status', 'active')->orderByDesc('created_at')->get();
        $paymentApproval = HistoryApproval::with('payment')->where('token_applicant', $data->token_applicant)->where('flag', 'payment')->orderByDesc('created_at')->get();

        $approvals = HistoryApproval::where('token_applicant', $data->token_applicant)->where('flag', 'merchant')->orderBy('created_at')->get();
        //dd($approvals);
        $documentCompleation = Utils::documentCompleation($token);
        $documentApprovalCompleation = Utils::documentApprovalCompleation($token);
        $reason = Reason::where('status', 'active')->where('type', 'document')->get();
        $proofs = MerchantProof::where('token_applicant', $token)->where('status', '!=', 'deleted')->get();
        $layers = MasterLayer::where('status', '!=', 'deleted')->get();

        $detailHis = HistoryApproval::where('token_applicant', $data->token_applicant)->where('flag', 'detail')->orderByDesc('created_at')->get();
        return view('admin.applicants.show', compact('tokenApp', 'layers', 'allDocHis', 'sign', 'historyApprovalDesc', 'proofs', 'reason', 'data', 'documents', 'historyDocument', 'merchantApproval', 'historyApproval', 'payments', 'paymentApproval', 'approvals', 'documentCompleation', 'documentApprovalCompleation', 'detailHis'));
    }


    public function detailUpdate(Request $request)
    {
        $user = Auth::user();
        DB::beginTransaction();
        try {
            $merchant = Merchant::where('token_applicant', $request->token)->first();
            
            if ($request->npwp_merchant_badan_usaha != null) {
                $merchant->npwp_merchant_badan_usaha = $request->npwp_merchant_badan_usaha;
            }
            $lahir = explode(',', $request->ttl_milik);

            $up = Merchant::where('token_applicant', $request->token)->update([
                "tempat_lahir" => $lahir[0],
                "tanggal_lahir" => $lahir[1],
                "alamat_sesuai_ktp" => $request->alamatktp_milik,
                "alamat_domisili" => $request->alamatdomisili_milik,
                "email" => $request->email_milik,
                "npwp" => $request->npwp_milik,
                "alamat_pejabat_berwenang" => $request->alamat_pengurus,
                "email_pengurus" => $request->email_pengurus,
                "bisnis_email" => $request->email_usaha,
                "alamat_bisnis" => $request->alamat_usaha,
                "email_settlement" => $request->email_settle,
                "status" => "active"
            ]);

            if ($up) {
                Utils::addHistory($request->token, "Update", "Update Data Merchant", 'detail', $merchant->id);
                DB::commit();
                return json_encode(['status' => true, 'message' => 'Success']);
            }
            DB::rollBack();
            return json_encode(['status' => false, 'message' => 'Gagal Update Data Merchant!']);
        } catch (\Throwable $th) {
            DB::rollBack();
            // return json_encode(['status' => false, 'message' => 'Isi Semua Field!']);
            Log::info($th);
            return json_encode(['status' => false, 'message' => $th]);
        }
    }

    public function documentUpdate(Request $request)
    {
        $user = Auth::user();
        if ($user->role_id != 5) {
            $ids = isset($request->id);
            if ($ids) {
                foreach ($request->id as $key => $id) {
                    if (!$request->status[$key]) {
                        $dId = MerchantDocument::where('id', $id)->pluck('document_id')->first();
                        $d = Utils::getDocumentTitle($dId);
                        return json_encode(['status' => false, 'message' => $d . ' Approval field mandatory!']);
                    }
                    if (!$request->notes[$key]) {
                        $dId = MerchantDocument::where('id', $id)->pluck('document_id')->first();
                        $d = Utils::getDocumentTitle($dId);
                        return json_encode(['status' => false, 'message' => $d . ' Notes field mandatory!']);
                    }
                }
            }
        }
        if ($request->status_approval == null) {
            return json_encode(['status' => false, 'message' => 'Recomendation Summary Process field mandatory!']);
        }
        if ($request->notes_approval == null) {
            return json_encode(['status' => false, 'message' => 'Notes Summary Process field mandatory!']);
        }
        if ($request->status_approval == 'Reject') {
            if ($request->reason === null) {
                return json_encode(['status' => false, 'message' => 'Reason field mandatory!']);
            }
        }
        if ($request->status_approval == 'Approve') {
            if ($request->status_setting_tid === null) {
                return json_encode(['status' => false, 'message' => 'TID field mandatory!']);
            }
            if ($request->status_setting_mid === null) {
                return json_encode(['status' => false, 'message' => 'MID field mandatory!']);
            }
        }

        $applicant = Applicant::where('token_applicant', $request->token)->first();
        DB::beginTransaction();
        try {
            $merchant = Merchant::where('token_applicant', $request->token)->first();

            $statusMerchant = Utils::merchantStatus($request->status_approval);

            $merchant->status_approval = $statusMerchant;
            $merchant->catatan = $request->notes_approval;
            $merchant->reason = $request->reason;
            if ($request->status_approval == 'Approve') {
                $merchant->status_setting_mid = $request->status_setting_mid;
                $merchant->status_setting_tid = $request->status_setting_tid;
            }
            if ($merchant->save()) {
                if ($request->reason) {
                    $notes_appr = $request->reason . ' | ' . $request->notes_approval;
                } else {
                    $notes_appr = $request->notes_approval;
                }
                Utils::addHistory($request->token, $request->status_approval, $notes_appr, 'merchant', $merchant->id);
            }

            $status = $request->status_approval;
            if ($request->status_approval == 'Reject' || $request->status_approval == 'Approve' || $request->status_approval == 'Close') {
                $layer_id = 5;
            } else {
                $layer_id = Utils::getLayerId($user->role->title, $status);
            }

            $applicant->layer_id = $layer_id;
            $applicant->internal_status = $status;
            $applicant->updated_by = $user->id;
            $applicant->save();

            if ($user->role_id != 5) {
                $ids = isset($request->id);
                if ($ids) {
                    foreach ($request->id as $key => $id) {
                        $statusDocument = Utils::statusDocument($request->status[$key]);
                        MerchantDocument::where('id', $id)
                            ->update([
                                'status_approval' => $request->status[$key],
                                'notes' => $request->notes[$key],
                                'updated_by' => $user->id,
                                'layer_id' => $layer_id
                            ]);
                        Utils::addHistory($request->token, $statusDocument, $request->notes[$key], 'document', $id);
                    }
                    $statusDocument = Utils::statusDocument($request->statusSign);

                    if($request->statusSign == "Reject"){
                        Merchant::where('token_applicant', $request->token)
                        ->update([
                            'status_tanda_tangan' => 2,
                            'status_approval' => $request->statusSign
                        ]);
                    }
                    
                    MerchantSignature::where('token_applicant', $request->token)
                        ->update([
                            'status_approval' => $request->statusSign,
                            'notes' => $request->notesSign,
                            'updated_by' => $user->id,
                            'layer_id' => $layer_id
                        ]);
                    Utils::addHistory($request->token, $statusDocument, $request->notesSign, 'document', "S-".$id);
                }
            }

            $data = Merchant::where('token_applicant', $request->token)->first();
            $app = Applicant::where('token_applicant', $request->token)->first();

            if ($request->status_approval == 'Approve') {
                $integrated = $this->addMerchantBO($data->token_applicant);

                if (!$integrated) {
                    DB::rollBack();
                    return json_encode(['status' => false, 'message' => 'Gagal Registrasi Merchant ke Backoffice!']);
                }

            }

            if ($request->status_approval == 'Reject' || $request->status_approval == 'Close') {
                Mail::to($data->email)->send(new ApprovalMail($data, $app));
                Mail::to($data->bisnis_email)->send(new ApprovalMail($data, $app));
                Mail::to($data->email_pengurus)->send(new ApprovalMail($data, $app));
            }

            DB::commit();
            return json_encode(['status' => true, 'message' => 'Success']);
        } catch (\Throwable $th) {
            DB::rollBack();
            return json_encode(['status' => false, 'message' => 'Gagal Proses Data!']);
        }
    }


    public function addMerchantBO($token_applicant)
    {
        $usr = Merchant::where('token_applicant', $token_applicant)->pluck('user_id')->first();

        $user = User::where('id', $usr)->first();

        try {
            $salt = 'BtDMQ7RfNVoRzWGjS2DK';
            $decPass = BackOffice::decrypt($salt, $user->bo_password);
            $decPin = BackOffice::decrypt($salt, $user->bo_pin);

            $encPass = BackOffice::encrypt($salt, $decPass);
            $encPin = BackOffice::encrypt($salt, $decPin);


            $merchant = Merchant::where('token_applicant', $token_applicant)->first();

            $merchant_id = BackOffice::registerToBackOffice($encPass, $encPin, $merchant);
            // $merchant_id = BackOffice::registerToBackOffice($encPass, $merchant->email, $merchant->username, $encPin, $merchant->nama_merchant);
            // dd($merchant_id);
            if ($merchant_id) {
                return true;
                // $merchant->merchant_id = $merchant_id;
                // if ($merchant->save()) {
                //     return true;
                // }
                // return false;
            }
            return false;
        } catch (\Throwable $th) {
            dd($th);
            return false;
        }
    }

    public function merchantUpdate(Request $request)
    {
        $user = Auth::user();
        if ($request->status_approval == null) {
            return json_encode(['status' => false, 'message' => 'Recomendation Summary Process field mandatory!']);
        }
        if ($request->notes_approval == null) {
            return json_encode(['status' => false, 'message' => 'Notes Summary Process field mandatory!']);
        }
        if ($request->status_approval == 'Reject') {
            if ($request->reason === null) {
                return json_encode(['status' => false, 'message' => 'Reason field mandatory!']);
            }
        }

        DB::beginTransaction();
        try {
            $merchant = Merchant::where('token_applicant', $request->token)->first();
            $statusMerchant = Utils::merchantStatus($request->status_approval);

            $merchant->status_detail = $statusMerchant;
            $merchant->catatan_detail = $request->notes_approval;
            $merchant->alasan_detail = $request->reason;
            if ($merchant->save()) {
                if ($request->reason) {
                    $notes_appr = $request->reason . ' | ' . $request->notes_approval;
                } else {
                    $notes_appr = $request->notes_approval;
                }
                Utils::addHistory($request->token, $request->status_approval, $notes_appr, 'detail', $merchant->id);
            }

            DB::commit();
            return json_encode(['status' => true, 'message' => 'Success']);
        } catch (\Throwable $th) {

            DB::rollBack();
            return json_encode(['status' => false, 'message' => 'Isi Semua Field!']);
        }
    }



    public function payment(Request $request, $token)
    {
        $dateRange = $request->query('dateRange');
        $merchant = Merchant::where('token_applicant', $token)->first();

        if ($dateRange) {
            $dateRangeArray = explode(" - ", $dateRange);

            $startDate = date('Y-m-d', strtotime($dateRangeArray[0]));
            $endDate = date('Y-m-d', strtotime($dateRangeArray[1]));

            $data = MerchantPayment::with('merchant')->where('token_applicant', $token)->where('status', 'active')->orderByDesc('created_at')
                ->whereBetween('created_at', [$startDate, $endDate])
                ->orderByDesc('created_at')
                ->get();
        } else {
            $data = MerchantPayment::with('merchant')->where('token_applicant', $token)->where('status', 'active')->orderByDesc('created_at')
                ->get();
        }

        return view('admin.applicants.payments.index', compact('data', 'merchant'));
    }


    public function paymentStatus($status, $token)
    {
        $sts = Utils::getStatusBySlug($status);
        $data = MerchantPayment::with('merchant')->where('status_approval', $sts)->where('token_applicant', $token)->where('status', 'active')->get();
        $merchant = Merchant::where('token_applicant', $token)->first();

        return view('admin.applicants.payments.index', compact('data', 'merchant'));
    }

    public function paymentShow($id)
    {
        $user = Auth::user();
        $data = MerchantPayment::with('merchant')->where('id', $id)->where('status', 'active')->first();
        $historyApproval = HistoryApproval::where('token_applicant', $data->merchant->token_applicant)->where('flag', 'payment')->where('approval_id', $id)->orderByDesc('created_at')->get();
        $userApproval = HistoryApproval::where('token_applicant', $data->merchant->token_applicant)->where('flag', 'payment')->where('approval_id', $id)->where('user_id', $user->id)->orderByDesc('created_at')->first();

        return view('admin.applicants.payments.show', compact('data', 'historyApproval', 'userApproval'));
    }

    public function paymentUpdate(Request $request)
    {
        $user = Auth::user();
        DB::beginTransaction();
        try {
            $merchant = Merchant::where('token_applicant', $request->token)->first();
            $payment = MerchantPayment::where('id', $request->id)->where('status', 'active')->first();

            // $status = Utils::applicantStatusByRecomendation($request->status_approval);
            $status = $request->status_approval;
            $internal_status = $request->status_approval;
            $layer_id = Utils::getLayerId($user->role->title, $internal_status);

            $payment->status_approval = $status;
            $payment->internal_status = $internal_status;
            $payment->notes = $request->notes_approval;
            $payment->updated_by = $user->id;
            $payment->layer_id = $layer_id;
            $payment->updated_at = Carbon::now();
            if ($payment->save()) {
                Utils::addHistory($merchant->token_applicant, $request->status_approval, $request->notes_approval, 'payment', $request->id);
                DB::commit();
                return json_encode(['status' => true, 'message' => 'Success']);
            }
            DB::rollBack();
            return json_encode(['status' => false, 'message' => 'Gagal Review Fitur Pembayaran!']);
        } catch (\Throwable $th) {
            DB::rollBack();
            return json_encode(['status' => false, 'message' => 'Isi Semua Field!']);
        }
    }

    public function updateBulk(Request $request)
    {
        if (!isset($request->id)) {
            return response()->json(['message' => "Payment Features Already Submitted!", 'status' => false], 200);
        }
        foreach ($request->status_approval as $key => $value) {
            if (!$value) {
                return response()->json(['message' => "Recommendation can not be empty!", 'status' => false], 200);
            }
        }
        foreach ($request->notes_approval as $key => $value) {
            if (!$value) {
                return response()->json(['message' => "Notes can not be empty!", 'status' => false], 200);
            }
        }
        $user = Auth::user();
        $merchant = Merchant::where('token_applicant', $request->token)->first();

        DB::beginTransaction();
        try {
            foreach ($request->id as $key => $value) {
                $payment = MerchantPayment::where('id', $value)->where('status', 'active')->first();
                if ($request->status_approval[$key]) {
                    // $status = Utils::applicantStatusByRecomendation($request->status_approval[$key]);
                    $status = $request->status_approval[$key];
                    $internal_status = $request->status_approval[$key];
                    $layer_id = Utils::getLayerId($user->role->title, $status);

                    $payment->status_approval = $status;
                    $payment->internal_status = $internal_status;
                    $payment->notes = $request->notes_approval[$key];
                    $payment->updated_by = $user->id;
                    $payment->layer_id = $layer_id;
                    $payment->updated_at = Carbon::now();
                    $payment->save();
                    Utils::addHistory($merchant->token_applicant, $request->status_approval[$key], $request->notes_approval[$key], 'payment', $value);
                }
            }
            DB::commit();
            return response()->json(['message' => "Successfully update payment!", 'status' => true], 201);
        } catch (\Throwable $th) {
            DB::rollBack();
            return response()->json(['message' => "Failed add payment! All field Mandatory!", 'status' => false], 200);
        }
    }

    public function branch(Request $request, $token)
    {
        $dateRange = $request->query('dateRange');
        $merchant = Merchant::where('token_applicant', $token)->first();

        if ($dateRange) {
            $dateRangeArray = explode(" - ", $dateRange);

            $startDate = date('Y-m-d', strtotime($dateRangeArray[0]));
            $endDate = date('Y-m-d', strtotime($dateRangeArray[1]));

            $data = MerchantBranch::with('merchant')->where('token_applicant', $token)->orderByDesc('created_at')
                ->whereBetween('created_at', [$startDate, $endDate])
                ->orderByDesc('created_at')
                ->get();
        } else {
            $data = MerchantBranch::with('merchant')->where('token_applicant', $token)->orderByDesc('created_at')
                ->get();
        }

        return view('admin.applicants.branch.index', compact('data', 'merchant'));
    }

    public function branchShow($id, $token)
    {
        $user = Auth::user();
        $data = MerchantBranch::where('id', $id)->first();
        $merchant = Merchant::where('token_applicant', $token)->first();
        $userApproval = HistoryApproval::where('token_applicant', $token)->where('flag', 'branch')->where('approval_id', $id)->where('user_id', $user->id)->orderByDesc('created_at')->first();
        $historyApproval = HistoryApproval::where('token_applicant', $token)->where('flag', 'branch')->where('approval_id', $id)->orderBy('created_at')->get();

        return view('admin.applicants.branch.show', compact('data', 'merchant', 'userApproval', 'historyApproval'));
    }

    public function branchUpdate(Request $request)
    {
        $user = Auth::user();
        DB::beginTransaction();
        try {
            $merchant = Merchant::where('token_applicant', $request->token)->first();
            $branch = MerchantBranch::where('id', $request->id)->first();

            $status = Utils::applicantStatusByRecomendation($request->status_approval);
            $internal_status = $request->status_approval;
            $layer_id = Utils::getLayerId($user->role->title, $status);

            $branch->status = $status;
            $branch->internal_status = $internal_status;
            $branch->notes = $request->notes_approval;
            $branch->update_by = $user->id;
            $branch->layer_id = $layer_id;
            $branch->updated_at = Carbon::now();
            if ($branch->save()) {
                Utils::addHistory($merchant->token_applicant, $request->status_approval, $request->notes_approval, 'branch', $request->id);
                DB::commit();
                return json_encode(['status' => true, 'message' => 'Success']);
            }
            DB::rollBack();
            return json_encode(['status' => false, 'message' => 'Gagal Review Cabang!']);
        } catch (\Throwable $th) {
            DB::rollBack();
            return json_encode(['status' => false, 'message' => 'Isi Semua Field!']);
        }
    }

    public function export(Request $request, $slug)
    {
        $dateRange = $request->query('dateRange');

        if ($slug != 'applicants') {
            $status = Utils::getStatusBySlug($slug);
        } else {
            $status = $slug;
        }
        $now = Carbon::now()->format('d-m-Y');
        return Excel::download(new ApplicantExport($status, $dateRange), 'Cashlez MOB-' . $now . '.xlsx');
    }
}