<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Payment Report</title>
</head>
<style>
    *{
        font-family: Arial, Helvetica, sans-serif;
    }
    th {
        background-color: black;
        color: white;
        padding: 5px;
    }
    td{
        padding: 5px;
        text-align: center;
    }
    table{
        width: 100%;
    }
</style>
<body>
    <header style="text-align:center;">
        <h1>SONS AND DAUGHTERS OF FIRESTONE</h1>
        <p style="margin-top: -2%;">Online Membership and Payment Tracker Application</p>
        <hr>
    </header>
    <br>
    <h3>
        <span>Title: <u>{{ $title }}</u></span><br/>
    </h3>
    <p><span>Date Printed : {{ date('y-m-d h:m:s') }} </span></p>
    <table>
        <thead>
            @php
                $count = 1;
            @endphp
            <tr>
                <th>No</th>
                <th>Amount</th>
                <th>Type of Payment</th>
                <th>Member</th>
                <th>Date & Time</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($payments as $payment)
                <tr>
                    <td>{{ $count }}</td>
                    <td>{{ $payment->amount }}</td>
                    <td>{{ $payment->payname }}</td>
                    <td>{{ $payment->mfirstname .' '. $payment->mmiddlename .' '. $payment->mlastname }}</td>
                    <td>{{ $payment->payment_date}}</td>
                </tr>
                @php
                    $count++;
                @endphp
            @endforeach
            <br>
            <tr style="background: black; color:white;">
                <td colspan="4">Total Payment Amount</td>
                <td><b>{{ '$'. $totalpayment .'.00' }}</b></td>
            </tr>
        </tbody>
    </table>
    <footer>
        <p>
            <span>Developed by: Joel Pantoe Jr</span><br>
            <span>Contact: +231(0778) 337 220</span>
        </p>
    </footer>
</body>
</html>
