<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Form Pengajuan EDC</title>
    <style>
        * {
            font-size: 10px;
            line-height: 1;
            font-family: Dejavu Sans;
        }
    </style>
</head>

<body>
    <div style="padding: 0px 30px">
        <table border="0" style="font-size:12px" width="100%">
            <tr>
                <td width="50%" style="vertical-align: middle; text-align: left;">FORMULIR PENYEWAAN MESIN EDC</td>
                <td width="50%" style="vertical-align: middle; text-align: right;">
                    <img src="https://mob.cashlez.com/images/cashlez-dark.png" width="150px" alt="">
                </td>
            </tr>
        </table>
        <div style="height: 10px;"></div>
        <table border="0" style="font-size:10px;" width="100%">
            <tr>
                <td width="40%" style="vertical-align: top;"><strong>Nomor Formulir</strong></td>
                <td width="2%" style="vertical-align: top;">:</td>
                <td width="60%" style="vertical-align: top;"></td>
            </tr>
            <div style="height: 10px;"></div>
            <tr>
                <td colspan="6" style="vertical-align: top; font-size: 10px;">
                    Formulir Penyewaan Mesin EDC dibuat dan ditandatangani di Jakarta, pada hari
                    ________, tanggal _____<strong> bulan ___tahun _____</strong>, oleh
                    dan antara:
                </td>
            </tr>
            <div style="height: 10px;"></div>
            <tr>
                <td width="40%" style="vertical-align: top;"><strong>Nama Pemilik Usaha</strong></td>
                <td width="2%" style="vertical-align: top;">:</td>
                <td width="60%" colspan="4" style="vertical-align: top;border-bottom:1px solid black">
                    {{ $data->nama_pemilik_merchant }}</td>
            </tr>
            <div style="height: 20px;"></div>
            <tr>
                <td width="40%" style="vertical-align: top;"><strong>Jabatan</strong></td>
                <td width="2%" style="vertical-align: top;">:</td>
                <td width="60%" colspan="4" style="vertical-align: top;border-bottom:1px solid black"></td>
            </tr>
            <div style="height: 20px;"></div>
            <tr>
                <td width="40%" style="vertical-align: top;"><strong>No. KTP</strong></td>
                <td width="2%" style="vertical-align: top;">:</td>
                <td width="60%" style="vertical-align: top;border-bottom:1px solid black">
                    @if (substr($data->nomor_identitas, 0, 3) == 'KTP')
                        {{ $data->nomor_identitas }}
                    @else
                    @endif
                </td>
                <td width="40%" style="vertical-align: top;"><strong>No. Passport/KITAS</strong></td>
                <td width="2%" style="vertical-align: top;">:</td>
                <td width="60%" style="vertical-align: top;border-bottom:1px solid black">
                    @if (substr($data->nomor_identitas, 0, 3) == 'Paspor')
                        {{ $data->nomor_identitas }}
                    @else
                    @endif
                </td>
            </tr>
            <div style="height: 20px;"></div>
            <tr>
                <td width="40%" style="vertical-align: top;"><strong>Nama Merchant</strong></td>
                <td width="2%" style="vertical-align: top;">:</td>
                <td width="60%" colspan="4" style="vertical-align: top;border-bottom:1px solid black">
                    {{ ucwords($data->nama_merchant) }}</td>
            </tr>
            <div style="height: 20px;"></div>
            <tr>
                <td width="40%" style="vertical-align: top;"><strong>Alamat Merchant</strong></td>
                <td width="2%" style="vertical-align: top;"></td>
                <td width="60%" colspan="4" style="vertical-align: top;border-bottom:1px solid black">
                    {{ ucwords($data->alamat_bisnis) }}</td>
            </tr>
            <div style="height: 20px;"></div>
            <tr>
                <td width="40%" style="vertical-align: top;"><strong>Tipe</strong></td>
                <td width="2%" style="vertical-align: top;">:</td>
                <td width="60%" colspan="4" style="vertical-align: top;border-bottom:1px solid black"></td>
            </tr>
            <div style="height: 20px;"></div>
            <tr>
                <td width="40%" style="vertical-align: top;"><strong>Jumlah</strong></td>
                <td width="2%" style="vertical-align: top;">:</td>
                <td width="60%" colspan="4" style="vertical-align: top;border-bottom:1px solid black"></td>
            </tr>
            <div style="height: 20px;"></div>
            <tr>
                <td width="40%" style="vertical-align: top;"><strong>Nomor Seri</strong></td>
                <td width="2%" style="vertical-align: top;">:</td>
                <td width="60%" colspan="4" style="vertical-align: top;border-bottom:1px solid black"></td>
            </tr>
            <div style="height: 10px;"></div>
            <tr>
                <td colspan="6" style="vertical-align: top;">
                    <i style="font-size: 9px">*Data yang dicantumkan diatas wajib sesuai dengan data merchant yang
                        terdaftar pada Form Aplikasi
                        Pendaftaran Merchant Cashlez</i>
                </td>
            </tr>
            <div style="height: 10px;"></div>
            <tr>
                <td colspan="3" style="vertical-align: top;"><u><b>Syarat dan Ketentuan Penyewaan Mesin EDC</b></u>
                </td>
            </tr>
            <div style="height: 10px;"></div>
            <tr>
                <td colspan="3" style="vertical-align: top;">1. <b>Skema Penyewaan Unit</b></td>
            </tr>
        </table>

        <table border="1" style="font-size:12px;" width="100%" cellspacing="0" cellpadding="0">
            <tr style="background-color: #addfff;">
                <th width="3%" style="vertical-align: middle; text-align: center; padding: 4px;">No</th>
                <th width="40%" style="vertical-align: middle; text-align: center; padding: 4px;">Tipe Perangkat
                </th>
                <th width="30%" style="vertical-align: middle; text-align: center; padding: 4px;">Tier Sales Volume
                    <br>
                    (Per unit per bulan)
                </th>
                <th width="20%" style="vertical-align: middle; text-align: center; padding: 4px;">Biaya Sewa <br>
                    (Per unit per bulan)
                </th>
                <th width="20%" style="vertical-align: middle; text-align: center; padding: 4px;">Dana Jaminan <br>
                    (Per
                    unit)
                </th>
                <th width="20%" style="vertical-align: middle; text-align: center; padding: 4px;">Biaya Instalasi
                    <br>
                    (Per unit)
                </th>
            </tr>
            <tr>
                <td width="3%" style="vertical-align: top;  text-align: center; padding: 4px;">1</td>
                <td width="40%" rowspan="2"
                    style="vertical-align: middle;  text-align: center; border-top: 1px solid black; padding: 4px;">
                    All in One C1/P1/P2/
                    Other Android Version
                </td>
                <td width="40%" style="vertical-align: top;  text-align: center; padding: 4px;">
                    &lt; Rp300.000.000,- </td>
                <td width="40%" style="vertical-align: top;  text-align: center; padding: 4px;">Rp 225.000</td>
                <td width="30%" rowspan="2" style="vertical-align: middle;  text-align: center; padding: 4px;">
                    Rp500.000
                </td>
                <td width="30%" rowspan="2" style="vertical-align: middle;  text-align: center; padding: 4px;">
                    Rp150.000
                </td>
            </tr>
            <tr>
                <td width="3%" style="vertical-align: top;  text-align: center; padding: 4px;">2</td>
                <td width="40%" style="vertical-align: top;  text-align: center; padding: 4px;">
                    &gt; Rp300.000.000,
                </td>

                <td width="40%" style="vertical-align: top;  text-align: center; padding: 4px;">
                    Free
                </td>
            </tr>
        </table>
        <table border="0" style="font-size:10px; padding-left:5px;" width="100%" cellspacing="0"
            cellpadding="0">
            <tr>
                <td width="3%" style="vertical-align: top;  text-align: right;">1.1.</td>
                <td colspan="3" style="vertical-align: top;  text-align: justify;">
                    <strong>Cashlez</strong> menyediakan Mesin EDC kepada <strong>Merchant</strong> dengan skema
                    penyewaan dengan pembayaran dana jaminan
                    sebesar
                    Rp 500.000 (lima ratus ribu Rupiah) per unit dengan biaya instalasi sebesar Rp 150.000 (seratus lima
                    puluh ribu Rupiah) per unit

                </td>
            </tr>
            <tr>
                <td width="3%" style="vertical-align: top;  text-align: right;">1.2.</td>
                <td colspan="3" style="vertical-align: top;  text-align: justify;">
                    Perhitungan biaya sewa akan dihitung dari sales volume transaksi per unit sesuai pada tabel 1
                    diatas, Apabila <strong>Merchant</strong> sales
                    volume merchant tidak mencapai sales volume yang disepakati, maka <strong>Merchant</strong> wajib
                    membayarkan biaya
                    sewa sesuai pada
                    tiering yang tertera pada tabel 1 diatas. Pembayaran biaya sewa akan dilakukan dengan pemotongan
                    dana <i>settlement</i> Merchant.

                </td>
            </tr>
            <tr>
                <td width="3%" style="vertical-align: top;  text-align: right;">1.3.</td>
                <td colspan="3" style="vertical-align: top;  text-align: justify;">
                    <strong>Merchant</strong> dapat melakukan penyewaan dengan Free biaya sewa, apabila Sales Volume
                    atas transaksi yang
                    terjadi setiap bulannya
                    sesuai dengan Sales Volume yang disebutkan pada tabel 1 poin 2 di atas, tetapi apabila Sales Volume
                    Merchant tidak mencapai/
                    tidak sesuai dengan ketentuan tersebut, maka <strong>Merchant</strong> wajib membayar biaya sewa
                    Mesin EDC yang sudah
                    ditentukan pada
                    tabel 1 poin 1 di atas, dan dengan demikian <strong>Merchant</strong> memberikan kuasa kepada
                    <strong>Cashlez</strong> untuk melakukan
                    pemotongan atas
                    dana settlement, apabila dana settlement tidak mencukupi untuk pembayaran biaya sewa,
                    <strong>Cashlez</strong> akan
                    melakukan pemotongan
                    atas dana jaminan dan apabila dana jaminan juga tidak mencukupi untuk pembayaran biaya sewa maka
                    <strong>Merchant</strong> wajib
                    membayarkan biaya sewa melalui transfer ke rekening <strong>Cashlez</strong> yang akan dikirimkan
                    terpisah melalui
                    email kepada <strong>Merchant</strong>.
                </td>
            </tr>
            <tr>
                <td width="3%" style="vertical-align: top;  text-align: right;">1.4.</td>
                <td colspan="3" style="vertical-align: top;  text-align: justify;">
                    Dana jaminan yang akan dikenakan kepada <strong>Merchant</strong> adalah dana jaminan untuk
                    antisipasi atas biaya
                    sewa
                    atau
                    adanya biaya kerusakan atas pemakaian/ cacat/ hilang yang kemungkinan akan timbul dikemudian hari,
                    pemotongan
                    dana jaminan akan berlaku dengan kondisi sebagai berikut:
                    <table style="margin: 5px 5px 5px 0px; font-family: Dejavu Sans;border: 0">
                        <tr>
                            <td style="vertical-align: top; ">
                                1.4.1.
                            </td>
                            <td>
                                Sales Volume atas transaksi berhasil <strong>Merchant</strong> tidak sesuai dengan
                                kesepakatan sebagaimana
                                tercantum pada
                                tabel 1 di atas;
                            </td>
                        </tr>
                        <tr>
                            <td>
                                1.4.2.
                            </td>
                            <td>
                                Adanya kerusakan atas pemakaian / cacat/ hilang selama masa penyewaan.
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <td width="3%" style="vertical-align: top;  text-align: right;">1.5.</td>
                <td colspan="3" style="vertical-align: top;  text-align: justify;">
                    <strong>Merchant</strong> memberikan kuasa kepada <strong>Cashlez</strong> untuk melakukan
                    pemotongan settlement sebesar biaya-biaya
                    yang timbul. Apabila settlement tidak mencukupi dari biaya ganti rugi yang timbul, maka
                    <strong>Cashlez</strong>
                    berhak untuk melakukan pemotongan atas dana
                    jaminan yang berada di <strong>Cashlez</strong> sebesar biaya kerugian yang timbul, apabila dana
                    jaminan dan dana
                    settlement tidak mencukupi
                    untuk biaya ganti rugi yang dimaksud, maka <strong>Merchant</strong> tetap wajib membayarkan sisa
                    nilai kerugian
                    dengan transfer ke rekening
                    yang akan dikirimkan melalui email kepada <strong>Merchant</strong>. Apabila dana jaminan sudah
                    habis terpotong oleh
                    biaya sewa karena sales
                    volume transaksi tidak sesuai dengan kesepakatan dan <strong>Merchant</strong> masih tetap ingin
                    menyewa Mesin EDC,
                    maka <strong>Merchant</strong> wajib
                    melakukan top up dana jaminan kembali kepada <strong>Cashlez</strong> sebesar dana yang tercantum
                    pada tabel 1 di
                    atas
                </td>
            </tr>
            <tr>
                <td width="3%" style="vertical-align: top;  text-align: right;">1.6.</td>
                <td colspan="3" style="vertical-align: top;  text-align: justify;">
                    Pembayaran dana jaminan yaitu ke nomor rekening yang akan dikirimkan terpisah dari form ini,
                    pengecekan pembayaran dana
                    jaminan adalah H+1 setelah transfer dilakukan, pengiriman dana jaminan wajib mencantumkan nama
                    merchant
                </td>
            </tr>
            <tr>
                <td width="3%" style="vertical-align: top;  text-align: right;">1.7.</td>
                <td colspan="3" style="vertical-align: top;  text-align: justify;">
                    Dana jaminan akan dikembalikan secara penuh apabila tidak ada pemotongan atas biaya sewa dan
                    pengembalian Mesin EDC
                    beserta kelengkapannya yang disewa dikembalikan kepada <strong>Cashlez</strong> dalam kondisi
                    berfungsi dengan baik
                    tidak ada kerusakan/
                    cacat/ hilang selama masa penyewaan.
                </td>
            </tr>
            <tr>
                <td width="3%" style="vertical-align: top;  text-align: right;">1.8.</td>
                <td colspan="3" style="vertical-align: top;  text-align: justify;">
                    <strong>Cashlez</strong> akan menerbitkan dokumen berupa Invoice atas tagihan biaya sewa apabila
                    dana settlement dan
                    dana jaminan tidak
                    tersedia ataupun tidak mencukupi untuk pembayaran biaya sewa yang timbul yaitu maksimal H+3 dari
                    tanggal 15 (cut off
                    perhitungan internal <strong>Cashlez</strong>).
                </td>
            </tr>
            <tr>
                <td width="3%" style="vertical-align: top;  text-align: right;">1.9.</td>
                <td colspan="3" style="vertical-align: top;  text-align: justify;">
                    Ketentuan pembayaran biaya sewa wajib dilakukan maksimal H+1 setelah <strong>Merchant</strong>
                    menerima Invoice yang
                    akan dikirimkan
                    menggunakan soft copy melalui email oleh Tim Finance <strong>Cashlez</strong>.
                </td>
            </tr>
            <tr>
                <td width="3%" style="vertical-align: top;  text-align: right;">1.10.</td>
                <td colspan="3" style="vertical-align: top;  text-align: justify;">
                    <strong>Cashlez</strong> akan mengirimkan email pengingat pembayaran sewa apabila dalam jangka waktu
                    yang ditentukan
                    di atas belum ada
                    pembayaran dari <strong>Merchant</strong>
                </td>
            </tr>
            <tr>
                <td width="3%" style="vertical-align: top;  text-align: right;">1.11.</td>
                <td colspan="3" style="vertical-align: top;  text-align: justify;">
                    <strong>Merchant</strong> wajib membayar biaya sewa yang timbul sesuai dengan jangka waktu yang
                    telah ditentukan.
                </td>
            </tr>
            <tr>
                <td width="3%" style="vertical-align: top;  text-align: right;">1.12.</td>
                <td colspan="3" style="vertical-align: top;  text-align: justify;">
                    Dalam hal tidak adanya pembayaran atas biaya sewa yang ditagihkan maka <strong>Merchant</strong>
                    wajib untuk
                    mengembalikan Mesin EDC
                    yang disewa kepada <strong>Cashlez</strong> ke alamat kantor Cashlez atau melalui perwakilan dari
                    Tim Sales Cashlez,
                    dengan menyertakan bukti
                    serah terima unit
                </td>
            </tr>
            <tr>
                <td width="3%" style="vertical-align: top;  text-align: right;">1.13.</td>
                <td colspan="3" style="vertical-align: top;  text-align: justify;">
                    Biaya sewa Mesin EDC yang tertera di atas belum termasuk pajak
                </td>
            </tr>
            <tr>
                <td width="3%" style="vertical-align: top;  text-align: right;">1.14.</td>
                <td colspan="3" style="vertical-align: top;  text-align: justify;">
                    Penagihan biaya sewa akan tetap berjalan yang disesuaikan dengan berlakunya masa sewa antara
                    <strong>Cashlez</strong>
                    dengan Merchant
                </td>
            </tr>
            <tr>
                <td width="3%" style="vertical-align: top;  text-align: right;">1.15.</td>
                <td colspan="3" style="vertical-align: top;  text-align: justify;">
                    Pembayaran atas seluruh biaya yang timbul atas perjanjian ini wajib dilakukan ke rekening atas
                    nama <strong>PT Cashlez worldwide Indonesia Tbk.</strong> dan <strong>Merchant</strong> tidak
                    diperkenankan untuk
                    melakukan pembayaran ke Rekening
                    Pribadi ,
                    apabila terdapat kerugian
                    dikarenakan adanya pembayaran yang dilakukan tidak melalui rekening <strong>Cashlez</strong>, maka
                    segala kerugian
                    bukan menjadi tanggung
                    jawab <strong>Cashlez</strong>, dengan ini <strong>Merchant</strong> membebaskan
                    <strong>Cashlez</strong> dari segala tuntutan maupun kerugian yang
                    kemungkinan akan timbul
                    dikemudian hari.
                </td>
            </tr>
            {{-- <tr>
                <td width="3%" style="vertical-align: top;  text-align: right;">1.16.</td>
                <td colspan="3" style="vertical-align: top;  text-align: justify;">
                    Dalam hal tidak adanya pembayaran atas biaya sewa yang ditagihkan maka Merchant wajib untuk
                    mengembalikan
                    Mesin EDC yang disewa kepada Cashlez ke alamat kantor Cashlez/ Tim Sales Cashlez
                </td>
            </tr>
            <tr>
                <td width="3%" style="vertical-align: top;  text-align: right;">1.17.</td>
                <td colspan="3" style="vertical-align: top;  text-align: justify;">
                    Biaya sewa Mesin EDC yang tertera di atas belum termasuk pajak.
                </td>
            </tr>
            <tr>
                <td width="3%" style="vertical-align: top;  text-align: right;">1.18</td>
                <td colspan="3" style="vertical-align: top;  text-align: justify;">
                    Penagihan biaya sewa akan tetap berjalan yang disesuaikan dengan berlakunya masa sewa antara Cashlez
                    dengan Merchant.
                </td>
            </tr> --}}
        </table>

        <table border="0" style="font-size:10px;" width="100%">
            <tr>
                <td colspan="3" style="vertical-align: top;">2. <b>Pengembalian Dana (<i>Refund</i>)</b></td>
            </tr>
        </table>
        <table border="0" style="font-size:10px; padding-left:5px;" width="100%" cellspacing="0"
            cellpadding="0">
            <tr>
                <td width="3%" style="vertical-align: top;  text-align: right;">2.1.</td>
                <td colspan="3" style="vertical-align: top;  text-align: justify;">
                    Pengembalian dana (untuk selanjutnya disebut <i>“Refund”</i>) yang telah dibayarakan ke Cashlez akan
                    berlaku hanya untuk dana
                    jaminan, dengan kondisi apabila tidak ada pemotongan atas biaya sewa unit maupun biaya kerusakan/
                    kehilangan unit/ ganti rugi
                    lainnya (apabila ada).
                </td>
            </tr>
            <tr>
                <td width="3%" style="vertical-align: top;  text-align: right;">2.2.</td>
                <td colspan="3" style="vertical-align: top;  text-align: justify;">
                    Nominal refund yang dikembalikan kepada Merchant dapat berbeda dan akan menyesuaikan dengan kondisi
                    yang terjadi.
                </td>
            </tr>
            <tr>
                <td width="3%" style="vertical-align: top;  text-align: right;">2.3.</td>
                <td colspan="3" style="vertical-align: top;  text-align: justify;">
                    Dana jaminan akan dikembalikan maksimal H+14 (hari kerja) setelah hasil pengecekan EDC dilakukan
                    oleh <strong>Cashlez</strong>
                </td>
            </tr>
            <tr>
                <td width="3%" style="vertical-align: top;  text-align: right;">2.4.</td>
                <td colspan="3" style="vertical-align: top;  text-align: justify;">
                    Rekening Pengembalian dana jaminan: <br>
                    <table>
                        <tr>
                            <td width="40%">
                                Nama Pemilik Rekening
                            </td>
                            <td width="4%">
                                :
                            </td>
                            <td width="60%" style="vertical-align: top;border-bottom:1px solid black">
                                {{ ucwords($data->nama_pemilik_rekening_merchant_badan_usaha) }}
                            </td>
                        </tr>
                        <tr>
                            <td width="40%">
                                Nomor Rekening
                            </td>
                            <td width="4%">
                                :
                            </td>
                            <td width="60%" style="vertical-align: top;border-bottom:1px solid black">
                                {{ $data->nomor_rekening_bank_penampung }}
                            </td>
                        </tr>
                        <tr>
                            <td width="40%">
                                Nama Bank /Cabang
                            </td>
                            <td width="4%">
                                :
                            </td>
                            <td width="60%" style="vertical-align: top;border-bottom:1px solid black">
                                {{ $data->nama_bank }}
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <td width="3%" style="vertical-align: top;  text-align: right;">2.5.</td>
                <td colspan="3" style="vertical-align: top;  text-align: justify;">
                    Biaya instalasi yang dikenakan kepada merchant yang tertera sesuai pada tabel 1 diatas adalah biaya
                    pemasangan/ biaya pelatihan
                    penggunaan atas Mesin EDC yang disewa oleh Merchant dan tidak dapat dilakukan pengembalian dananya
                    (<i>non Refundable</i>)
                </td>
            </tr>
            <tr>
                <td width="3%" style="vertical-align: top;  text-align: right;">2.6.</td>
                <td colspan="3" style="vertical-align: top;  text-align: justify;">
                    Pengajuan refund hanya dapat dilakukan apabila perjanjian sewa/ kerjasama antara Cashlez dengan
                    Merchant telah berakhir, baik
                    diakhiri oleh salah satu pihak atau kesepakatan kedua belah pihak dan tidak ada pemotongan atas
                    biaya sewa atau kerusakan yang
                    timbul.
                </td>
            </tr>
        </table>

        <table border="0" style="font-size:10px;" width="100%">
            <tr>
                <td colspan="3" style="vertical-align: top;">3. <b>Merchant Discout Rate (MDR)</b></td>
            </tr>
        </table>
        <table border="0" style="font-size:10px; padding-left:5px;" width="100%" cellspacing="0"
            cellpadding="0">
            <tr>
                <td colspan="4" style="vertical-align: top;  text-align: justify; padding-left:20px">
                    Biaya MDR (Merchant Discount Rate) akan dibebankan kepada Merchant atas transaksi yang dilakukan
                    oleh
                    Pelanggan
                    terkait dengan transaksi yang dilakukan dengan mempergunakan produk dan layanan Cashlez, atas
                    penggunaan
                    layanan
                    pembayaran Kartu Kredit dan/atau Kartu Debit maupun layanan pembayaran digital lainnya atas
                    transaksi
                    berhasil adalah
                    sebagai berikut:
                </td>
            </tr>
            <tr>
                <td width="3%" style="vertical-align: top;  text-align: right;">3.1.</td>
                <td colspan="3" style="vertical-align: top;  text-align: justify;">
                    Credit Card On Us &nbsp; &nbsp; : ____________________
                </td>
            </tr>
            <tr>
                <td width="3%" style="vertical-align: top;  text-align: right;">3.2.</td>
                <td colspan="3" style="vertical-align: top;  text-align: justify;">
                    Credit Card Off Us &nbsp; &nbsp; : ____________________
                </td>
            </tr>
            <tr>
                <td width="3%" style="vertical-align: top;  text-align: right;"></td>
                <td colspan="3" style="vertical-align: top;  text-align: justify;">
                    <i style="font-size: 8px">*Untuk MDR lengkap dapat di akses:
                        <u>https://www.cashlez.com/pricing.html</u></i>
                </td>
            </tr>
            <tr>
                <td width="3%" style="vertical-align: top;  text-align: right;"></td>
                <td colspan="3" style="vertical-align: top;  text-align: justify;">
                    <i style="font-size: 8px">*Biaya MDR belum termasuk PPN 11%</i>
                </td>
            </tr>
            <tr>
                <td width="3%" style="vertical-align: top;  text-align: right;"></td>
                <td colspan="3" style="vertical-align: top;  text-align: justify;">
                    <i style="font-size: 8px">*<b style="font-size: 8px">Merchant</b> wajib untuk mengetahui dan
                        menyetujui seluruh biaya MDR yang terdapat pada layanan pembayaran non tunai Cashlez yang telah
                        aktif di <b style="font-size: 8px">Merchant</b>.</i>
                </td>
            </tr>
        </table>
        <table border="0" style="font-size:10px;" width="100%">
            <tr>
                <td colspan="3" style="vertical-align: top;">4. <b>Mesin EDC </b></td>
            </tr>
        </table>
        <table border="0" style="font-size:10px; padding-left:5px;" width="100%" cellspacing="0"
            cellpadding="0">
            <tr>
                <td width="3%" style="vertical-align: top;  text-align: right;">4.1.</td>
                <td colspan="3" style="vertical-align: top;  text-align: justify;">
                    Mesin EDC beserta kelengkapannya adalah milik <strong>Cashlez</strong> dimana
                    <strong>Cashlez</strong> akan menyediakan Mesin EDC
                    beserta
                    kelengkapannya dengan jumlah sesuai dengan kebutuhan dan permintaan dari <strong>Merchant</strong>
                    atas persetujuan
                    dari
                    <strong>Cashlez</strong> yang disampaikan secara tertulis dengan biaya-biaya sesuai kesepakatan
                    <strong>Para Pihak</strong>.
                </td>
            </tr>
            <tr>
                <td width="3%" style="vertical-align: top;  text-align: right;">4.2.</td>
                <td colspan="3" style="vertical-align: top;  text-align: justify;">
                    Mesin EDC wajib dikembalikan dalam kondisi layak pakai, atau ada penilaian ulang perihal harga Mesin
                    EDC
                    dan
                    <strong>Cashlez</strong> berhak untuk melakukan penilaian ulang terhadap harga Mesin EDC yang
                    dikembalikan oleh
                    <strong>Merchant</strong>,
                    mengikuti kelayakan dan kondisi Mesin EDC. Apabila Mesin EDC mengalami kerusakan/ hilang/ cacat
                    <strong>Merchant</strong>
                    wajib
                    membayar biaya ganti rugi sesuai dengan harga yang tertera pada Ayat 3.10.
                </td>
            </tr>
            <tr>
                <td width="3%" style="vertical-align: top;  text-align: right;">4.3.</td>
                <td colspan="3" style="vertical-align: top;  text-align: justify;">
                    Penempatan Mesin EDC pada <strong>Merchant</strong> wajib sesuai lokasi/alamat yang terdaftar pada
                    <strong>Cashlez</strong>
                </td>
            </tr>
            <tr>
                <td width="3%" style="vertical-align: top;  text-align: right;">4.4.</td>
                <td colspan="3" style="vertical-align: top;  text-align: justify;">
                    Masa garansi Mesin EDC adalah sesuai dengan periode masa penyewaan, <strong>Merchant</strong> wajib
                    menginformasikan
                    kepada
                    <strong>Cashlez</strong> mengenai rincian kerusakan dan <strong>Cashlez</strong> telah melakukan
                    pengecekan mengenai kerusakan yang
                    terjadi
                    namun disesuaikan dengan ketersediaan stok <strong>Cashlez</strong>. <strong>Cashlez</strong> wajib
                    menyediakan Mesin
                    EDC pengganti apabila mengalami kerusakan software dan/atau
                    kerusakan
                    pabrikasi yang dapat menyebabkan Mesin EDC tidak berfungsi dan/atau tidak dapat digunakan oleh
                    <strong>Merchant</strong>,
                    Pengajuan klaim garansi harus mengikuti ketentuan sebagai berikut:
                    <ol type="a" style="margin: 5px; padding-left: 15px; font-family: Dejavu Sans;">
                        <li align="justify">
                            Nomor seri pada Mesin EDC masih bisa terbaca dengan jelas.
                        </li>
                        <li align="justify">
                            Kondisi kelengkapan Mesin EDC harus lengkap (dus, kabel charger, mika box, dan adapter
                            charger).
                        </li>
                        <li align="justify">
                            Klaim garansi Mesin EDC hanya berlaku untuk 1 (satu) kali klaim.
                        </li>
                        <li align="justify">
                            Mesin EDC yang ingin diklaim harus dalam keadaan masih tersegel pada stiker segel.
                        </li>
                        <li align="justify">
                            Cashlez akan melakukan pengecekan terhadap Mesin EDC yang ingin diajukan klaim garansi oleh
                            Merchant.
                        </li>
                        <li align="justify">
                            Pergantian Mesin EDC disesuaikan dengan kondisi kerusakan dan telah melalui tahapan
                            pengecekan
                            di Cashlez.
                        </li>
                        <li align="justify">
                            Segala hasil pengecekan pada Cashlez bersifat mutlak dan Cashlez dibebaskan dari segala
                            bentuk
                            tanggung jawab dan kerugian.
                        </li>
                        <li align="justify">
                            SLA pengecekan Mesin EDC adalah 7 (tujuh) hari kerja terhitung dari Mesin EDC diterima oleh
                            Cashlez.
                        </li>
                    </ol>
                </td>
            </tr>
            <tr>
                <td width="3%" style="vertical-align: top;  text-align: right;">4.5.</td>
                <td colspan="3" style="vertical-align: top;  text-align: justify;">
                    Mesin EDC yang dikirimkan kepada <strong>Merchant</strong> telah melalui tahap pengecekan dan
                    testing transaksi.
                </td>
            </tr>
            <tr>
                <td width="3%" style="vertical-align: top;  text-align: right;">4.6.</td>
                <td colspan="3" style="vertical-align: top;  text-align: justify;">
                    Pengiriman dan/ atau pemasangan Mesin EDC akan dilakukan maksimal H+3 setelah Merchant lolos
                    verifikasi
                    bank, sudah melakukan pembayaran dana jaminan dimana dana sudah masuk ke rekening Cashlez.
                </td>
            </tr>
            <tr>
                <td width="3%" style="vertical-align: top;  text-align: right;">4.7.</td>
                <td colspan="3" style="vertical-align: top;  text-align: justify;">
                    Pengiriman mesin EDC dapat dilakukan oleh tim Sales Cashlez/ Vendor Ekspedisi/ Vendor pemasangan
                    yang
                    ditunjuk resmi oleh Cashlez.
                </td>
            </tr>
            <tr>
                <td width="3%" style="vertical-align: top;  text-align: right;">4.8.</td>
                <td colspan="3" style="vertical-align: top;  text-align: justify;">
                    Pengiriman Mesin EDC yang dilakukan melalui jasa Vendor Cashlez dan/ atau Vendor Ekspedisi akan
                    menyesuaikan dengan ketentuan pengiriman masing-masing jasa Vendor.
                </td>
            </tr>
            <tr>
                <td width="3%" style="vertical-align: top;  text-align: right;">4.9.</td>
                <td colspan="3" style="vertical-align: top;  text-align: justify;">
                    Nomor seri dan jumlah yang tertera adalah nomor seri yang diberikan kepada <strong>Merchant</strong>
                    pada saat awal
                    pengajuan
                    penyewaan Mesin EDC, nomor seri dan jumlah tersebut sewaktu-waktu dapat berubah disesuaikan dengan
                    kondisi
                    Mesin EDC dan/ atau permintaan penambahan Mesin EDC, apabila terjadi kendala pada Mesin EDC
                    dikemudian
                    hari
                    memungkinkan <strong>Cashlez</strong> melakukan pergantian Mesin EDC dan tidak dicantumkan kembali
                    pada perjanjian
                    ini,
                    namun
                    tetap mengikat pada perjanjian ini.
                </td>
            </tr>
            <tr>
                <td width="3%" style="vertical-align: top;  text-align: right;">4.10.</td>
                <td colspan="3" style="vertical-align: top;  text-align: justify;">
                    Penggunaan 1 (satu) Mesin EDC hanya diperbolehkan untuk 1 (satu) merchant sesuai dengan bidang usaha
                    merchant
                    yang didaftarkan kepada <strong>Cashlez</strong>.
                </td>
            </tr>
            <tr>
                <td width="3%" style="vertical-align: top;  text-align: right;">4.11.</td>
                <td colspan="3" style="vertical-align: top;  text-align: justify;">
                    Merchant wajib menanggung biaya-biaya yang timbul dalam pengiriman penyewaan dan klaim garansi Mesin
                    EDC.
                </td>
            </tr>
            <tr>
                <td width="3%" style="vertical-align: top;  text-align: right;">4.12.</td>
                <td colspan="3" style="vertical-align: top;  text-align: justify;">
                    Ketentuan biaya ganti rugi apabila terdapat kerusakan/ hilang/ cacat pada Perangkat maupun
                    kelengkapannya
                    sebagai berikut:
                    <table style="font-family: Dejavu Sans;">
                        <tr>
                            <td width="40%">
                                4.12.1.&nbsp;EDC
                            </td>
                            <td width="4%">
                                :
                            </td>
                            <td width="60%" style="vertical-align: top;">
                                Rp 4.440.000 (empat juta empat ratus empat puluh empat ribu Rupiah) per unit
                            </td>
                        </tr>
                        <tr>
                            <td width="40%">
                                4.12.2.&nbsp;Power Adapter
                            </td>
                            <td width="4%">
                                :
                            </td>
                            <td width="60%" style="vertical-align: top;">
                                Rp 136.400 (seratus tiga puluh enam ribu empat ratus Rupiah) per sparepart
                            </td>
                        </tr>
                        <tr>
                            <td width="40%">
                                4.12.3.&nbsp;USB Cable
                            </td>
                            <td width="4%">
                                :
                            </td>
                            <td width="60%" style="vertical-align: top;">
                                Rp 83.700 (delapan puluh tiga ribu tujuh ratus Rupiah) per sparepart
                            </td>
                        </tr>
                        <tr>
                            <td width="40%">
                                4.12.4.&nbsp;Box
                            </td>
                            <td width="4%">
                                :
                            </td>
                            <td width="60%" style="vertical-align: top;">
                                Rp 50.000 (lima puluh ribu Rupiah) per box
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <td width="3%" style="vertical-align: top;  text-align: right;"></td>
                <td colspan="3" style="vertical-align: top;  text-align: justify;">
                    <i>*Biaya kerusakan lainnya (apabila ada) yang kemungkinan akan timbul dikemudian hari akan
                        menyesuaikan dengan hasil
                        pengecekan yang dilakukan oleh <strong>Cashlez</strong>. </i>
                </td>
            </tr>
        </table>
        <table border="0" style="font-size:10px;" width="100%">
            <tr>
                <td colspan="3" style="vertical-align: top;">5. <b>Periode Penyewaan Mesin EDC </b></td>
            </tr>
        </table>
        <table border="0" style="font-size:10px; padding-left:5px;" width="100%" cellspacing="0"
            cellpadding="0">
            <tr>
                <td width="3%" style="vertical-align: top;  text-align: right;">5.1.</td>
                <td colspan="3" style="vertical-align: top;  text-align: justify;">
                    Jangka waktu penyewaan ini akan berlaku secara terus menerus sampai dengan adanya pengakhiran
                    kerjasama oleh salah satu
                    pihak
                </td>
            </tr>
        </table>
        <div style="height: 10px;"></div>
        <table border="0" style="font-size:10px;" width="100%">
            <tr>
                <td colspan="3" style="vertical-align: top;">
                    Form pengajuan penyewaan mesin EDC ini, beserta seluruh lampiran dan/ atau dokumen lainnya yang
                    timbul atas Kerjasama dengan
                    merchant adalah merupakan satu kesatuan dengan Perjanjian yang tertera pada formulir registrasi
                    merchant.
                </td>
            </tr>
            <tr>
                <td colspan="3" style="vertical-align: top;">
                    Dengan ditandatanganinya formulir ini, Merchant menyatakan telah mengerti dan menyetujui seluruh
                    ketentuan dan dengan ini
                    membebaskan Cashlez dari segala tuntutan dan kerugian yang timbul mengenai pelaksanaan penyewaan
                    ini.
                </td>
            </tr>
            <div style="height: 10px;"></div>
            <tr>
                <td width="50%" style="vertical-align: top; text-align: center;"><b>PT Cashlez Worldwide Indonesia
                        Tbk</b></td>
                <td width="5%" style="vertical-align: top;  text-align: center;"></td>
                <td width="50%" style="vertical-align: top;  text-align: center;"><b>Pemilik / Pejabat
                        Berwenang</b></td>
            </tr>
            <tr>
                <td width="50%" style="vertical-align: top;  text-align: center; height: 50px;"></td>
                <td width="5%" style="vertical-align: top;  text-align: center;"></td>
                <td width="50%" style="vertical-align: top;  text-align: center;">
                    <img src="{{ $signature }}" height="50px" alt="">
                </td>
            </tr>
            <tr>
                <td width="50%" style="vertical-align: top;  text-align: center;"><b>
                    <span style="padding-right: 200px"> ( </span> )
                    </b></td>
                <td width="5%" style="vertical-align: top;  text-align: center;"></td>
                <td width="50%" style="vertical-align: top;  text-align: center;"><b>(
                        {{ ucwords($data->nama_pemilik_merchant) }} )</b></td>
            </tr>
            <tr>
                <td width="50%" style="vertical-align: top;  text-align: center;"><b>Tanda tangan dan nama
                        jelas</b></td>
                <td width="5%" style="vertical-align: top;  text-align: center;"></td>
                <td width="50%" style="vertical-align: top;  text-align: center;"><b>Tanda tangan dan nama
                        jelas</b></td>
            </tr>
            {{-- <tr>
                <td width="45%" style="vertical-align: top; border-top: 1px solid black;"></td>
                <td width="10%" style="vertical-align: top;"></td>
                <td width="45%" style="vertical-align: top; border-top: 1px solid black;"></td>
            </tr> --}}
        </table>
    </div>
</body>

</html>
