<?php

namespace App\Helpers;

use App\Models\Applicant;
use App\Models\Bank;
use App\Models\DokumenApplicant;
use App\Models\HistoryApproval;
use App\Models\MasterPrivilege;
use App\Models\Merchant;
use App\Models\MerchantDocument;
use App\Models\MerchantPayment;
use App\Models\Outlet;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rules\Unique;
use Image;

class Utils
{
    public static function uploadImage($image, $width)
    {
        $img = Image::make($image);

        $orientation = $img->exif('Orientation');

        if ($orientation) {
            $img->orientate();
        }

        $img->resize($width, null, function ($constraint) {
            $constraint->aspectRatio();
        });

        $img->encode('jpg', 80);

        $processedImageName = time() . '_' . uniqid() . '.jpg';
        $processedImagePath = 'public/' . $processedImageName;

        Storage::put($processedImagePath, $img->stream());

        $storageLink = Storage::url($processedImagePath);

        return $storageLink;
    }

    public static function uploadImageOri($image)
    {
        try {
            $imageName = time() . uniqid() . '.' . $image->extension();
            if (env('APP_ENV') == 'production' || !env('APP_ENV')) {
                $image->move('images', $imageName);
            } else {
                $image->move(public_path('images'), $imageName);
            }
            $path = url('images/' . $imageName);
    
            return $path;
        } catch (\Throwable $th) {       
            return null;
        }
    }

    public static function uploadFile($file)
    {
        try {
            $fileName = time() . uniqid() . '.' . $file->extension();
            if (env('APP_ENV') == 'production' || !env('APP_ENV')) {
                $file->move('files', $fileName);
            } else {
                $file->move(public_path('files'), $fileName);
            }
            $path = url('files/' . $fileName);
    
            return $path;
        } catch (\Throwable $th) {
            return null;
        }
    }

    public static function generateToken()
    {
        return csrf_token();
    }

    public static function getLayerId($role, $status)
    {
        if ($status == 'Reject') {
            return 2;
        }
        if ($status == 'Approve') {
            return 5;
        }
        
        if ($role == 'Merchant Operation' || $role == 'Sales') {
            $layer_id = 4;
        } else if ($role == 'Risk Analyst') {
            $layer_id = 3;
        } else if ($role == 'Manager') {
            $layer_id = 5;
        } else {
            $layer_id = 2;
        }
        return $layer_id;
    }

    public static function addHistory($token, $status, $notes, $flag, $approvalId)
    {
        $user = Auth::user();
        HistoryApproval::create([
            'token_applicant' => $token,
            'approval_id' => $approvalId,
            'status' => $status,
            'notes' => $notes,
            'flag' => $flag,
            'user_id' => $user->id
        ]);

        return true;
    }

    public static function getDocumentTitle($id)
    {
        $title = DokumenApplicant::where('id', $id)->pluck('title')->first();
        return $title;
    }

    public static function applicantStatusByRecomendation($status)
    {
        if ($status == 'Verification') {
            $applicantStatus = 'Process';
        } else if ($status == 'Reject') {
            $applicantStatus = 'Reject to Merchant Ops';
        } else if ($status == 'Approve') {
            $applicantStatus = 'Approved';
        } else if ( $status = 'Validation') {
            $applicantStatus = 'Process';
        } else {
            $applicantStatus = $status;
        }

        return $applicantStatus;
    }

    public static function internalPaymentStatusByRecomendation($status)
    {
        if ($status == 'Verification' ) {
            $applicantStatus = 'Verified';
        } else if ($status == 'Close') {
            $applicantStatus = 'Close';
        } else if ($status == 'Validation') {
            $applicantStatus = 'Validated';
        }  else if ($status == 'Reject') {
            $applicantStatus = 'Reject to Merchant Ops';
        } else if ($status == 'Approve') {
            $applicantStatus = 'Approved by Bank';
        } else if ($status == 'Updated') {
            $applicantStatus = 'Updated';
        } else {
            $applicantStatus = 'New Request';
        }
        
        return $applicantStatus;
    }

    public static function merchantStatus($status)
    {
        $role_id = Auth::user()->role_id;
        if ($status == 'Reject') {
            $applicantStatus = 'Reject';
        } else if ($status == 'Verification' || $status == 'Validation') {
            $applicantStatus = 'Process';
        } else if ($status == 'Approve' && $role_id == 5) {
            $applicantStatus = 'Approved';
        } else if ($status == 'Close') {
            $applicantStatus = 'Close';
        }
        else {
            $applicantStatus = 'Process';
        }
        return $applicantStatus;
    }

    public static function internalStatusByRecomendation($status, $layer_id)
    {
        if ($layer_id == 2) { // Merchant Operation
            switch ($status) {
                case 'New Request':
                    $internal = 'New Request';
                    break;
                case 'Process':
                    $internal = 'Verification';
                    break;
                case 'Close':
                    $internal = 'Close';
                    break;
                case 'Reject':
                    $internal = 'Reject';
                    break;
                case 'Update':
                    $internal = 'Update';
                    break;

                default:
                    $internal = 'New Request';
                    break;
            }
        } else if ($layer_id == 4) { // Risk Analyst
            switch ($status) {
                case 'Process':
                    $internal = 'Validation';
                    break;
                case 'Close':
                    $internal = 'Close';
                    break;
                case 'Reject':
                    $internal = 'Reject to MerchantOps ';
                    break;
                case 'Update':
                    $internal = 'Update';
                    break;

                default:
                    $internal = 'Validation';
                    break;
            }
        } elseif ($layer_id == 3) { // Manager
            switch ($status) {
                case 'Process':
                    $internal = 'Acquirer Process';
                    break;
                case 'Close':
                    $internal = 'Close';
                    break;
                case 'Reject':
                    $internal = 'Reject to MerchantOps ';
                    break;
                case 'Update':
                    $internal = 'Update';
                    break;
                case 'Approved':
                    $internal = 'Approved';
                    break;

                default:
                    $internal = 'Acquirer Process';
                    break;
            }
        }

        return $internal;
    }

    public static function badgeApplicant($status)
    {
        switch ($status) {
            case 'Process':
                $badge = 'info';
                break;
            case 'Approved':
                $badge = 'success';
                break;
            case 'Reject':
                $badge = 'warning';
                break;
            case 'Close':
                $badge = 'danger';
                break;
            case 'Updated':
                $badge = 'info';
                break;
            case 'New Request':
                $badge = 'primary';
                break;
            default:
                $badge = 'primary';
                break;
        }

        return $badge;
    }

    public static function getUserName($userId)
    {
        $user = User::where('id', $userId)->pluck('name')->first();
        return $user;
    }

    public static function getUserRole($userId)
    {
        $user = User::where('id', $userId)->pluck('role_id')->first();
        $role = MasterPrivilege::where('id', $user)->pluck('title')->first();
        return $role;
    }

    public static function getTotalFeatures($token = null, $status)
    {
        if ($token) {
            $status = Utils::getStatusBySlug($status);
            $total = MerchantPayment::where('status', 'active')->where('status_approval', $status)->where('token_applicant', $token)->count();
        } else {
            switch ($status) {
                case 'new-request':
                    $total = Merchant::where('status_approval', 'New Request')->where('dokumen_lengkap', true)->count();
                    break;

                case 'process':
                    $total = Merchant::where('status_approval', 'Process')->where('dokumen_lengkap', true)->count();
                    break;

                case 'close':
                    $total = Merchant::where('status_approval', 'Close')->where('dokumen_lengkap', true)->count();
                    break;

                case 'reject':
                    $total = Merchant::where('status_approval', 'Reject')->where('dokumen_lengkap', true)->count();
                    break;

                case 'approved':
                    $total = Merchant::where('status_approval', 'Approved')->where('dokumen_lengkap', true)->count();
                    break;

                case 'updated':
                    $total = Merchant::where('status_approval', 'Updated')->where('dokumen_lengkap', true)->count();
                    break;

                default:
                    $total = 0;
                    break;
            }
        }
        return $total;
    }

    public static function getStatusBySlug($status)
    {
        switch ($status) {
            case 'new-request':
                $text = 'New Request';
                break;

            case 'process':
                $text = 'Process';
                break;

            case 'close':
                $text = 'Close';
                break;

            case 'reject':
                $text = 'Reject';
                break;

            case 'updated':
                $text = 'Updated';
                break;

            case 'approved':
                $text = 'Approved';
                break;

            default:
                $text = 'New Request';
                break;
        }
        return $text;
    }

    public static function statusAccess($token, $type)
    {
        $user = Auth::user();
        $role_id = $user->role_id;
        $layer_id = Utils::getLayerIdByRole($role_id);

        $applicant = Applicant::where('token_applicant', $token)->first();
        $check = HistoryApproval::where('user_id', $user->id)->where('token_applicant', $token)->where('flag', $type)->orderByDesc('created_at')->first();

        if ($check) {
            if ($layer_id == $applicant->layer_id) {
                $text = 'process';
            } else{    
                $text = 'view';
            }
        } else{
            $text = 'view';
        }
        
        if ($type == 'merchant') {
            if ($applicant) {
                if ($applicant->internal_status == 'update' && $layer_id == $applicant->layer_id) {
                    $text = 'process';
                }
            }
        }

        return $text;
    }

    public static function statusAccessPayment($token, $type, $id)
    {
        $user = Auth::user();
        $role_id = $user->role_id;
        $layer_id = Utils::getLayerIdByRole($role_id);

        $payment = MerchantPayment::where('token_applicant', $token)->where('id', $id)->where('status', 'active')->first();
        $check = HistoryApproval::where('user_id', $user->id)->where('token_applicant', $token)->where('flag', $type)->orderByDesc('created_at')->first();

        if ($check) {
            if ($layer_id == $payment->layer_id) {
                $text = 'process';
            } else{
                $text = 'view';
            }
        } else{
            $text = 'view';
        }

        return $text;
    }

    public static function getLayerIdByRole($roleId)
    {
        switch ($roleId) {
            case 2:
                $layerId = 2;
                break;
            case 3:
                $layerId = 2;
                break;
            case 4:
                $layerId = 4;
                break;
            case 5:
                $layerId = 3;
                break;
            case 1:
                $layerId = 5;
                break;

            default:
                $layerId = 2;
                break;
        }

        return $layerId;
    }

    public static function documentCompleation($token_applicant)
    {
        // $merchant = Merchant::where('token_applicant', $token_applicant)->first();
        // $totalDocument = DokumenApplicant::where('is_mandatory', true)->where('type', $merchant->pengajuan_sebagai)->where('status', 'active')->count();
        $merchantDocument = MerchantDocument::where('token_applicant', $token_applicant)->count();
        if ($merchantDocument < 1) {
            return 0;
        }

        $uploaded = MerchantDocument::where('token_applicant', $token_applicant)->where('image', '!=', null)->count();

        $result = ($uploaded / $merchantDocument) * 100;
        
        return round($result);
    }

    public static function documentApprovalCompleation($token_applicant)
    {
        $merchantDocument = MerchantDocument::where('token_applicant', $token_applicant)->count();
        $approved = MerchantDocument::where('token_applicant', $token_applicant)->whereIn('status_approval', ['Validation', 'Verification'])->count();

        $result = ($approved / $merchantDocument) * 100;
        
        return round($result);
    }

    public static function generateUsername($words)
    {
        $username = str_replace(' ', '', strtolower($words));

        $merchant = Merchant::where('username', $username)->first();
        if($merchant){
            $username = str_replace(' ', '', strtolower($words)).rand(1,999);
        }

        return $username;
    }

    public static function statusDocument($status){
        switch ($status) {
            case 'Verification':
                $statusDocument = 'Verified';
                break;
            case 'Validation':
                $statusDocument = 'Validated';
                break;
            
            default:
                $statusDocument = $status;
                break;
        }
        return $statusDocument;
    }

    public static function getBoIdOutlets($outlet){
        $boId = Outlet::where('outlet', $outlet)->pluck('bo_id')->first();
        return $boId;
    }

    public static function getBankCode($bank){
        $bankId = Bank::where('name', $bank)->pluck('code')->first();
        return $bankId;
    }

}
