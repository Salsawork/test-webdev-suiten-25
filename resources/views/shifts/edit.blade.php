@extends('layouts.app')

@section('content')
<div class="container">
    <h3>Edit Shift</h3>

    <form action="{{ route('shifts.update', $shift->id) }}" method="POST">
        @csrf
        <div class="mb-3">
            <label>Nama</label>
            <input type="text" name="name" class="form-control" value="{{ $shift->name }}" required>
        </div>

        <div class="mb-3">
            <label>Start Time</label>
            <input type="time" name="start_time" class="form-control" value="{{ $shift->start_time }}" required>
        </div>

        <div class="mb-3">
            <label>End Time</label>
            <input type="time" name="end_time" class="form-control" value="{{ $shift->end_time }}" required>
        </div>

        <button class="btn btn-primary">Update</button>
        <a href="{{ route('shifts.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
