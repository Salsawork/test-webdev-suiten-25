@extends('layouts.app')

@section('title', 'Master Data')

@section('content')
<div class="container mx-auto px-4 py-6">

    {{-- Tombol Tambah --}}
    <div class="w-full flex justify-end mb-4">
        <a href="{{ route('employees.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg text-sm font-medium transition shadow-sm">
            + Tambah Data Pegawai
        </a>
    </div>

    {{-- Sub-Header (Judul & Filter) --}}
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-xl font-bold text-gray-800">Daftar Pegawai</h2>
        
        {{-- Filter Dropdown --}}
        <div class="relative text-sm">
            <select class="appearance-none border border-gray-300 bg-white text-gray-700 py-2 pl-3 pr-10 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition">
                <option>Filter by :</option>
                <option>Bagian</option>
                <option>Shift</option>
            </select>
            <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-500">
                <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
            </div>
        </div>
    </div>

    {{-- Content Card --}}
    <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden flex flex-col min-h-[500px]">
        
        <div class="p-6 flex-1 flex flex-col">
            
            {{-- Table Header --}}
            <div class="flex w-full border-b border-gray-200 pb-3 text-sm font-bold text-gray-500 mb-2 uppercase tracking-wider">
                <span class="w-1/6">Nama</span>
                <span class="w-1/6">Bagian</span>
                <span class="w-1/6">No. Telepon</span>
                <span class="w-1/6">Nama Rekening</span>
                <span class="w-1/6">Bank</span>
                <span class="w-1/6 text-right">Aksi</span>
            </div>
            
            {{-- DATA LOOPING --}}
            <div class="flex-1">
                @forelse ($employees as $employee)
                    <div class="flex w-full border-b border-gray-100 py-4 text-sm text-gray-700 items-center hover:bg-gray-50 transition duration-150">
                        
                        {{-- Nama --}}
                        <div class="w-1/6 font-medium text-gray-900 truncate pr-2">
                            {{ $employee->name }}
                        </div>

                        {{-- Bagian --}}
                        <div class="w-1/6 truncate pr-2">
                            {{-- Menggunakan optional() atau ?? '-' untuk antisipasi error jika data kosong --}}
                            <span class="bg-blue-100 text-blue-800 text-xs px-2 py-1 rounded-full">
                                {{ $employee->position->name ?? '-' }}
                            </span>
                        </div>

                        {{-- No Telepon --}}
                        <div class="w-1/6 truncate pr-2">
                            {{ $employee->phone ?? '-' }}
                        </div>

                        {{-- Nama Rekening --}}
                        <div class="w-1/6 truncate pr-2">
                            {{ $employee->bank_account_holder ?? '-' }}
                        </div>

                        {{-- Bank --}}
                        <div class="w-1/6 truncate pr-2">
                            {{ $employee->bank->name ?? '-' }}
                        </div>

                        {{-- Aksi (Edit/Delete) --}}
                        <div class="w-1/6 flex justify-end gap-2">
                            <a href="{{ route('employees.edit', $employee->id) }}" class="text-gray-400 hover:text-blue-600 transition">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                </svg>
                            </a>
                            <form action="{{ route('employees.delete', $employee->id) }}" method="POST" 
                                onsubmit="return confirm('Apakah Anda yakin ingin menghapus data pegawai ini?')" 
                                class="inline-block"> {{-- Class untuk memastikan form tetap sebaris --}}
                              @csrf
                              @method('DELETE')
                              
                              <button type="submit" class="text-gray-400 hover:text-red-600 transition focus:outline-none">
                                  <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                  </svg>
                              </button>
                          </form>
                        </div>
                    </div>

                @empty
                    {{-- EMPTY STATE (Hanya muncul jika data kosong) --}}
                    <div class="h-full flex flex-col items-center justify-center text-center py-20">
                        <div class="bg-gray-50 p-4 rounded-full mb-3">
                            <svg class="w-10 h-10 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"></path>
                            </svg>
                        </div>
                        <h3 class="text-gray-900 font-medium">Data belum tersedia</h3>
                        <p class="text-gray-500 text-sm mt-1">Silakan tambahkan data pegawai baru.</p>
                    </div>
                @endforelse
            </div>

        </div>

        {{-- Pagination Section --}}
        @if($employees->hasPages())
            <div class="bg-gray-50 px-6 py-4 border-t border-gray-200">
                {{ $employees->links() }} 
                {{-- Pastikan di AppServiceProvider menggunakan Paginator::useTailwind() --}}
            </div>
        @endif
        
    </div>
</div>
@endsection