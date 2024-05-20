<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Form Pengajuan EDC</title>
    <style>
        * {
            font-size: 12px;
            line-height: 1;
            font-family: Dejavu Sans;
        }
    </style>
</head>

<body>
    <table border="0" style="font-size:12px" width="100%">
        <tr>
            <td width="50%" style="vertical-align: middle; text-align: left;">FORMULIR PENYEWAAN MESIN EDC</td>
            <td width="50%" style="vertical-align: middle; text-align: right;">
                <img src="https://mob.cashlez.com/images/cashlez-dark.png" width="200px" alt="">
            </td>
        </tr>
    </table>
    <div style="height: 10px;"></div>
    <table border="0" style="font-size:12px;" width="100%">
        <tr>
            <td width="20%" style="vertical-align: top;"><strong>Nomor Formulir</strong></td>
            <td width="2%" style="vertical-align: top;">:</td>
            <td width="80%" style="vertical-align: top;"></td>
        </tr>
        <tr>
            <td colspan="3" style="vertical-align: top;">
                Formulir Penyewaan Mesin EDC dibuat dan ditandatangani di Jakarta, pada hari
                ________________, tanggal bulan tahun ________, oleh
                dan antara:
            </td>
        </tr>
        <div style="height: 10px;"></div>

        <tr>
            <td width="20%" style="vertical-align: top;">Nama Pemilik Usaha</td>
            <td width="2%" style="vertical-align: top;">:</td>
            <td width="80%" style="vertical-align: top;">{{ $data->nama_pemilik_merchant }}</td>
        </tr>
        <tr>
            <td width="20%" style="vertical-align: top;">Jabatan</td>
            <td width="2%" style="vertical-align: top;">:</td>
            <td width="80%" style="vertical-align: top;"></td>
        </tr>
        <tr>
            <td width="20%" style="vertical-align: top;">No. KTP</td>
            <td width="2%" style="vertical-align: top;">:</td>
            <td width="80%" style="vertical-align: top;">{{ $data->nomor_identitas }}</td>
        </tr>
        <tr>
            <td width="20%" style="vertical-align: top;">Nama Merchant</td>
            <td width="2%" style="vertical-align: top;">:</td>
            <td width="80%" style="vertical-align: top;">{{ ucwords($data->nama_merchant) }}</td>
        </tr>
        <tr>
            <td width="20%" style="vertical-align: top;">Alamat Merchant</td>
            <td width="2%" style="vertical-align: top;"></td>
            <td width="80%" style="vertical-align: top;">{{ ucwords($data->alamat_bisnis) }}</td>
        </tr>
        <tr>
            <td width="20%" style="vertical-align: top;">Tipe</td>
            <td width="2%" style="vertical-align: top;">:</td>
            <td width="80%" style="vertical-align: top;"></td>
        </tr>
        <tr>
            <td width="20%" style="vertical-align: top;">Jumlah</td>
            <td width="2%" style="vertical-align: top;">:</td>
            <td width="80%" style="vertical-align: top;"></td>
        </tr>
        <tr>
            <td width="20%" style="vertical-align: top;">Nomor Seri</td>
            <td width="2%" style="vertical-align: top;">:</td>
            <td width="80%" style="vertical-align: top;"></td>
        </tr>
        <tr>
            <td colspan="3" style="vertical-align: top;">
                <i>*Data yang dicantumkan diatas wajib sesuai dengan data merchant yang terdaftar pada Form Aplikasi
                    Pendaftaran Merchant Cashlez</i>
            </td>
        </tr>
        <tr>
            <td colspan="3" style="vertical-align: top;"><u><b>Syarat dan Ketentuan Penyewaan Mesin EDC</b></u></td>
        </tr>
        <tr>
            <td colspan="3" style="vertical-align: top;">1. <b>Skema Penyewaan Unit</b></td>
        </tr>
    </table>
    <div style="height: 10px;"></div>

    <table border="1" style="font-size:12px;" width="100%" cellspacing="0" cellpadding="0">
        <tr style="background-color: #addfff;">
            <th width="3%" style="vertical-align: middle; text-align: center; padding: 4px;">No</th>
            <th width="20%" style="vertical-align: middle; text-align: center; padding: 4px;">Tipe Perangkat</th>
            <th width="30%" style="vertical-align: middle; text-align: center; padding: 4px;">Tier Sales Volume <br>
                (Per unit per bulan)
            </th>
            <th width="20%" style="vertical-align: middle; text-align: center; padding: 4px;">Biaya Sewa br
                (Per unit per bulan)
            </th>
            <th width="20%" style="vertical-align: middle; text-align: center; padding: 4px;">Dana Jaminan (Per unit)
            </th>
        </tr>
        <tr>
            <td width="3%" style="vertical-align: top;  text-align: center; padding: 4px;">1</td>
            <td width="20%"
                style="vertical-align: top;  text-align: center; border-top: 1px solid black; padding: 4px;">All in One
            </td>
            <td width="30%" style="vertical-align: top;  text-align: center; padding: 4px;">
                < Rp 100.000.000</td>
            <td width="20%" style="vertical-align: top;  text-align: center; padding: 4px;">Rp 225.000</td>
            <td width="20%" style="vertical-align: middle;  text-align: center; padding: 4px;" rowspan="3">
                Rp750.000
            </td>
        </tr>
        <tr>
            <td width="3%" style="vertical-align: top;  text-align: center; padding: 4px;">2</td>
            <td width="20%" style="vertical-align: top;  text-align: center; padding: 4px;">C1/P1/P2/ Other</td>
            <td width="30%" style="vertical-align: top;  text-align: center; padding: 4px;">Rp 100.000.000
                s/d < Rp 200.000.000 </td>
            <td width="20%" style="vertical-align: top;  text-align: center; padding: 4px;">Rp 125.000 </td>
        </tr>
        <tr>
            <td width="3%" style="vertical-align: top;  text-align: center; padding: 4px;">3</td>
            <td width="20%" style="vertical-align: top;  text-align: center; padding: 4px;">Android
                Version
            </td>
            <td width="30%" style="vertical-align: top;  text-align: center; padding: 4px;">Rp 200.000.000
                s/d > Rp 200.000.000</td>
            <td width="20%" style="vertical-align: middle;  text-align: center; padding: 4px;">Free</td>
        </tr>
    </table>
    <table border="0" style="font-size:12px; padding-left: 20px; padding-top: 5px;" width="100%"
        cellspacing="0" cellpadding="0">
        <tr>
            <td width="6%" style="vertical-align: top;  text-align: left;">1.1</td>
            <td colspan="3" style="vertical-align: top;  text-align: justify;">
                Cashlez menyediakan Mesin EDC kepada Merchant dengan skema penyewaan dengan pembayaran dana jaminan
                dan perhitungan biaya sewa akan dihitung dari sales volume transaksi per Mesin EDC

            </td>
        </tr>
        <tr>
            <td width="6%" style="vertical-align: top;  text-align: left;">1.2</td>
            <td colspan="3" style="vertical-align: top;  text-align: justify;">
                Ketentuan penyewaan Mesin EDC dan perhitungan biaya sewa sesuai dengan Tier sales volume pada table 1
                diatas.
            </td>
        </tr>
        <tr>
            <td width="6%" style="vertical-align: top;  text-align: left;">1.3</td>
            <td colspan="3" style="vertical-align: top;  text-align: justify;">
                Merchant dapat melakukan penyewaan dengan Free biaya sewa, apabila Sales Volume atas transaksi yang
                terjadi
                setiap bulannya mencapai target Sales Volume yang disebutkan pada tabel 1 poin 3 di atas, tetapi apabila
                Merchant
                tidak mencapai Sales Volume tersebut, maka Merchant wajib membayar biaya sewa Mesin EDC yang sudah
                ditentukan pada tabel 1 poin 1 & 2 di atas, dan dengan demikian Merchant memberikan kuasa kepada Cashlez
                untuk
                melakukan pemotongan atas dana jaminan yang berjalan, apabila dana jaminan sudah habis terpotong atau
                tidak
                cukup untuk pemotongan dana jaminan, maka Merchant wajib membayarkan biaya sewa melalui transfer ke
                rekening
                Cashlez yang akan dikirimkan terpisah melalui email kepada Merchant.
            </td>
        </tr>
        <tr>
            <td width="3%" style="vertical-align: top;  text-align: left;">1.4</td>
            <td colspan="3" style="vertical-align: top;  text-align: justify;">
                Merchant wajib untuk membayar dana jaminan sebesar Rp 750,000 (tujuh ratus lima puluh ribu Rupiah) per
                Mesin
                EDC kepada Cashlez.
            </td>
        </tr>
        <tr>
            <td width="3%" style="vertical-align: top;  text-align: left;">1.5</td>
            <td colspan="3" style="vertical-align: top;  text-align: justify;">
                Dana jaminan yang akan dikenakan kepada Merchant adalah dana jaminan untuk antisipasi atas biaya sewa
                atau
                adanya biaya kerusakan atas pemakaian/ cacat/ hilang yang kemungkinan akan timbul dikemudian hari,
                pemotongan
                dana jaminan akan berlaku dengan kondisi sebagai berikut:
                <ol type="a" style="margin: 5px; padding-left: 15px; font-family: Dejavu Sans;">
                    <li align="justify">
                        Sales Volume atas transaksi berhasil Merchant tidak sesuai dengan kesepakatan sebagaimana
                        tercantum pada
                        tabel 1 di atas;
                    </li>
                    <li align="justify">
                        Adanya kerusakan atas pemakaian / cacat/ hilang selama masa penyewaan.
                    </li>
                </ol>
            </td>
        </tr>
        <tr>
            <td width="3%" style="vertical-align: top;  text-align: left;">1.6</td>
            <td colspan="3" style="vertical-align: top;  text-align: justify;">
                Merchant memberikan kuasa kepada Cashlez untuk melakukan pemotongan dana jaminan sebesar biaya-biaya
                yang
                timbul. Apabila dana jaminan tidak mencukupi dari biaya ganti rugi yang timbul, maka Cashlez berhak
                untuk
                melakukan pemotongan atas dana transaksi berhasil/ settlement yang berada di Cashlez sebesar biaya
                kerugian yang
                timbul, apabila dana jaminan dan dana settlement tidak mencukupi untuk biaya ganti rugi yang dimaksud,
                maka
                Merchant tetap wajib membayarkan sisa nilai kerugian dengan transfer ke rekening yang akan dikirimkan
                melalui
                email kepada Merchant.
            </td>
        </tr>
        <tr>
            <td width="3%" style="vertical-align: top;  text-align: left;">1.7</td>
            <td colspan="3" style="vertical-align: top;  text-align: justify;">
                Apabila dana jaminan sudah habis terpotong oleh biaya sewa karena sales volume transaksi tidak sesuai
                dengan
                kesepakatan dan Merchant masih tetap ingin menyewa Mesin EDC, maka Merchant wajib melakukan top up dana
                jaminan kembali kepada Cashlez sebesar dana yang tercantum pada ayat 2 di atas.
            </td>
        </tr>
        <tr>
            <td width="3%" style="vertical-align: top;  text-align: left;">1.8</td>
            <td colspan="3" style="vertical-align: top;  text-align: justify;">
                Pembayaran dana jaminan yaitu ke nomor rekening yang akan dikirimkan terpisah dari form ini, pengecekan
                pembayran dana jaminan adalah H+1 setelah transfer dilakukan, pengiriman dana jaminan wajib mencantumkan
                nama merchant.
            </td>
        </tr>
        <tr>
            <td width="3%" style="vertical-align: top;  text-align: left;">1.9</td>
            <td colspan="3" style="vertical-align: top;  text-align: justify;">
                Dana jaminan akan dikembalikan secara penuh apabila tidak ada pemotongan atas biaya sewa dan
                pengembalian
                Mesin EDC beserta kelengkapannya yang disewa dikembalikan kepada Cashlez dalam kondisi berfungsi dengan
                baik
                tidak ada kerusakan/ cacat/ hilang selama masa penyewaan.
            </td>
        </tr>
        <tr>
            <td width="3%" style="vertical-align: top;  text-align: left;">1.10</td>
            <td colspan="3" style="vertical-align: top;  text-align: justify;">
                Dana jaminan akan dikembalikan maksimal H+14 (hari kerja) setelah hasil pengecekan dilakukan oleh
                Cashlez.
            </td>
        </tr>
        <tr>
            <td width="3%" style="vertical-align: top;  text-align: left;">1.11</td>
            <td colspan="3" style="vertical-align: top;  text-align: justify;">
                Rekening Pengembalian dana jaminan: <br>
                Nama Pemilik Rekening &nbsp;: {{ ucwords($data->nama_pemilik_rekening_merchant_badan_usaha) }} <br>
                Nomor Rekening &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; : {{ $data->nomor_rekening_bank_penampung }} <br>
                Nama Bank /Cabang &nbsp; &nbsp; &nbsp; : {{ $data->nama_bank }}
            </td>
        </tr>
        <tr>
            <td width="3%" style="vertical-align: top;  text-align: left;">1.12</td>
            <td colspan="3" style="vertical-align: top;  text-align: justify;">
                Cashlez akan menerbitkan dokumen berupa Invoice atas tagihan biaya sewa apabila dana jaminan tidak
                tersedia
                ataupun tidak mencukupi untuk pembayaran biaya sewa yang timbul yaitu maksimal H+3 dari tanggal 15 (cut
                off
                perhitungan internal Cashlez).
            </td>
        </tr>
        <tr>
            <td width="3%" style="vertical-align: top;  text-align: left;">1.13</td>
            <td colspan="3" style="vertical-align: top;  text-align: justify;">
                Ketentuan pembayaran biaya sewa wajib dilakukan maksimal H+1 setelah Merchant menerima Invoice yang akan
                dikirimkan menggunakan soft copy melalui email oleh Tim Finance Cashlez.
            </td>
        </tr>
        <tr>
            <td width="3%" style="vertical-align: top;  text-align: left;">1.14</td>
            <td colspan="3" style="vertical-align: top;  text-align: justify;">
                Cashlez akan mengirimkan email pengingat pembayaran sewa apabila dalam jangka waktu yang ditentukan di
                atas
                belum ada pembayaran dari Merchant.
            </td>
        </tr>
        <tr>
            <td width="3%" style="vertical-align: top;  text-align: left;">1.15</td>
            <td colspan="3" style="vertical-align: top;  text-align: justify;">
                Merchant wajib membayar biaya sewa yang timbul sesuai dengan jangka waktu yang telah ditentukan.
            </td>
        </tr>
        <tr>
            <td width="3%" style="vertical-align: top;  text-align: left;">1.16</td>
            <td colspan="3" style="vertical-align: top;  text-align: justify;">
                Dalam hal tidak adanya pembayaran atas biaya sewa yang ditagihkan maka Merchant wajib untuk
                mengembalikan
                Mesin EDC yang disewa kepada Cashlez ke alamat kantor Cashlez/ Tim Sales Cashlez
            </td>
        </tr>
        <tr>
            <td width="3%" style="vertical-align: top;  text-align: left;">1.17</td>
            <td colspan="3" style="vertical-align: top;  text-align: justify;">
                Biaya sewa Mesin EDC yang tertera di atas belum termasuk pajak.
            </td>
        </tr>
        <tr>
            <td width="3%" style="vertical-align: top;  text-align: left;">1.18</td>
            <td colspan="3" style="vertical-align: top;  text-align: justify;">
                Penagihan biaya sewa akan tetap berjalan yang disesuaikan dengan berlakunya masa sewa antara Cashlez
                dengan Merchant.
            </td>
        </tr>
    </table>

    <table border="0" style="font-size:12px;" width="100%">
        <tr>
            <td colspan="3" style="vertical-align: top;">2. <b>Merchant Discout Rate (MDR)</b></td>
        </tr>
    </table>
    <table border="0" style="font-size:12px; padding-left: 20px; padding-top: 5px;" width="100%"
        cellspacing="0" cellpadding="0">
        <tr>
            <td colspan="4" style="vertical-align: top;  text-align: justify;">
                Biaya MDR (Merchant Discount Rate) akan dibebankan kepada Merchant atas transaksi yang dilakukan oleh
                Pelanggan
                terkait dengan transaksi yang dilakukan dengan mempergunakan produk dan layanan Cashlez, atas penggunaan
                layanan
                pembayaran Kartu Kredit dan/atau Kartu Debit maupun layanan pembayaran digital lainnya atas transaksi
                berhasil adalah
                sebagai berikut:
            </td>
        </tr>
        <tr>
            <td width="6%" style="vertical-align: top;  text-align: left;">2.1</td>
            <td colspan="3" style="vertical-align: top;  text-align: justify;">
                Credit Card On Us &nbsp; &nbsp; : ____________________
            </td>
        </tr>
        <tr>
            <td width="6%" style="vertical-align: top;  text-align: left;">2.2</td>
            <td colspan="3" style="vertical-align: top;  text-align: justify;">
                Credit Card Off Us &nbsp; &nbsp; : ____________________
            </td>
        </tr>
        <tr>
            <td width="6%" style="vertical-align: top;  text-align: left;"></td>
            <td colspan="3" style="vertical-align: top;  text-align: justify;">
                *Untuk MDR lengkap dapat di akses: https://www.cashlez.com/pricing.html
            </td>
        </tr>
        <tr>
            <td width="6%" style="vertical-align: top;  text-align: left;"></td>
            <td colspan="3" style="vertical-align: top;  text-align: justify;">
                *Biaya MDR belum termasuk PPN 11%
            </td>
        </tr>
    </table>
    <table border="0" style="font-size:12px;" width="100%">
        <tr>
            <td colspan="3" style="vertical-align: top;">3. <b>Mesin EDC </b></td>
        </tr>
    </table>
    <table border="0" style="font-size:12px; padding-left: 20px; padding-top: 5px;" width="100%"
        cellspacing="0" cellpadding="0">
        <tr>
            <td width="6%" style="vertical-align: top;  text-align: left;">3.1</td>
            <td colspan="3" style="vertical-align: top;  text-align: justify;">
                Mesin EDC beserta kelengkapannya adalah milik Cashlez dimana Cashlez akan menyediakan Mesin EDC beserta
                kelengkapannya dengan jumlah sesuai dengan kebutuhan dan permintaan dari Merchant atas persetujuan dari
                Cashlez yang disampaikan secara tertulis dengan biaya-biaya sesuai kesepakatan Para Pihak.
            </td>
        </tr>
        <tr>
            <td width="6%" style="vertical-align: top;  text-align: left;">3.2</td>
            <td colspan="3" style="vertical-align: top;  text-align: justify;">
                Mesin EDC wajib dikembalikan dalam kondisi layak pakai, atau ada penilaian ulang perihal harga Mesin EDC
                dan
                Cashlez berhak untuk melakukan penilaian ulang terhadap harga Mesin EDC yang dikembalikan oleh Merchant,
                mengikuti kelayakan dan kondisi Mesin EDC. Apabila Mesin EDC mengalami kerusakan/ hilang/ cacat Merchant
                wajib
                membayar biaya ganti rugi sesuai dengan harga yang tertera pada Ayat 3.10.
            </td>
        </tr>
        <tr>
            <td width="6%" style="vertical-align: top;  text-align: left;">3.3</td>
            <td colspan="3" style="vertical-align: top;  text-align: justify;">
                Penempatan Mesin EDC pada Merchant wajib sesuai lokasi/alamat yang terdaftar pada Cashlez
            </td>
        </tr>
        <tr>
            <td width="6%" style="vertical-align: top;  text-align: left;">3.4</td>
            <td colspan="3" style="vertical-align: top;  text-align: justify;">
                Masa garansi Mesin EDC adalah sesuai dengan periode masa penyewaan, Merchant wajib menginformasikan
                kepada
                Cashlez mengenai rincian kerusakan dan Cashlez telah melakukan pengecekan mengenai kerusakan yang
                terjadi
                namun disesuaikan dengan ketersediaan stok Cashlez.
            </td>
        </tr>
        <tr>
            <td width="6%" style="vertical-align: top;  text-align: left;">3.5</td>
            <td colspan="3" style="vertical-align: top;  text-align: justify;">
                Cashlez wajib menyediakan Mesin EDC pengganti apabila mengalami kerusakan software dan/atau kerusakan
                pabrikasi yang dapat menyebabkan Mesin EDC tidak berfungsi dan/atau tidak dapat digunakan oleh Merchant,
                Pengajuan klaim garansi harus mengikuti ketentuan sebagai berikut:
                <ol type="a" style="margin: 5px; padding-left: 15px; font-family: Dejavu Sans;">
                    <li align="justify">
                        Nomor seri pada Mesin EDC masih bisa terbaca dengan jelas.
                    </li>
                    <li align="justify">
                        Kondisi kelengkapan Mesin EDC harus lengkap (dus, kabel charger, mika box, dan adapter charger).
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
                        Pergantian Mesin EDC disesuaikan dengan kondisi kerusakan dan telah melalui tahapan pengecekan
                        di Cashlez.
                    </li>
                    <li align="justify">
                        Segala hasil pengecekan pada Cashlez bersifat mutlak dan Cashlez dibebaskan dari segala bentuk
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
            <td width="6%" style="vertical-align: top;  text-align: left;">3.6</td>
            <td colspan="3" style="vertical-align: top;  text-align: justify;">
                Mesin EDC yang dikirimkan kepada Merchant telah melalui tahap pengecekan dan testing transaksi.
            </td>
        </tr>
        <tr>
            <td width="6%" style="vertical-align: top;  text-align: left;">3.7</td>
            <td colspan="3" style="vertical-align: top;  text-align: justify;">
                Pengiriman dan/ atau pemasangan Mesin EDC akan dilakukan maksimal H+3 setelah Merchant lolos verifikasi
                bank, sudah melakukan pembayaran dana jaminan dimana dana sudah masuk ke rekening Cashlez.
            </td>
        </tr>
        <tr>
            <td width="6%" style="vertical-align: top;  text-align: left;">3.8</td>
            <td colspan="3" style="vertical-align: top;  text-align: justify;">
                Pengiriman mesin EDC dapat dilakukan oleh tim Sales Cashlez/ Vendor Ekspedisi/ Vendor pemasangan yang
                ditunjuk resmi oleh Cashlez.
            </td>
        </tr>
        <tr>
            <td width="6%" style="vertical-align: top;  text-align: left;">3.9</td>
            <td colspan="3" style="vertical-align: top;  text-align: justify;">
                Pengiriman Mesin EDC yang dilakukan melalui jasa Vendor Cashlez dan/ atau Vendor Ekspedisi akan
                menyesuaikan dengan ketentuan pengiriman masing-masing jasa Vendor.
            </td>
        </tr>
        <tr>
            <td width="6%" style="vertical-align: top;  text-align: left;">3.10</td>
            <td colspan="3" style="vertical-align: top;  text-align: justify;">
                Nomor seri dan jumlah yang tertera adalah nomor seri yang diberikan kepada Merchant pada saat awal
                pengajuan
                penyewaan Mesin EDC, nomor seri dan jumlah tersebut sewaktu-waktu dapat berubah disesuaikan dengan
                kondisi
                Mesin EDC dan/ atau permintaan penambahan Mesin EDC, apabila terjadi kendala pada Mesin EDC dikemudian
                hari
                memungkinkan Cashlez melakukan pergantian Mesin EDC dan tidak dicantumkan kembali pada perjanjian ini,
                namun
                tetap mengikat pada perjanjian ini.
            </td>
        </tr>
        <tr>
            <td width="6%" style="vertical-align: top;  text-align: left;">3.11</td>
            <td colspan="3" style="vertical-align: top;  text-align: justify;">
                Penggunaan 1 (satu) Mesin EDC hanya diperbolehkan untuk 1 (satu) merchant sesuai dengan bidang usaha merchant
                yang didaftarkan kepada Cashlez.
            </td>
        </tr>
        <tr>
            <td width="6%" style="vertical-align: top;  text-align: left;">3.1</td>
            <td colspan="3" style="vertical-align: top;  text-align: justify;">
                Merchant wajib menanggung biaya-biaya yang timbul dalam pengiriman penyewaan dan klaim garansi Mesin EDC.
            </td>
        </tr>
        <tr>
            <td width="6%" style="vertical-align: top;  text-align: left;">3.13</td>
            <td colspan="3" style="vertical-align: top;  text-align: justify;">
                Ketentuan biaya ganti rugi apabila terdapat kerusakan/ hilang/ cacat pada Perangkat maupun kelengkapannya
                sebagai berikut:
                <ol type="a" style="margin: 5px; padding-left: 15px; font-family: Dejavu Sans;">
                    <li align="justify">
                        P2/ Android &nbsp; &nbsp; : Rp 4.440.000 (empat juta empat ratus empat puluh empat ribu Rupiah) per perangkat
                    </li>
                    <li align="justify">
                        Power Adapter &nbsp; &nbsp;: Rp 136,400 (seratus tiga puluh enam ribu empat ratus Rupiah) per sparepart
                    </li>
                    <li align="justify">
                        USB Cable &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;: Rp 83.700 (delapan puluh tiga ribu tujuh ratus Rupiah) per sparepart
                    </li>
                    <li align="justify">
                        Box &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;: Rp 50.000 (lima puluh ribu Rupiah) per box
                    </li>
                </ol>
            </td>
        </tr>
        <tr>
            <td width="6%" style="vertical-align: top;  text-align: left;"></td>
            <td colspan="3" style="vertical-align: top;  text-align: justify; padding-left: 10px;">
                *Biaya kerusakan lainnya (apabila ada) yang kemungkinan akan timbul pada kemudian hari akan menyesuaikan dengan hasil pengecekan kerusakan yang timbul
            </td>
        </tr>
    </table>
    <table border="0" style="font-size:12px;" width="100%">
        <tr>
            <td colspan="3" style="vertical-align: top;">4. <b>Periode Penyewaan Mesin EDC </b></td>
        </tr>
    </table>
    <table border="0" style="font-size:12px; padding-left: 20px; padding-top: 5px;" width="100%"
        cellspacing="0" cellpadding="0">
        <tr>
            <td width="6%" style="vertical-align: top;  text-align: left;">4.1</td>
            <td colspan="3" style="vertical-align: top;  text-align: justify;">
                Jangka waktu penyewaan ini 1 (satu) tahun terhitung sejak ditandatanganinya formulir penyewaan mesin EDC
            </td>
        </tr>
        <tr>
            <td width="6%" style="vertical-align: top;  text-align: left;">4.2</td>
            <td colspan="3" style="vertical-align: top;  text-align: justify;">
                Jangka waktu penyewaan dapat diperpanjang berdasarkan kesepakatan dari Para Pihak yang harus dibuat paling
                lambat 30 (tiga puluh) hari kalender sebelum jangka waktu berakhir dengan syarat dan ketentuan yang akan
                didiskusikan dan disepakati kemudian oleh Para Pihak, apabila saat berakhirnya jangka waktu tidak dilakukan
                perpanjangan antara Para Pihak, maka pengajuan ini akan berakhir secara otomatis.
            </td>
        </tr>
    </table>
    <div style="height: 10px;"></div>
    <table border="0" style="font-size:12px;" width="100%">
        <tr>
            <td colspan="3" style="vertical-align: top;"><b>
                Form pengajuan penyewaan mesin EDC ini, beserta seluruh lampiran dan/ atau dokumen lainnya yang timbul atas Kerjasama
                dengan merchant adalah merupakan satu kesatuan dengan Perjanjian yang tertera pada formulir regsitrasi merchant.    
            </b></td>
        </tr>
        <tr>
            <td colspan="3" style="vertical-align: top;"><b>
                Dengan ditandatanganinya formulir ini, Merchant menyatakan telah mengerti dan menyetujui seluruh ketentuan dan dengan ini
                membebaskan Cashlez dari segala tuntutan dan kerugian yang timbul mengenai pelaksanaan penyewaan ini.  
            </b></td>
        </tr>
        <div style="height: 10px;"></div>
        <tr>
            <td width="50%" style="vertical-align: top; text-align: center;"><b>PT Cashlez Worldwide Indonesia Tbk</b></td>
            <td width="5%" style="vertical-align: top;  text-align: center;"></td>
            <td width="50%" style="vertical-align: top;  text-align: center;"><b>Pemilik / Pejabat Berwenang</b></td>
        </tr>
        <tr>
            <td width="50%" style="vertical-align: top;  text-align: center; height: 50px;"></td>
            <td width="5%" style="vertical-align: top;  text-align: center;"></td>
            <td width="50%" style="vertical-align: top;  text-align: center;">
                <img src="{{ $signature }}" height="50px" alt="">
            </td>
        </tr>
        <tr>
            <td width="50%" style="vertical-align: top;  text-align: center;"><b>( &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; )</b></td>
            <td width="5%" style="vertical-align: top;  text-align: center;"></td>
            <td width="50%" style="vertical-align: top;  text-align: center;"><b>( {{ ucwords($data->nama_pemilik_merchant) }} )</b></td>
        </tr>
        <tr>
            <td width="50%" style="vertical-align: top;  text-align: center;"><b>Tanda tangan dan nama jelas</b></td>
            <td width="5%" style="vertical-align: top;  text-align: center;"></td>
            <td width="50%" style="vertical-align: top;  text-align: center;"><b>Tanda tangan dan nama jelas</b></td>
        </tr>
        <tr>
            <td width="45%" style="vertical-align: top; border-top: 1px solid black;"></td>
            <td width="10%" style="vertical-align: top;"></td>
            <td width="45%" style="vertical-align: top; border-top: 1px solid black;"></td>
        </tr>
    </table>
</body>

</html>
