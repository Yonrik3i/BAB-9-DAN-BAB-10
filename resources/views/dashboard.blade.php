@extends('admin')

@section('dashboard-widget')
  <!-- Widget untuk menampilkan jumlah data transaksi -->
  <div class="widget">
    <h3>Jumlah Data Transaksi</h3>
    <p>Total: {{$totalTransactions}}</p>
  </div>
@endsection

@section('content')
  <!-- Konten lainnya di sini -->
@endsection
