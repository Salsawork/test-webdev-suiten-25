@extends('layouts.app')

@section('content')
<div class="container">
    <h3>Edit Bank</h3>

    <form action="{{ route('banks.update', $bank->id) }}" method="POST">
        @csrf
        <div class="mb-3">
            <label>Nama Bank</label>
            <input type="text" name="name" class="form-control" value="{{ $bank->name }}" required>
        </div>

        <button class="btn btn-primary">Update</button>
        <a href="{{ route('banks.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
