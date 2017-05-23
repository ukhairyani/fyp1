<!DOCTYPE html>
<html lang="en">
<style>
    * {
        font-family: sans-serif;
        font-size: 12px;
    }
    .logo h1 {
        font-family: sans-serif;
        font-size: 36px;
        margin: 0px;
        color: #2980b9;
        text-shadow: 1px 1px #CCCCCC;
    }
    .logo {
        text-align: center;
    }
    .logo span {
        font-size: 30px;
        font-style: italic;
        color: #848484;
    }
    .logo p{
        margin: 0px;
        color: #B1AEAE;
        padding: 0px;
        font-family: sans-serif;
        font-size: 12px;
        letter-spacing: 1px;
    }
    .row {
        overflow: hidden;
        clear: both;
    }
    .col-md-6 {
        width: 50%;
        float: left;
    }
    .address-company {
        text-align: right;
    }
    .address-company h4 {
        margin: 0px;
        padding: 0px;
    }
</style>
<body>
<table border="0" width="100%">
    <tr>
        <td class="logo">
            <h1>UKM CARPOOL<span></span></h1>
            <p>The easier way to share ride</p>
        </td>

    </tr>
    <tr>
        <td colspan="2" style="background: #F1F1F1;padding: 14px;">
            <h2 style="margin: 0px; padding: 0px;font-size: 20px;">Booking ID: {{ $book->id }}</h2>

        </td>
    </tr>
    <tr>
        <td><br></td>
        <td><br></td>
    </tr>
    <tr>
        <td>
            <b>Passenger Details:</b><br>
            {{ Auth::user()->name }}<br>
            {{ Auth::user()->address}}<br>
        </td>

    </tr>
</table>
<br>
RIDE DETAILS:
<table class="table table-bordered" border="1" style="border-collapse: collapse; width: 80%; border-color: #adadad;">
    <thead style="background: #EAEAEA;">
     <tr>
        <td width="40%" style="text-align: right; font-size: 18px;padding: 10px;"> From </td>
        <td width="60%" style="text-align: left; font-size: 18px; font-weight: bold; padding: 10px;">{{ $book->offer->pickup_loc}}</td>
    </tr>
     <tr>
        <td width="40%" style="text-align: right; font-size: 18px;padding: 10px;"> To </td>
        <td width="60%" style="text-align: left; font-size: 18px; font-weight: bold; padding: 10px;">{{ $book->offer->destination}}</td>
    </tr>
    <tr>
       <td width="40%" style="text-align: right; font-size: 18px;padding: 10px;"> Date </td>
        <td width="60%" style="text-align: left; font-size: 18px; font-weight: bold; padding: 10px;"> {{ $book->offer->date}}</td>
    </tr>
    <tr>
       <td width="40%" style="text-align: right; font-size: 18px;padding: 10px;"> Time </td>
        <td width="60%" style="text-align: left; font-size: 18px; font-weight: bold; padding: 10px;"> {{ $book->offer->time}}</td>
    </tr>
    <tr>
        <td width="40%" style="text-align: right; font-size: 18px;padding: 10px;">Price </td>
        <td width="60%" style="text-align: left; font-size: 18px; font-weight: bold; padding: 10px;"> RM {{ $book->offer->price}}</td>
    </tr>
    <tr>
        <td width="40%" style="text-align: right; font-size: 18px;padding: 10px;">Deposit </td>
        <td width="60%" style="text-align: left; font-size: 18px; font-weight: bold; padding: 10px;"> {{ $book->status_sah}} RM{{$book->deposit}}</td>
    </tr>
    </thead>

</table>
<br></br>
DRIVER DETAILS:
<table class="table table-bordered" border="1" style="border-collapse: collapse; width: 80%; border-color: #adadad;">
    <thead style="background: #EAEAEA;">
     <tr>
        <td width="40%" style="text-align: right; font-size: 18px;padding: 10px;"> Name  </td>
        <td width="60%" style="text-align: left; font-size: 18px; font-weight: bold; padding: 10px;">{{ $book->driver->user->name }}</td>
    </tr>
     <tr>
        <td width="40%" style="text-align: right; font-size: 18px;padding: 10px;"> Matric No  </td>
        <td width="60%" style="text-align: left; font-size: 18px; font-weight: bold; padding: 10px;">{{ $book->driver->user->matricNo }}</td>
    </tr>
     <tr>
        <td width="40%" style="text-align: right; font-size: 18px;padding: 10px;"> Tel No  </td>
        <td width="60%" style="text-align: left; font-size: 18px; font-weight: bold; padding: 10px;">{{ $book->driver->user->noTel }}</td>
    </tr>

    </thead>

</table>

<br/><br/>
<table class="table table-bordered" border="1" style="border-collapse: collapse; width: 80%; border-color: #adadad;">
    <tbody>

    {{-- <tr>
        <td width="40%" style="text-align: right; font-size: 18px;padding: 10px;">Tarikh Pembayaran : </td>
        {{-- <td width="60%" style="text-align: right; font-size: 18px; font-weight: bold; padding: 10px;">{{ $tempahan->pembayaran->created_at->format('d/m/Y g:ia') }}</td> --}}
    {{--</tr> --}}
    </tbody>
</table>
</body>
</html>
