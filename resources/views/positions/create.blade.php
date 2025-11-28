@extends('layouts.app')

@section('content')
<div class="container">
    <h3>Tambah Jabatan</h3>

    <form action="{{ route('positions.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label>Nama Posisi</label>
            <input type="text" name="name" class="form-control" required>
        </div>

        <button class="btn btn-primary">Simpan</button>
        <a href="{{ route('positions.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
