<!DOCTYPE html>
<html>
<head>
    <title>Cetak Faktur - {{ $data->no_faktur }}</title>
    <style>
        body {
            font-family: 'Courier New', monospace;
            width: 700px;
            margin: auto;
            color: #000;
        }
        h2, h3 {
            margin: 0;
        }
        .logo {
            display: block;
            margin: 0 0 10px 0;
            width: 100px;
            height: auto;
        }
        .judul-pt {
            text-align: left;
            margin-bottom: 0;
            font-size: 20px;
        }
        .alamat-pt {
            text-align: left;
            margin-bottom: 10px;
            font-size: 14px;
        }
        .judul-faktur {
            text-align: center;
            margin-top: 10px;
            margin-bottom: 20px;
            text-decoration: underline;
        }
        .content {
            border: 1px solid #000;
            padding: 20px;
            min-height: 500px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }
        .row {
            margin-bottom: 10px;
            font-size: 15px;
        }
        .label {
            display: inline-block;
            width: 180px;
        }
        .footer {
            margin-top: auto;
            padding-top: 40px;
            text-align: right;
            line-height: 2;
        }
        @media print {
            .no-print { display: none; }
        }
    </style>
</head>
<body onload="window.print()">

    <div class="no-print" style="margin-bottom: 20px; text-align: right;">
        <button onclick="window.print()">Cetak Sekarang</button>
        <a href="{{ url('/pembayaran') }}">Kembali</a>
    </div>

    <img src="{{ asset('igm.png') }}" alt="Logo PT Prospect Motor" class="logo">
    <h2 class="judul-pt">P.T. PROSPECT MOTOR</h2>
    <div class="alamat-pt">
        Jl. Yos Sudarso Timur 430198, <br>
        Jakarta 11310
    </div>

    <h3 class="judul-faktur">FAKTUR KENDARAAN</h3>

    <div class="content">
        <div>
            <div class="row"><span class="label">No. Faktur</span>: {{ $data->no_faktur }}</div>
            <div class="row"><span class="label">Nama</span>: {{ $data->nama }}</div>
            <div class="row"><span class="label">Alamat</span>: {{ $data->alamat }}</div>
            <div class="row"><span class="label">Merk / Tipe</span>: {{ strtoupper($data->merk) }} / {{ strtoupper($data->model) }}</div>
            <div class="row"><span class="label">Warna</span>: {{ $data->warna }}</div>
            <div class="row"><span class="label">No. Mesin</span>: {{ $data->no_mesin }}</div>
            <div class="row"><span class="label">No. Rangka</span>: {{ $data->no_rangka }}</div>
            <div class="row"><span class="label">No & Tgl. PUPD</span>: {{ $data->no_pupd }} / {{ date('d-m-Y', strtotime($data->tgl_pupd)) }}</div>
            <div class="row"><span class="label">Jumlah Unit</span>: {{ $data->jumlah_unit }}</div>
            <div class="row"><span class="label">Harga</span>: Rp. {{ number_format($data->harga, 0, ',', '.') }}</div>
            <div class="row"><span class="label">Terbilang</span>: {{ strtoupper($data->terbilang) }}</div>
        </div>

        <div class="footer">
            Jakarta, {{ date('d F Y', strtotime($data->tgl_pembayaran)) }}<br><br><br><br>
            (..................)
        </div>
    </div>

</body>
</html>