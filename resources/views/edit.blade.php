@extends('layouts.admin')

@section('content')
    <div class="main-content">
        <div class="tabel-wrapper">
            <h3 class="main-title">Edit Data</h3>
            <div class="form-wrapper">
                <form action="{{ route('transactions.update', $transaction->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="id" value="{{ $transaction->id }}" />
                    <div class="form-group">
                        <label for="balance_sheet">Balance Sheet</label>
                        <textarea id="balance_sheet" name="balance_sheet" rows="4" required>{{ $transaction->balance_sheet }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="laba_rugi">Laporan Laba Rugi</label>
                        <textarea id="laba_rugi" name="laba_rugi" rows="4" required>{{ $transaction->laba_rugi }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="arus_kas">Laporan Arus Kas</label>
                        <textarea id="arus_kas" name="arus_kas" rows="4" required>{{ $transaction->arus_kas }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="image">Upload Gambar</label>
                        <input type="file" id="image" name="image" />
                        <p>Gambar saat ini: <img src="{{ asset('storage/' . $transaction->image) }}" alt="Image" width="100"></p>
                    </div>
                    <div class="button-container">
                        <button type="submit" class="move-button">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
