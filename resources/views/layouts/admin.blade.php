<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>admin</title>
    <link rel="stylesheet" href="{{ asset('style/admin.css') }}" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900&display=swap" rel="stylesheet" />
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
</head>
<body>
    <div class="sidebar">
        <div class="logo"></div>
        <ul class="menu">
            <li class="active"><a href="{{ route('admin') }}"><i class="bx bxs-dashboard"></i><span>Dashboard</span></a></li>
            <li><a href="{{ route('transactions.index') }}"><i class="bx bx-money-withdraw"></i><span>Manajemen Transaksi Keuangan</span></a></li>
            <li><a href="{{ route('transactions.create') }}"><i class="bx bx-notepad"></i><span>Input Data</span></a></li>
            <li><a href="{{ url('analisa') }}"><i class="bx bxs-analyse"></i><span>Analisis Keuangan</span></a></li>
            <li><a href="{{ route('logout') }}"><i class="bx bxs-log-out"></i><span>Logout</span></a></li>
        </ul>

        <div class="widget"></div>
    </div>

    <div class="main-content">
        <div class="header-wrapper">
            <div class="header-title">
                <span>FinAcc Pro</span>
                <span>Dashboard</span>
            </div>
            <div class="user-info">
                <div class="search">
                    <i class="bx bx-search-alt"></i>
                    <input type="text" placeholder="Search" />
                </div>
                <img src="{{ asset('image/report.png') }}" alt="" />
            </div>
        </div>
        <div class="widget">
            <div class="widget-content">
                <h4>Total Transactions</h4>
                <p>{{ $totalTransactions ?? 'N/A' }}</p>
            </div>
        </div>
        @yield('content')
    </div>
</body>
</html>
