<?php

namespace App\Http\Controllers;

use App\Models\Merchant;
use Illuminate\Http\Request;

class MerchantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $dateRange = $request->query('dateRange');

        if ($dateRange) {
            $dateRangeArray = explode(" - ", $dateRange);

            $startDate = date('Y-m-d', strtotime($dateRangeArray[0]));
            $endDate = date('Y-m-d', strtotime($dateRangeArray[1]));

            $data = Merchant::where('status', '!=', 'deleted')
                ->where('dokumen_lengkap', true)
                ->whereBetween('created_at', [$startDate, $endDate])
                ->orderByDesc('created_at')
                ->get();
        } else {
            $data = Merchant::where('status', '!=', 'deleted')
                ->where('dokumen_lengkap', true)
                ->orderByDesc('created_at')
                ->get();
        }

        return view('admin.merchants.index', compact('data'));
    }
}
