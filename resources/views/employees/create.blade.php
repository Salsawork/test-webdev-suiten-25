@extends('layouts.app')

@section('content')
<div class="container py-4">

    <div class="d-flex justify-content-between mb-4">
        <h4>Detail Pegawai</h4>

        <div>
            <a href="{{ route('employees.index') }}" class="btn btn-light">Kembali</a>
            <button class="btn btn-danger">Hapus</button>
            <button type="submit" form="employeeForm" class="btn btn-primary">Simpan</button>
        </div>
    </div>

    <form id="employeeForm" action="{{ route('employees.store') }}" method="POST">
        @csrf

        <div class="row g-4">

            <div class="col-md-6">

                {{-- Nama --}}
                <div class="mb-3">
                    <label>Nama Pegawai</label>
                    <input type="text" name="name" class="form-control" placeholder="Nama Pegawai">
                </div>

                {{-- Bagian --}}
                <div class="mb-3">
                    <label>Bagian</label>
                    <div class="d-flex gap-2">
                        <select class="form-select" name="position_id">
                            <option value="">-- Pilih Bagian --</option>

                            @foreach ($positions as $pos)
                                <option value="{{ $pos->id }}">{{ $pos->name }}</option>
                            @endforeach
                        </select>
                        <a href="{{ route('positions.create') }}" class="btn btn-primary">+ Bagian</a>
                    </div>
                </div>

                {{-- Telepon --}}
                <div class="mb-3">
                    <label>Nomor Telepon</label>
                    <input type="text" name="phone" class="form-control">
                </div>

                {{-- No Rek --}}
                <div class="mb-3">
                    <label>No Rekening</label>
                    <input type="text" name="bank_account_number" class="form-control">
                </div>

                {{-- Bank --}}
                <div class="mb-3">
                    <label>Bank</label>
                    <select class="form-select" name="bank_id">
                        <option value="">-- Pilih Bank --</option>

                        @foreach ($banks as $bank)
                            <option value="{{ $bank->id }}">{{ $bank->name }}</option>
                        @endforeach
                    </select>
                </div>

                {{-- Shift --}}
                <div class="mb-3">
                    <label>Shift</label>
                    <div class="d-flex gap-2">
                        <select class="form-select" name="shift_id">
                            <option value="">-- Pilih Shift --</option>

                            @foreach ($shifts as $shift)
                                <option value="{{ $shift->id }}">{{ $shift->name }}</option>
                            @endforeach
                        </select>
                        <a href="{{ route('shifts.create') }}" class="btn btn-primary">+ Shift</a>
                    </div>
                </div>

            </div>


            <div class="col-md-6">

                {{-- Periode Gaji --}}
                <div class="mb-3">
                    <label>Periode Gajian</label>
                    <select class="form-select" name="salary_period">
                        <option value="2_weeks">2 Minggu</option>
                        <option value="monthly">1 Bulan</option>
                    </select>
                </div>

                {{-- Gaji Pokok --}}
                <div class="mb-3">
                    <label>Gaji Pokok</label>
                    <input type="number" name="salary_base" class="form-control">
                </div>

                {{-- Uang Makan --}}
                <div class="mb-3">
                    <label>Uang Makan</label>
                    <input type="number" name="meal_allowance" class="form-control">
                </div>

                {{-- Uang Makan Merah --}}
                <div class="mb-3">
                    <label>Uang Makan (Tanggal Merah)</label>
                    <input type="number" name="meal_allowance_holiday" class="form-control">
                </div>

                {{-- Rate Lembur --}}
                <div class="mb-3">
                    <label>Rate Lembur</label>
                    <input type="number" name="overtime_rate" class="form-control">
                </div>

                {{-- Rate Lembur Merah --}}
                <div class="mb-3">
                    <label>Rate Lembur (Tanggal Merah)</label>
                    <input type="number" name="overtime_rate_holiday" class="form-control">
                </div>

            </div>

        </div>
    </form>

</div>
@endsection
