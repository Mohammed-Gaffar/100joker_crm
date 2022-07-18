<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Example 2</title>

    <style>
        .clearfix:after {
            content: "";
            display: table;
            clear: both;
        }

        a {
            color: #0087C3;
            text-decoration: none;
        }

        body {
            language: ar;
            direction: rtl !important;
            position: relative;
            width: 21cm;
            height: 29.7cm;
            margin: 0 auto;
            color: #555555;
            background: #FFFFFF;
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Helvetica, Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol"!important;
            font-size: 14px;


        }

        header {
            padding: 10px 0;
            margin-bottom: 20px;
            border-bottom: 1px solid #AAAAAA;
        }

        #logo {
            float: left;
            margin-top: 8px;
        }

        #logo img {
            height: 70px;
        }

        #company {
            float: right;
            text-align: right;
        }


        #details {
            margin-bottom: 50px;
        }

        #client {
            padding-left: 6px;
            border-left: 6px solid #0087C3;
            float: left;
        }

        #client .to {
            color: #777777;
        }

        h2.name {
            font-size: 1.4em;
            font-weight: normal;
            margin: 0;
        }

        #invoice {
            float: right;
            text-align: right;
        }

        #invoice h1 {
            color: #0087C3;
            font-size: 2.4em;
            line-height: 1em;
            font-weight: normal;
            margin: 0  0 10px 0;
        }

        #invoice .date {
            font-size: 1.1em;
            color: #777777;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            border-spacing: 0;
            margin-bottom: 20px;
        }

        table th,
        table td {
            padding: 5px;
            background: #EEEEEE;
            text-align: center;
            border-bottom: 1px solid #FFFFFF;

        }

        table th {
            white-space: nowrap;
            font-weight: normal;
        }

        table td {
            text-align: right;
        }

        table td h3{
            color: #57B223;
            font-size: 1.2em;
            font-weight: normal;
            margin: 0 0 0.2em 0;
        }

        table .no {
            color: #FFFFFF;
            font-size: 1.6em;
            background: #57B223;
        }

        table .desc {
            text-align: center;
        }

        table .unit {
            background: #DDDDDD;
        }

        table .qty {
        }

        table .total {
            background: #57B223;
            color: #FFFFFF;
        }

        table td.unit,
        table td.qty,
        table td.total {
            font-size: 1.2em;
        }

        table tbody tr:last-child td {
            border: none;
        }

        table tfoot td {
            padding: 10px 20px;
            background: #FFFFFF;
            border-bottom: none;
            font-size: 1.2em;
            white-space: nowrap;
            border-top: 1px solid #AAAAAA;
        }

        table tfoot tr:first-child td {
            border-top: none;
        }

        table tfoot tr:last-child td {
            color: #57B223;
            font-size: 1.4em;
            border-top: 1px solid #57B223;

        }

        table tfoot tr td:first-child {
            border: none;
        }

        #thanks{
            font-size: 2em;
            margin-bottom: 50px;
        }

        #notices{
            padding-left: 6px;
            border-left: 6px solid #0087C3;
        }

        #notices .notice {
            font-size: 1.2em;
        }

        footer {
            color: #777777;
            width: 100%;
            height: 30px;
            position: absolute;
            bottom: 0;
            border-top: 1px solid #AAAAAA;
            padding: 8px 0;
            text-align: center;
        }


    </style>
</head>
<body dir="RTL" lang="AR">
<header class="clearfix">
    <div id="logo">
        <img src="public/company_img/logo.jpg" width="64px" align="left" style="float: left;position: fixed">
    </div>
    <div id="company" style="padding-top: -50px">
        <h2 class="name">{{$company_data->company_name}}</h2>
        <div>{{$company_data->location}}-{{$company_data->city}}</div>
        <div>{{$company_data->post}}</div>
        <div><a href="mailto:company@example.com">{{$company_data->email}}</a></div>
    </div>

</header>
<main style="direction: rtl !important;">
    <div id="details" class="clearfix">
        <div id="invoice">
            <h1>@lang('site.Quotation NO'): {{$quotation_detils->serial}} </h1>
            <div class="date">@lang('site.date of quotation') :{{$quotation_detils->date}}</div>
            <div class="date">@lang('site.date'): {{date('Y-m-d')}}</div>
        </div>

        <div id="client" style="padding-top: -80px">
            <div class="to">@lang('site.quotation to')</div>
            <h2 class="name">{{$customer->name}}</h2>
            <div class="address">{{$customer->address}}</div>
            <div class="email"><a href="mailto:john@example.com">{{$customer->email}}</a></div>
        </div>
    </div>
    <table border="0" cellspacing="0" cellpadding="0" dir="rtl">
        <thead>
        <tr>
            <th class="no">#</th>
            <th class="desc"><center>الوصف</center> </th>
            <th class="unit">سعر الوحدة</th>
            <th class="qty">الكمية</th>
            <th class="total">الاجمالي</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td class="no">01</td>
            <td class="desc"><h3>موظف عمل عن بعد</h3>اسناد موظفين للعمل عن بعد</td>
            <td class="unit">SR 2000</td>
            <td class="qty">10</td>
            <td class="total">$20.000</td>
        </tr>
        </tbody>
        <tfoot>
        <tr>
            <td colspan="2"></td>
            <td colspan="2">SUBTOTAL</td>
            <td>20.000</td>
        </tr>
        <tr>
            <td colspan="2"></td>
            <td colspan="2">TAX 15%</td>
            <td>SR3000</td>
        </tr>
        <tr>
            <td colspan="2"></td>
            <td colspan="2">GRAND TOTAL</td>
            <td>SR23000</td>
        </tr>
        </tfoot>
    </table>

        <div id="thanks" style="text-align: right">Thank you!</div>
        <div id="notices" style="text-align: right">
            <div>ملحوظة:</div>
            <div class="notice">يعتبر العرض لاغيا في حال مرور اكثر من 7 ايام من تاريخه</div>
        </div>

</main>
<footer>
created by akta-kdabra crm system
</footer>
</body>
</html>
