<?php

namespace App\Http\Controllers;

use App\Helpers\Utils;
use App\Models\Bank;
use App\Models\Applicant;
use App\Models\DokumenApplicant;
use App\Models\Merchant;
use App\Models\MerchantDocument;
use App\Models\MerchantPayment;
use App\Models\MerchantSignature;
use App\Models\Outlet;
use App\Models\OutletGroup;
use App\Models\AddressList;
use Carbon\Carbon;
use Dompdf\Dompdf;
use Dompdf\Options;
use Faker\Provider\ar_EG\Address;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use \PDF;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use File;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\URL;
use RealRashid\SweetAlert\Facades\Alert;
use Symfony\Component\Console\Input\Input;
use Yajra\DataTables\DataTables;
use ZanySoft\Zip\Facades\Zip;
use ZipArchive;

class GeneralController extends Controller
{
    public function dashboard()
    {
        $user = Auth::user();
        $totalMerchant = Merchant::where('status', 'active')->where('dokumen_lengkap', true)->count();
        $approvedMerchant = Merchant::where('status_approval', 'Approved')->where('dokumen_lengkap', true)->count();

        // Collection
        $newMerchant = Merchant::where('status_approval', 'New Request')->where('dokumen_lengkap', true)->orderByDesc('created_at')->limit(10)->get();
        $processMerchant = Merchant::where('status_approval', 'Process')->where('dokumen_lengkap', true)->orderByDesc('created_at')->get();

        $updatedMerchant = Merchant::where('status_approval', 'Updated')->where('dokumen_lengkap', true)->orderByDesc('created_at')->count();
        $rejectedMerchant = Merchant::where('status_approval', 'Reject')->where('dokumen_lengkap', true)->orderByDesc('created_at')->count();
        $closedMerchant = Merchant::where('status_approval', 'Close')->where('dokumen_lengkap', true)->orderByDesc('created_at')->count();
        $newRequestMerchant = Merchant::where('status_approval', 'New Request')->where('dokumen_lengkap', true)->orderByDesc('created_at')->count();



        return view('admin.dashboard', compact('totalMerchant', 'approvedMerchant', 'processMerchant', 'newMerchant', 'updatedMerchant', 'rejectedMerchant', 'closedMerchant', 'newRequestMerchant'));
    }

    public function addMerchant()
    {
        $fiturTransaksi = 'Kartu kredit/debit offline, Qris, Pay Later, Virtal Account';
        DB::beginTransaction();
        try {
            $merchant = Merchant::create([
                'token_applicant' => Str::uuid(),
                'merchant_id' => null,
                'user_id' => null,
                'nama_merchant' => 'Test Merchant',
                'pengajuan_sebagai' => 'Perorangan',
                'tahun_berdiri' => '2024',
                'jenis_usaha' => 'Online',
                'mcc' => 'mmcc',
                'fitur_transaksi' => $fiturTransaksi,
                'bisnis_email' => 'test@gmail.com',
                'bisnis_no_hp' => '082112710477',
                'alamat_bisnis' => 'Jl ketapang no 1 rt 002 rw 004 kel bencongan indah kec kelapa dua tangerang banten 15810',
                'tempat_bisnis' => 'Pop-up Store',
                'store_url' => 'Cashlez.com',
                'status_tempat_usaha' => 'Milik Sendiri',
                'nama_pemilik_merchant' => 'Esa elissa',
                'tempat_lahir' => 'Jakarta',
                'tanggal_lahir' => '1987-10-17',
                'alamat_sesuai_ktp' => 'Jl ketapang no 1 rt 002 rw 004 kel bencongan Indah kec kelapa dua tangerang, Bencongan Indah, Kelapa Dua, Kab. Tangerang, Banten, 15810, Indonesia',
                'alamat_domisili' => 'Jl ketapang no 1 rt 002 rw 004 kel bencongan Indah kec kelapa dua tangerang, Bencongan Indah, Kelapa Dua, Kab. Tangerang, Banten, 15810, Indonesia',
                'kewarganegaraan' => 'WNI',
                'email' => 'esaelissa@gmail.com',
                'nomor_identitas' => 'KTP, 3603285710870008',
                'nomor_hp' => '087877676523',
                'npwp' => '8u9248298492849',
                'nama_pengurus_merchant' => 'Esa elissa',
                'kewarganegaraan_pengurus' => 'WNI',
                'nomor_identitas_pengurus' => '6213243439937474',
                'npwp_pengurus' => '639937474',
                'email_pengurus' => 'esaelissa@gmail.com',
                'nomor_hp_pengurus' => '082112710477',
                'nama_bank' => 'BANK CENTRAL ASIA (BCA)',
                'nomor_rekening_bank_penampung' => '5485214078',
                'nama_pemilik_rekening_merchant_badan_usaha' => 'Esa elissa',
                'email_settlement' => 'esaelissa@gmail.com',
                'lat' => '-6.1759423',
                'longitude' => '106.7900633',
                'status_approval' => 'New Request',
                'jenis_produk' => 'produk',
                'omset_rata_rata' => '67000000',
                'status_setting_mid' => null,
                'status_setting_tid' => null,
                'status_setting_mdr' => null,
                'status_inject_edc' => null,
                'status_pin_key' => null,
                'status_tes_transaksi' => null,
                'status_qc' => null,
                'alamat_pejabat_berwenang' => 'Jl ketapang no 1 rt 002 rw 004 kel bencongan Indah kec kelapa dua tangerang, Bencongan Indah, Kelapa Dua, Kab. Tangerang, Banten, 15810, Indonesia',
                'npwp_merchant_badan_usaha' => '8294892849289482',
                'status_ekspedisi' => null,
                'jenis_kelamin_pemilik' => 'Perempuan',
                'jenis_kelamin_pengurus' => 'Perempuan',
                'sumber_data' => 'Mobile',
                'catatan' => null,
                'status' => 'active',
                'dokumen_lengkap' => false,
                'status_tanda_tangan' => true,
                'username' => Utils::generateUsername('Esa Elisa'),
                'password' => Hash::make('pass.123'),
                'pin' => '1234',
            ]);

            $applicant = Applicant::create([
                'token_applicant' => $merchant->token_applicant,
                'layer_id' => 2,
                'internal_status' => 'New Request',
                'updated_by' => 1
            ]);

            $payments = explode(', ', $fiturTransaksi);
            foreach ($payments as $key => $value) {
                $merchantPayment = MerchantPayment::create([
                    'token_applicant' => $merchant->token_applicant,
                    'payment' => $value,
                    'status_approval' => 'New Request',
                    'internal_status' => 'New Request',
                    'notes' => '',
                    'updated_by' => 1,
                    'layer_id' => 2
                ]);
            }

            $docs = DokumenApplicant::where('status', 'active')->where('type', $merchant->pengajuan_sebagai)->get();
            foreach ($docs as $key => $value) {
                $merchantDocument = MerchantDocument::create([
                    'token_applicant' => $merchant->token_applicant,
                    'document_id' => $value->id,
                    'image' => 'http://cashlez.kreditekfa.co.id/images/170771473765c9a8b1a9d34.png',
                    'status_approval' => null,
                    'notes' => null,
                    'updated_by' => 1,
                    'layer_id' => 2
                ]);
            }
            DB::commit();
            $response = [
                'success' => true,
                'message' => "Berhasil Add Merchant",
            ];

            return response()->json($response, 200);
        } catch (\Throwable $th) {
            DB::rollBack();

            $response = [
                'success' => false,
                'message' => "Gagal Add Merchant",
            ];

            return response()->json($response, 400);
        }
    }

    public function formMerchant($token_applicant)
    {
        $merchant = Merchant::with('branches')->where('token_applicant', $token_applicant)->first();
        $signature = MerchantSignature::where('token_applicant', $token_applicant)->pluck('image')->first();

        $data = [
            'data' => $merchant,
            'signature' => $signature
        ];
        // return view('pdf.form-merchant', $data);
        $pdf = PDF::loadView('pdf.form-merchant', $data);
        $pdf->setPaper('A4');

        return $pdf->stream('Form Pengajuan Merchant');
    }

    // public function formEDC($token_applicant)
    // {
    //     $merchant = Merchant::with('branches')->where('token_applicant', $token_applicant)->first();
    //     $signature = MerchantSignature::where('token_applicant', $token_applicant)->pluck('image')->first();
    //     $data = [
    //         'data' => $merchant,
    //         'signature' => $signature
    //     ];

    //     $pdf = PDF::loadView('pdf.edc', $data);
    //     $pdf->setPaper('A4');

    //     return $pdf->stream('Form Pengajuan EDC');
    // }

    public function formEDC($token_applicant)
    {
        set_time_limit(300);
        $data = Merchant::with('branches')->where('token_applicant', $token_applicant)->first();
        $signature = MerchantSignature::where('token_applicant', $token_applicant)->pluck('image')->first();
        $html = view('pdf.edc', compact('data', 'signature'))->render();
        // return $html;
        $options = new Options();
        $options->set('isRemoteEnabled', true);
        $dompdf = new Dompdf($options);

        $dompdf->loadHtml($html);

        $dompdf->setPaper('A4', 'potrait');

        $dompdf->render();

        return $dompdf->stream('Form Pengajuan EDC', array("Attachment" => 0));
    }

    public function assignLayer(Request $request)
    {
        $applicant = Applicant::where('token_applicant', $request->token)->first();
        $applicant->layer_id = $request->layerId;
        if ($applicant->save()) {
            return true;
        }
    }

    public function migrateBank()
    {
        // $url = 'https://dev-mob.cashlez.com/api/banks';

        // try {
        //     $client = new Client();
        //     $response = $client->get($url, [
        //         'headers' => [
        //             'C-API-KEY' => 'C56c5f91b-Ae3fb-S42a3-H87c0-L39d7a8f3cd36EZ',
        //         ],
        //         'verify' => false,
        //         'timeout' => 120,
        //     ]);
        //     $body = $response->getBody();
        //     $responseData = json_decode($body, true);

        //     $data = $responseData["data"];

        //     if ($data) {
        //         try {
        //             Bank::truncate();
        //             foreach ($data as $key => $value) {
        //                 Bank::create([
        //                     'code' => $value['code'],
        //                     'name' => $value['name'],
        //                     'status' => 'active'
        //                 ]);
        //             }

        //             if ($data) {
        //                 return  response()->json(['message' => "Successfully added bank!", 'status' => true], 201);
        //             }
        //         } catch (\Throwable $th) {
        //             dd($th);
        //             return  response()->json(['message' => "Failed add bank!", 'status' => false], 200);
        //         }
        //     }
        // } catch (RequestException $e) {
        //     // Log::error('Guzzle request exception: ' . $e->getMessage());
        //     dd('Guzzle request exception: ' . $e->getMessage());
        // }
        try {
            $json = '
            [
                {
                 "bank_code": "0002",
                 "bank_name": "BANK BRI"
                },
                {
                 "bank_code": "0003",
                 "bank_name": "EKSPOR INDONESIA"
                },
                {
                 "bank_code": "0008",
                 "bank_name": "MANDIRI"
                },
                {
                 "bank_code": "0009",
                 "bank_name": "BANK BNI"
                },
                {
                 "bank_code": "0011",
                 "bank_name": "DANAMON"
                },
                {
                 "bank_code": "0013",
                 "bank_name": "BANK PERMATA"
                },
                {
                 "bank_code": "0014",
                 "bank_name": "BCA"
                },
                {
                 "bank_code": "0016",
                 "bank_name": "MAYBANK (d.h.BII)"
                },
                {
                 "bank_code": "0019",
                 "bank_name": "BANK PANIN"
                },
                {
                 "bank_code": "0020",
                 "bank_name": "ARTA NIAGA KENCANA"
                },
                {
                 "bank_code": "0022",
                 "bank_name": "BANK CIMB NIAGA"
                },
                {
                 "bank_code": "0023",
                 "bank_name": "UOB BUANA"
                },
                {
                 "bank_code": "0026",
                 "bank_name": "BANK LIPPO"
                },
                {
                 "bank_code": "0028",
                 "bank_name": "OCBC -NISP"
                },
                {
                 "bank_code": "0030",
                 "bank_name": "AMERICAN EXPRESS"
                },
                {
                 "bank_code": "0031",
                 "bank_name": "CITIBANK"
                },
                {
                 "bank_code": "0032",
                 "bank_name": "JP. MORGAN CHASE"
                },
                {
                 "bank_code": "0033",
                 "bank_name": "BANK OF AMERICA"
                },
                {
                 "bank_code": "0034",
                 "bank_name": "ING INDONESIA BANK"
                },
                {
                 "bank_code": "0036",
                 "bank_name": "CCB INDONESIA"
                },
                {
                 "bank_code": "0037",
                 "bank_name": "BANK ARTHA GRAHA"
                },
                {
                 "bank_code": "0039",
                 "bank_name": "CREDIT AGRICOLE INDOSUEZ"
                },
                {
                 "bank_code": "0040",
                 "bank_name": "THE BANGKOK BANK COMP"
                },
                {
                 "bank_code": "0041",
                 "bank_name": "THE HONGKONG & SHANGHAI"
                },
                {
                 "bank_code": "0042",
                 "bank_name": "THE BANK OF TOKYO"
                },
                {
                 "bank_code": "0045",
                 "bank_name": "SUMITOMO MITSUI"
                },
                {
                 "bank_code": "0046",
                 "bank_name": "BANK DBS"
                },
                {
                 "bank_code": "0047",
                 "bank_name": "BANK RESONA PERDANIA"
                },
                {
                 "bank_code": "0048",
                 "bank_name": "BANK MIZUHO"
                },
                {
                 "bank_code": "0050",
                 "bank_name": "STANDARD CHARTERED"
                },
                {
                 "bank_code": "0052",
                 "bank_name": "BANK ABN AMRO"
                },
                {
                 "bank_code": "0053",
                 "bank_name": "KEPPEL TATLEE BUANA"
                },
                {
                 "bank_code": "0054",
                 "bank_name": "BANK CAPITAL"
                },
                {
                 "bank_code": "0057",
                 "bank_name": "BNP PARIBAS"
                },
                {
                 "bank_code": "0058",
                 "bank_name": "UOB"
                },
                {
                 "bank_code": "0059",
                 "bank_name": "KOREA EXCHANGE"
                },
                {
                 "bank_code": "0060",
                 "bank_name": "RABOBANK"
                },
                {
                 "bank_code": "0061",
                 "bank_name": "ANZ"
                },
                {
                 "bank_code": "0067",
                 "bank_name": "DEUTSCHE BANK AG."
                },
                {
                 "bank_code": "0068",
                 "bank_name": "BANK WOORI INDONESIA"
                },
                {
                 "bank_code": "0069",
                 "bank_name": "BANK OF CHINA"
                },
                {
                 "bank_code": "0076",
                 "bank_name": "BANK BUMI ARTA"
                },
                {
                 "bank_code": "0087",
                 "bank_name": "HSBC INDONESIA"
                },
                {
                 "bank_code": "0088",
                 "bank_name": "BANK ANTARDAERAH"
                },
                {
                 "bank_code": "0089",
                 "bank_name": "RABOBANK"
                },
                {
                 "bank_code": "0093",
                 "bank_name": "BANK IFI"
                },
                {
                 "bank_code": "0095",
                 "bank_name": "JTRUST BANK"
                },
                {
                 "bank_code": "0097",
                 "bank_name": "BANK MAYAPADA"
                },
                {
                 "bank_code": "0110",
                 "bank_name": "BANK BJB"
                },
                {
                 "bank_code": "0111",
                 "bank_name": "BANK DKI"
                },
                {
                 "bank_code": "0112",
                 "bank_name": "BPD DIY"
                },
                {
                 "bank_code": "0113",
                 "bank_name": "BANK JATENG"
                },
                {
                 "bank_code": "0114",
                 "bank_name": "BANK JATIM"
                },
                {
                 "bank_code": "0115",
                 "bank_name": "BPD JAMBI"
                },
                {
                 "bank_code": "0116",
                 "bank_name": "BPD ACEH"
                },
                {
                 "bank_code": "0117",
                 "bank_name": "BPD SUMUT"
                },
                {
                 "bank_code": "0118",
                 "bank_name": "BANK NAGARI"
                },
                {
                 "bank_code": "0119",
                 "bank_name": "BANK RIAU"
                },
                {
                 "bank_code": "0120",
                 "bank_name": "BANK SUMSELBABEL"
                },
                {
                 "bank_code": "0121",
                 "bank_name": "BANK LAMPUNG"
                },
                {
                 "bank_code": "0122",
                 "bank_name": "BANK KALSEL"
                },
                {
                 "bank_code": "0123",
                 "bank_name": "BPD KALBAR"
                },
                {
                 "bank_code": "0124",
                 "bank_name": "BPD KALTIM"
                },
                {
                 "bank_code": "0125",
                 "bank_name": "BKALTENG"
                },
                {
                 "bank_code": "0126",
                 "bank_name": "BPD SULSEL"
                },
                {
                 "bank_code": "0127",
                 "bank_name": "BPD SULUT"
                },
                {
                 "bank_code": "0128",
                 "bank_name": "BANK NTB"
                },
                {
                 "bank_code": "0129",
                 "bank_name": "BPD BALI"
                },
                {
                 "bank_code": "0130",
                 "bank_name": "BPD NTT"
                },
                {
                 "bank_code": "0131",
                 "bank_name": "BANK MALUKU"
                },
                {
                 "bank_code": "0132",
                 "bank_name": "BANK PAPUA"
                },
                {
                 "bank_code": "0133",
                 "bank_name": "BANK BENGKULU"
                },
                {
                 "bank_code": "0134",
                 "bank_name": "SULTENG"
                },
                {
                 "bank_code": "0135",
                 "bank_name": "BPD SULTRA"
                },
                {
                 "bank_code": "0145",
                 "bank_name": "BNP"
                },
                {
                 "bank_code": "0146",
                 "bank_name": "BANK SWADESI"
                },
                {
                 "bank_code": "0147",
                 "bank_name": "MUAMALAT"
                },
                {
                 "bank_code": "0151",
                 "bank_name": "BANK MESTIKA"
                },
                {
                 "bank_code": "0152",
                 "bank_name": "BANK SHINHAN"
                },
                {
                 "bank_code": "0153",
                 "bank_name": "BANK SINARMAS"
                },
                {
                 "bank_code": "0157",
                 "bank_name": "BANK MASPION"
                },
                {
                 "bank_code": "0159",
                 "bank_name": "BANK HAGAKITA"
                },
                {
                 "bank_code": "0161",
                 "bank_name": "BANK GANESHA"
                },
                {
                 "bank_code": "0162",
                 "bank_name": "BANK WINDU KENTJANA"
                },
                {
                 "bank_code": "0164",
                 "bank_name": "BANK ICBC"
                },
                {
                 "bank_code": "0166",
                 "bank_name": "HARMONI"
                },
                {
                 "bank_code": "0167",
                 "bank_name": "BANK QNB"
                },
                {
                 "bank_code": "0200",
                 "bank_name": "BANK BTN"
                },
                {
                 "bank_code": "0212",
                 "bank_name": "WOORI SAUDARA"
                },
                {
                 "bank_code": "0213",
                 "bank_name": "BTPN"
                },
                {
                 "bank_code": "0405",
                 "bank_name": "VICTORIA SYARIAH"
                },
                {
                 "bank_code": "0422",
                 "bank_name": "BANK BRI SYARIAH"
                },
                {
                 "bank_code": "0425",
                 "bank_name": "BJB SYARIAH"
                },
                {
                 "bank_code": "0426",
                 "bank_name": "BANK MEGA"
                },
                {
                 "bank_code": "0427",
                 "bank_name": "BANK BNI SYARIAH"
                },
                {
                 "bank_code": "0441",
                 "bank_name": "BANK BUKOPIN"
                },
                {
                 "bank_code": "0451",
                 "bank_name": "BANK SYARIAH INDONESIA"
                },
                {
                 "bank_code": "0459",
                 "bank_name": "BISNIS INTERNASIONAL"
                },
                {
                 "bank_code": "0466",
                 "bank_name": "BANK SRI PARTHA"
                },
                {
                 "bank_code": "0472",
                 "bank_name": "BANK JASA JAKARTA"
                },
                {
                 "bank_code": "0484",
                 "bank_name": "BANK KEB HANA"
                },
                {
                 "bank_code": "0485",
                 "bank_name": "MNC BANK"
                },
                {
                 "bank_code": "0490",
                 "bank_name": "BANK NEO COMMERCE"
                },
                {
                 "bank_code": "0491",
                 "bank_name": "BANK MITRANIAGA"
                },
                {
                 "bank_code": "0494",
                 "bank_name": "BANK BRI AGRONIAGA"
                },
                {
                 "bank_code": "0498",
                 "bank_name": "BANK SBI INDONESIA"
                },
                {
                 "bank_code": "0501",
                 "bank_name": "BANK DIGITAL BCA"
                },
                {
                 "bank_code": "0503",
                 "bank_name": "BANK NATIONALNOBU"
                },
                {
                 "bank_code": "0506",
                 "bank_name": "BANK MEGA SYARIAH"
                },
                {
                 "bank_code": "0513",
                 "bank_name": "BANK INA PERDANA"
                },
                {
                 "bank_code": "0517",
                 "bank_name": "PANIN DUBAI SYARIAH"
                },
                {
                 "bank_code": "0520",
                 "bank_name": "BANK PRIMA MASTER"
                },
                {
                 "bank_code": "0521",
                 "bank_name": "SYARIAH BUKOPIN"
                },
                {
                 "bank_code": "0523",
                 "bank_name": "SAHABAT SAMPOERNA"
                },
                {
                 "bank_code": "0525",
                 "bank_name": "BANK AKITA"
                },
                {
                 "bank_code": "0526",
                 "bank_name": "BANK OKE INDONESIA"
                },
                {
                 "bank_code": "0531",
                 "bank_name": "ANGLOMAS"
                },
                {
                 "bank_code": "0535",
                 "bank_name": "SEA BANK"
                },
                {
                 "bank_code": "0536",
                 "bank_name": "BCA SYARIAH"
                },
                {
                 "bank_code": "0542",
                 "bank_name": "BANK JAGO"
                },
                {
                 "bank_code": "0547",
                 "bank_name": "BTPN SYARIAH"
                },
                {
                 "bank_code": "0548",
                 "bank_name": "MULTIARTA SENTOSA"
                },
                {
                 "bank_code": "0553",
                 "bank_name": "BANK MAYORA"
                },
                {
                 "bank_code": "0555",
                 "bank_name": "BANK INDEX"
                },
                {
                 "bank_code": "0558",
                 "bank_name": "BANK EKSEKUTIF"
                },
                {
                 "bank_code": "0559",
                 "bank_name": "CNB"
                },
                {
                 "bank_code": "0562",
                 "bank_name": "FAMA"
                },
                {
                 "bank_code": "0564",
                 "bank_name": "BANK MANTAP"
                },
                {
                 "bank_code": "0566",
                 "bank_name": "BANK VICTORIA"
                },
                {
                 "bank_code": "0567",
                 "bank_name": "HARDA"
                },
                {
                 "bank_code": "0688",
                 "bank_name": "BPR KS"
                },
                {
                 "bank_code": "0770",
                 "bank_name": "BANK ALTOPAY"
                },
                {
                 "bank_code": "0775",
                 "bank_name": "SGODPAY"
                },
                {
                 "bank_code": "0911",
                 "bank_name": "TELKOMSEL (TCASH)"
                },
                {
                 "bank_code": "0945",
                 "bank_name": "BANK FINCONESIA"
                },
                {
                 "bank_code": "0946",
                 "bank_name": "BANK MERINCORP"
                },
                {
                 "bank_code": "0947",
                 "bank_name": "BANK MAYBANK INDOCORP"
                },
                {
                 "bank_code": "0948",
                 "bank_name": "BANK OCBC – INDONESIA"
                },
                {
                 "bank_code": "0949",
                 "bank_name": "CHINATRUST INDONESIA"
                },
                {
                 "bank_code": "0950",
                 "bank_name": "BANK COMMONWEALTH"
                },
                {
                 "bank_code": "1002",
                 "bank_name": "MIGS BRI"
                },
                {
                 "bank_code": "1008",
                 "bank_name": "MANDIRI (MTI)"
                },
                {
                 "bank_code": "1011",
                 "bank_name": "GOPAY"
                },
                {
                 "bank_code": "1016",
                 "bank_name": "MIGS Maybank"
                },
                {
                 "bank_code": "1022",
                 "bank_name": "KREDIVO"
                },
                {
                 "bank_code": "1023",
                 "bank_name": "VA ARTAJASA"
                },
                {
                 "bank_code": "1024",
                 "bank_name": "DANA"
                },
                {
                 "bank_code": "1025",
                 "bank_name": "SHOPEEPAY"
                },
                {
                 "bank_code": "1026",
                 "bank_name": "VA PERMATA"
                },
                {
                 "bank_code": "1027",
                 "bank_name": "VOSPAY"
                },
                {
                 "bank_code": "1028",
                 "bank_name": "NOBU QRIS"
                },
                {
                 "bank_code": "1029",
                 "bank_name": "VA BCA"
                },
                {
                 "bank_code": "1030",
                 "bank_name": "ATOME"
                },
                {
                 "bank_code": "1031",
                 "bank_name": "INDODANA"
                },
                {
                 "bank_code": "1034",
                 "bank_name": "Doku"
                },
                {
                 "bank_code": "1503",
                 "bank_name": "OVO"
                },
                {
                 "bank_code": "6660",
                 "bank_name": "CASHLEZ_QRIS"
                },
                {
                 "bank_code": "9999",
                 "bank_name": "DIMOPAY"
                }
               ]
            ';

            $array = json_decode($json, true);
            foreach ($array as $key => $value) {
                Bank::create([
                    'code' => $value["bank_code"],
                    'name' => $value["bank_name"]
                ]);
            }
            dd("berhasil");

        } catch (\Throwable $th) {
            dd($th);
        }
    }

    public function migrateCategories()
    {
        $url = 'https://dev-mob.cashlez.com/api/outlets';

        try {
            $client = new Client();
            $response = $client->get($url, [
                'headers' => [
                    'C-API-KEY' => 'C56c5f91b-Ae3fb-S42a3-H87c0-L39d7a8f3cd36EZ',
                ],
                'verify' => false,
                'timeout' => 120,
            ]);
            $body = $response->getBody();
            $responseData = json_decode($body, true);

            $data = $responseData["data"];

            if ($data) {
                try {
                    Outlet::truncate();
                    foreach ($data as $key => $value) {
                        Outlet::create([
                            'code' => $value["code"],
                            'outlet' => $value["outlet"],
                            'status' => 'active'
                        ]);
                    }

                    if ($data) {
                        return response()->json(['message' => "Successfully added categories!", 'status' => true], 201);
                    }
                } catch (\Throwable $th) {
                    dd($th);
                    return response()->json(['message' => "Failed add categories!", 'status' => false], 200);
                }
            }
        } catch (RequestException $e) {
            // Log::error('Guzzle request exception: ' . $e->getMessage());
            dd('Guzzle request exception: ' . $e->getMessage());
        }
    }

    public function migrateCategoriesGroup()
    {
        $json = '
        [
            {
                "version": 1,
                "name": "Food & Beverage"
            },
            {
                "version": 1,
                "name": "Fashion"
            },
            {
                "version": 1,
                "name": "Beauty Care, Cosmetics"
            },
            {
                "version": 1,
                "name": "Health & Lifestyle"
            },
            {
                "version": 1,
                "name": "Health & Medical Service"
            },
            {
                "version": 1,
                "name": "Education"
            },
            {
                "version": 1,
                "name": "Book & Stationary"
            },
            {
                "version": 1,
                "name": "Property & Space"
            },
            {
                "version": 1,
                "name": "Household Goods"
            },
            {
                "version": 1,
                "name": "Personal & House Care"
            },
            {
                "version": 1,
                "name": "Automotive"
            },
            {
                "version": 1,
                "name": "Hobbies"
            },
            {
                "version": 1,
                "name": "Art & Photography"
            },
            {
                "version": 1,
                "name": "Music"
            },
            {
                "version": 1,
                "name": "ICT & Electronics"
            },
            {
                "version": 1,
                "name": "Digital Product"
            },
            {
                "version": 1,
                "name": "Agriculture & Landscaping"
            },
            {
                "version": 1,
                "name": "Minerals & Energy Resources"
            },
            {
                "version": 1,
                "name": "Shopping"
            },
            {
                "version": 1,
                "name": "Entertainment & Pleasure"
            },
            {
                "version": 1,
                "name": "Transportation"
            },
            {
                "version": 1,
                "name": "Shipping & Logistics"
            },
            {
                "version": 1,
                "name": "Tour & Travel"
            },
            {
                "version": 1,
                "name": "Printing & Advertising"
            },
            {
                "version": 1,
                "name": "Engineering & Construction"
            },
            {
                "version": 1,
                "name": "Law & Legal Affairs"
            },
            {
                "version": 1,
                "name": "Insurance"
            },
            {
                "version": 1,
                "name": "Charity"
            },
            {
                "version": 1,
                "name": "Financial & Audit"
            },
            {
                "version": 1,
                "name": "Other Products"
            },
            {
                "version": 1,
                "name": "Other Services"
            }

        ]';
        $array = json_decode($json, true);

        foreach ($array as $key => $value) {
            OutletGroup::create([
                'version' => $value["version"],
                'name' => $value["name"]
            ]);
        }

        dd("berhasil");
    }

    public function addCategories()
    {
        $json = '
        [
            {
             "id": 1,
             "code": "5814",
             "newmccgroup_fk": 1,
             "name": "Snack and Beverage Outlet, Cakes and Bakery, Food Truck",
             "mcc_type": "PRODUCT",
             "default_old_mcc": "OTHER"
            },
            {
             "id": 2,
             "code": "5812",
             "newmccgroup_fk": 1,
             "name": "Cafe, Bar, Lounge, Restaurant, Warung Nasi",
             "mcc_type": "PRODUCT",
             "default_old_mcc": "Restaurant"
            },
            {
             "id": 3,
             "code": "5811",
             "newmccgroup_fk": 1,
             "name": "Food Catering",
             "mcc_type": "PRODUCT",
             "default_old_mcc": "OTHER"
            },
            {
             "id": 5,
             "code": "5137",
             "newmccgroup_fk": 2,
             "name": "Pakaian, Boutique, Factory Outlet",
             "mcc_type": "PRODUCT",
             "default_old_mcc": "Fashion"
            },
            {
             "id": 6,
             "code": "7832",
             "newmccgroup_fk": 2,
             "name": "Tekstil, Kain, Benang dan Aksesoris",
             "mcc_type": "PRODUCT",
             "default_old_mcc": "Fashion"
            },
            {
             "id": 7,
             "code": "5139",
             "newmccgroup_fk": 2,
             "name": "Headwear, Footwear, Bags, Suitcase, Aksesoris",
             "mcc_type": "PRODUCT",
             "default_old_mcc": "Fashion"
            },
            {
             "id": 9,
             "code": "5094",
             "newmccgroup_fk": 2,
             "name": "Emas, Berlian, Perhiasan, Logam Mulia",
             "mcc_type": "PRODUCT",
             "default_old_mcc": "Jewellery"
            },
            {
             "id": 10,
             "code": "7631",
             "newmccgroup_fk": 2,
             "name": "Jam Tangan, Jam Dinding, Sparepart dan Aksesoris",
             "mcc_type": "PRODUCT",
             "default_old_mcc": "Fashion"
            },
            {
             "id": 11,
             "code": "5641",
             "newmccgroup_fk": 19,
             "name": "Perlengkapan Bayi, Balita dan Anak-Anak",
             "mcc_type": "PRODUCT",
             "default_old_mcc": "Fashion"
            },
            {
             "id": 12,
             "code": "7210",
             "newmccgroup_fk": 2,
             "name": "Laundry, Dry Clean",
             "mcc_type": "NON-PRODUCT",
             "default_old_mcc": "Fashion"
            },
            {
             "id": 13,
             "code": "5697",
             "newmccgroup_fk": 2,
             "name": "Penjahit, Tailor",
             "mcc_type": "NON-PRODUCT",
             "default_old_mcc": "Fashion"
            },
            {
             "id": 14,
             "code": "7251",
             "newmccgroup_fk": 2,
             "name": "Perawatan dan Perbaikan Tas, Sepatu, Aksesoris",
             "mcc_type": "NON-PRODUCT",
             "default_old_mcc": "Fashion"
            },
            {
             "id": 15,
             "code": "7296",
             "newmccgroup_fk": 2,
             "name": "Sewa Kostum, Gaun, Jas dan Aksesoris",
             "mcc_type": "NON-PRODUCT",
             "default_old_mcc": "Fashion"
            },
            {
             "id": 16,
             "code": "5977",
             "newmccgroup_fk": 3,
             "name": "Kosmetik, Parfum, Alat dan Perlengkapan Salon",
             "mcc_type": "PRODUCT",
             "default_old_mcc": "Fashion"
            },
            {
             "id": 17,
             "code": "5993",
             "newmccgroup_fk": 3,
             "name": "Vape dan Aksesoris",
             "mcc_type": "PRODUCT",
             "default_old_mcc": "Fashion"
            },
            {
             "id": 18,
             "code": "7230",
             "newmccgroup_fk": 3,
             "name": "Salon Kecantikan, Barber, Beauty Shop",
             "mcc_type": "NON-PRODUCT",
             "default_old_mcc": "Fashion"
            },
            {
             "id": 19,
             "code": "5941",
             "newmccgroup_fk": 4,
             "name": "Peralatan Olahraga dan Kebugaran",
             "mcc_type": "PRODUCT",
             "default_old_mcc": "Health"
            },
            {
             "id": 20,
             "code": "7941",
             "newmccgroup_fk": 4,
             "name": "Fitness Center, Aerobik, Pusat Kebugaran",
             "mcc_type": "NON-PRODUCT",
             "default_old_mcc": "Health"
            },
            {
             "id": 21,
             "code": "7933",
             "newmccgroup_fk": 4,
             "name": "Lapangan Futsal, Basket, Bowling, Olahraga Khusus",
             "mcc_type": "NON-PRODUCT",
             "default_old_mcc": "Health"
            },
            {
             "id": 22,
             "code": "7298",
             "newmccgroup_fk": 4,
             "name": "Spa, Massage, Refleksi, Pijat Tradisional",
             "mcc_type": "NON-PRODUCT",
             "default_old_mcc": "Health"
            },
            {
             "id": 23,
             "code": "5912",
             "newmccgroup_fk": 5,
             "name": "Apotek, Toko Farmasi",
             "mcc_type": "PRODUCT",
             "default_old_mcc": "Health"
            },
            {
             "id": 24,
             "code": "8043",
             "newmccgroup_fk": 5,
             "name": "Optik, Lensa dan Aksesoris",
             "mcc_type": "PRODUCT",
             "default_old_mcc": "Health"
            },
            {
             "id": 25,
             "code": "5047",
             "newmccgroup_fk": 5,
             "name": "Peralatan Kedokteran dan Farmasi",
             "mcc_type": "PRODUCT",
             "default_old_mcc": "Health"
            },
            {
             "id": 26,
             "code": "8062",
             "newmccgroup_fk": 5,
             "name": "Rumah Sakit",
             "mcc_type": "NON-PRODUCT",
             "default_old_mcc": "Health"
            },
            {
             "id": 27,
             "code": "8099",
             "newmccgroup_fk": 5,
             "name": "Poliklinik, Klinik Medis Spesialis, Klinik Non-Medis",
             "mcc_type": "NON-PRODUCT",
             "default_old_mcc": "Health"
            },
            {
             "id": 28,
             "code": "8011",
             "newmccgroup_fk": 5,
             "name": "Praktik Dokter Mandiri, Bidan Mandiri, Non-Medis Mandiri",
             "mcc_type": "NON-PRODUCT",
             "default_old_mcc": "Health"
            },
            {
             "id": 29,
             "code": "7277",
             "newmccgroup_fk": 5,
             "name": "Praktek Psikiater, Konsultasi Pernikahan",
             "mcc_type": "NON-PRODUCT",
             "default_old_mcc": "Health"
            },
            {
             "id": 30,
             "code": "8071",
             "newmccgroup_fk": 5,
             "name": "Laboratorium Medis",
             "mcc_type": "NON-PRODUCT",
             "default_old_mcc": "Health"
            },
            {
             "id": 31,
             "code": "8211",
             "newmccgroup_fk": 6,
             "name": "Sekolah Umum, SD, SMP, SMU \/ SMK",
             "mcc_type": "NON-PRODUCT",
             "default_old_mcc": "Education"
            },
            {
             "id": 32,
             "code": "8220",
             "newmccgroup_fk": 6,
             "name": "Perguruan Tinggi, Universitas, Sekolah Tinggi",
             "mcc_type": "NON-PRODUCT",
             "default_old_mcc": "Education"
            },
            {
             "id": 33,
             "code": "8299",
             "newmccgroup_fk": 6,
             "name": "Training Center, Bimbingan Belajar, Kursus Keterampilan Lain",
             "mcc_type": "NON-PRODUCT",
             "default_old_mcc": "Education"
            },
            {
             "id": 36,
             "code": "5942",
             "newmccgroup_fk": 7,
             "name": "Buku, Perlengkapan Sekolah \/ Kantor, Handcrafting Tools",
             "mcc_type": "PRODUCT",
             "default_old_mcc": "Education"
            },
            {
             "id": 37,
             "code": "5192",
             "newmccgroup_fk": 7,
             "name": "Agensi Koran, Majalah",
             "mcc_type": "PRODUCT",
             "default_old_mcc": "Agency"
            },
            {
             "id": 38,
             "code": "6513",
             "newmccgroup_fk": 8,
             "name": "Real Estate, Rumah, Apartemen, Ruko",
             "mcc_type": "PRODUCT",
             "default_old_mcc": "Agency"
            },
            {
             "id": 39,
             "code": "7922",
             "newmccgroup_fk": 8,
             "name": "Sewa Rumah, Apartemen, Kost, Homestay",
             "mcc_type": "NON-PRODUCT",
             "default_old_mcc": "Agency"
            },
            {
             "id": 40,
             "code": "5021",
             "newmccgroup_fk": 8,
             "name": "Sewa Ruko, Kantor, Co-Working Space",
             "mcc_type": "NON-PRODUCT",
             "default_old_mcc": "OTHER"
            },
            {
             "id": 41,
             "code": "7641",
             "newmccgroup_fk": 9,
             "name": "Furniture, Cabinet, Gordyn, Dekorasi Interior",
             "mcc_type": "PRODUCT",
             "default_old_mcc": "Furniture"
            },
            {
             "id": 42,
             "code": "5722",
             "newmccgroup_fk": 9,
             "name": "Peralatan Rumah Tangga, Alat Masak, Alat Kebersihan",
             "mcc_type": "PRODUCT",
             "default_old_mcc": "OTHER"
            },
            {
             "id": 43,
             "code": "8351",
             "newmccgroup_fk": 10,
             "name": "Baby Sitter, Perawat, Day Care",
             "mcc_type": "NON-PRODUCT",
             "default_old_mcc": "Personal Services"
            },
            {
             "id": 44,
             "code": "7349",
             "newmccgroup_fk": 10,
             "name": "Cleaning Service, Pembasmi Hama, Sedot WC",
             "mcc_type": "NON-PRODUCT",
             "default_old_mcc": "Personal Services"
            },
            {
             "id": 46,
             "code": "5571",
             "newmccgroup_fk": 11,
             "name": "Showroom, Dealer Motor",
             "mcc_type": "NON-PRODUCT",
             "default_old_mcc": "Otomotif"
            },
            {
             "id": 47,
             "code": "5271",
             "newmccgroup_fk": 11,
             "name": "Showroom, Dealer Mobil",
             "mcc_type": "NON-PRODUCT",
             "default_old_mcc": "Otomotif"
            },
            {
             "id": 48,
             "code": "7542",
             "newmccgroup_fk": 11,
             "name": "Car Wash, Auto Saloon",
             "mcc_type": "NON-PRODUCT",
             "default_old_mcc": "Otomotif"
            },
            {
             "id": 49,
             "code": "7538",
             "newmccgroup_fk": 11,
             "name": "Modifikasi dan Perbaikan Kendaraan, Sparepart dan Aksesoris",
             "mcc_type": "NON-PRODUCT",
             "default_old_mcc": "Otomotif"
            },
            {
             "id": 51,
             "code": "5945",
             "newmccgroup_fk": 12,
             "name": "Mainan, R\/C dan Barang Koleksi",
             "mcc_type": "PRODUCT",
             "default_old_mcc": "Hobby Store"
            },
            {
             "id": 52,
             "code": "5995",
             "newmccgroup_fk": 12,
             "name": "Hewan Peliharaan, Aksesoris",
             "mcc_type": "PRODUCT",
             "default_old_mcc": "Hobby Store"
            },
            {
             "id": 53,
             "code": "7032",
             "newmccgroup_fk": 12,
             "name": "Perlengkapan Petualangan, Camping, Scuba Diving, Extreme Sport",
             "mcc_type": "PRODUCT",
             "default_old_mcc": "Hobby Store"
            },
            {
             "id": 54,
             "code": "5946",
             "newmccgroup_fk": 13,
             "name": "Kamera, Sparepart dan Aksesoris",
             "mcc_type": "PRODUCT",
             "default_old_mcc": "Elektronik"
            },
            {
             "id": 55,
             "code": "5947",
             "newmccgroup_fk": 13,
             "name": "Lukisan, Patung, Souvenir, Floristry, Parcel",
             "mcc_type": "PRODUCT",
             "default_old_mcc": "OTHER"
            },
            {
             "id": 56,
             "code": "7221",
             "newmccgroup_fk": 13,
             "name": "Cuci Cetak Foto, Studio Foto, Photography Service",
             "mcc_type": "NON-PRODUCT",
             "default_old_mcc": "OTHER"
            },
            {
             "id": 57,
             "code": "5733",
             "newmccgroup_fk": 14,
             "name": "Alat Musik, Sparepart dan Aksesoris",
             "mcc_type": "PRODUCT",
             "default_old_mcc": "OTHER"
            },
            {
             "id": 58,
             "code": "5983",
             "newmccgroup_fk": 14,
             "name": "Studio Musik",
             "mcc_type": "NON-PRODUCT",
             "default_old_mcc": "OTHER"
            },
            {
             "id": 59,
             "code": "5045",
             "newmccgroup_fk": 15,
             "name": "Computer Hardware, Networking, Spareparts dan Aksesoris",
             "mcc_type": "PRODUCT",
             "default_old_mcc": "Elektronik"
            },
            {
             "id": 60,
             "code": "5732",
             "newmccgroup_fk": 15,
             "name": "Smartphone, Gadget, Sparepart dan Aksesoris",
             "mcc_type": "PRODUCT",
             "default_old_mcc": "Handphone"
            },
            {
             "id": 61,
             "code": "5999",
             "newmccgroup_fk": 15,
             "name": "Home Theatre, Elektronik Rumah Tangga, Sparepart dan Aksesoris",
             "mcc_type": "PRODUCT",
             "default_old_mcc": "Elektronik"
            },
            {
             "id": 62,
             "code": "5065",
             "newmccgroup_fk": 15,
             "name": "Peralatan Listrik, Genset, Sparepart",
             "mcc_type": "PRODUCT",
             "default_old_mcc": "OTHER"
            },
            {
             "id": 63,
             "code": "7622",
             "newmccgroup_fk": 15,
             "name": "Pusat Perbaikan Resmi, Kios Perbaikan",
             "mcc_type": "NON-PRODUCT",
             "default_old_mcc": "OTHER"
            },
            {
             "id": 64,
             "code": "4900",
             "newmccgroup_fk": 16,
             "name": "Digital Biller (Pembayaran Listrik, Air, Telepon, dsb.)",
             "mcc_type": "NON-PRODUCT",
             "default_old_mcc": "OTHER"
            },
            {
             "id": 65,
             "code": "5734",
             "newmccgroup_fk": 16,
             "name": "Software Distribution, Antivirus Kit, Office Suite",
             "mcc_type": "PRODUCT",
             "default_old_mcc": "OTHER"
            },
            {
             "id": 66,
             "code": "7994",
             "newmccgroup_fk": 16,
             "name": "Mobile App, Game Credit, Music Download",
             "mcc_type": "PRODUCT",
             "default_old_mcc": "OTHER"
            },
            {
             "id": 67,
             "code": "5261",
             "newmccgroup_fk": 17,
             "name": "Bibit Holtikultura, Alat Pertanian, Sparepart",
             "mcc_type": "PRODUCT",
             "default_old_mcc": "OTHER"
            },
            {
             "id": 68,
             "code": "4121",
             "newmccgroup_fk": 17,
             "name": "Tanaman Hias, Batu Alam dan Aksesoris, Pembuatan Taman",
             "mcc_type": "PRODUCT",
             "default_old_mcc": "OTHER"
            },
            {
             "id": 69,
             "code": "5541",
             "newmccgroup_fk": 18,
             "name": "Stasiun Pengisian Bahan Bakar",
             "mcc_type": "PRODUCT",
             "default_old_mcc": "OTHER"
            },
            {
             "id": 70,
             "code": "5411",
             "newmccgroup_fk": 18,
             "name": "Suplai Minyak dan Gas Bumi",
             "mcc_type": "PRODUCT",
             "default_old_mcc": "OTHER"
            },
            {
             "id": 71,
             "code": "5172",
             "newmccgroup_fk": 18,
             "name": "Suplai Hasil Tambang",
             "mcc_type": "PRODUCT",
             "default_old_mcc": "OTHER"
            },
            {
             "id": 72,
             "code": "5085",
             "newmccgroup_fk": 18,
             "name": "Peralatan Tambang dan Eksplorasi",
             "mcc_type": "PRODUCT",
             "default_old_mcc": "OTHER"
            },
            {
             "id": 73,
             "code": "5311",
             "newmccgroup_fk": 19,
             "name": "Department Store, Toserba, Supermarket",
             "mcc_type": "NON-PRODUCT",
             "default_old_mcc": "Retail"
            },
            {
             "id": 74,
             "code": "5499",
             "newmccgroup_fk": 19,
             "name": "Convenience Store, Minimarket, Toko Kelontong",
             "mcc_type": "NON-PRODUCT",
             "default_old_mcc": "Retail"
            },
            {
             "id": 76,
             "code": "5193",
             "newmccgroup_fk": 17,
             "name": "Suplai Sembako, Sayur, Buah, Hasil Peternakan",
             "mcc_type": "PRODUCT",
             "default_old_mcc": "Retail"
            },
            {
             "id": 77,
             "code": "7996",
             "newmccgroup_fk": 20,
             "name": "Bioskop, Fun Park, Paintball, Game Center, Karaoke",
             "mcc_type": "NON-PRODUCT",
             "default_old_mcc": "OTHER"
            },
            {
             "id": 78,
             "code": "7929",
             "newmccgroup_fk": 20,
             "name": "Konser Musik, Theatre Show, Sirkus, Ticketing",
             "mcc_type": "NON-PRODUCT",
             "default_old_mcc": "OTHER"
            },
            {
             "id": 80,
             "code": "5813",
             "newmccgroup_fk": 20,
             "name": "Night Club, Beach Club",
             "mcc_type": "NON-PRODUCT",
             "default_old_mcc": "OTHER"
            },
            {
             "id": 81,
             "code": "7991",
             "newmccgroup_fk": 20,
             "name": "Wisata Alam, Kebun Binatang, Safari",
             "mcc_type": "NON-PRODUCT",
             "default_old_mcc": "OTHER"
            },
            {
             "id": 82,
             "code": "5996",
             "newmccgroup_fk": 20,
             "name": "Dive Center, Swimming Pool, Marine Sport Center",
             "mcc_type": "NON-PRODUCT",
             "default_old_mcc": "OTHER"
            },
            {
             "id": 83,
             "code": "7841",
             "newmccgroup_fk": 20,
             "name": "Warnet, Online Game Center",
             "mcc_type": "NON-PRODUCT",
             "default_old_mcc": "OTHER"
            },
            {
             "id": 84,
             "code": "4899",
             "newmccgroup_fk": 20,
             "name": "Penyedia Internet, Cable TV",
             "mcc_type": "NON-PRODUCT",
             "default_old_mcc": "OTHER"
            },
            {
             "id": 85,
             "code": "4511",
             "newmccgroup_fk": 21,
             "name": "Penerbangan Komersil Berjadwal",
             "mcc_type": "NON-PRODUCT",
             "default_old_mcc": "Travel & Tourism"
            },
            {
             "id": 86,
             "code": "4131",
             "newmccgroup_fk": 21,
             "name": "Bus Berjadwal Antar Kota Propinsi",
             "mcc_type": "NON-PRODUCT",
             "default_old_mcc": "Travel & Tourism"
            },
            {
             "id": 87,
             "code": "4457",
             "newmccgroup_fk": 21,
             "name": "Penerbangan Carter, Sewa Kapal, Kereta Wisata",
             "mcc_type": "NON-PRODUCT",
             "default_old_mcc": "Travel & Tourism"
            },
            {
             "id": 88,
             "code": "7519",
             "newmccgroup_fk": 21,
             "name": "Sewa Motor, Mobil, Bus Wisata",
             "mcc_type": "NON-PRODUCT",
             "default_old_mcc": "Travel & Tourism"
            },
            {
             "id": 89,
             "code": "4582",
             "newmccgroup_fk": 21,
             "name": "Duty Free Store, Jasa Airport Lainnya",
             "mcc_type": "NON-PRODUCT",
             "default_old_mcc": "Travel & Tourism"
            },
            {
             "id": 90,
             "code": "4215",
             "newmccgroup_fk": 22,
             "name": "Pengiriman Paket, Freight Forwarder, Freight Carrier",
             "mcc_type": "NON-PRODUCT",
             "default_old_mcc": "OTHER"
            },
            {
             "id": 91,
             "code": "9402",
             "newmccgroup_fk": 22,
             "name": "Pos, Pegadaian",
             "mcc_type": "NON-PRODUCT",
             "default_old_mcc": "OTHER"
            },
            {
             "id": 92,
             "code": "4214",
             "newmccgroup_fk": 22,
             "name": "Sewa Truk, Mobil Box, Mobil Pickup, Pindahan Barang",
             "mcc_type": "NON-PRODUCT",
             "default_old_mcc": "OTHER"
            },
            {
             "id": 94,
             "code": "7011",
             "newmccgroup_fk": 8,
             "name": "Hotel Bintang, Resort, Villa",
             "mcc_type": "NON-PRODUCT",
             "default_old_mcc": "Hotel"
            },
            {
             "id": 95,
             "code": "7012",
             "newmccgroup_fk": 23,
             "name": "Hotel Melati, Guesthouse, Wisma, Homestay",
             "mcc_type": "NON-PRODUCT",
             "default_old_mcc": "Hotel"
            },
            {
             "id": 96,
             "code": "7999",
             "newmccgroup_fk": 8,
             "name": "Sewa aula, ballroom, gedung",
             "mcc_type": "NON-PRODUCT",
             "default_old_mcc": "OTHER"
            },
            {
             "id": 97,
             "code": "4722",
             "newmccgroup_fk": 23,
             "name": "Perjalanan Rohani, Haji, Umroh",
             "mcc_type": "NON-PRODUCT",
             "default_old_mcc": "Travel & Tourism"
            },
            {
             "id": 98,
             "code": "4111",
             "newmccgroup_fk": 23,
             "name": "Perjalanan Umum, Wisata, Pesiar",
             "mcc_type": "NON-PRODUCT",
             "default_old_mcc": "Travel & Tourism"
            },
            {
             "id": 99,
             "code": "5072",
             "newmccgroup_fk": 24,
             "name": "Peralatan Digital Printing",
             "mcc_type": "PRODUCT",
             "default_old_mcc": "OTHER"
            },
            {
             "id": 100,
             "code": "7322",
             "newmccgroup_fk": 24,
             "name": "Digital Printing, Cutting Sticker, Acrylic, Papan Reklame",
             "mcc_type": "PRODUCT",
             "default_old_mcc": "OTHER"
            },
            {
             "id": 101,
             "code": "7311",
             "newmccgroup_fk": 24,
             "name": "Agensi Periklanan, City Ads",
             "mcc_type": "NON-PRODUCT",
             "default_old_mcc": "Agency"
            },
            {
             "id": 102,
             "code": "5039",
             "newmccgroup_fk": 25,
             "name": "Bahan Bangunan, Suplai Kayu, Baja, Kaca, Semen",
             "mcc_type": "PRODUCT",
             "default_old_mcc": "Construction"
            },
            {
             "id": 105,
             "code": "7394",
             "newmccgroup_fk": 25,
             "name": "Peralatan Teknik, Kelistrikan, Pemetaan, Konstruksi, Sparepart",
             "mcc_type": "PRODUCT",
             "default_old_mcc": "Construction"
            },
            {
             "id": 106,
             "code": "5533",
             "newmccgroup_fk": 25,
             "name": "Traktor, Craine, Alat Berat, Sparepart",
             "mcc_type": "PRODUCT",
             "default_old_mcc": "Construction"
            },
            {
             "id": 107,
             "code": "8911",
             "newmccgroup_fk": 25,
             "name": "Arsitektur Bangunan, Desain Interior, Building Contractor",
             "mcc_type": "NON-PRODUCT",
             "default_old_mcc": "Construction"
            },
            {
             "id": 108,
             "code": "7513",
             "newmccgroup_fk": 25,
             "name": "Sewa Traktor, Craine, Alat Berat",
             "mcc_type": "NON-PRODUCT",
             "default_old_mcc": "Construction"
            },
            {
             "id": 109,
             "code": "7699",
             "newmccgroup_fk": 25,
             "name": "Sewa Peralatan Teknik, Kelistrikan, Pemetaan, dan Konstruksi Ringan",
             "mcc_type": "NON-PRODUCT",
             "default_old_mcc": "Construction"
            },
            {
             "id": 110,
             "code": "8111",
             "newmccgroup_fk": 26,
             "name": "Konsultasi Hukum, Pengacara, Notaris",
             "mcc_type": "NON-PRODUCT",
             "default_old_mcc": "Professional Services"
            },
            {
             "id": 111,
             "code": "8931",
             "newmccgroup_fk": 29,
             "name": "Konsultasi Keuangan, Pajak, Audit",
             "mcc_type": "NON-PRODUCT",
             "default_old_mcc": "Professional Services"
            },
            {
             "id": 112,
             "code": "6300",
             "newmccgroup_fk": 27,
             "name": "Asuransi Khusus Jiwa dan Kesehatan, Pembayaran Premi",
             "mcc_type": "NON-PRODUCT",
             "default_old_mcc": "Asuransi"
            },
            {
             "id": 113,
             "code": "6399",
             "newmccgroup_fk": 27,
             "name": "Asuransi Umum, Kendaraan, Properti, Kargo, Pembayaran Premi",
             "mcc_type": "NON-PRODUCT",
             "default_old_mcc": "Asuransi"
            },
            {
             "id": 114,
             "code": "8322",
             "newmccgroup_fk": 28,
             "name": "Panti Asuhan, Panti Jompo",
             "mcc_type": "NON-PRODUCT",
             "default_old_mcc": "OTHER"
            },
            {
             "id": 115,
             "code": "8641",
             "newmccgroup_fk": 28,
             "name": "Yayasan Sosial, Agensi Pemerhati Lingkungan, Bantuan Bencana",
             "mcc_type": "NON-PRODUCT",
             "default_old_mcc": "OTHER"
            },
            {
             "id": 116,
             "code": "8661",
             "newmccgroup_fk": 28,
             "name": "Rumah Peribadatan, Gereja, Masjid",
             "mcc_type": "NON-PRODUCT",
             "default_old_mcc": "OTHER"
            },
            {
             "id": 117,
             "code": "5712",
             "newmccgroup_fk": 29,
             "name": "Koperasi Sembako, Barang Rumah Tangga, Pertanian ",
             "mcc_type": "PRODUCT",
             "default_old_mcc": "Financial"
            },
            {
             "id": 118,
             "code": "6012",
             "newmccgroup_fk": 29,
             "name": "Koperasi Jasa, Simpan Pinjam",
             "mcc_type": "NON-PRODUCT",
             "default_old_mcc": "Financial"
            },
            {
             "id": 119,
             "code": "5968",
             "newmccgroup_fk": 30,
             "name": "Multi-Level Marketing",
             "mcc_type": "NON-PRODUCT",
             "default_old_mcc": "OTHER"
            },
            {
             "id": 120,
             "code": "5537",
             "newmccgroup_fk": 30,
             "name": "Lainnya",
             "mcc_type": "NON-PRODUCT",
             "default_old_mcc": "OTHER"
            },
            {
             "id": 121,
             "code": "7299",
             "newmccgroup_fk": 31,
             "name": "Event Organizer, Wedding Organizer, Bridal Service",
             "mcc_type": "NON-PRODUCT",
             "default_old_mcc": "OTHER"
            },
            {
             "id": 122,
             "code": "7393",
             "newmccgroup_fk": 31,
             "name": "Pengamanan, Sewa Peralatan dan Personil Keamanan",
             "mcc_type": "NON-PRODUCT",
             "default_old_mcc": "OTHER"
            },
            {
             "id": 123,
             "code": "8699",
             "newmccgroup_fk": 31,
             "name": "Keanggotaan Organisasi, Asosiasi, Perkumpulan",
             "mcc_type": "NON-PRODUCT",
             "default_old_mcc": "OTHER"
            },
            {
             "id": 124,
             "code": "5555",
             "newmccgroup_fk": 31,
             "name": "Lainnya",
             "mcc_type": "NON-PRODUCT",
             "default_old_mcc": "OTHER"
            },
            {
             "id": 126,
             "code": "7993",
             "newmccgroup_fk": 12,
             "name": "Game Console, Games, Sparepart dan Aksesoris",
             "mcc_type": "PRODUCT",
             "default_old_mcc": "OTHER"
            },
            {
             "id": 127,
             "code": "5495",
             "newmccgroup_fk": 4,
             "name": "Vitamin, Suplemen, Herbal, Ramuan Kebugaran",
             "mcc_type": "PRODUCT",
             "default_old_mcc": "OTHER"
            },
            {
             "id": 128,
             "code": "5422",
             "newmccgroup_fk": 1,
             "name": "Makanan Beku Setengah Jadi",
             "mcc_type": "PRODUCT",
             "default_old_mcc": "OTHER"
            },
            {
             "id": 129,
             "code": "6010",
             "newmccgroup_fk": 29,
             "name": "Pembiayaan Non-Koperasi Kendaraan, Properti, Modal",
             "mcc_type": "NON-PRODUCT",
             "default_old_mcc": "Financial"
            },
            {
             "id": 130,
             "code": "5949",
             "newmccgroup_fk": 21,
             "name": "Taxi, Ojek, Kendaraan Berbasis Argometer",
             "mcc_type": "NON-PRODUCT",
             "default_old_mcc": "OTHER"
            },
            {
             "id": 131,
             "code": "5970",
             "newmccgroup_fk": 4,
             "name": "Aroma Theraphy",
             "mcc_type": "PRODUCT",
             "default_old_mcc": "OTHER"
            },
            {
             "id": 132,
             "code": "7333",
             "newmccgroup_fk": 13,
             "name": "Art & Photography - Event Decoration",
             "mcc_type": "NON-PRODUCT",
             "default_old_mcc": "OTHER"
            },
            {
             "id": 133,
             "code": "7372",
             "newmccgroup_fk": 16,
             "name": "Software Engineering, System Integration, Data Processing",
             "mcc_type": "NON-PRODUCT",
             "default_old_mcc": "OTHER"
            },
            {
             "id": 134,
             "code": "8999",
             "newmccgroup_fk": 31,
             "name": "Multi-Purpose Online Service",
             "mcc_type": "NON-PRODUCT",
             "default_old_mcc": "OTHER"
            },
            {
             "id": 135,
             "code": "4225",
             "newmccgroup_fk": 8,
             "name": "Sewa Garasi, Lahan Parkir Kendaraan",
             "mcc_type": "NON-PRODUCT"
            },
            {
             "id": 136,
             "code": "6514",
             "newmccgroup_fk": 8,
             "name": "Sewa Gudang, Warehouse",
             "mcc_type": "NON-PRODUCT"
            },
            {
             "id": 1014,
             "code": "5462",
             "newmccgroup_fk": 1,
             "name": "Snack and Beverage Vending Machine",
             "mcc_type": "PRODUCT"
            },
            {
             "id": 1015,
             "code": "5735",
             "newmccgroup_fk": 1,
             "name": "Stasiun Pengisian Ulang Air Minum",
             "mcc_type": "PRODUCT"
            },
            {
             "id": 2803,
             "code": "8398",
             "newmccgroup_fk": 28,
             "name": "Distribusi Sumbangan, Zakat, Infaq, Sedekah, Qurban",
             "mcc_type": "NON-PRODUCT"
            },
            {
             "id": 3014,
             "code": "7361",
             "newmccgroup_fk": 31,
             "name": "Job Recruitment, Konsultan SDM",
             "mcc_type": "NON-PRODUCT"
            },
            {
             "id": 3016,
             "code": "8742",
             "newmccgroup_fk": 31,
             "name": "Konsultan Manajement Bisnis",
             "mcc_type": "NON-PRODUCT"
            },
            {
             "id": 3017,
             "code": "7273",
             "newmccgroup_fk": 31,
             "name": "Konsultan Jodoh dan Pernikahan",
             "mcc_type": "NON-PRODUCT"
            },
            {
             "id": 3018,
             "code": "7399",
             "newmccgroup_fk": 31,
             "name": "Konsultan MICE \/ Meetings, Incentives, Conferencing, Exhibitions",
             "mcc_type": "NON-PRODUCT"
            }
           ]
        ';
        $array = json_decode($json, true);

        try {
            foreach ($array as $key => $value) {
                Outlet::create([
                    'bo_id' => $value["id"],
                    'code' => $value["code"],
                    'newmccgroup_fk' => $value["newmccgroup_fk"],
                    'outlet' => $value["name"],
                    'mcc_type' => $value["mcc_type"],
                    // 'default_old_mcc' => $value["default_old_mcc"],
                ]);
            }
            dd("berhasil");
        } catch (\Throwable $th) {
            dd($th);
        }
    }

    public function download($id)
    {
        $data = MerchantSignature::where('id', $id)->first();
        $image = substr($data->image, 23);
        // dd($data->image);
        // return response()->download(base_path().$image);
        // return response()->streamDownload(function () {
        //     echo file_get_contents();
        // }, 'image-url-for-testing.jpg');
        return response()->download($data->image, 'image.png');

    }

    public function showAddress(Request $request)
    {
        // $data = AddressList::
        //     where('country', 'indonesia')
        //     ->get();
        $keyword = '';
        $data = AddressList::where('country', 'indonesia')->paginate(50);
        return view('admin.addressList.index', compact('data', 'keyword'));
    }
    public function getAddress($id)
    {
        // $data = AddressList::paginate(10);
        $data = AddressList::where('id', $id)->first();
        // dd($data);
        return view('admin.addressList.edit', compact('data'));
    }

    public function updateAddress(Request $request)
    {
        $data = AddressList::where('id', $request->id)->first();

        DB::beginTransaction();
        try {
            $update = DB::table('addresses_list')->where('id', $request->id)
                ->update([
                    'province' => $request->province,
                    'country' => $request->country,
                    'district' => $request->district,
                    'village' => $request->village,
                    'post_code' => $request->post_code,
                    'country_code' => $request->country_code,
                ]);

            if ($update) {
                // Utils::addLog($request->token, "Address List", "Update Address", $request->alasan);
                DB::commit();
                return response()->json(['message' => "Successfully update address!", 'status' => true], 201);
            }
            DB::rollBack();
            return response()->json(['message' => "Failed add address!", 'status' => false], 200);
        } catch (\Throwable $th) {
            DB::rollBack();
            Log::error($th);
            return response()->json(['message' => "Failed add address!", 'status' => false], 200);
        }


    }

    public function deleteAddress($id)
    {
        $address = AddressList::where('id', $id)->first();
        if ($address) {
            $address->delete();
            return redirect('addresslist')->with('msg', 'Address deleted successfully');
            // return response()->json(['message' => "Success Delete User!", 'status' => true], 200);
        }
    }
    public function storeAddress(Request $request)
    {
        $data = AddressList::
            where('village', $request->village)
            ->first();

        if ($data) {
            // return response()->json(['message' => "Address is already!", 'status' => false], 200);
            Alert::error('Error', 'Address is already!');
            return redirect("/addresslist");
        }

        DB::beginTransaction();
        try {
            $address = DB::table('addresses_list')->insert([
                'province' => $request->province,
                'country' => $request->country,
                'country_code' => $request->country_code,
                'city' => $request->city,
                'district' => $request->district,
                'village' => $request->village,
                'post_code' => $request->post_code,
            ]);
            Utils::addLog(Auth::user()->token, Auth::user()->username, "Create Address", "Create a address with village = " . $request->village . " and district = " . $request->district);

            if ($address) {
                DB::commit();
                // return response()->json(['message' => "Successfully added address!", 'status' => true], 201);
                Alert::success('Success', 'Successfully added address!');
                return redirect("/addresslist")->with('msg', 'Successfully added address');
            }
        } catch (\Throwable $th) {
            DB::rollBack();
            Log::info($th);
            Alert::error('error', 'Failed add address!');
            // return response()->json(['message' => "Failed add address!", 'status' => false], 200);
            return redirect("/addresslist");
        }

    }

    public function searchAddress(Request $request)
    {
        $keyword = $request->keyword;
        if ($keyword != "") {
            $data = AddressList::
                // where('province', 'LIKE', '%' . $request->keyword . '%')
                // ->orWhere('country', 'LIKE', '%' . $request->keyword . '%')
                // ->orWhere('district', 'LIKE', '%' . $request->keyword . '%')
                where('district', 'LIKE', '%' . $request->keyword . '%')
                ->paginate(20)->setPath('');
            $pagination = $data->appends(
                array(
                    'keyword' => $keyword
                )
            );
            if (count($data) > 0) {
                return view('admin.addressList.index', compact('data', 'keyword'))->withQuery($keyword);
            } else {
                $data = AddressList::where('country', null)->paginate(10);
                return view('admin.addressList.index', compact('data', 'keyword'))->withQuery($keyword);
                // return redirect("addresslist");
            }
        } else {
            return redirect("addresslist");
        }


        // return view('admin.addressList.index', compact('data', 'keyword'));
    }

}
