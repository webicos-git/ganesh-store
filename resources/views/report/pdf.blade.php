<!DOCTYPE html>
<meta name="robots" content="noindex">
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <title>Report</title>
    <style type="text/css">
        .tg {
            border-collapse: collapse;
            border-spacing: 0;
        }

        .tg td {
            border-color: black;
            border-style: solid;
            border-width: 1px;
            font-family: Arial, sans-serif;
            font-size: 14px;
            overflow: hidden;
            padding: 10px 5px;
            word-break: normal;
        }

        .tg th {
            border-color: black;
            border-style: solid;
            border-width: 1px;
            font-family: Arial, sans-serif;
            font-size: 14px;
            font-weight: normal;
            overflow: hidden;
            padding: 10px 5px;
            word-break: normal;
        }

        .tg .tg-1wig {
            font-weight: bold;
            text-align: left;
            vertical-align: top
        }

        .tg .tg-0lax {
            text-align: left;
            vertical-align: top
        }

        body {
            font-family: sans-serif;
            padding: 0 2rem;
        }

        .top-row {
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

    </style>
</head>

<body>
    <span>Date: {{ \Carbon\Carbon::parse($date)->format('d/m/Y') }}</span>
    <div class="top-row">
        <h2>Group Name: {{ $group_name ? $group_name : 'NA' }}</h2>
    </div>
    <table class="tg">
        <thead>
            <tr>
                <th class="tg-0lax">Name</th>
                @foreach ($products as $product)
                    <th class="tg-0lax">{{ $product->product_code }}</th>
                @endforeach
                <th class="tg-1wig">TOTAL</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($customers as $key => $customer)
                <tr>
                    <td class="tg-0lax"><b>{{ $customer->fullname }}</b></td>
                    @foreach ($products as $product)
                        <td class="tg-0lax">{{ $product[$customer->id] }}</td>
                    @endforeach
                    <td class="tg-0lax"><b>{{ $customer->total_price }}</b></td>
                </tr>
            @endforeach
            
            <tr>
                <td class="tg-1wig"><b>Total</b></td>
                @foreach ($products as $product)
                    <td class="tg-0lax"><b>{{ $product->total_quantity }}</b></td>
                @endforeach
                <td class="tg-0lax"><b>{{ $total_price }}</b></td>
            </tr>
        </tbody>
    </table>
</body>

</html>
