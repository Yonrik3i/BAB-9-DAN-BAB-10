@extends('layouts.admin')

@section('content')
    <div class="main-content">
        <div class="tabel-wrapper">
            <h3 class="main-title">Input Data</h3>
            <div class="form-wrapper">
                <form action="{{ route('transactions.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="balance_sheet">Balance Sheet</label>
                        <textarea id="balance_sheet" name="balance_sheet" rows="4" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="laba_rugi">Laporan Laba Rugi</label>
                        <textarea id="laba_rugi" name="laba_rugi" rows="4" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="arus_kas">Laporan Arus Kas</label>
                        <textarea id="arus_kas" name="arus_kas" rows="4" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="image">Upload Gambar</label>
                        <input type="file" id="image" name="image" required />
                    </div>
                    <div class="button-container">
                        <button type="submit" class="move-button">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
