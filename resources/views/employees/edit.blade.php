@extends('layouts.app')

@section('content')
<div class="container py-4">

    <div class="d-flex justify-content-between mb-4">
        <h4>Edit Pegawai</h4>

        <div class="flex items-center space-x-3 mt-6">
            <a href="{{ route('employees.index') }}" class="btn btn-light">Kembali</a>

            <form action="{{ route('employees.delete', $employee->id) }}" method="POST" class="d-inline">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger" onclick="return confirm('Hapus data pegawai?')">Hapus</button>
            </form>

            <button class="btn btn-primary" onclick="document.getElementById('form-edit').submit()">Simpan</button>
        </div>
    </div>

    <form id="form-edit" action="{{ route('employees.update', $employee->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="row g-4">
            <div class="col-md-6">

                {{-- NAME --}}
                <div class="mb-3">
                    <label>Nama Pegawai</label>
                    <input type="text" name="name" class="form-control"
                           value="{{ old('name', $employee->name) }}">
                </div>

                {{-- POSITION --}}
                <div class="mb-3">
                    <label>Bagian</label>
                    <div class="d-flex gap-2">
                        <select class="form-select" name="position_id">
                            <option value="">-- Pilih Bagian --</option>
                            @foreach($positions as $pos)
                                <option value="{{ $pos->id }}" 
                                    {{ $pos->id == $employee->position_id ? 'selected' : '' }}>
                                    {{ $pos->name }}
                                </option>
                            @endforeach
                        </select>
                        <a href="{{ route('positions.create') }}" class="btn btn-primary">+ Bagian</a>
                    </div>
                </div>

                {{-- PHONE --}}
                <div class="mb-3">
                    <label>Nomor Telepon</label>
                    <input type="text" name="phone" class="form-control"
                           value="{{ old('phone', $employee->phone) }}">
                </div>

                {{-- BANK ACCOUNT NUMBER --}}
                <div class="mb-3">
                    <label>Nomor Rekening</label>
                    <input type="text" name="bank_account_number" class="form-control"
                           value="{{ old('bank_account_number', $employee->bank_account_number) }}">
                </div>

                {{-- BANK --}}
                <div class="mb-3">
                    <label>Bank</label>
                    <select class="form-select" name="bank_id">
                        <option value="">-- Pilih Bank --</option>
                        @foreach($banks as $bk)
                            <option value="{{ $bk->id }}"
                                {{ $bk->id == $employee->bank_id ? 'selected' : '' }}>
                                {{ $bk->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                {{-- SHIFT --}}
                <div class="mb-3">
                    <label>Shift</label>
                    <div class="d-flex gap-2">
                        <select class="form-select" name="shift_id">
                            <option value="">-- Pilih Shift --</option>
                            @foreach($shifts as $s)
                                <option value="{{ $s->id }}"
                                    {{ $s->id == $employee->shift_id ? 'selected' : '' }}>
                                    {{ $s->name }}
                                </option>
                            @endforeach
                        </select>
                        <a href="{{ route('shifts.create') }}" class="btn btn-primary">+ Shift</a>
                    </div>
                </div>

            </div>



            {{-- ==================== RIGHT ==================== --}}
            <div class="col-md-6">

                {{-- SALARY PERIOD --}}
                <div class="mb-3">
                    <label>Periode Gajian</label>
                    <select class="form-select" name="salary_period">
                        <option value="2_minggu" 
                            {{ $employee->salary_period == '2_minggu' ? 'selected' : '' }}>
                            2 Minggu
                        </option>

                        <option value="1_bulan" 
                            {{ $employee->salary_period == '1_bulan' ? 'selected' : '' }}>
                            1 Bulan
                        </option>
                    </select>
                </div>

                {{-- SALARY BASE --}}
                <div class="mb-3">
                    <label>Gaji Pokok</label>
                    <input type="number" name="salary_base" class="form-control"
                           value="{{ old('salary_base', $employee->salary_base) }}">
                </div>

                {{-- MEAL ALLOWANCE --}}
                <div class="mb-3">
                    <label>Uang Makan</label>
                    <input type="number" name="meal_allowance" class="form-control"
                           value="{{ old('meal_allowance', $employee->meal_allowance) }}">
                </div>

                {{-- MEAL ALLOWANCE HOLIDAY --}}
                <div class="mb-3">
                    <label>Uang Makan (tanggal merah)</label>
                    <input type="number" name="meal_allowance_holiday" class="form-control"
                           value="{{ old('meal_allowance_holiday', $employee->meal_allowance_holiday) }}">
                </div>

                {{-- OVERTIME RATE --}}
                <div class="mb-3">
                    <label>Rate Lembur</label>
                    <input type="number" name="overtime_rate" class="form-control"
                           value="{{ old('overtime_rate', $employee->overtime_rate) }}">
                </div>

                {{-- OVERTIME RATE HOLIDAY --}}
                <div class="mb-3">
                    <label>Rate Lembur (tanggal merah)</label>
                    <input type="number" name="overtime_rate_holiday" class="form-control"
                           value="{{ old('overtime_rate_holiday', $employee->overtime_rate_holiday) }}">
                </div>

            </div>

        </div>
    </form>

</div>
@endsection
