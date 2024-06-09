@extends('layouts.admin')

@section('content')
    <div class="main-content">
        <div class="tabel-wrapper">
            <h3 class="main-title">Manajemen Transaksi Keuangan</h3>
            <div class="button-container">
                <a href="{{ route('transactions.create') }}" class="move-button">Input Data</a>
            </div>
            <div class="tabel-container">
                <table>
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
                                <td><img src="{{ asset('storage/app/images/' . $transaction->image) }}" alt="Image" width="100"></td>
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
@endsection
