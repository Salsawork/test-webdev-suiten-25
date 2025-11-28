@extends('layouts.app')

@section('content')
<div class="container">
    <h3>Tambah Bank</h3>

    <form action="{{ route('banks.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label>Nama Bank</label>
            <input type="text" name="name" class="form-control" required>
        </div>

        <button class="btn btn-primary">Simpan</button>
        <a href="{{ route('banks.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
