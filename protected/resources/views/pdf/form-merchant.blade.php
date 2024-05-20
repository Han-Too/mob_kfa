<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Form Pengajuan Merchant</title>
    <style>
        * {
            font-size: 12px;
            font-family: Dejavu Sans;
        }

        .content {
            page-break-before: always;
        }
    </style>
</head>

<body>
    <h1 style="text-align: center; font-size: 14px;">FORM PENGAJUAN MERCHANT {{ strtoupper($data->nama_merchant ?? '') }}
    </h1>
    <table border="0" style="font-size:12px;" width="100%">
        <tr>
            <td colspan="2"><strong>Data Merchant</strong></td>
            <td width="20%">Nomor Registrasi</td>
            <td width="30%">__________________________</td>
        </tr>
        <tr>
            <td colspan="4" style="border-bottom: 1px solid gray; padding: 2px 0;"></td>
        </tr>

        <div style="height: 7px;"></div>
        <tr>
            <td width="25%" style="vertical-align: top;">Nama Merchant</td>
            <td colspan="3" style="vertical-align: top;">{{ $data->nama_merchant }}</td>
        </tr>
        <tr>
            <td width="25%" style="vertical-align: top;">Pengajuan Sebagai</td>
            <td width="33%" style="vertical-align: top;">{{ $data->pengajuan_sebagai }}</td>
            <td width="20%" style="vertical-align: top;">Jenis Usaha</td>
            <td width="30%" style="vertical-align: top;">{{ $data->jenis_usaha }}</td>
        </tr>
        <tr>
            <td width="25%" style="vertical-align: top;">Fitur Pembayaran</td>
            <td colspan="3" style="vertical-align: top;">{{ $data->fitur_transaksi }}</td>>
        </tr>
        <tr>
            <td width="25%" style="vertical-align: top;">Email Usaha</td>
            <td width="33%" style="vertical-align: top;">{{ $data->bisnis_email }}</td>
            <td width="20%" style="vertical-align: top;">No Telepon Usaha</td>
            <td width="30%" style="vertical-align: top;">{{ $data->bisnis_no_hp }}</td>
        </tr>
        <tr>
            <td width="25%" style="vertical-align: top;">Alamat Usaha</td>
            <td colspan="3" style="vertical-align: top;">{{ ucwords($data->alamat_bisnis) }}</td>
        </tr>
        <tr>
            <td width="25%" style="vertical-align: top;">Tempat Usaha</td>
            <td width="33%" style="vertical-align: top;">{{ $data->tempat_bisnis }}</td>
            <td width="20%" style="vertical-align: top;">Store URL</td>
            <td width="30%" style="vertical-align: top;">{{ $data->store_url }}</td>
        </tr>
        <tr>
            <td width="25%" style="vertical-align: top;">Status Tempat Usaha</td>
            <td width="33%" style="vertical-align: top;">{{ $data->status_tempat_usaha }}</td>
            <td width="20%" style="vertical-align: top;">Kategori Usaha</td>
            <td width="30%" style="vertical-align: top;">{{ $data->mcc }}</td>
        </tr>
        @if ($data->pengajuan_sebagai == 'Badan Usaha')
            <tr>
                <td width="25%" style="vertical-align: top;">NPWP Badan Usaha</td>
                <td colspan="3" style="vertical-align: top;">{{ $data->npwp_merchant_badan_usaha }}</td>
            </tr>
        @endif

        <tr>
            <td colspan="4"><strong>Data Pemilik Usaha</strong></td>
        </tr>
        <tr>
            <td colspan="4" style="border-bottom: 1px solid gray; padding: 2px 0;"></td>
        </tr>

        <div style="height: 10px;"></div>
        <tr>
            <td width="25%" style="vertical-align: top;">Nama Pemilik Merchant</td>
            <td colspan="3" style="vertical-align: top;">
                {{ $data->nama_pemilik_merchant }} &nbsp; &nbsp; &nbsp;
                Tempat, Tanggal Lahir &nbsp;
                {{ $data->tempat_lahir . ', ' . \Carbon\Carbon::parse($data->tanggal_lahir)->isoFormat('DD MMMM YYYY') }}
            </td>
        </tr>
        <tr>
            <td width="25%" style="vertical-align: top;">Alamat Sesuai KTP</td>
            <td colspan="3" style="vertical-align: top;">{{ ucwords($data->alamat_sesuai_ktp) }}</td>
        </tr>
        <tr>
            <td width="25%" style="vertical-align: top;">Alamat Domisili</td>
            <td colspan="3" style="vertical-align: top;">{{ ucwords($data->alamat_domisili) }}</td>
        </tr>
        <tr>
            <td width="25%" style="vertical-align: top;">Kewarganegaraan</td>
            <td width="33%" style="vertical-align: top;">{{ $data->kewarganegaraan }}</td>
            <td width="20%" style="vertical-align: top;">Email</td>
            <td width="30%" style="vertical-align: top;">{{ $data->email }}</td>
        </tr>
        <tr>
            <td width="25%" style="vertical-align: top;">Nomor Identitas</td>
            <td width="33%" style="vertical-align: top;">{{ $data->nomor_identitas }}</td>
            <td width="20%" style="vertical-align: top;">Nomor Handphone</td>
            <td width="30%" style="vertical-align: top;">{{ $data->nomor_hp }}</td>
        </tr>
        <tr>
            <td width="25%" style="vertical-align: top;">NPWP</td>
            <td colspan="3" style="vertical-align: top;">{{ $data->npwp }}</td>>
        </tr>

        <tr>
            <td colspan="4"><strong>Data Pengurus Merchant (PIC)</strong></td>
        </tr>
        <tr>
            <td colspan="4" style="border-bottom: 1px solid gray; padding: 2px 0;"></td>
        </tr>

        <div style="height: 10px;"></div>
        <tr>
            <td width="27%" style="vertical-align: top;">Nama Pengurus Merchant</td>
            <td colspan="3" style="vertical-align: top;">{{ $data->nama_pengurus_merchant }}</td>>
        </tr>
        <tr>
            <td width="25%" style="vertical-align: top;">Kewarganegaraan</td>
            <td width="33%" style="vertical-align: top;">{{ $data->kewarganegaraan_pengurus }}</td>
            <td width="20%" style="vertical-align: top;">Email</td>
            <td width="30%" style="vertical-align: top;">{{ $data->email_pengurus }}</td>
        </tr>
        <tr>
            <td width="25%" style="vertical-align: top;">Nomor Identitas</td>
            <td width="33%" style="vertical-align: top;">{{ $data->nomor_identitas_pengurus }}</td>
            <td width="20%" style="vertical-align: top;">Nomor Handphone</td>
            <td width="30%" style="vertical-align: top;">{{ $data->nomor_hp_pengurus }}</td>
        </tr>
        {{-- <tr>
            <td width="25%" style="vertical-align: top;">NPWP</td>
            <td colspan="3" style="vertical-align: top;">{{ $data->npwp }}</td>>
        </tr> --}}

        <tr>
            <td colspan="4"><strong>Data Bank</strong></td>
        </tr>
        <tr>
            <td colspan="4" style="border-bottom: 1px solid gray; padding: 2px 0;"></td>
        </tr>

        <div style="height: 10px;"></div>
        <tr>
            <td colspan="2" style="vertical-align: top;">Nama Bank</td>
            <td colspan="2" style="vertical-align: top;">{{ $data->nama_bank }}</td>
        </tr>
        <tr>
            <td colspan="2" style="vertical-align: top;">Nomor Rekening Bank Penampung</td>
            <td colspan="2" style="vertical-align: top;">{{ $data->nomor_rekening_bank_penampung }}</td>
        </tr>
        <tr>
            <td colspan="2" style="vertical-align: top;">Nama Pemilik Rekening Merchant / Badan Usaha</td>
            <td colspan="2" style="vertical-align: top;">{{ $data->nama_pemilik_rekening_merchant_badan_usaha }}
            </td>
        </tr>
        <tr>
            <td colspan="2" style="vertical-align: top;">Email Settlement</td>
            <td colspan="2" style="vertical-align: top;">{{ $data->email_settlement }}</td>
        </tr>
        <div style="height: 5px;"></div>
        <tr>
            <td colspan="4"
                style="vertical-align: top; border: 1px solid gray; border-radius: 10px; padding: 5px 10px; text-align: justify; font-size: 11px;````">
                Pemilik/Pejabat Berwenang Merchant Perorangan/Badan Usaha secara sadar telah membaca, mengerti dan
                bertanggung jawab sepenuhnya atas kebenaran dan kesahihan data dan/atau
                dokumen lainnya yang diserahkan Cashlez dan membebaskan Cashlez dari segala klaim atau gugatan atau
                tuntutan hukum dalam bentuk apapun dan dari pihak mana pun
                termasuk dari Pemilik/Pejabat Berwenang Merchant Perorangan/Badan Usaha sehubungan dengan pengisian dan
                pemberian Formulir Aplikasi Merchant Baru dan Data/Dokumen Merchant Lainnya.
            </td>
        </tr>
        <div style="height: 5px;"></div>
        <tr>
            <td colspan="2" style="vertical-align: top; text-align: center;">Hari: ____________________</td>
            <td colspan="2" style="vertical-align: top; text-align: center;">Tanggal: ____/________/__________</td>
        </tr>
        <tr>
            <td colspan="2" style="vertical-align: top; text-align: center;">PT Cashlez Worlwide Indonesia Tbk</td>
            <td colspan="2" style="vertical-align: top; text-align: center;">Pemilik / Pejabat Berwenang
            </td>
        </tr>
        <tr>
            <td colspan="2" style="vertical-align: top; height: 50px;"></td>
            <td colspan="2" style="vertical-align: top; text-align: center;">
                <img src="{{ $signature }}" height="50px"
                        alt="">
            </td>
        </tr>
        <tr>
            <td colspan="2" style="vertical-align: top; text-align: center;"> ( _______________________________ )
            </td>
            <td colspan="2" style="vertical-align: top; text-align: center;">(
                {{ ucwords($data->nama_pemilik_merchant) }} )</td>
        </tr>
        <tr>
            <td colspan="2" style="vertical-align: top; text-align: center;">Nama Lengkap & Tanda Tangan</td>
            <td colspan="2" style="vertical-align: top; text-align: center;">Nama Lengkap & Tanda Tangan</td>
        </tr>
    </table>

    <div style="height:auto; page-break-before: always"></div>
    <h1 style="text-align: center; font-size: 14px; margin: 0;">PERJANJIAN KERJASAMA CASHLEZ DAN MERCHANT
    </h1>

    <div style="height: 15px;"></div>
    <div style="float:left; width: 100%; vertical-align: top; text-align: justify; font-size: 8px; line-height: 1;">
        Bahwa CASHLEZ dan MERCHANT yang bertanda tangan di bawah ini, secara bersama-sama disebut Sebagai "Para
        Pihak" dan masing-masing disebut "Pihak", menjelaskan sebagai berikut:
        <ol type="1" style="margin: 5px; padding-left: 15px; font-size: 8px; font-family: Dejavu Sans;">
            <li align="justify" style="font-size: 8px;">
                CASHLEZ adalah suatu perseroan terbuka yang didirikan berdasarkan hukum Negara Republik Indonesia yang
                bergerak dalam bidang kegiatan jasa Pelayanan Sistem Pembayaran Elektronik
            </li>
            <li align="justify" style="font-size: 8px;">
                MERCHANT adalah suatu perusahaan dan/atau perorangan yang telah tunduk, patuh, dan bertanda tangan
                kepada syarat dan ketentuan Perjanjian ini.
            </li>
            <li align="justify" style="font-size: 8px;">
                MERCHANT bermaksud bekerjasama dengan CASHLEZ, untuk memberikan pelayanan bertransaksi melalui Sistem
                Pembayaran Elektronik non tunai kepada Pelanggan untuk bertransaksi menggunakan Kartu Kredit, Kartu
                Debit, Qris, maupun Transaksi pembayaran Elektronik non-tunai lainnya.
            </li>
        </ol>
    </div>
    <div style="clear:both"></div>

    <div style="float:left; width: 350px; padding-right: 5px;">
        <table border="0" width="100%" cellspacing="0" style="line-height: 1; margin: 0; padding: 0;">

            {{-- pasal 1 --}}
            <tr>
                <td colspan="4" style="font-size: 8px; line-height: 1; vertical-align: top; text-align: justify;">

                    <strong
                        style="font-size: 8px; line-height: 1; vertical-align: top; text-align: justify; padding: 0; margin: 0;">PASAL
                        1.RUANG LINGKUP PERJANJIAN</strong>
                </td>
            </tr>
            <tr>
                <td width="1%" style="font-size: 8px; line-height: 1; vertical-align: top;">1.
                </td>
                <td colspan="3" style="font-size: 8px; line-height: 1; vertical-align: top; text-align: justify;">
                    Para Pihak sepakat untuk mengadakan kerjasama dalam bidang jasa penerimaan pembayaran
                    menggunakan Sistem Pembayaran Elektronik Non-tunai Cashlez dan layanan aplikasi mPOS Cashlez.
                </td>
            </tr>
            <tr>
                <td width="1%" style="font-size: 8px; line-height: 1; vertical-align: top;">2.
                </td>
                <td colspan="3" style="font-size: 8px; line-height: 1; vertical-align: top; text-align: justify;">
                    Cashlez akan meneruskan dana-dana atas transaksi non-tunai berhasil/settlement ke rekening Merchant
                    dalam jangka waktu paling lambat 3 (tiga) hari kerja atau selambat-lambatnya ketika dana sudah
                    diterima
                    dari partner bank ke rekening Cashlez untuk antisipasi pembayaran tertunda dari Partner Bank/NonBank
                    setelah
                    transaksi dilakukan dan/atau terjadi kendala pada sistem Cashlez, sedangkan untuk
                    transaksi berhasil yang tidak melalui rekening penampungan Cashlez, melainkan diproses langsung oleh
                    Partner Bank/Non-Bank, akan mengikuti ketentuan pembayaran settlement dari masing-masing Partner
                    Bank/Non-Bank ke rekening Merchant yang terdaftar pada Cashlez;
                </td>
            </tr>
            <tr>
                <td width="1%" style="font-size: 8px; line-height: 1; vertical-align: top;">3.
                </td>
                <td colspan="3" style="font-size: 8px; line-height: 1; vertical-align: top; text-align: justify;">
                    Cashlez dengan ini akan melakukan pembayaran kepada Merchant atas transaksi berhasil Merchant
                    yang telah dilakukan settlement dengan terlebih dahulu dikurangi dengan biaya transaksi sebagaimana
                    diatur pada PASAL 3.
                </td>
            </tr>
            <tr>
                <td width="1%" style="font-size: 8px; line-height: 1; vertical-align: top;">4.
                </td>
                <td colspan="3" style="font-size: 8px; line-height: 1; vertical-align: top; text-align: justify;">
                    <p
                        style="font-size: 8px; line-height: 1; vertical-align: top; text-align: justify; padding: 0; margin: 0;">
                        <strong
                            style="font-size: 8px; line-height: 1; vertical-align: top; text-align: justify; padding: 0; margin: 0;">Layanan
                            Cashlez mPOS</strong>
                    </p>
                    Fitur kasir mobile yang dapat digunakan untuk seluruh jenis usaha Merchant yang didalamnya terdapat
                    2 (dua) tampilan simple mode dan cashier mode
                </td>
            </tr>
            <tr>
                <td width="1%" style="font-size: 8px; line-height: 1; vertical-align: top;">5.
                </td>
                <td colspan="3" style="font-size: 8px; line-height: 1; vertical-align: top; text-align: justify;">
                    <p
                        style="font-size: 8px; line-height: 1; vertical-align: top; text-align: justify; padding: 0; margin: 0;">
                        <strong
                            style="font-size: 8px; line-height: 1; vertical-align: top; text-align: justify; padding: 0; margin: 0;">Layanan
                            Pembayaran</strong>
                    </p>
                    Menerima berbagai macam metode pembayaran non-tunai (multi method) baik dengan cara gesek, Insert
                    Card, Contactless, serta QR Payment.
                </td>
            </tr>
            <tr>
                <td width="1%" style="font-size: 8px; line-height: 1; vertical-align: top;">6.
                </td>
                <td colspan="3" style="font-size: 8px; line-height: 1; vertical-align: top; text-align: justify;">
                    <p
                        style="font-size: 8px; line-height: 1; vertical-align: top; text-align: justify; padding: 0; margin: 0;">
                        <strong
                            style="font-size: 8px; line-height: 1; vertical-align: top; text-align: justify; padding: 0; margin: 0;">Layanan
                            back-office</strong>
                    </p>
                    Untuk melakukan monitor seluruh Transaksi yang terjadi secara real time termasuk namun tidak
                    terbatas
                    pada tanggal, waktu transaksi, status berhasil/ gagal, maupun untuk melihat pencatatan transaksi
                    tunai.
                </td>
            </tr>
            <tr>
                <td width="1%" style="font-size: 8px; line-height: 1; vertical-align: top;">7.
                </td>
                <td colspan="3" style="font-size: 8px; line-height: 1; vertical-align: top; text-align: justify;">
                    <p
                        style="font-size: 8px; line-height: 1; vertical-align: top; text-align: justify; padding: 0; margin: 0;">
                        <strong
                            style="font-size: 8px; line-height: 1; vertical-align: top; text-align: justify; padding: 0; margin: 0;">Layanan
                            Cashlez Reader/ Mesin EDC</strong>
                    </p>
                    Alat untuk menerima pembayaran non-tunai
                    menggunakan
                    Kartu
                    Kredit/Kartu Debit
                </td>
            </tr>
            <tr>
                <td width="1%" style="font-size: 8px; line-height: 1; vertical-align: top;">8.
                </td>
                <td colspan="3" style="font-size: 8px; line-height: 1; vertical-align: top; text-align: justify;">
                    <p
                        style="font-size: 8px; line-height: 1; vertical-align: top; text-align: justify; padding: 0; margin: 0;">
                        <strong
                            style="font-size: 8px; line-height: 1; vertical-align: top; text-align: justify; padding: 0; margin: 0;">Merchant
                            wajib melakukan proses pendaftaran sebagai berikut:</strong>
                    </p>
                    <ol type="a"
                        style="margin: 0; font-size: 8px; line-height: 1; vertical-align: top; text-align: justify; padding-left: 12px; ">
                        <li align="justify"
                            style="font-size: 8px; line-height: 1; vertical-align: top; text-align: justify; margin: 0;">
                            Merchant perorangan mengisi data seperti nama, nomor telepon, e-mail, nomor Kartu Tanda
                            Penduduk
                            (KTP) dan data lainnya
                        </li>
                        <li align="justify"
                            style="font-size: 8px; line-height: 1; vertical-align: top; text-align: justify; margin: 0;">
                            Merchant perusahaan mengisi data seperti nama, nomor telepon, e-mail, Akta Perusahaan, Nomor
                            Induk Berusaha (NIB) dan data legalitas lainnya
                        </li>
                        <li align="justify"
                            style="font-size: 8px; line-height: 1; vertical-align: top; text-align: justify; margin: 0;">
                            Merchant mengunggah Scan / Screenshot / Capture bukti identitas diri seperti KTP/ Nomor
                            Pajak
                            Wajib
                            Pajak (NPWP) / Foto Selfie dan data lainnya yang dibutuhkan untuk kelengkapan dokumen
                            persyaratan
                            pendaftaran.
                        </li>

                        <li align="justify"
                            style="font-size: 8px; line-height: 1; vertical-align: top; text-align: justify; margin: 0;">
                            Merchant telah membaca dan memahami Syarat dan Ketentuan pendaftaran dan ketentuan
                            pembayaran layanan non-tunai.
                        </li>

                        <li align="justify"
                            style="font-size: 8px; line-height: 1; vertical-align: top; text-align: justify; margin: 0;">
                            Proses pendaftaran merchant dapat dilakukan melalui situs website Cashlez/ Mobile aplikasi
                            Cashlez/
                            formulir registrasi manual
                        </li>

                        <li align="justify"
                            style="font-size: 8px; line-height: 1; vertical-align: top; text-align: justify; margin: 0;">
                            SLA Pendaftaran registrasi merchant adalah sesuai dengan jangka waktu proses dari
                            masing-masing
                            Bank/ Pihak Penyedia Jasa Pembayaran non Tunai lainnya
                        </li>
                    </ol>
                </td>
            </tr>
            <div style="height: 5px;"></div>

            {{-- pasal 2 --}}
            <tr>
                <td colspan="4" style="font-size: 8px; line-height: 1; vertical-align: top; text-align: justify;">
                    <strong
                        style="font-size: 8px; line-height: 1; vertical-align: top; text-align: justify; padding: 0; margin: 0;">PASAL
                        2. PENGHENTIAN SEMENTARA ATAU SELAMANYA LAYANAN SISTEM PEMBAYARAN ELEKTONIK CASHLEZ</strong>

                </td>
            </tr>
            <tr>
                <td width="1%" style="font-size: 8px; line-height: 1; vertical-align: top;">1.
                </td>
                <td colspan="3" style="font-size: 8px; line-height: 1; vertical-align: top; text-align: justify;">
                    Cashlez setiap saat dapat menghentikan layanan mPOS dan Sistem Pembayaran Elektronik non-tunai,
                    untuk sementara waktu dan/atau selamanya dengan terlebih dahulu memberitahukan kepada Merchant
                    selambat-lambatnya 5 (lima) hari kalender dan kerugian yang timbul akibat penghentian tersebut
                    bukanlah tanggung jawab Cashlez .
                </td>
            </tr>
            <tr>
                <td width="1%" style="font-size: 8px; line-height: 1; vertical-align: top;">2.
                </td>
                <td colspan="3" style="font-size: 8px; line-height: 1; vertical-align: top; text-align: justify;">
                    Penghentian sebagaimana dimaksud dalam Pasal 2 ayat 1 di atas termasuk namun tidak terbatas
                    disebabkan karena alasan-alasan sebagai berikut :
                    <ol type="a"
                        style="margin: 0; font-size: 8px; line-height: 1; vertical-align: top; text-align: justify; padding-left: 12px; ">
                        <li align="justify"
                            style="font-size: 8px; line-height: 1; vertical-align: top; text-align: justify; margin: 0;">
                            Karena inspeksi, perbaikan, pemeliharaan atau peningkatan sistem Cashlez
                        </li>
                        <li align="justify"
                            style="font-size: 8px; line-height: 1; vertical-align: top; text-align: justify; margin: 0;">
                            Karena kegagalan komputer dan/atau handphone dan/atau sambungan telekomunikasi internet dari
                            alat komunikasi Merchant
                        </li>
                        <li align="justify"
                            style="font-size: 8px; line-height: 1; vertical-align: top; text-align: justify; margin: 0;">
                            Karena adanya alasan tertentu berupa melindungi hak-hak dan/atau kepentingan Cashlez,
                            Pemilik Kartu, para Merchant serta hak-hak pihak Penyedia Jasa Pembayaran Lain
                        </li>

                        <li align="justify"
                            style="font-size: 8px; line-height: 1; vertical-align: top; text-align: justify; margin: 0;">
                            Karena adanya Aktivitas transaksi yang dilarang yang dilakukan oleh Merchant sesuai PASAL 8
                            berdasarkan hasil verifikasi dan investigasi internal Cashlez dan/atau BANK dan/atau Pihak
                            Penyedia Jasa Pembayaran lain
                        </li>
                    </ol>
                </td>
            </tr>
            <tr>
                <td width="1%" style="font-size: 8px; line-height: 1; vertical-align: top;">3.
                </td>
                <td colspan="3" style="font-size: 8px; line-height: 1; vertical-align: top; text-align: justify;">
                    Cashlez berhak melakukan penangguhan pembayaran dana transaksi dan penutupan akses Merchant dengan
                    jangka waktu tidak terbatas apabila terjadi transaksi sesuai dengan PASAL 6 dan/ atau Merchant
                    terindikasi dan/atau terbukti Melakukan penyalahgunaan transaksi
                </td>
            </tr>
            <tr>
                <td width="1%" style="font-size: 8px; line-height: 1; vertical-align: top;">4.
                </td>
                <td colspan="3" style="font-size: 8px; line-height: 1; vertical-align: top; text-align: justify;">
                    Cashlez berhak melakukan penangguhan/pemblokiran akses transaksi Merchant apabila Merchant
                    terindikasi melakukan penyalahgunaan transaksi yang dilarang menurut Perjanjian ini dan/atau
                    peraturan perundang-undangan yang berlaku
                </td>
            </tr>
            <div style="height: 5px;"></div>

            {{-- pasal 3 --}}
            <tr>
                <td colspan="4" style="font-size: 8px; line-height: 1; vertical-align: top; text-align: justify;">
                    <strong
                        style="font-size: 8px; line-height: 1; vertical-align: top; text-align: justify; padding: 0; margin: 0;">PASAL
                        3. BIAYA-BIAYA</strong>

                </td>
            </tr>
            <tr>
                <td width="1%" style="font-size: 8px; line-height: 1; vertical-align: top;">1.
                </td>
                <td colspan="3" style="font-size: 8px; line-height: 1; vertical-align: top; text-align: justify;">
                    Biaya MDR (Merchant Discout Rate) untuk Penggunaan Kartu Kredit dan/atau Kartu Debit maupun layanan
                    pembayaran non tunai lainnya atas transaksi berhasil dapat dilihat pada website resmi Cashlez:
                    https://www.cashlez.com/pricing.html
                </td>
            </tr>
            <tr>
                <td width="1%" style="font-size: 8px; line-height: 1; vertical-align: top;">2.
                </td>
                <td colspan="3" style="font-size: 8px; line-height: 1; vertical-align: top; text-align: justify;">
                    Atas transaksi penerimaan kartu kredit dan kartu debit maupun uang elektronik lainnya, Merchant
                    paham dan setuju untuk dibebankan biaya MDR per transaksi yang berhasil/ settled, Atas transaksi
                    yang sudah dilakukan settlement dan Merchant setuju untuk dibebankan biaya per pengiriman dana
                    dan/atau kliring dana apabila bank/ nomor rekening settlement yang didaftrakan berbeda dengan bank/
                    rekening transfer dari Cashlez.
                </td>
            </tr>
            <tr>
                <td width="1%" style="font-size: 8px; line-height: 1; vertical-align: top;">3.
                </td>
                <td colspan="3" style="font-size: 8px; line-height: 1; vertical-align: top; text-align: justify;">
                    Proses pengiriman dana/ kliring atas transaksi berhasil berlaku sesuai ketentuan undang-undang yang
                    berlaku melalui Sistem Kliring Nasional Bank Indonesia (SKNBI).
                </td>
            </tr>
            <tr>
                <td width="1%" style="font-size: 8px; line-height: 1; vertical-align: top;">4.
                </td>
                <td colspan="3" style="font-size: 8px; line-height: 1; vertical-align: top; text-align: justify;">
                    Cashlez berhak sewaktu-waktu melakukan perubahan nilai biaya MDR apabila disuatu waktu tertentu
                    terdapat perubahan kebijakan dari internal Cashlez, Bank ataupun penyedia layanan pembayaran non
                    tunai lainnya
                </td>
            </tr>
        </table>
    </div>
    <div style="float:left; width: 350px; padding-left: 5px;">
        <table border="0" width="100%" cellspacing="0" style="line-height: 1; margin: 0; padding: 0;">
            <tr>
                <td width="1%" style="font-size: 8px; line-height: 1; vertical-align: top;">5.
                </td>
                <td colspan="3" style="font-size: 8px; line-height: 1; vertical-align: top; text-align: justify;">
                    Biaya Pembelian/ biaya sewa perangkat akan dituangkan terpisah pada perjanjian ini
                </td>
            </tr>
            <tr>
                <td width="1%" style="font-size: 8px; line-height: 1; vertical-align: top;">6.
                </td>
                <td colspan="3" style="font-size: 8px; line-height: 1; vertical-align: top; text-align: justify;">
                    Biaya pengiriman Perangkat Cashlez ke Merchant akan disesuaikan dengan biaya pengiriman ekspedisi
                    dan akan menjadi tanggung jawab Merchant
                </td>
            </tr>
            <tr>
                <td width="1%" style="font-size: 8px; line-height: 1; vertical-align: top;">7.
                </td>
                <td colspan="3" style="font-size: 8px; line-height: 1; vertical-align: top; text-align: justify;">
                    Pajak-pajak sehubungan dengan Perjanjian ini akan ditanggung oleh masing-masing Pihak sesuai dengan
                    peraturan perundang-undangan di bidang perpajakan yang berlaku
                </td>
            </tr>
            <div style="height: 5px;"></div>

            {{-- pasal 4 --}}
            <tr>
                <td colspan="4" style="font-size: 8px; line-height: 1; vertical-align: top; text-align: justify;">

                    <strong
                        style="font-size: 8px; line-height: 1; vertical-align: top; text-align: justify; padding: 0; margin: 0;">PASAL
                        4. JANGKA WAKTU</strong>
                </td>
            </tr>
            <tr>
                <td width="1%" style="font-size: 8px; line-height: 1; vertical-align: top;">1.
                </td>
                <td colspan="3" style="font-size: 8px; line-height: 1; vertical-align: top; text-align: justify;">
                    Perjanjian ini mulai berlaku sejak tanggal ditandatanganinya dan mengikat Para Pihak untuk jangka
                    waktu 1 (satu) tahun, dan dianggap telah diperpanjang secara otomatis untuk waktu yang sama, kecuali
                    diakhiri oleh salah satu Pihak menurut ketentuan ayat (2) Pasal ini.
                </td>
            </tr>
            <tr>
                <td width="1%" style="font-size: 8px; line-height: 1; vertical-align: top;">2.
                </td>
                <td colspan="3" style="font-size: 8px; line-height: 1; vertical-align: top; text-align: justify;">
                    Pengakhiran Perjanjian secara sepihak harus dilakukan secara tertulis paling lambat dalam 30 (tiga
                    puluh) hari kalender sebelum berakhirnya Perjanjian, kecuali terjadi pelanggaran/ adanya indikasi
                    “fraud” pada Merchant ataupun transaksi sebagaimana disebutkan dalam PASAL 6 dan PASAL 8 sehingga
                    Perjanjian dapat diakhiri sewaktu-waktu.
                </td>
            </tr>

            <div style="height: 5px;"></div>

            {{-- pasal 5 --}}
            <tr>
                <td colspan="4" style="font-size: 8px; line-height: 1; vertical-align: top; text-align: justify;">

                    <strong
                        style="font-size: 8px; line-height: 1; vertical-align: top; text-align: justify; padding: 0; margin: 0;">PASAL
                        5. PENGAKHIRAN PERJANJIAN</strong>
                </td>
            </tr>
            <tr>
                <td width="1%" style="font-size: 8px; line-height: 1; vertical-align: top;">1.
                </td>
                <td colspan="3" style="font-size: 8px; line-height: 1; vertical-align: top; text-align: justify;">
                    Perjanjian dapat diakhiri dan/atau dibatalkan dengan alasan :
                    <ol type="a"
                        style="margin: 0; font-size: 8px; line-height: 1; vertical-align: top; text-align: justify; padding-left: 12px; ">
                        <li align="justify"
                            style="font-size: 8px; line-height: 1; vertical-align: top; text-align: justify; margin: 0;">
                            Merchant tetap melakukan transaksi yang dilarang oleh Cashlez setelah Merchant mendapatkan
                            maksimal 1 (satu) kali peringatan tertulis dari Cashlez.
                        </li>
                        <li align="justify"
                            style="font-size: 8px; line-height: 1; vertical-align: top; text-align: justify; margin: 0;">
                            Merchant melakukan peretasan dan/atau pemindahtanganan dan/atau perusakan dengan sengaja
                            terhadap Perangkat dan/atau Sistem Aplikasi POS/ Layanan Pembayaran Elektronik non-tunai
                            Cashlez untuk tujuan tertentu yang tidak diperkenankan oleh Cashlez.
                        </li>
                        <li align="justify"
                            style="font-size: 8px; line-height: 1; vertical-align: top; text-align: justify; margin: 0;">
                            Apabila dikemudian hari, Cashlez menemukan fakta bahwa terdapat adanya tindakan pemalsuan
                            identitas Pemilik Merchant dan/atau identitas Merchant dan/atau keterangan dan/atau
                            pernyataan Merchant tidak sesuai dengan keadaan sebenarnya maka Cashlez berhak sewaktu-waktu
                            membatalkan hubungan kerjasama dan melakukan penghentian akses transaksi Merchant dan
                            penghentian penggunaan Perangkat serta penahanan dana transaksi (apabila ada) tidak
                            dibayarkan oleh Cashlez kepada Merchant dengan jangka waktu tidak terbatas dan Cashlez akan
                            menyerahkan hal ini kepada Pihak Berwajib sesuai dengan peraturan perundang-undangan yang
                            berlaku di Indonesia.
                        </li>
                    </ol>
                </td>
            </tr>
            <div style="height: 5px;"></div>

            {{-- pasal 6 --}}
            <tr>
                <td colspan="4" style="font-size: 8px; line-height: 1; vertical-align: top; text-align: justify;">

                    <strong
                        style="font-size: 8px; line-height: 1; vertical-align: top; text-align: justify; padding: 0; margin: 0;">PASAL
                        6. CHARGEBACK/REFUND/SANGGAHAN TRANSAKSI</strong>
                </td>
            </tr>
            <tr>
                <td width="1%" style="font-size: 8px; line-height: 1; vertical-align: top;">1.
                </td>
                <td colspan="3" style="font-size: 8px; line-height: 1; vertical-align: top; text-align: justify;">
                    Chargeback adalah penagihan kembali atas pembayaran yang telah dilakukan oleh Cashlez kepada
                    Merchant.
                </td>
            </tr>
            <tr>
                <td width="1%" style="font-size: 8px; line-height: 1; vertical-align: top;">2.
                </td>
                <td colspan="3" style="font-size: 8px; line-height: 1; vertical-align: top; text-align: justify;">
                    Refund adalah pengembalian pembayaran oleh Cashlez kepada Merchant atas pembatalan transaksi mPOS
                </td>
            </tr>
            <tr>
                <td width="1%" style="font-size: 8px; line-height: 1; vertical-align: top;">3.
                </td>
                <td colspan="3" style="font-size: 8px; line-height: 1; vertical-align: top; text-align: justify;">
                    Sanggahan transaksi adalah transaksi yang telah berhasil terjadi pada sistem Cashlez dan tidak
                    diakui/disetujui oleh Pemegang Kartu atau Bank Penerbit Kartu atau Bank Pemroses Transaksi.
                </td>
            </tr>
            <tr>
                <td width="1%" style="font-size: 8px; line-height: 1; vertical-align: top;">4.
                </td>
                <td colspan="3" style="font-size: 8px; line-height: 1; vertical-align: top; text-align: justify;">
                    Jangka waktu proses klarifikasi Merchant adalah 3 (tiga) hari kerja setelah informasi sanggahan
                    diterima oleh Merchant melalui Cashlez.
                </td>
            </tr>
            <tr>
                <td width="1%" style="font-size: 8px; line-height: 1; vertical-align: top;">5.
                </td>
                <td colspan="3" style="font-size: 8px; line-height: 1; vertical-align: top; text-align: justify;">
                    Jika terjadi sanggahan dengan kondisi dana sudah transfer ke Merchant maka Merchant wajib
                    membayarkan besarnya nilai sanggahan secara penuh dalam kurun waktu paling lambat 7 (tujuh) hari
                    kerja setelah informasi sanggahan diterima.
                </td>
            </tr>
            <tr>
                <td width="1%" style="font-size: 8px; line-height: 1; vertical-align: top;">6.
                </td>
                <td colspan="3" style="font-size: 8px; line-height: 1; vertical-align: top; text-align: justify;">
                    Jika terjadi sanggahan dengan kondisi dana belum di transfer ke Merchant maka Cashlez tidak akan
                    melakukan transfer dana tersebut kepada Merchant dengan nominal sejumlah sanggahan dan/atau
                    pendebetan dari Pihak Bank dalam jangka waktu 120 (seratus dua puluh) hari kerja terhitung dari
                    informasi sanggahan yang Cashlez terima untuk mengantisipasi terjadinya sanggahan
                    transaksi/pendebetan dana dari Pihak Bank kepada Cashlez dihari berikutnya. Apabila lebih dari 120
                    (seratus dua puluh) hari masih terjadi sanggahan oleh pelanggan maka Cashlez akan melanjutkan untuk
                    tidak melakukan transfer dana tersebut kepada Merchant dalam jangka waktu 540 (lima ratus empat
                    puluh) hari. Apabila Pihak Bank tidak melakukan pendebetan dana setelah jangka waktu tersebut di
                    atas maka Cashlez akan melakukan transfer dana senilai dana sanggahan yang ada pada Cashlez kepada
                    Merchant.
                </td>
            </tr>
            <tr>
                <td width="1%" style="font-size: 8px; line-height: 1; vertical-align: top;">7.
                </td>
                <td colspan="3" style="font-size: 8px; line-height: 1; vertical-align: top; text-align: justify;">
                    Pembayaran atas denda ataupun chargeback ditransfer ke rekening PT Cashlez Worldwide Indonesia Tbk
                    dimana informasi data rekeningnya akan disampaikan terpisah pada dokumen Invoice.
                </td>
            </tr>
            <tr>
                <td width="1%" style="font-size: 8px; line-height: 1; vertical-align: top;">8.
                </td>
                <td colspan="3" style="font-size: 8px; line-height: 1; vertical-align: top; text-align: justify;">
                    Cashlez dibebaskan dari tanggung jawab atas kerugian yang diderita oleh Merchant apabila terjadi
                    transaksi yang diduga maupun telah melanggar peraturan perundang-undangan yang berlaku di Indonesia
                    serta melakukan aktivitas transaksi yang dilarang sesuai Pasal 8 perjanjian ini.
                </td>
            </tr>
            <tr>
                <td width="1%" style="font-size: 8px; line-height: 1; vertical-align: top;">9.
                </td>
                <td colspan="3" style="font-size: 8px; line-height: 1; vertical-align: top; text-align: justify;">
                    Cashlez berhak untuk menutup layanan pada akun Pengguna apabila terjadi Chargeback yang melebihi
                    batasan waktu yang diatur oleh Bank atau keputusan internal berdasarkan regulasi dan pengecekan
                    internal Cashlez.
                </td>
            </tr>
            <tr>
                <td width="1%" style="font-size: 8px; line-height: 1; vertical-align: top;">10.
                </td>
                <td colspan="3" style="font-size: 8px; line-height: 1; vertical-align: top; text-align: justify;">
                    Apabila terdapat Chargeback, maka:
                    <ol type="a"
                        style="margin: 0; font-size: 8px; line-height: 1; vertical-align: top; text-align: justify; padding-left: 12px; ">
                        <li align="justify"
                            style="font-size: 8px; line-height: 1; vertical-align: top; text-align: justify; margin: 0;">
                            Merchant wajib untuk memiliki Invoice pelanggan;
                        </li>
                        <li align="justify"
                            style="font-size: 8px; line-height: 1; vertical-align: top; text-align: justify; margin: 0;">
                            Merchant wajib untuk melampirkan dokumen transaksi dan kelengkapan dokumen lainnya yang
                            diminta oleh Cashlez/ Bank/ Penyedia layanan pembayaran digital lainnya
                        </li>
                        <li align="justify"
                            style="font-size: 8px; line-height: 1; vertical-align: top; text-align: justify; margin: 0;">
                            Merchant wajib untuk melampirkan surat jalan atas transaksi penjualannya.
                        </li>
                    </ol>
                </td>
            </tr>
        </table>
    </div>
    <div style="clear:both"></div>
    <div style="float:left; width: 350px; padding-right: 5px;">
        <table border="0" width="100%" cellspacing="0" style="line-height: 1; margin: 0; padding: 0;">
            <tr>
                <td width="1%" style="font-size: 8px; line-height: 1; vertical-align: top;">11.
                </td>
                <td colspan="3" style="font-size: 8px; line-height: 1; vertical-align: top; text-align: justify;">
                    Segala denda yang dibebankan oleh Bank maupun lembaga penyedia jasa sistem pembayaran lainnya
                    sehubungan dengan dilampauinya batas toleransi Chargeback oleh Pihak Bank dan/atau ketentuan lembaga
                    jasa sistem pembayaran lainnya terkait dengan Chargeback, wajib ditanggung oleh Merchant. Dengan ini
                    Cashlez diberikan kuasa penuh untuk memotong langsung dana milik Merchant dari tagihan transaksi
                    yang seharusnya diterima oleh Merchant untuk keperluan pembayaran denda yang dimaksud.
                </td>
            </tr>
            <tr>
                <td width="1%" style="font-size: 8px; line-height: 1; vertical-align: top;">12.
                </td>
                <td colspan="3" style="font-size: 8px; line-height: 1; vertical-align: top; text-align: justify;">
                    Apabila terjadi Chargeback oleh Pelanggan yang dikarenakan oleh penipuan atau ketidakpuasan
                    Pelanggan, maka Merchant memiliki tanggung jawab penuh atas Chargeback tersebut dan bersedia untuk
                    membayar kerugian tersebut serta melepaskan Cashlez dari tanggung jawab atas Chargeback tersebut.
                </td>
            </tr>
            <tr>
                <td width="1%" style="font-size: 8px; line-height: 1; vertical-align: top;">13.
                </td>
                <td colspan="3" style="font-size: 8px; line-height: 1; vertical-align: top; text-align: justify;">
                    Merchant wajib bekerja sama dengan Cashlez melakukan komunikasi dalam menangani proses chargeback
                    yang diinformasikan oleh pelanggan kepada Cashlez melalui Bank dan/atau refund yang dimintakan oleh
                    Bank melalui Cashlez kepada Merchant sampai dengan permasalahan tersebut dinyatakan selesai.
                </td>
            </tr>
            <tr>
                <td width="1%" style="font-size: 8px; line-height: 1; vertical-align: top;">14.
                </td>
                <td colspan="3" style="font-size: 8px; line-height: 1; vertical-align: top; text-align: justify;">
                    Jika permasalahan yang dimaksud di atas tidak selesai maka Merchant wajib menanggung biaya kerugian
                    yang timbul atas Sanggahan Transaksi dan/atau Chargeback dan/atau refund dari Pihak Bank dengan
                    memberikan kuasa kepada Cashlez untuk melakukan pemotongan dana yang dimiliki Merchant untuk
                    melakukan pembayaran sebesar nominal sanggahan transaksi dan/atau chargeback dan/atau refund.
                </td>
            </tr>
            <tr>
                <td width="1%" style="font-size: 8px; line-height: 1; vertical-align: top;">15.
                </td>
                <td colspan="3" style="font-size: 8px; line-height: 1; vertical-align: top; text-align: justify;">
                    Jika dana Merchant tidak mencukupi maka Merchant wajib untuk melakukan transfer pembayaran kepada
                    Cashlez sebesar nominal yang disanggah.
                </td>
            </tr>
            <tr>
                <td width="1%" style="font-size: 8px; line-height: 1; vertical-align: top;">16.
                </td>
                <td colspan="3" style="font-size: 8px; line-height: 1; vertical-align: top; text-align: justify;">
                    Apabila Merchant ingin membatalkan transaksi (Refund) dimana dana yang sudah di transfer ke rekening
                    Merchant, maka wajib untuk mengirimkan bukti dan dokumen pendukung sebagai berikut:
                    <ol type="a"
                        style="margin: 0; font-size: 8px; line-height: 1; vertical-align: top; text-align: justify; padding-left: 12px; ">
                        <li align="justify"
                            style="font-size: 8px; line-height: 1; vertical-align: top; text-align: justify; margin: 0;">
                            Surat permohonan pembatalan transaksi;
                        </li>
                        <li align="justify"
                            style="font-size: 8px; line-height: 1; vertical-align: top; text-align: justify; margin: 0;">
                            Invoice/ bukti transaksi pelanggan; dan
                        </li>
                        <li align="justify"
                            style="font-size: 8px; line-height: 1; vertical-align: top; text-align: justify; margin: 0;">
                            Bukti transfer pengembalian dana (Refund).
                        </li>
                    </ol>
                </td>
            </tr>
            <tr>
                <td width="1%" style="font-size: 8px; line-height: 1; vertical-align: top;">17.
                </td>
                <td colspan="3" style="font-size: 8px; line-height: 1; vertical-align: top; text-align: justify;">
                    Proses Pengajuan Refund maksimal 7 (tujuh) hari kerja sejak tanggal transaksi terjadi dan akan
                    dibayarkan apabila proses pengecekan Para Pihak selesai dan disepakati oleh Para Pihak.
                </td>
            </tr>
            <tr>
                <td width="1%" style="font-size: 8px; line-height: 1; vertical-align: top;">18.
                </td>
                <td colspan="3" style="font-size: 8px; line-height: 1; vertical-align: top; text-align: justify;">
                    Cashlez tidak akan melakukan proses pengembalian dana (Refund) dimana Merchant melakukan proses
                    pengembalian dana kepada Pelanggan dalam bentuk cash/ tunai dan tidak ada dokumen pendukung atas
                    pengembalian dana secara cash dan Cashlez dibebaskan dari segala kerugian yang akan timbul.
                </td>
            </tr>
            <tr>
                <td width="1%" style="font-size: 8px; line-height: 1; vertical-align: top;">19.
                </td>
                <td colspan="3" style="font-size: 8px; line-height: 1; vertical-align: top; text-align: justify;">
                    Seluruh bukti dokumentasi transaksi yang dikirimkan kepada Cashlez dalam hal pemenuhan bukti
                    transaksi indikasi Chargeback atau Refund sesuai dengan Bidang usaha yang didaftarkan kepada
                    Cashlez, apabila terdapat perbedaan, maka Merchant wajib bertanggung jawab atas seluruh transaksi
                    dan kerugian yang terjadi, dan membebaskan Cashlez dari segala tuntutan maupun gugatan yang akan
                    kemungkinan akan timbul pada kemudian hari.
                </td>
            </tr>
            <tr>
                <td width="1%" style="font-size: 8px; line-height: 1; vertical-align: top;">20.
                </td>
                <td colspan="3" style="font-size: 8px; line-height: 1; vertical-align: top; text-align: justify;">
                    Seluruh proses Chargeback/ refund akan dilakukan dari Cashlez ke Bank Pemroses transaksi (Acquiring
                    Bank) dan/ atau Penyedia layanan pembayaran (non-Bank) yang bekerjasama dengan Cashlez untuk
                    selanjutnya diproses ke masing-masing pengguna melalui Bank Penerbit Kartu maupun Penyedia Penerbit
                    Layanan Pembayaran non-tunai sesuai dengan SLA dan ketentuan yang berlaku pada masing-masing Bank/
                    Partner non Bank.
                </td>
            </tr>

            <div style="height: 5px;"></div>

            {{-- pasal 7 --}}
            <tr>
                <td colspan="4" style="font-size: 8px; line-height: 1; vertical-align: top; text-align: justify;">
                    <strong
                        style="font-size: 8px; line-height: 1; vertical-align: top; text-align: justify; padding: 0; margin: 0;">PASAL
                        7. KERAHASIAAN & KEBIJAKAN PRIVASI</strong>

                </td>
            </tr>

            <tr>
                <td width="1%" style="font-size: 8px; line-height: 1; vertical-align: top;">1.
                </td>
                <td colspan="3" style="font-size: 8px; line-height: 1; vertical-align: top; text-align: justify;">
                    Masing-masing Pihak sepakat untuk saling menjaga kerahasiaan informasi/data/dokumen dari pihak
                    lainnya diluar kepentingan penjanjian ini sekalipun para pihak sudah tidak berkerjasama lagi kecuali
                    ada permintaan dari pihak Bank dan/atau Penyedia Jasa Pembayaran lain.
                </td>
            </tr>
            <tr>
                <td width="1%" style="font-size: 8px; line-height: 1; vertical-align: top;">2.
                </td>
                <td colspan="3" style="font-size: 8px; line-height: 1; vertical-align: top; text-align: justify;">
                    Para Pihak dilarang membocorkan informasi rahasia terkait dengan kerjasama antara dan Merchant
                    kepada pihak mana pun, kecuali dipersyaratkan lain oleh peraturan perundang-undangan.
                </td>
            </tr>
            <tr>
                <td width="1%" style="font-size: 8px; line-height: 1; vertical-align: top;">3.
                </td>
                <td colspan="3" style="font-size: 8px; line-height: 1; vertical-align: top; text-align: justify;">
                    Data nasabah dan/atau data Pelanggan akan diperlukan oleh Cashlez dan Merchant dengan kerahasiaan
                    secara ketat dan Para Pihak tunduk pada peraturan perundang-undangan yang berlaku sehubungan dengan
                    perlindungan konsumen dan perlindungan data pribadi.
                </td>
            </tr>
            <tr>
                <td width="1%" style="font-size: 8px; line-height: 1; vertical-align: top;">4.
                </td>
                <td colspan="3" style="font-size: 8px; line-height: 1; vertical-align: top; text-align: justify;">
                    Cashlez akan mengumpulkan seluruh data, informasi, dan/atau keterangan dalam bentuk apapun yang
                    mengidentifikasi Merchant, yang dari waktu ke waktu Merchant sampaikan kepada Cashlez atau yang
                    Merchant cantumkan atau sampaikan dalam, pada, dan/atau melalui seluruh layanan Cashlez yang
                    menyangkut informasi mengenai pribadi Merchant, yang mencakup, tetapi tidak terbatas pada; nama
                    lengkap, jenis kelamin, kewarganegaraan, agama, status perkawinan, dan/atau Data Pribadi yang
                    dikombinasikan untuk mengidentifikasi seseorang, dan data lainnya yang tergolong sebagai Data
                    Pribadi berdasarkan Undang – Undang No. 27 Tahun 2022 tentang Perlindungan Data Pribadi (“UU PDP”),
                    selengkapnya tertuang pada dokumen Kebijakan Privasi dan dapat diakses pada
                    https://www.cashlez.com/privacy
                </td>
            </tr>

            <div style="height: 5px;"></div>

            {{-- pasal 7 --}}
            <tr>
                <td colspan="4" style="font-size: 8px; line-height: 1; vertical-align: top; text-align: justify;">
                    <strong
                        style="font-size: 8px; line-height: 1; vertical-align: top; text-align: justify; padding: 0; margin: 0;">PASAL
                        8. KEWAJIBAN TRANSAKSI & LARANGAN TRANSAKSI</strong>

                </td>
            </tr>
            <tr>
                <td width="1%" style="font-size: 8px; line-height: 1; vertical-align: top;">1.
                </td>
                <td colspan="3" style="font-size: 8px; line-height: 1; vertical-align: top; text-align: justify;">
                    Segala bentuk Transaksi tarik tunai (gesek tunai) dan Double Swipe menggunakan Kartu Kredit, baik
                    milik sendiri maupun milik pihak lain dengan alasan apapun, berdasarkan Peraturan Bank Indonesia No.
                    11/11/PBI/2009 tentang Penyelenggaraan Kegiatan Alat Pembayaran Menggunakan Kartu (APMK).
                </td>
            </tr>
            <tr>
                <td width="1%" style="font-size: 8px; line-height: 1; vertical-align: top;">2.
                </td>
                <td colspan="3" style="font-size: 8px; line-height: 1; vertical-align: top; text-align: justify;">
                    Merchant dilarang memberikan tambahan nilai Transaksi (Surcharge) kepada Pelanggan Berdasarkan
                    Peraturan Bank Indonesia No. 23/6/PBI/2021 Pasal 52 ayat (1) tentang Penyedia Jasa Pembayaran (PBI
                    PJP) dan Surat Edaran Bank Indonesia No. 25/365/DSSK/Srt/B tanggal 8 Agustus 2023 tentang Pengenaan
                    Biaya Tambahan (Surcharge) Kepada Pengguna Barang dan/atau Jasa.
                </td>
            </tr>
            <tr>
                <td width="1%" style="font-size: 8px; line-height: 1; vertical-align: top;">3.
                </td>
                <td colspan="3" style="font-size: 8px; line-height: 1; vertical-align: top; text-align: justify;">
                    Segala bentuk transaksi pencucian uang dengan alasan apapun berdasarkan Peraturan Tindak Pidana
                    Pencucian Uang menurut Undang-Undang No. 8 Tahun 2010 tentang Pencegahan dan Pemberantasan Tindak
                    Pidana Pencucian Uang dengan Pidana penjara paling lama 20 (dua puluh) tahun dan denda paling banyak
                    Rp. 10.000.000.000 (sepuluh miliar Rupiah).
                </td>
            </tr>
            <tr>
                <td width="1%" style="font-size: 8px; line-height: 1; vertical-align: top;">4.
                </td>
                <td colspan="3" style="font-size: 8px; line-height: 1; vertical-align: top; text-align: justify;">
                    Merchant dilarang melakukan tindakan Anti Pencucian Uang dan Pembiayaan Pendanaan Terorisme
                    (APU-PPT)
                    sesuai Peraturan Bank Indonesia No. 19/10/PBI/2017 dengan sanksi berupa teguran tertulis namun tidak
                    terbatas pada penghentian kerjasama sesuai dengan ketentuan yang berlaku.

                </td>
            </tr>
            <tr>
                <td width="1%" style="font-size: 8px; line-height: 1; vertical-align: top;">5.
                </td>
                <td colspan="3" style="font-size: 8px; line-height: 1; vertical-align: top; text-align: justify;">
                    Merchant dilarang menjual barang dan/atau jasa yang melanggar hukum dan/atau Peraturan
                    Perundang-undangan yang berlaku di Indonesia terkait pada transaksi yang menyangkut tentang
                    Pembiayaan Teroris, Narkotika, Pencucian Uang, Penipuan, Perjudian, Pemalsuan, Pornografi dan
                    Senjata Api.
                </td>
            </tr>
        </table>
    </div>
    <div style="float:left; width: 350px; padding-left: 5px;">
        <table border="0" width="100%" cellspacing="0" style="line-height: 1; margin: 0; padding: 0;">
            <tr>
                <td width="1%" style="font-size: 8px; line-height: 1; vertical-align: top;">6.
                </td>
                <td colspan="3" style="font-size: 8px; line-height: 1; vertical-align: top; text-align: justify;">
                    Merchant dilarang melakukan Transaksi penukaran Mata Uang, Jual Beli saham / Reksadana, Jual Beli
                    Mata Uang Digital, Pembiayaan Simpan Pinjam, Pembiayaan Dana Talangan, dan/atau hal lainnya yang
                    dilarang oleh Bank dengan menggunakan Kartu Kredit.
                </td>
            </tr>
            <tr>
                <td width="1%" style="font-size: 8px; line-height: 1; vertical-align: top;">7.
                </td>
                <td colspan="3" style="font-size: 8px; line-height: 1; vertical-align: top; text-align: justify;">
                    Merchant dilarang mengaku dan/atau bertindak seolah-olah sebagai Bank dan/atau Penyedia Jasa
                    Pembayaran lainnya dan/atau sebagai perwakilan dari Cashlez.
                </td>
            </tr>
            <tr>
                <td width="1%" style="font-size: 8px; line-height: 1; vertical-align: top;">8.
                </td>
                <td colspan="3" style="font-size: 8px; line-height: 1; vertical-align: top; text-align: justify;">
                    Merchant dilarang mendokumentasikan dan/atau menyimpan data kartu Pelanggan atau data Transaksi
                    elektronik Pelanggan lainnya untuk kepentingan apapun.
                </td>
            </tr>
            <tr>
                <td width="1%" style="font-size: 8px; line-height: 1; vertical-align: top;">9.
                </td>
                <td colspan="3" style="font-size: 8px; line-height: 1; vertical-align: top; text-align: justify;">
                    Merchant dilarang melakukan penyalahgunaan sistem mPOS Cashlez baik secara sengaja maupun tidak
                    sengaja.
                </td>
            </tr>
            <tr>
                <td width="1%" style="font-size: 8px; line-height: 1; vertical-align: top;">10.
                </td>
                <td colspan="3" style="font-size: 8px; line-height: 1; vertical-align: top; text-align: justify;">
                    Merchant dilarang melakukan pembagian nilai transaksi (split transaksi) baik menggunakan kartu
                    maupun uang elektronik.
                </td>
            </tr>
            <tr>
                <td width="1%" style="font-size: 8px; line-height: 1; vertical-align: top;">11.
                </td>
                <td colspan="3" style="font-size: 8px; line-height: 1; vertical-align: top; text-align: justify;">
                    Merchant dilarang menerima transaksi kartu maupun transaksi uang elektronik lainnya dari pihak yang
                    bukan Pemilik Kartu maupun transaksi titipan.
                </td>
            </tr>
            <tr>
                <td width="1%" style="font-size: 8px; line-height: 1; vertical-align: top;">12.
                </td>
                <td colspan="3" style="font-size: 8px; line-height: 1; vertical-align: top; text-align: justify;">
                    Merchant dilarang memindah tangankan/ meminjamkan perangkat (Cashlez reader/ EDC) sistem Mobile
                    aplikasi maupun pengguna akun portal Cashlez ke Pihak lain tanpa seizin Cashlez.
                </td>
            </tr>
            <tr>
                <td width="1%" style="font-size: 8px; line-height: 1; vertical-align: top;">13.
                </td>
                <td colspan="3" style="font-size: 8px; line-height: 1; vertical-align: top; text-align: justify;">
                    Merchant dilarang mendokumentasikan dan/atau menyimpan data kartu pelanggan atau data transaksi
                    elektronik pelanggan lainnya dengan alat lain selain sistem Mobile aplikasi Cashlez untuk
                    kepentingan apapun.
                </td>
            </tr>
            <tr>
                <td width="1%" style="font-size: 8px; line-height: 1; vertical-align: top;">14.
                </td>
                <td colspan="3" style="font-size: 8px; line-height: 1; vertical-align: top; text-align: justify;">
                    Merchant dilarang untuk menyimpan, meniru, mengubah dan/atau menyebarkan konten dan fitur layanan
                    namun tidak terbatas pada cara pelayanan Cashlez, Hak Kekayaan Intelektual milik Cashlez.
                </td>
            </tr>
            <tr>
                <td width="1%" style="font-size: 8px; line-height: 1; vertical-align: top;">15.
                </td>
                <td colspan="3" style="font-size: 8px; line-height: 1; vertical-align: top; text-align: justify;">
                    Merchant dilarang melakukan usaha atau mencoba untuk melakukan upaya pemecahan kode, hacking,
                    cracking, penetrasi virus penggunaan software, shareware, freeware atapun membuat website/mobile
                    aplikasi palsu/ tiruan yang bertujuan untuk mengganggu atau merusak sistem Cashlez.
                </td>
            </tr>
            <tr>
                <td width="1%" style="font-size: 8px; line-height: 1; vertical-align: top;">16.
                </td>
                <td colspan="3" style="font-size: 8px; line-height: 1; vertical-align: top; text-align: justify;">
                    Merchant dilarang melakukan transaksi yang berbeda dengan jenis usaha yang terdaftar di Cashlez.
                </td>
            </tr>
            <tr>
                <td width="1%" style="font-size: 8px; line-height: 1; vertical-align: top;">17.
                </td>
                <td colspan="3" style="font-size: 8px; line-height: 1; vertical-align: top; text-align: justify;">
                    Merchant dilarang melakukan transaksi refund secara tunai kepada Pelanggan.
                </td>
            </tr>
            <tr>
                <td width="1%" style="font-size: 8px; line-height: 1; vertical-align: top;">18.
                </td>
                <td colspan="3" style="font-size: 8px; line-height: 1; vertical-align: top; text-align: justify;">
                    Merchant dilarang melakukan transaksi dengan kartu sama atau ganti kartu lain dengan nama pemilik
                    kartu yang sama berkali-kali lebih dari 3 (tiga) kali dengan status APPROVE atau status DECLINE.
                </td>
            </tr>
            <tr>
                <td width="1%" style="font-size: 8px; line-height: 1; vertical-align: top;">19.
                </td>
                <td colspan="3" style="font-size: 8px; line-height: 1; vertical-align: top; text-align: justify;">
                    Merchant wajib melakukan pencocokan tandatangan dan nama Pelanggan antara di kartu dengan di struk
                    transaksi (khusus Pelanggan dari luar negeri wajib melampirkan foto Passport / KITAS).
                </td>
            </tr>
            <tr>
                <td width="1%" style="font-size: 8px; line-height: 1; vertical-align: top;">20.
                </td>
                <td colspan="3" style="font-size: 8px; line-height: 1; vertical-align: top; text-align: justify;">
                    Merchant wajib melakukan transaksi menggunakan kurs/ mata uang Rupiah (IDR)
                </td>
            </tr>
            <tr>
                <td width="1%" style="font-size: 8px; line-height: 1; vertical-align: top;">21.
                </td>
                <td colspan="3" style="font-size: 8px; line-height: 1; vertical-align: top; text-align: justify;">
                    Merchant wajib memberikan informasi kepada Cashlez secara tertulis terkait aktivitas Transaksi
                    Merchant yang ingin dilakukan di luar kota ataupun di luar negeri.
                </td>
            </tr>
            <tr>
                <td width="1%" style="font-size: 8px; line-height: 1; vertical-align: top;">22.
                </td>
                <td colspan="3" style="font-size: 8px; line-height: 1; vertical-align: top; text-align: justify;">
                    Merchant wajib bekerjasama dengan Cashlez untuk menyediakan invoice/ nota/ kwitansi atas transaksi
                    yang terjadi dan jika terdapat pengiriman barang wajib melampirkan tanda terima/tanda kirim barang
                    atas setiap transaksi dengan dibubuhi Cap/ Stempel Merchant (apabila ada) sesuai dengan bidang usaha
                    yang didaftarkan kepada Cashlez.
                </td>
            </tr>
            <tr>
                <td width="1%" style="font-size: 8px; line-height: 1; vertical-align: top;">23.
                </td>
                <td colspan="3" style="font-size: 8px; line-height: 1; vertical-align: top; text-align: justify;">
                    Merchant wajib memastikan bahwa seluruh dokumen persyaratan registrasi merchant yang dikirimkan
                    kepada Cashlez adalah benar dengan bidang usaha sesuai dengan ketentuan undang-undang yang berlaku,
                    apabila ditemukan fraud pada dokumen maupun kelengkapannya maka Cashlez berhak sewaktu-waktu
                    menonaktifkan akun merchant untuk login ke aplikasi maupun portal dan Cashlez dibebaskan dari segala
                    tuntutan maupun gugatan dikemudian hari.
                </td>
            </tr>
            <tr>
                <td width="1%" style="font-size: 8px; line-height: 1; vertical-align: top;">24.
                </td>
                <td colspan="3" style="font-size: 8px; line-height: 1; vertical-align: top; text-align: justify;">
                    Penggunaan layanan pembayaran yang disediakan oleh Cashlez kepada Merchant wajib sesuai bidang usaha
                    pada saat pendaftaran merchant, dan Merchant wajib menginformasikan kepada Cashlez apabila bidang
                    usaha yang didaftarkan kepada Cashlez terjadi perubahan.
                </td>
            </tr>
            <tr>
                <td width="1%" style="font-size: 8px; line-height: 1; vertical-align: top;">25.
                </td>
                <td colspan="3" style="font-size: 8px; line-height: 1; vertical-align: top; text-align: justify;">
                    Transaksi pembayaran menggunakan kartu wajib menggunakan CHIP dan PIN. Merchant dilarang untuk
                    meminta PIN/ OTP/ Password milik pelanggan
                </td>
            </tr>
            <tr>
                <td width="1%" style="font-size: 8px; line-height: 1; vertical-align: top;">26.
                </td>
                <td colspan="3" style="font-size: 8px; line-height: 1; vertical-align: top; text-align: justify;">
                    Penggunaan PIN dalam transaksi kartu wajib menggunakan PIN 6 Digit, hal ini diatur dalam Surat
                    Edaran BI No.17/52/DKSP tahun 2015 perihal Implementasi Standar Nasional Teknologi Chip dan
                    Penggunaan Personal Identification Number Online 6 (Enam) Digit untuk Kartu ATM dan/atau Kartu Debet
                    yang Diterbitkan di Indonesia.
                </td>
            </tr>
            <tr>
                <td width="1%" style="font-size: 8px; line-height: 1; vertical-align: top;">27.
                </td>
                <td colspan="3" style="font-size: 8px; line-height: 1; vertical-align: top; text-align: justify;">
                    Cashlez berhak sewaktu-waktu untuk menghentikan layanan dan/atau mengakhiri kerjasama dengan
                    Merchant, apabila kemudian hari diketemukan adanya informasi Blacklist Merchant maupun Person In
                    Charge (PIC) Merchant dari hasil pemeriksaan kembali oleh internal Cashlez, dari Bank dan/atau dari
                    Penyedia Jasa Pembayaran lain terkait pengajuan pendaftaran Merchant.
                </td>
            </tr>
            <tr>
                <td width="1%" style="font-size: 8px; line-height: 1; vertical-align: top;">28.
                </td>
                <td colspan="3" style="font-size: 8px; line-height: 1; vertical-align: top; text-align: justify;">
                    Apabila terdapat transaksi yang dianggap tidak sah dan/atau tidak diakui oleh Cashlez dan/atau
                    Pemilik Kartu dan/atau Bank dan/atau Penyedia Jasa Pembayaran lain, namun Merchant tetap memproses
                    transaksi tersebut maka kerugian yang timbul akan menjadi tanggung jawab Merchant sepenuhnya.
                </td>
            </tr>
            <tr>
                <td width="1%" style="font-size: 8px; line-height: 1; vertical-align: top;">29.
                </td>
                <td colspan="3" style="font-size: 8px; line-height: 1; vertical-align: top; text-align: justify;">
                    Merchant wajib untuk memastikan atas setiap transaksi penjualan yang terjadi yang dapat dilihat pada
                    menu History Transaksi dan/ atau portal Merchant sesuai dengan status transaksi yang tertera.
                </td>
            </tr>

            <div style="height: 5px;"></div>

            {{-- pasal 9 --}}
            <tr>
                <td colspan="4" style="font-size: 8px; line-height: 1; vertical-align: top; text-align: justify;">
                    <strong
                        style="font-size: 8px; line-height: 1; vertical-align: top; text-align: justify; padding: 0; margin: 0;">PASAL
                        9. PERNYATAAN DAN JAMINAN MERCHANT</strong>

                </td>
            </tr>
            <tr>
                <td width="1%" style="font-size: 8px; line-height: 1; vertical-align: top;">1.
                </td>
                <td colspan="3" style="font-size: 8px; line-height: 1; vertical-align: top; text-align: justify;">
                    Merchant menjamin memberikan data dan/atau dokumen dan/atau pernyataan dan/ atau keterangan yang
                    dibutuhkan oleh Cashlez dan Bank atau Penyedia Jasa Pembayaran lain dalam melakukan proses
                    permohonan hubungan kerjasama Pendaftaran Merchant untuk kebutuhan layanan pembayaran non tunai
                    adalah benar, sah secara hukum dan sesuai dengan ketentuan dan undang-undang yang berlaku.
                </td>
            </tr>
            <tr>
                <td width="1%" style="font-size: 8px; line-height: 1; vertical-align: top;">2.
                </td>
                <td colspan="3" style="font-size: 8px; line-height: 1; vertical-align: top; text-align: justify;">
                    Merchant setuju memberikan ganti kerugian kepada Cashlez terhadap tagihan, kerugian, biaya dan
                    tuntutan apapun sehubungan ketidaksesuaian dari pernyataan Merchant.
                </td>
            </tr>
            <tr>
                <td width="1%" style="font-size: 8px; line-height: 1; vertical-align: top;">3.
                </td>
                <td colspan="3" style="font-size: 8px; line-height: 1; vertical-align: top; text-align: justify;">
                    Semua dokumen yang diterima oleh Cashlez dan Bank atau Penyedia Jasa Pembayaran Lain diperlakukan
                    asli dan sah dari Merchant tanpa kewajiban Cashlez untuk membuktikan atau mengkonfirmasinya kepada
                    Merchant terlebih dahulu.
                </td>
            </tr>
            <tr>
                <td width="1%" style="font-size: 8px; line-height: 1; vertical-align: top;">4.
                </td>
                <td colspan="3" style="font-size: 8px; line-height: 1; vertical-align: top; text-align: justify;">
                    Merchant tidak dalam keadaan Blacklist oleh BANK dan/atau Penyedia Jasa Pembayaran lain dan Cashlez
                    berhak melakukan pemeriksaan terhadap hal itu.
                </td>
            </tr>
            <tr>
                <td width="1%" style="font-size: 8px; line-height: 1; vertical-align: top;">5.
                </td>
                <td colspan="3" style="font-size: 8px; line-height: 1; vertical-align: top; text-align: justify;">
                    Merchant mempunyai hak dan wewenang dalam penggunaan Sistem Pembayaran Elektronik
                    non tunai Cashlez.
                </td>
            </tr>
        </table>
    </div>
    <div style="clear:both"></div>
    <div style="float:left; width: 350px; padding-right: 5px;">
        <table border="0" width="100%" cellspacing="0" style="line-height: 1; margin: 0; padding: 0;">
            <tr>
                <td width="1%" style="font-size: 8px; line-height: 1; vertical-align: top;">6.
                </td>
                <td colspan="3" style="font-size: 8px; line-height: 1; vertical-align: top; text-align: justify;">
                    Merchant bertanggung jawab atas setiap transaksi yang dilakukan beserta kerugian yang ditimbulkan
                    dan bersedia diproses berdasarkan hukum dan peraturan perundang-undangan yang berlaku di Indonesia.
                </td>
            </tr>
            <tr>
                <td width="1%" style="font-size: 8px; line-height: 1; vertical-align: top;">7.
                </td>
                <td colspan="3" style="font-size: 8px; line-height: 1; vertical-align: top; text-align: justify;">
                    1 (satu) Merchant ID (MID) hanya diperkenankan untuk 1 (satu) Jenis Usaha Merchant/Badan Usaha.
                </td>
            </tr>
            <tr>
                <td width="1%" style="font-size: 8px; line-height: 1; vertical-align: top;">8.
                </td>
                <td colspan="3" style="font-size: 8px; line-height: 1; vertical-align: top; text-align: justify;">
                    1(satu) unit Perangkat hanya diperkenankan digunakan maksimal pada 3 (tiga) User ID Merchant/Badan
                    Usaha.
                </td>
            </tr>
            <tr>
                <td width="1%" style="font-size: 8px; line-height: 1; vertical-align: top;">9.
                </td>
                <td colspan="3" style="font-size: 8px; line-height: 1; vertical-align: top; text-align: justify;">
                    Merchant menjamin memiliki fisik toko dan/atau fisik badan usaha yang dapat dibuktikan.
                </td>
            </tr>
            <tr>
                <td width="1%" style="font-size: 8px; line-height: 1; vertical-align: top;">10.
                </td>
                <td colspan="3" style="font-size: 8px; line-height: 1; vertical-align: top; text-align: justify;">
                    Merchant menjamin bahwa seluruh transaksi yang melibatkan data nasabah dan/atau data Pelanggan
                    terikat dengan kewajiban kerahasiaan secara ketat dan berdasarkan kepatuhan terhadap peraturan
                    perundang-undangan yang berlaku.
                </td>
            </tr>
            <tr>
                <td width="1%" style="font-size: 8px; line-height: 1; vertical-align: top;">11.
                </td>
                <td colspan="3" style="font-size: 8px; line-height: 1; vertical-align: top; text-align: justify;">
                    Merchant menjamin bahwa diwakili oleh orang yang berhak dan berwenang sepenuhnya untuk membuat dan
                    menandatangani formulir pendaftaran dan perjanjian ini, dan menjamin bahwa segala keterangan yang
                    diberikan sehubungan dengan perjanjian ini adalah benar adanya dan segala aktivitas transaksi yang
                    menyalahi aturan maupun ketentuan yang berlaku dapat dipertanggung jawabkan; apabila dikemudian hari
                    dinyatakan bahwa keterangan yang diberikan tidak sesuai, maka Merchant membebaskan Cashlez dari
                    segala tuntutan maupun gugatan;
                </td>
            </tr>

            <div style="height: 5px;"></div>

            {{-- pasal 10 --}}
            <tr>
                <td colspan="4" style="font-size: 8px; line-height: 1; vertical-align: top; text-align: justify;">
                    <strong
                        style="font-size: 8px; line-height: 1; vertical-align: top; text-align: justify; padding: 0; margin: 0;">PASAL
                        10. PENAHANAN DANA TRANSAKSI</strong>

                </td>
            </tr>
            <tr>
                <td width="1%" style="font-size: 8px; line-height: 1; vertical-align: top;">1.
                </td>
                <td colspan="3" style="font-size: 8px; line-height: 1; vertical-align: top; text-align: justify;">
                    Cashlez sewaktu-waktu dapat melakukan penahanan dana transaksi secara sementara atas transaksi
                    berhasil yang akan diteruskan ke Rekening Merchant dengan pemberitahuan secara tertulis;
                </td>
            </tr>
            <tr>
                <td width="1%" style="font-size: 8px; line-height: 1; vertical-align: top;">2.
                </td>
                <td colspan="3" style="font-size: 8px; line-height: 1; vertical-align: top; text-align: justify;">
                    Cashlez mendapatkan informasi dari Pihak Bank atau melalui pengecekan hasil internal Cashlez
                    mengenai indikasi dan/atau bukti yang menunjukkan bahwa Merchant melakukan transaksi chargeback/
                    voucher membership/tarik tunai kartu kredit/ ataupun penipuan mengatasnamakan dari Bank/ pencucian
                    uang/ pemalsuan transaksi dan/atau memalsukan kartu untuk melakukan transaksi dan/atau transaksi
                    yang berpotensi terjadinya chargeback dan sejenisnya, serta melakukan larangan aktivitas transaksi.
                </td>
            </tr>
            <tr>
                <td width="1%" style="font-size: 8px; line-height: 1; vertical-align: top;">3.
                </td>
                <td colspan="3" style="font-size: 8px; line-height: 1; vertical-align: top; text-align: justify;">
                    Merchant dapat menyampaikan tanggapan atas dugaan tersebut dengan menyertakan bukti-bukti terkait
                    yang menunjukkan bahwa Merchant tidak pernah melakukan transaksi chargeback/ penjualan voucher
                    membership/ tarik tunai kartu kredit/ ataupun penipuan mengatasnamakan Bank dengan tujuan pencucian
                    uang/ pemalsuan transaksi dan/atau memalsukan kartu untuk melakukan transaksi dan bukti-bukti
                    lainnya yang dapat disertakan untuk menyatakan keabsahan transaksi.
                </td>
            </tr>
            <tr>
                <td width="1%" style="font-size: 8px; line-height: 1; vertical-align: top;">4.
                </td>
                <td colspan="3" style="font-size: 8px; line-height: 1; vertical-align: top; text-align: justify;">
                    Batas waktu penahanan dana transaksi oleh Cashlez tidak terbatas waktu atas keluhan chargeback
                    /refund / sanggahan transaksi dari Bank maupun Pemegang Kartu sampai dengan Merchant dapat
                    membuktikan bahwa tidak pernah melakukan transaksi penjualan voucher membership /tarik tunai kartu
                    kredit /ataupun penipuan mengatasnamakan Bank untuk tujuan pencucian uang /pemalsuan transaksi
                    dan/atau memalsukan kartu untuk melakukan transaksi dan/atau transaksi yang berpotensi terjadinya
                    chargeback dan sejenisnya, Cashlez wajib meneruskan dana transaksi tersebut kepada Rekening Merchant
                    selambat-lambatnya 14 (empat belas) hari kerja setelah adanya kesepakatan antara kedua belah pihak.
                </td>
            </tr>
            <tr>
                <td width="1%" style="font-size: 8px; line-height: 1; vertical-align: top;">5.
                </td>
                <td colspan="3" style="font-size: 8px; line-height: 1; vertical-align: top; text-align: justify;">
                    Apabila Merchant tidak dapat melakukan pembuktian secara konkrit bahwa Merchant tidak pernah
                    melakukan dugaan terjadinya transaksi penjualan voucher membership/ tarik tunai kartu kredit/
                    ataupun penipuan mengatasnamakan dari Bank/ pencucian uang/ pemalsuan transaksi dan/atau memalsukan
                    kartu untuk melakukan transaksi dan/atau transaksi yang berpotensi terjadinya chargeback dan
                    sejenisnya, maka Merchant harus mempertanggungjawabkan sepenuhnya atas keluhan tersebut.
                </td>
            </tr>
            <tr>
                <td width="1%" style="font-size: 8px; line-height: 1; vertical-align: top;">6.
                </td>
                <td colspan="3" style="font-size: 8px; line-height: 1; vertical-align: top; text-align: justify;">
                    Cashlez berhak melakukan penangguhan pembayaran transaksi sesuai dengan jumlah nominal atas
                    sanggahan transaksi/ chargeback/ refund/ Fraud
                </td>
            </tr>
            <div style="height: 5px;"></div>

            {{-- pasal 11 --}}
            <tr>
                <td colspan="4" style="font-size: 8px; line-height: 1; vertical-align: top; text-align: justify;">
                    <strong
                        style="font-size: 8px; line-height: 1; vertical-align: top; text-align: justify; padding: 0; margin: 0;">PASAL
                        11. PENGHENTIAN LAYANAN DAN FITUR</strong>

                </td>
            </tr>
            <tr>
                <td width="1%" style="font-size: 8px; line-height: 1; vertical-align: top;">
                </td>
                <td colspan="3" style="font-size: 8px; line-height: 1; vertical-align: top; text-align: justify;">
                    1.
                    Cashlez sewaktu-waktu dapat menghentikan layanan maupun akun Merchant secara sementara dan/atau
                    selamanya yang disediakan dengan alasan-alasan sebagai berikut:
                    <ol type="a"
                        style="margin: 0; font-size: 8px; line-height: 1; vertical-align: top; text-align: justify; padding-left: 12px; ">
                        <li align="justify"
                            style="font-size: 8px; line-height: 1; vertical-align: top; text-align: justify; margin: 0;">
                            Melindungi hak-hak dan/atau kepentingan Cashlez, Pemegang Kartu, Bank, Penyedia pembayaran
                            digital.
                        </li>
                        <li align="justify"
                            style="font-size: 8px; line-height: 1; vertical-align: top; text-align: justify; margin: 0;">
                            Terduga dan/atau terindikasi terlibat melakukan penyalahgunaan dan/atau penyimpangan
                            transaksi sebagaimana dimaksud dalam, kecuali terdapat klarifikasi dari Merchant bahwa
                            transaksi yang dilarang tidak pernah terjadi.
                        </li>
                        <li align="justify"
                            style="font-size: 8px; line-height: 1; vertical-align: top; text-align: justify; margin: 0;">
                            Atas rekomendasi dari Bank Pemroses Transaksi untuk segera dilakukan penghentian pemakaian
                            layanan oleh Merchant.
                        </li>
                        <li align="justify"
                            style="font-size: 8px; line-height: 1; vertical-align: top; text-align: justify; margin: 0;">
                            Atas aturan atau regulasi yang dimiliki Cashlez dalam hal penghentian layanan maupun fitur.
                        </li>
                        <li align="justify"
                            style="font-size: 8px; line-height: 1; vertical-align: top; text-align: justify; margin: 0;">
                            Sedang dilakukan peningkatan dan pemeliharaan sistem (maintenance) oleh Cashlez
                        </li>
                        <li align="justify"
                            style="font-size: 8px; line-height: 1; vertical-align: top; text-align: justify; margin: 0;">
                            Jika salah satu Pihak dinyatakan “Insolvent” dan/ atau Pailit dan/atau dicabut izin usaha
                            oleh Pemerintah.
                        </li>
                        <li align="justify"
                            style="font-size: 8px; line-height: 1; vertical-align: top; text-align: justify; margin: 0;">
                            Karena kegagalan sistem komputer dan/atau sambungan telekomunikasi (koneksi internet dari
                            alat Komunikasi Merchant.
                        </li>
                        <li align="justify"
                            style="font-size: 8px; line-height: 1; vertical-align: top; text-align: justify; margin: 0;">
                            Melakukan perubahan Jenis usaha dan/ atau produk usaha yang bertentangan dan/ atau melanggar
                            ketentuan dengan norma-norma kesusilaan, kesopanan, undang-undang dan peraturan-peraturan
                            lainnya yang berlaku di Indonesia termasuk tetapi tidak terbatas kepada peraturan yang
                            terkait dengan perbankan baik di Indonesia maupun dari Visa dan/atau Mastercard, HAKI,
                            teknologi dan informatika, telekomunikasi.
                        </li>
                        <li align="justify"
                            style="font-size: 8px; line-height: 1; vertical-align: top; text-align: justify; margin: 0;">
                            Melakukan tindakan Fraud dan telah diperingatkan secara tertulis.
                        </li>
                    </ol>
                </td>
            </tr>
            <tr>
                <td width="1%" style="font-size: 8px; line-height: 1; vertical-align: top;">2.
                </td>
                <td colspan="3" style="font-size: 8px; line-height: 1; vertical-align: top; text-align: justify;">
                    Segala kerugian yang timbul akibat dari penghentian/penangguhan sementara atau selamanya akses
                    Merchant dan layanan sistem pembayaran elektronik Cashlez oleh Merchant yang tidak dapat digunakan
                    karena adanya penghentian layanan bukan menjadi tanggung jawab Cashlez dan dengan ini secara hukum
                    membebaskan Cashlez dari segala tuntutan dan/atau guggatan yang timbul akibat gagal atau
                    terganggunya pelaksanaan transaksi.
                </td>
            </tr>

            <div style="height: 5px;"></div>

            {{-- pasal 12 --}}
            <tr>
                <td colspan="4" style="font-size: 8px; line-height: 1; vertical-align: top; text-align: justify;">
                    <strong
                        style="font-size: 8px; line-height: 1; vertical-align: top; text-align: justify; padding: 0; margin: 0;">PASAL
                        12. LAIN-LAIN</strong>

                </td>
            </tr>

            <tr>
                <td width="1%" style="font-size: 8px; line-height: 1; vertical-align: top;">1.
                </td>
                <td colspan="3" style="font-size: 8px; line-height: 1; vertical-align: top; text-align: justify;">
                    Para Pihak dibebaskan dari tanggung jawab atas keterlambatan atau kegagalan dalam memenuhi kewajiban
                    yang tercantum dalam perjanjian ini, yang disebabkan atau diakibatkan oleh force majeure yaitu
                    kejadian di luar kekuasaan masing-masing Pihak untuk mengatasinya;
                </td>
            </tr>
        </table>
    </div>
    <div style="float:left; width: 350px; padding-left: 5px;">
        <table border="0" width="100%" cellspacing="0" style="line-height: 1; margin: 0; padding: 0;">
            <tr>
                <td width="1%" style="font-size: 8px; line-height: 1; vertical-align: top;">2.
                </td>
                <td colspan="3" style="font-size: 8px; line-height: 1; vertical-align: top; text-align: justify;">
                    Peristiwa yang dapat digolongkan force majeure adalah gempa bumi, angin topan, banjir, wabah
                    penyakit, adanya perang, peledakan, sabotase, revolusi, pemberontakan, huru-hara, secara nyata
                    berpengaruh terhadap pelaksanaan perjanjian;
                </td>
            </tr>
            <tr>
                <td width="1%" style="font-size: 8px; line-height: 1; vertical-align: top;">3.
                </td>
                <td colspan="3" style="font-size: 8px; line-height: 1; vertical-align: top; text-align: justify;">
                    Apabila terjadi force majeure maka Pihak yang terkena force majeure wajib memberitahukan secara
                    tertulis kepada Pihak lainnya selambat-lambatnya dalam waktu 3 (tiga) kalender setelah terjadinya
                    force majeure. Pihak yang terkena force majeure wajib berusaha semaksimal mungkin untuk memulai
                    kembali kewajibannya;
                </td>
            </tr>
            <tr>
                <td width="1%" style="font-size: 8px; line-height: 1; vertical-align: top;">4.
                </td>
                <td colspan="3" style="font-size: 8px; line-height: 1; vertical-align: top; text-align: justify;">
                    Kelalaian dan/atau keterlambatan Pihak dalam memenuhi kewajibannya mengakibatkan tidak dianggapnya
                    telah terjadi force majeure dan Para Pihak akan mendiskusikan kembali terkait pemenuhan kewajiban
                    yang terkena akibat dari force majeure tersebut;
                </td>
            </tr>
            <tr>
                <td width="1%" style="font-size: 8px; line-height: 1; vertical-align: top;">5.
                </td>
                <td colspan="3" style="font-size: 8px; line-height: 1; vertical-align: top; text-align: justify;">
                    Seluruh hak atas kekayaan intelektual yang terdapat pada website dan aplikasi Cashlez termasuk
                    didalamnya hak cipta, desain industri, paten, merek maupun Hak Kekayaan Intelektual lainnya seperti
                    logo, foto, gambar, nama, kata, huruf-huruf, angka-angka, tulisan, susunan warna dan kombinasi dari
                    unsur-unsur adalah milik Cashlez secara penuh. Pengguna website dan aplikasi Cashlez dilarang untuk
                    meniru, memperbanyak, atau menggunakannya untuk kepentingan dan dengan cara apapun tanpa persetujuan
                    tertulis dahulu dari Cashlez.
                </td>
            </tr>
            <tr>
                <td width="1%" style="font-size: 8px; line-height: 1; vertical-align: top;">6.
                </td>
                <td colspan="3" style="font-size: 8px; line-height: 1; vertical-align: top; text-align: justify;">
                    Masing-masing Pihak tidak akan menggunakan hak atas kekayaan intelektual dari Pihak lainnya dalam
                    bentuk apapun, termasuk tetapi tidak terbatas pada merek dagang, nama atau logo Masing-masing Pihak
                    baik yang belum dan/atau telah terdaftar di Direktorat Jenderal Hak Atas Kekayaan Intelektual tanpa
                    adanya persetujuan tertulis terlebih dahulu dari Pihak lainnya serta Masing-masing Pihak menyatakan
                    dan menjamin bahwa pemberian dokumen atau Salinan dari merek dagang, nama atau logo Pihak lainnya
                    tidak boleh dianggap sebagai pemberian hak opsi atau lisensi atau hak-hak kepemilikan intelektual
                    lainnya, baik kini maupun masa yang akan datang.
                </td>
            </tr>
            <tr>
                <td width="1%" style="font-size: 8px; line-height: 1; vertical-align: top;">7.
                </td>
                <td colspan="3" style="font-size: 8px; line-height: 1; vertical-align: top; text-align: justify;">
                    Hal-hal yang belum diatur dalam Perjanjian ini akan diatur lebih lanjut terpisah secara tertulis
                    baik dalam suatu Addendum dan/atau Syarat dan Ketentuan sebagaimana tercantum pada website Cashlez
                    dan segala ketentuan tambahan yang belum diatur dalam perjanjian ini akan tetap mengikat.
                </td>
            </tr>
            <tr>
                <td width="1%" style="font-size: 8px; line-height: 1; vertical-align: top;">8.
                </td>
                <td colspan="3" style="font-size: 8px; line-height: 1; vertical-align: top; text-align: justify;">
                    Seluruh lampiran/ addendum/ maupun dokumen lainnya yang timbul atas Kerjasama Cashlez dengan
                    merchant adalah merupakan satu kesatuan yang mengikat dari perjanjian Cashlez dengan Merchant.
                </td>
            </tr>
            <tr>
                <td width="1%" style="font-size: 8px; line-height: 1; vertical-align: top;">9.
                </td>
                <td colspan="3" style="font-size: 8px; line-height: 1; vertical-align: top; text-align: justify;">
                    Merchant sepakat untuk membebaskan dari segala tanggung jawab atas tuntutan hukum dan/atau kerugian
                    material dan imaterial oleh Merchant akibat dari penangguhan pembayaran dana transaksi dan/atau
                    penutupan akses Transaksi Merchant dan/atau penutupan akses Perangkat Merchant dikarenakan terjadi
                    transaksi sesuai dengan PASAL 6 dan Merchant terindikasi dan/atau terbukti melakukan penyalahgunaan
                    transaksi sesuai dengan PASAL 8.
                </td>
            </tr>
            <tr>
                <td width="1%" style="font-size: 8px; line-height: 1; vertical-align: top;">10.
                </td>
                <td colspan="3" style="font-size: 8px; line-height: 1; vertical-align: top; text-align: justify;">
                    Cashlez berhak untuk menyimpan setiap informasi data dan/atau dokumen Merchant yang sudah diserahkan
                    kepada Cashlez sebagai dokumentasi.
                </td>
            </tr>
            <tr>
                <td width="1%" style="font-size: 8px; line-height: 1; vertical-align: top;">11.
                </td>
                <td colspan="3" style="font-size: 8px; line-height: 1; vertical-align: top; text-align: justify;">
                    Apabila merchant melakukan pembelian perangkat, bahwa Perangkat yang dibeli oleh Merchant bersifat
                    beli putus, Merchant tidak dapat mengembalikan Perangkat tersebut dalam bentuk apapun, termasuk
                    apabila Merchant tidak dapat menggunakan Perangkat dikarenakan terblokirnya akun perangkat dan/atau
                    layanan Merchant karena adanya indikasi penyalahgunaan transaksi yang terjadi, segala kerugian yang
                    timbul dikarenakan adanya indikasi penyalahgunaan transaksi akan menjadi beban dan tanggung jawab
                    Merchant, dengan ini Merchant membebaskan Cashlez dari segala kerugian ataupun tuntutan hukum yang
                    timbul dikemudian hari.
                </td>
            </tr>
            <tr>
                <td width="1%" style="font-size: 8px; line-height: 1; vertical-align: top;">12.
                </td>
                <td colspan="3" style="font-size: 8px; line-height: 1; vertical-align: top; text-align: justify;">
                    Penempatan Perangkat wajib sesuai lokasi/alamat usaha Merchant yang telah terdaftar pada Cashlez dan
                    apabila Merchant pindah lokasi usaha dan/atau memiliki cabang usaha lain maka Merchant wajib
                    menghubungi pihak Cashlez.
                </td>
            </tr>
            <tr>
                <td width="1%" style="font-size: 8px; line-height: 1; vertical-align: top;">13.
                </td>
                <td colspan="3" style="font-size: 8px; line-height: 1; vertical-align: top; text-align: justify;">
                    Cashlez berhak untuk melakukan perubahan harga Perangkat, Merchant Discout Rate (MDR), maupun syarat
                    dan ketentuan yang diatur oleh Cashlez dengan atau tanpa pemberitahuan terlebih dahulu ke Merchant .
                </td>
            </tr>
            <tr>
                <td width="1%" style="font-size: 8px; line-height: 1; vertical-align: top;">14.
                </td>
                <td colspan="3" style="font-size: 8px; line-height: 1; vertical-align: top; text-align: justify;">
                    Cashlez berhak sewaktu-waktu melakukan kunjungan untuk keperluan investigasi dan/atau verifikasi ke
                    lokasi usaha Merchant yang terdaftar di Cashlez.
                </td>
            </tr>
            <tr>
                <td width="1%" style="font-size: 8px; line-height: 1; vertical-align: top;">15.
                </td>
                <td colspan="3" style="font-size: 8px; line-height: 1; vertical-align: top; text-align: justify;">
                    Dengan ditandatanganinya formulir registrasi ini, Merchant menyatakan telah mengerti dan menyetujui
                    seluruh ketentuan dan dengan ini membebaskan Cashlez dari segala tuntutan dan kerugian yang timbul
                    mengenai pelaksanaan penyewaan ini.
                </td>
            </tr>
            <tr>
                <td width="1%" style="font-size: 8px; line-height: 1; vertical-align: top;">16.
                </td>
                <td colspan="3" style="font-size: 8px; line-height: 1; vertical-align: top; text-align: justify;">
                    Merchant menyatakan tunduk dan terikat terhadap Perjanjian ini berikut dengan Syarat dan Ketentuan
                    sebagaimana tercantum pada website Cashlez yang akan disampaikan dan/atau diposting secara berkala
                    menyesuaikan dengan peraturan perundang-undangan yang berlaku di Indonesia.
                </td>
            </tr>
            <tr>
                <td width="1%" style="font-size: 8px; line-height: 1; vertical-align: top;">17.
                </td>
                <td colspan="3" style="font-size: 8px; line-height: 1; vertical-align: top; text-align: justify;">
                    Dalam setiap pertanyaan, komunikasi, keluhan, kritik, saran dan/atau pengaduan, Merchant dan/atau
                    Pelanggan dapat mengakses layanan pengaduan dan perlindungan konsumen Cashlez Care
                    support@cashlez.com atau melalui nomor WhatsApp : 0811-9118-155 / 0813-8080-7899
                </td>
            </tr>
        </table>
        <div style="height: 10px;"></div>

        <table border="0" width="100%" cellspacing="0" style="line-height: 1; margin: 0; padding: 0;">
            <tr>
                <td colspan="2" style="font-size: 8px; line-height: 1; vertical-align: top; text-align: justify;">
                    Demikian Perjanjian ini dibuat dan ditandatangani bersama antara CASHLEZ dan MERCHANT pada hari dan
                    tanggal yang disebutkan pada Perjanjian ini.
                </td>
            </tr>
            <div style="height: 10px;"></div>

            <tr>
                <td width="50%"
                    style="padding: 0 2px; font-size: 8px; line-height: 1; vertical-align: top; text-align: center;">
                    Hari: ____________________</td>
                <td width="50%"
                    style="padding: 0 2px; font-size: 8px; line-height: 1; vertical-align: top; text-align: center;">
                    Tanggal: ____/_______/_________</td>
            </tr>
            <div style="height: 3px;"></div>

            <tr>
                <td width="50%"
                    style="padding: 0 2px; font-size: 8px; line-height: 1; vertical-align: top; text-align: center;">
                    {{-- <strong
                        style="font-size: 8px; line-height: 1; vertical-align: top; text-align: justify; padding: 0; margin: 0;"> --}}
                        PT Cashlez Worldwide Indonesia Tbk
                        {{-- </strong> --}}
                </td>
                <td width="50%"
                    style="padding: 0 2px; font-size: 8px; line-height: 1; vertical-align: top; text-align: center;">
                    {{-- <strong
                        style="font-size: 8px; line-height: 1; vertical-align: top; text-align: justify; padding: 0; margin: 0;"> --}}
                        Pemilik / Pejabat Berwenang
                    {{-- </strong> --}}
                </td>
            </tr>
            <tr>
                <td width="50%"
                    style="padding: 0 2px; font-size: 8px; line-height: 1; vertical-align: top; text-align: center; height: 50px;">
                </td>
                <td width="50%"
                    style="padding: 0 2px; font-size: 8px; line-height: 1; vertical-align: top; text-align: center;">
                    <img src="{{ $signature }}" height="50px" style="padding: 5px 0;"
                        alt="">
                </td>
            </tr>
            <tr>
                <td width="50%"
                    style="padding: 0 2px; font-size: 8px; line-height: 1; vertical-align: top; text-align: center;">
                    {{-- <strong
                        style="font-size: 8px; line-height: 1; vertical-align: top; text-align: justify; padding: 0; margin: 0;"></strong> --}}
                </td>
                <td width="50%"
                    style="padding: 0 2px; font-size: 8px; line-height: 1; vertical-align: top; text-align: center;">
                    {{-- <strong
                        style="font-size: 8px; line-height: 1; vertical-align: top; text-align: justify; padding: 0; margin: 0;"> --}}
                        {{ ucwords($data->nama_pemilik_merchant) }} 
                    {{-- </strong> --}}
                </td>
            </tr>
            <tr>
                <td width="50%"
                    style="padding: 0 2px; font-size: 8px; line-height: 1; vertical-align: top; text-align: center;">
                    {{-- <strong
                        style="font-size: 8px; line-height: 1; vertical-align: top; text-align: justify; padding: 0; margin: 0; border-top: 1px solid black;"> --}}
                        Nama Lengkap dan Tanda Tangan
                    {{-- </strong> --}}
                </td>
                <td width="50%"
                    style="padding: 0 2px; font-size: 8px; line-height: 1; vertical-align: top; text-align: center;">
                    {{-- <strong
                        style="font-size: 8px; line-height: 1; vertical-align: top; text-align: justify; padding: 0; margin: 0; border-top: 1px solid black;"> --}}
                        Nama Lengkap dan Tanda Tangan
                    {{-- </strong> --}}
                </td>
            </tr>
        </table>
    </div>
    <div style="clear:both"></div>
</body>

</html>
