@extends('layouts.app')
@section('content')

<div class="row">
    <div class="col-lg-12">
        <div class="tabs-container">
        <table class="table table-bordered" border="1" style="border-collapse: collapse; width: 80%; border-color: #adadad;">
    <thead style="">
    <tr>
       <td width="40%" style="text-align: right; font-size: 18px;padding: 10px;"> Total Income : </td>
        <td width="30%" style="text-align: left; font-size: 18px; font-weight: bold; padding: 10px;">
            <html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Jumlah Barang Setiap Bulan</title>

        {!! Charts::assets() !!}

    </head>
    <body>
        <center>
            {!! $chart->render() !!}
        </center>
    </body>
</html>
        <td width="30%" style="text-align: left; font-size: 18px; font-weight: bold; padding: 10px;">


        {{-- <a href="{{ url('/laporanbarang') }}" target="_blank" class="btn btn-primary">Senarai Barang</a></td> --}}
    </tr>

    {{-- <tr>
       <td width="40%" style="text-align: right; font-size: 18px;padding: 10px;"> Laporan Tempahan : </td>
       <td width="30%" style="text-align: left; font-size: 18px; font-weight: bold; padding: 10px;">
            <html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Jumlah Tempahan Setiap Bulan</title>

        {!! Charts::assets() !!}

    </head>
    <body>
        <center>
            {!! $char->render() !!}
        </center>
    </body>
</html>
        <td width="30%" style="text-align: left; font-size: 18px; font-weight: bold; padding: 10px;"><a href="{{ url('/laporantempahan') }}" target="_blank" class="btn btn-primary">Senarai Tempahan</a></td>
    </tr> --}}

    </thead>

</table>
        </div>
    </div>
</div>
@endsection
