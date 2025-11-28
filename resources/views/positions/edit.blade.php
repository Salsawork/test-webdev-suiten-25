@extends('layouts.app')

@section('content')
<div class="container">
    <h3>Edit Jabatan</h3>

    <form action="{{ route('positions.update', $position->id) }}" method="POST">
        @csrf
        <div class="mb-3">
            <label>Nama Posisi</label>
            <input type="text" name="name" class="form-control" value="{{ $position->name }}" required>
        </div>

        <button class="btn btn-primary">Update</button>
        <a href="{{ route('positions.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
