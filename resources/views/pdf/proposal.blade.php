<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>A simple, clean, and responsive HTML invoice template</title>

    <style>
        .invoice-box {
            max-width: 800px;
            margin: auto;
            padding: 30px;
            border: 1px solid #eee;
            box-shadow: 0 0 10px rgba(0, 0, 0, .15);
            font-size: 16px;
            line-height: 24px;
            font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
            color: #555;
        }

        .invoice-box table {
            width: 100%;
            line-height: inherit;
            text-align: left;
        }

        .invoice-box table td {
            padding: 5px;
            vertical-align: top;
        }

        .invoice-box table tr td:nth-child(2) {
            text-align: right;
        }

        .invoice-box table tr.top table td {
            padding-bottom: 20px;
        }

        .invoice-box table tr.top table td.title {
            font-size: 45px;
            line-height: 45px;
            color: #333;
        }

        .invoice-box table tr.information table td {
            padding-bottom: 40px;
        }

        .invoice-box table tr.heading td {
            background: #eee;
            border-bottom: 1px solid #ddd;
            font-weight: bold;
        }

        .invoice-box table tr.details td {
            padding-bottom: 20px;
            width: 100%;
        }

        .invoice-box table tr.item td{
            border-bottom: 1px solid #eee;
        }

        .invoice-box table tr.item.last td {
            border-bottom: none;
        }

        .invoice-box table tr.total td:nth-child(2) {
            border-top: 2px solid #eee;
            font-weight: bold;
        }

        @media only screen and (max-width: 600px) {
            .invoice-box table tr.top table td {
                width: 100%;
                display: block;
                text-align: center;
            }

            .invoice-box table tr.information table td {
                width: 100%;
                display: block;
                text-align: center;
            }
        }

        /** RTL **/
        .rtl {
            direction: rtl;
            font-family: Tahoma, 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
        }

        .rtl table {
            text-align: right;
        }

        .rtl table tr td:nth-child(2) {
            text-align: left;
        }
    </style>
</head>

<body>
<div class="invoice-box">
    <table>
        <tr class="top">
            <td colspan="2">
                <table>
                    <tr>
                        <td class="title">
                            <img src="{{ get_static_option('website_logo') }}" style="width:100%; max-width:300px;">
                        </td>

                        <td>
                            {{--  Invoice #: {{ $income->id }}<br>  --}}
                            {{--  Created: {{ $proposal->created_at->format('d/M/Y') }}<br>  --}}
                        </td>
                    </tr>
                </table>
            </td>
        </tr>

        <tr class="information">
            <td colspan="2">
                <table>
                    <tr>
                        <td>
                            {{ config('app.name') }}<br>
                            {{ get_static_option('company_phone') }}<br>
                            {{ get_static_option('company_email') }}<br>
                            {{ get_static_option('company_address') }}<br>
                            {{ get_static_option('company_address_district_country') }}
                        </td>

                        <td>
                            {{ $proposal->customer->name ??  '' }}<br>
                            {{ $proposal->customer->email ?? '' }}<br>
                            {{ $proposal->customer->phone ?? '' }}<br>

                        </td>
                    </tr>
                </table>
            </td>
        </tr>

        <tr class="heading">
            <td>
                Description
            </td>
        </tr>
    </table>

    <table>
        <tr >
            <td style="height: 420px;">
                {!! $proposal->description !!}
            </td>
        </tr>
    </table>


    <table>
        <tr class="heading">
            <td>
                #
            </td>

            <td>
                Price
            </td>
        </tr>

        <tr class="item">
            <td>
                Total
            </td>

            <td>
                {{ $proposal->budget }}
            </td>
        </tr>
        <tr class="total">
            <td></td>

            {{--  <td>
                @if($income->price - $income->payments->sum('amount') > 0)
                DUE
                @else
                PAID
                @endif
            </td>  --}}
        </tr>
    </table>
</div>
</body>
</html>
