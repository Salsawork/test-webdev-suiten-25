@extends('layouts.app')

@section('title', 'Master Data')

@section('content')
<div class="container mx-auto px-4 py-6">

    {{-- Header & Button --}}
    <div class="w-full flex justify-end mb-4">
        <a href="{{ route('positions.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg text-sm font-medium transition shadow-sm">
            + Tambah Data Bagian
        </a>
    </div>

    <div class="flex justify-between items-center mb-6">
        <h2 class="text-xl font-bold text-gray-800">Daftar Bagian</h2>
    </div>

    {{-- Content Card --}}
    <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden flex flex-col min-h-[400px]">
        
        <div class="p-6 flex-1 flex flex-col">
            
            {{-- Table Header --}}
            <div class="flex w-full border-b border-gray-200 pb-3 text-sm font-bold text-gray-500 mb-2 uppercase tracking-wider">
                <span class="w-16 text-center">No</span>
                <span class="flex-1">Nama Bagian</span>
                <span class="w-32 text-right">Aksi</span>
            </div>
            
            {{-- DATA LOOPING --}}
            <div class="flex-1">
                @forelse ($positions as $index => $position)
                    <div class="flex w-full border-b border-gray-100 py-4 text-sm text-gray-700 items-center hover:bg-gray-50 transition duration-150">
                        
                        {{-- No (Menyesuaikan dengan halaman pagination) --}}
                        <div class="w-16 text-center font-medium text-gray-500">
                            {{ $positions->firstItem() + $index }}
                        </div>

                        {{-- Nama Bagian --}}
                        <div class="flex-1 font-medium text-gray-900 truncate">
                            {{ $position->name }}
                        </div>

                        {{-- Aksi --}}
                        <div class="w-32 flex justify-end gap-3 pr-2">
                            
                            {{-- Edit --}}
                            <a href="{{ route('positions.edit', $position->id) }}" class="text-gray-400 hover:text-blue-600 transition" title="Edit">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                </svg>
                            </a>

                            {{-- Delete (Form Wajib untuk Method DELETE) --}}
                            <form action="{{ route('positions.delete', $position->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus bagian ini?');">
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
                    <div class="h-full flex flex-col items-center justify-center text-center py-10">
                        <div class="bg-gray-50 p-4 rounded-full mb-3">
                            <svg class="w-10 h-10 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 10h16M4 14h16M4 18h16"></path>
                            </svg>
                        </div>
                        <h3 class="text-gray-900 font-medium">Data bagian kosong</h3>
                        <p class="text-gray-500 text-sm mt-1">Silakan tambah data bagian baru.</p>
                    </div>
                @endforelse
            </div>

        </div>

        {{-- Pagination --}}
        @if($positions->hasPages())
            <div class="bg-gray-50 px-6 py-4 border-t border-gray-200">
                {{ $positions->links() }}
            </div>
        @endif
        
    </div>
</div>
@endsection