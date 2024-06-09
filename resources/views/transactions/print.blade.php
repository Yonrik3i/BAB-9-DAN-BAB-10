<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transactions Report</title>
    <style>
        /* Gaya CSS */
        body {
            font-family: Arial, sans-serif;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        .title {
            text-align: center;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="title">
        <h1>Transactions Report</h1>
    </div>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Balance Sheet</th>
                <th>Laporan Laba Rugi</th>
                <th>Laporan Arus Kas</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($transactions as $transaction)
            <tr>
                <td>{{ $transaction->id }}</td>
                <td>{{ $transaction->balance_sheet }}</td>
                <td>{{ $transaction->laba_rugi }}</td>
                <td>{{ $transaction->arus_kas }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
