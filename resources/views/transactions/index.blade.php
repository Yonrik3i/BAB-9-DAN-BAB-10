@extends('layouts.admin')

@section('content')
    <div class="main-content">
        <div class="tabel-wrapper">
            <h3 class="main-title">Manajemen Transaksi Keuangan</h3>
            <div class="button-container">
                <a href="{{ route('transactions.create') }}" class="move-button">Input Data</a>
                <button onclick="printTable()" class="print-button">Print Data</button>
            </div>
            <div class="tabel-container">
                <table id="transaction-table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Balance Sheet</th>
                            <th>Laporan Laba Rugi</th>
                            <th>Laporan Arus Kas</th>
                            <th>Gambar</th>
                            <th>Opsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($transactions as $transaction)
                            <tr>
                                <td>{{ $transaction->id }}</td>
                                <td>{{ $transaction->balance_sheet }}</td>
                                <td>{{ $transaction->laba_rugi }}</td>
                                <td>{{ $transaction->arus_kas }}</td>
                                <td><img src="{{ asset('storage/' . $transaction->image) }}" alt="Image" width="100"></td>
                                <td>
                                    <div class="button-container">
                                        <a href="{{ route('transactions.edit', $transaction->id) }}" class="edit-button">Edit</a>
                                        <form action="{{ route('transactions.destroy', $transaction->id) }}" method="POST" style="display: inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="remove-button">Remove</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th colspan="6">Jumlah Data: {{ $transactions->count() }}</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>

    <script>
        function printTable() {
            var printContents = document.getElementById('transaction-table').outerHTML;
            var originalContents = document.body.innerHTML;

            document.body.innerHTML = '<html><head><title>Print Table</title></head><body>' + printContents + '</body></html>';
            window.print();
            document.body.innerHTML = originalContents;
        }
    </script>
@endsection
