@extends('layouts.app')

@section('title', 'Master Bank')

@section('content')
<div class="container mx-auto px-4 py-6">

    {{-- Header & Button --}}
    <div class="w-full flex justify-between items-center mb-6">
        <h2 class="text-xl font-bold text-gray-800">Daftar Bank</h2>
        
        {{-- Tambah Bank Button --}}
        <a href="{{ route('banks.create') }}" class="bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded-lg text-sm font-medium transition shadow-md">
            + Tambah Bank
        </a>
    </div>

    {{-- Content Card --}}
    <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden flex flex-col min-h-[400px]">
        
        <div class="p-6 flex-1 flex flex-col">
            {{-- <form method="GET" class="mb-4">
                <div class="relative w-full max-w-xs">
                    <input type="text" name="search" 
                           class="w-full border border-gray-300 rounded-lg py-2 pl-4 pr-10 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500/50" 
                           placeholder="Cari bank..."
                           value="{{ request('search') }}">
                    <svg class="absolute right-3 top-1/2 transform -translate-y-1/2 w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                </div>
            </form> --}}
            
            {{-- Table Header --}}
            {{-- Menggunakan Flexbox untuk simulasi struktur tabel --}}
            <div class="flex w-full border-b border-gray-200 pb-3 text-sm font-bold text-gray-500 mb-2 uppercase tracking-wider">
                <span class="w-12 text-center">No</span>
                <span class="flex-1">Nama Bank</span>
                <span class="w-24 text-right">Aksi</span>
            </div>
            
            {{-- DATA LOOPING --}}
            <div class="flex-1">
                @forelse ($banks as $bank)
                    <div class="flex w-full border-b border-gray-100 py-4 text-sm text-gray-700 items-center hover:bg-gray-50 transition duration-150">
                        
                        {{-- # --}}
                        <div class="w-12 text-center font-medium text-gray-500">
                            {{ $loop->iteration }}
                        </div>

                        {{-- Nama Bank --}}
                        <div class="flex-1 font-medium text-gray-900 truncate">
                            {{ $bank->name }}
                        </div>


                        {{-- Aksi --}}
                        <div class="w-24 flex justify-end gap-2 pr-1">
                            
                            {{-- Edit --}}
                            <a href="{{ route('banks.edit', $bank->id) }}" class="text-gray-400 hover:text-indigo-600 transition" title="Edit">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                </svg>
                            </a>

                            {{-- Delete --}}
                            <form action="{{ route('banks.delete', $bank->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus bank {{ $bank->name }}?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-gray-400 hover:text-red-600 transition" title="Hapus">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                    </svg>
                                </button>
                            </form>
                        </div>
                    </div>
                @empty
                    {{-- EMPTY STATE --}}
                    <div class="h-full flex flex-col items-center justify-center text-center py-20">
                        <div class="bg-gray-50 p-4 rounded-full mb-3">
                            <svg class="w-10 h-10 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                {{-- Icon Bank/Money --}}
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"></path>
                            </svg>
                        </div>
                        <h3 class="text-gray-900 font-medium">Data bank kosong</h3>
                        <p class="text-gray-500 text-sm mt-1">Silakan tambah data bank baru.</p>
                    </div>
                @endforelse
            </div>

        </div>

        {{-- Pagination (Jika ada) --}}
        {{-- @if(isset($banks) && $banks->hasPages())
            <div class="bg-gray-50 px-6 py-4 border-t border-gray-200">
                {{ $banks->links() }}
            </div>
        @endif --}}
        
    </div>
</div>
@endsection