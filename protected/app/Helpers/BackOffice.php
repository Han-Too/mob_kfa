<?php

namespace App\Helpers;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class BackOffice
{

    public static function checkUsername($username)
    {
        $client = new Client([
            'verify' => false,
            'headers' => [
                'api-key' => 'f36535662d2d48a3eaf986583f6ada6f431a76a4',
            ],
        ]);

        try {
            // $response = $client->request('GET', 'https://secure.cashlez.com/api-v2/v2/check_user/verified/' . $username);
            $response = $client->request('GET', 'https://staging.cashlez.com:9443/api-v2/v2/check_user/verified/'.$username);
            $statusCode = $response->getStatusCode();
            return $statusCode;
        } catch (RequestException $e) {
            if ($e->hasResponse()) {
                Log::info($e);
                $statusCode = $e->getResponse()->getStatusCode();
                return $statusCode;
            } else {
                return 500;
            }
        }
    }

    public static function registerToBackOffice($password, $pin, $merchant)
    {
        // $url = 'https://secure.cashlez.com/api-v2/v2/new-onboarding-full-regis';
        $url = 'https://staging.cashlez.com:9443/api-v2/v2/new-onboarding-full-regis';

        // if (env('APP_ENV') === 'production') {
        //     $url = 'https://secure.cashlez.com/api-v2/v2/new-onboarding-full-regis';
        // }else{
        //     $url = 'https://staging.cashlez.com:9443/api-v2/v2/new-onboarding-full-regis';
        // }
        if ($merchant->pengajuan_sebagai == 'Badan Usaha') {
            $npwp = $merchant->npwp;
            $businessRegistrationNumber = $merchant->npwp_merchant_badan_usaha;
            $businessType = "PERSEROAN TERBATAS";
        } else {
            $npwp = $merchant->npwp;
            $businessRegistrationNumber = $merchant->npwp;
            $businessType = "PERSEORANGAN";
        }

	    $auth = Auth::user();
        $mccId = Utils::getBoIdOutlets($merchant->mcc);
        $bankCode = Utils::getBankCode($merchant->nama_bank);

        $address = $merchant->alamat_sesuai_ktp;
        $businessAddress = $merchant->alamat_bisnis;

        // Busines
        $explodeBusiness = explode(', ', $businessAddress);

        $countBusAdd = count($explodeBusiness);
        $postBusId = $countBusAdd - 2;
        $cityBusId = $countBusAdd - 3;
        $stateBusId = $countBusAdd - 4;
        $districtBusId = $countBusAdd - 5;
        $rtRwBusId = $countBusAdd - 6;

        $bussinessAddress = $explodeBusiness[0] . ', ' . $explodeBusiness[$rtRwBusId];
        $bussinessDistrict = $explodeBusiness[$districtBusId];
        $businessCity = $explodeBusiness[$stateBusId];
        $businessState = $explodeBusiness[$cityBusId];
        $businessPostal = $explodeBusiness[$postBusId];

        // User
        $explodeAddress = explode(', ', $address);
        $countAdd = count($explodeAddress);
        $postId = $countAdd - 2;
        $cityId = $countAdd - 3;
        $stateId = $countAdd - 4;
        $districtId = $countAdd - 5;
        $rtRwId = $countAdd - 6;

        $userAddress = $explodeAddress[0] . ', ' . $explodeAddress[$rtRwId];
        $userDistrict = $explodeAddress[$districtId];
        $userCity = $explodeAddress[$stateId];
        $userState = $explodeAddress[$cityId];
        $userPostal = $explodeAddress[$postId];

        $postalCodePattern = '/\b\d{5}\b/';

        // Nomor Identitas
        $nIExplode = explode(', ', $merchant->nomor_identitas);
        $nomorIdentitas = $nIExplode[1];

        // Gender
        if ($merchant->jenis_kelamin_pemilik == 'Laki-laki') {
            $gender = "MALE";
        } else {
            $gender = "FEMALE";
        }

        $data = [
            "productUrl" => null,
            "mobileAppLogo" => null,
            "locationUrl" => null,
            "cashTransactionEnabled" => "Yes",
            "receiptFooterMessage" => null,
            "contingencyRouting" => "ON_US_ENFORCED",
            "remark" => null,
            "remarkHold" => null,
            "businessAddress1" => $bussinessAddress,
            "businessAddress2" => null,
            "businessContact" => $merchant->bisnis_no_hp,
            "businessType1" => $businessType,
            "businessLocation" => $merchant->tempat_bisnis,
            "businessLocationStatus" => $merchant->status_tempat_usaha,
            "businessStarted" => $merchant->tahun_berdiri,
            "categoryMasterMccFk" => null,
            "newmccId" => $mccId,
            "latitude" => $merchant->m_lat,
            "longitude" => $merchant->m_lng,
            "merchantCity" => $businessCity,
            "merchantState" => $businessState,
            "merchantDistrict" => $bussinessDistrict,
            "merchantPostCode" => $businessPostal,
            "dba" => $merchant->nama_merchant,
            "npwp" => $npwp,
            "businessRegistrationNumber" => $businessRegistrationNumber,
            "npwpUrl" => null,
            "accountNumber" => $merchant->nomor_rekening_bank_penampung,
            "bankCode" => $bankCode,
            "accountHolder" => $merchant->nama_pemilik_rekening_merchant_badan_usaha,
            "businessRelationType" => "B2C",
            "disableManualInput" => true,
            "bankApproval" => false,
            "upgradeApproval" => true,
            "referralIn" => true,
            "referralOut" => true,
            "typeMerchantRegis" => null,
            "salutation" => $gender,
            "firstName" => $merchant->nama_pemilik_merchant,
            "middleName" => null,
            "lastName" => "",
            "userContact" => $merchant->nomor_hp,
            "userEmail" => $merchant->email,
            "merchantEmail" => $merchant->bisnis_email,
            "username" => $merchant->username,
            "cashlezInformation" => null,
            "ktp" => $nomorIdentitas,
            "ktpUrl" => null,
            "selfieUrl" => null,
            "birthPlace" => $merchant->tempat_lahir,
            "birthDate" => date('Y-m-d', strtotime($merchant->tanggal_lahir)),
            "userAddress1" => $userAddress,
            "userAddress2" => "-",
            "userCity" => $userCity,
            "userState" => $userState,
            "userPostCode" => $userPostal,
            "userDistrict" => $userDistrict,
            "roleFk" => $userPostal,
            "password" => $password,
            "pin" => $pin,
            "merchantName" => $merchant->nama_merchant,
            "merchantId" => "CX-123-4567-0001",
            "createdBy" => "NEW ONBOARDING KFA",
            "isHold" => true,
            "riskmerchantFk" => "Default limit",
            "isPremium" => false,
            "requestDesc" => "string",
	    "picInternal" => $auth->reference_code
        ];

        try {
            $client = new Client();
            $response = $client->post($url, [
                'headers' => [
                    'api-key' => 'f36535662d2d48a3eaf986583f6ada6f431a76a4',
                ],
                'json' => $data,
                'verify' => false,
                'timeout' => 120,
            ]);

            $statusCode = $response->getStatusCode();
            $result = $response->getBody()->getContents();

            if ($statusCode == 200) {
                $result = json_decode($result, true);
                return true;
            } else {
                Log::info($response);
                return false;
            }
        } catch (RequestException $e) {
            Log::error('Guzzle request exception: ' . $e->getMessage());
            Log::info($e);
            return false;
        }
    }

    public static function encrypt($password, $data)
    {

        $PBKDF2_ITERATIONS = 15000;
        $salt = BackOffice::generateSalt32Byte();
        $key = hash_pbkdf2("sha256", $password, $salt, $PBKDF2_ITERATIONS, 32, $raw_output = true);
        $iv = BackOffice::generateRandomInitvector();
        $ciphertext = openssl_encrypt($data, 'aes-256-cbc', $key, OPENSSL_RAW_DATA, $iv);

        return base64_encode($salt) . ':' . base64_encode($iv) . ':' . base64_encode($ciphertext);
    }

    public static function decrypt($password, $data)
    {
        $PBKDF2_ITERATIONS = 15000;
        $salt = BackOffice::generateSalt32Byte();
        Log::info($salt);
        Log::info($data);
        list($salt, $iv, $encryptedData) = explode(':', $data, 3);
        $key = hash_pbkdf2("sha256", $password, base64_decode($salt), $PBKDF2_ITERATIONS, 32, $raw_output = true);

        return openssl_decrypt(base64_decode($encryptedData), 'aes-256-cbc', $key, OPENSSL_RAW_DATA, base64_decode($iv));
    }

    public static function generateRandomInitvector()
    {
        return openssl_random_pseudo_bytes(16, $crypto_strong);
    }

    public static function generateSalt32Byte()
    {
        return openssl_random_pseudo_bytes(32, $crypto_strong);
    }
}
