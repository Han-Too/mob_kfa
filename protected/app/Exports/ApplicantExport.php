<?php

namespace App\Exports;

use App\Helpers\Utils;
use App\Models\Applicant;
use App\Models\Merchant;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class ApplicantExport implements FromCollection, WithHeadings, WithMapping
{
    protected $status;
    protected $dateRange;

    public function __construct($status, $dateRange)
    {
        $this->status = $status;
        $this->dateRange = $dateRange;
    }
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $merchant = Merchant::select(
                'created_at',
                'nama_merchant',
                'pengajuan_sebagai',
                'jenis_usaha',
                'tempat_bisnis',
                'mcc',
                'bisnis_email',
                'bisnis_no_hp',
                'store_url',
                'status_approval',
                'token_applicant'
            )
            ->where('status', 'active')
            ->where('dokumen_lengkap', true);
        if ($this->status != 'applicants') {
            $merchant->where('status_approval', $this->status);
        }

        if ($this->dateRange) {
            $dateRangeArray = explode(" - ", $this->dateRange);

            $startDate = date('Y-m-d', strtotime($dateRangeArray[0]));
            $endDate = date('Y-m-d', strtotime($dateRangeArray[1]));
            $merchant->whereDate('created_at', '>=', $startDate);
            $merchant->whereDate('created_at', '<=', $endDate);
        }

        $merchant->orderBy('created_at');
        
        return $merchant->get();
    }

    public function map($merchant): array
    {
        $status = Applicant::where('token_applicant', $merchant->token_applicant)->pluck('internal_status')->first();
        return [
            $merchant->created_at->setTimezone('Asia/Jakarta')->format('d-m-Y'),
            $merchant->nama_merchant,
            $merchant->pengajuan_sebagai,
            $merchant->jenis_usaha,
            $merchant->tempat_bisnis,
            $merchant->mcc,
            $merchant->bisnis_email,
            $merchant->bisnis_no_hp,
            $merchant->store_url,
            Utils::statusDocument($status)
        ];
    }

    public function headings(): array
    {
        return [
            'Tanggal Pengajuan',
            'Nama Merchant',
            'Pengajuan Sebagai',
            'Jenis Usaha',
            'Tempat Usaha',
            'Kategori Bisnis',
            'Email Usaha',
            'No Telepon Usaha',
            'URL Usaha',
            'Status'
        ];
    }
}
