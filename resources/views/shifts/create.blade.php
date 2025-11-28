@extends('layouts.app')

@section('content')
<div class="container">
    <h3>Tambah Shift</h3>

    <form action="{{ route('shifts.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label>Nama </label>
            <input type="text" name="name" class="form-control" required>
        </div>

        {{-- start time --}}
        <div class="mb-3">
            <label>Start Time</label>
            <input type="time" name="start_time" class="form-control" required>
        </div>

        {{-- end time --}}
        <div class="mb-3">
            <label>End Time</label>
            <input type="time" name="end_time" class="form-control" required>
        </div>

        <button class="btn btn-primary">Simpan</button>
        <a href="{{ route('shifts.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
