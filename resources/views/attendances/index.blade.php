@extends('layouts.app')

@section('title', 'Data Absensi')

@section('content')
    <div class="container mx-auto px-4 py-6">

        {{-- Tombol Tambah --}}
        <div class="w-full flex justify-end mb-4">
            <a href="{{ route('attendances.create') }}"
                class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg text-sm font-medium transition shadow-sm">
                + Input Absensi
            </a>
        </div>

        {{-- Sub-Header --}}
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-xl font-bold text-gray-800">Riwayat Absensi</h2>

            {{-- Filter Dummy --}}
            <div class="relative text-sm">
                <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-500">
                    <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                    </svg>
                </div>
            </div>
        </div>

        {{-- Content Card --}}
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden flex flex-col min-h-[500px]">

            <div class="p-6 flex-1 flex flex-col">

                {{-- Table Header --}}
                <div
                    class="flex w-full border-b border-gray-200 pb-3 text-sm font-bold text-gray-500 mb-2 uppercase tracking-wider">
                    <span class="w-1/6">Tanggal</span>
                    <span class="w-1/6">Nama</span>
                    <span class="w-1/6 text-center">Jam Pulang</span>

                    {{-- KOLOM BARU: HARI KERJA --}}
                    <span class="w-1/6 text-center text-blue-600">Hari Kerja</span>

                    <span class="w-1/6 text-right">Lembur</span>
                </div>

                {{-- DATA LOOPING --}}
                <div class="flex-1">
                    @forelse ($attendances as $attendance)
                        <div
                            class="flex w-full border-b border-gray-100 py-4 text-sm text-gray-700 items-center hover:bg-gray-50 transition duration-150">

                            {{-- Tanggal --}}
                            <div class="w-1/6 font-medium text-gray-900 truncate pr-2">
                                {{ \Carbon\Carbon::parse($attendance->date)->format('d/m/Y') }}
                            </div>

                            {{-- Nama --}}
                            <div class="w-1/6 truncate pr-2 font-medium">
                                {{ $attendance->employee->name ?? '-' }}
                            </div>

                            {{-- Jam Pulang --}}
                            <div class="w-1/6 text-center">
                                {{ \Carbon\Carbon::parse($attendance->clock_out)->format('H:i') }}
                            </div>

                            {{-- VALUE HARI KERJA --}}
                            <div class="w-1/6 text-center font-bold text-blue-600">
                                {{ $attendance->work_days }} Hari
                            </div>

                            {{-- Total Lembur --}}
                            <div class="w-1/6 text-right">
                                @if ($attendance->total_overtime_hours > 0)
                                    <span class="text-orange-600 font-bold bg-orange-50 px-2 py-1 rounded">
                                        +{{ $attendance->total_overtime_hours }} Jam
                                    </span>
                                @else
                                    <span class="text-gray-400">-</span>
                                @endif
                            </div>

                        </div>

                    @empty
                        {{-- EMPTY STATE --}}
                        <div class="h-full flex flex-col items-center justify-center text-center py-20">
                            <div class="bg-gray-50 p-4 rounded-full mb-3">
                                <svg class="w-10 h-10 text-gray-400" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </div>
                            <h3 class="text-gray-900 font-medium">Belum ada data absensi</h3>
                            <p class="text-gray-500 text-sm mt-1">Silakan input absensi harian.</p>
                        </div>
                    @endforelse
                </div>

            </div>

            {{-- Pagination --}}
            @if ($attendances->hasPages())
                <div class="bg-gray-50 px-6 py-4 border-t border-gray-200">
                    {{ $attendances->links() }}
                </div>
            @endif

        </div>
    </div>
@endsection
