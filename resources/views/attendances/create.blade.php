@extends('layouts.app')

@section('title', 'Input Absensi')

@section('content')
<div class="container mx-auto px-4 py-6">

    {{-- Header --}}
    <div class="flex justify-between items-center mb-6">
        <h4 class="text-xl font-bold text-gray-800">Absen Masuk Harian</h4>

        <div class="flex gap-3">
            <a href="{{ route('attendances.index') }}" class="bg-white border border-gray-300 text-gray-700 hover:bg-gray-50 px-4 py-2 rounded-lg text-sm font-medium transition">
                Batal
            </a>
            {{-- Tombol Submit Form --}}
            <button type="submit" form="form-absen" class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded-lg text-sm font-medium transition shadow-sm">
                Simpan Data
            </button>
        </div>
    </div>

    <form id="form-absen" action="{{ route('attendances.store') }}" method="POST">
        @csrf

        <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden flex flex-col min-h-[500px]">

            {{-- Table Header --}}
            <div class="flex w-full bg-gray-50 border-b border-gray-200 px-6 py-3 text-xs font-bold text-gray-500 uppercase tracking-wider items-center">
                {{-- Checkbox All --}}
                <div class="w-12 text-center">
                    <input type="checkbox" id="checkAll" class="rounded border-gray-300 text-blue-600 focus:ring-blue-500 h-4 w-4 cursor-pointer">
                </div>

                <div class="w-1/6">Tanggal</div>
                <div class="w-1/4">Nama Pegawai</div>
                <div class="w-1/6">Bagian</div>
                <div class="w-1/6">Jam Pulang</div>
                <div class="flex-1">Catatan</div>
            </div>

            {{-- Table Body --}}
            <div class="divide-y divide-gray-100">
                @forelse ($employees as $emp)
                    <div class="flex w-full px-6 py-4 text-sm text-gray-700 items-center hover:bg-blue-50 transition duration-150">

                        {{-- Checkbox Row --}}
                        {{-- Logika: Checkbox ini menentukan apakah data baris ini dikirim --}}
                        <div class="w-12 text-center">
                            <input type="checkbox" 
                                   name="rows[{{ $emp->id }}][checked]" 
                                   value="1"
                                   class="row-check rounded border-gray-300 text-blue-600 focus:ring-blue-500 h-4 w-4 cursor-pointer" 
                                   checked>
                        </div>

                        {{-- Tanggal --}}
                        <div class="w-1/6 font-medium text-gray-500">
                            {{ date('d M Y') }}
                        </div>

                        {{-- Nama Pegawai --}}
                        <div class="w-1/4 font-bold text-gray-900 pr-4 truncate">
                            {{ $emp->name }}
                        </div>

                        {{-- Bagian --}}
                        <div class="w-1/6 pr-4">
                            <span class="bg-gray-100 text-gray-600 text-xs px-2 py-1 rounded-full border border-gray-200">
                                {{ $emp->position->name ?? '-' }}
                            </span>
                        </div>

                        {{-- Jam Pulang (Select) --}}
                        <div class="w-1/6 pr-4">
                            <select name="rows[{{ $emp->id }}][jam_pulang]"
                                class="w-full text-sm border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 p-2 bg-white shadow-sm cursor-pointer">
                                <option value="17" selected>17:00 (Normal)</option>
                                @for ($i = 18; $i <= 24; $i++)
                                    <option value="{{ $i }}" class="font-semibold text-blue-600">
                                        {{ $i }}:00 (Lembur)
                                    </option>
                                @endfor
                            </select>
                        </div>

                        {{-- Catatan (Input) --}}
                        <div class="flex-1">
                            <input type="text" name="rows[{{ $emp->id }}][catatan]"
                                class="w-full text-sm border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 p-2 shadow-sm placeholder-gray-400"
                                placeholder="Opsional...">
                        </div>

                        {{-- ========== HIDDEN INPUTS (PENTING) ========== --}}
                        {{-- Ini yang akan mengirim employee_id ke controller --}}
                        <input type="hidden" name="rows[{{ $emp->id }}][employee_id]" value="{{ $emp->id }}">
                        <input type="hidden" name="rows[{{ $emp->id }}][position_id]" value="{{ $emp->position_id }}">

                    </div>
                @empty
                    <div class="p-10 text-center text-gray-500">
                        Data pegawai tidak ditemukan. Silakan tambah pegawai di Master Data.
                    </div>
                @endforelse
            </div>
        </div>
    </form>
</div>

{{-- Script Check All --}}
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const checkAll = document.getElementById('checkAll');
        
        if(checkAll) {
            checkAll.addEventListener('change', function() {
                const rowChecks = document.querySelectorAll('.row-check');
                rowChecks.forEach(function(checkbox) {
                    checkbox.checked = checkAll.checked;
                });
            });
        }
    });
</script>
@endsection