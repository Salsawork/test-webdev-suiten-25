<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'PayWiz System' }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-50 text-gray-700 font-sans antialiased">

<div class="flex min-h-screen">

    {{-- ========== SIDEBAR ========== --}}
    <aside class="w-64 bg-white border-r border-gray-200 flex flex-col fixed inset-y-0 left-0 z-50">
        
        {{-- Logo Area --}}
        <div class="h-16 flex items-center px-6 border-b border-gray-100">
            <div class="flex items-center gap-3">
                <div class="w-8 h-8 bg-blue-600 rounded-lg flex items-center justify-center text-white font-bold shadow-sm">
                    P
                </div>
                <span class="text-xl font-bold text-gray-800 tracking-tight">PayWiz</span>
            </div>
        </div>

        {{-- Menu Area (Scrollable) --}}
        <nav class="flex-1 overflow-y-auto px-3 py-4 space-y-6">

            {{-- GROUP: MASTER DATA --}}
            <div>
                <p class="px-3 text-xs font-semibold text-gray-400 uppercase tracking-wider mb-2">Master Data</p>
                <ul class="space-y-1">
                    
                    {{-- PEGAWAI --}}
                    <li>
                        <a href="{{ route('employees.index') }}" 
                           class="flex items-center gap-3 px-3 py-2 rounded-lg text-sm font-medium transition-colors
                           {{ request()->routeIs('employees.*') ? 'bg-blue-50 text-blue-700' : 'text-gray-600 hover:bg-gray-50 hover:text-gray-900' }}">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
                            Pegawai
                        </a>
                    </li>

                    {{-- BAGIAN (JABATAN) --}}
                    <li>
                        <a href="{{ route('positions.index') }}" 
                           class="flex items-center gap-3 px-3 py-2 rounded-lg text-sm font-medium transition-colors
                           {{ request()->routeIs('positions.*') ? 'bg-blue-50 text-blue-700' : 'text-gray-600 hover:bg-gray-50 hover:text-gray-900' }}">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                            Bagian (Jabatan)
                        </a>
                    </li>

                    {{-- SHIFT KERJA --}}
                    <li>
                        <a href="{{ route('shifts.index') }}" 
                           class="flex items-center gap-3 px-3 py-2 rounded-lg text-sm font-medium transition-colors
                           {{ request()->routeIs('shifts.*') ? 'bg-blue-50 text-blue-700' : 'text-gray-600 hover:bg-gray-50 hover:text-gray-900' }}">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            Shift Kerja
                        </a>
                    </li>

                    {{-- BANK --}}
                    <li>
                        <a href="{{ route('banks.index') }}" 
                           class="flex items-center gap-3 px-3 py-2 rounded-lg text-sm font-medium transition-colors
                           {{ request()->routeIs('banks.*') ? 'bg-blue-50 text-blue-700' : 'text-gray-600 hover:bg-gray-50 hover:text-gray-900' }}">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"></path></svg>
                            Bank
                        </a>
                    </li>
                </ul>
            </div>

            {{-- GROUP: OPERASIONAL --}}
            <div>
                <p class="px-3 text-xs font-semibold text-gray-400 uppercase tracking-wider mb-2">Operasional</p>
                <ul class="space-y-1">
                    
                    {{-- ABSENSI --}}
                    <li>
                        <a href="{{ route('attendances.index') }}" 
                           class="flex items-center gap-3 px-3 py-2 rounded-lg text-sm font-medium transition-colors
                           {{ request()->routeIs('attendances.*') ? 'bg-blue-50 text-blue-700' : 'text-gray-600 hover:bg-gray-50 hover:text-gray-900' }}">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                            Absensi
                        </a>
                    </li>

                    {{-- PAYROLL (Belum ada route, jadi pakai URL check manual atau #) --}}
                    <li>
                        <a href="#" 
                           class="flex items-center gap-3 px-3 py-2 rounded-lg text-sm font-medium text-gray-600 hover:bg-gray-50 hover:text-gray-900 transition-colors">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                            Payroll
                        </a>
                    </li>
                </ul>
            </div>

            {{-- GROUP: SYSTEM --}}
            <div>
                <p class="px-3 text-xs font-semibold text-gray-400 uppercase tracking-wider mb-2">System</p>
                <ul class="space-y-1">
                    <li>
                        <a href="#" 
                           class="flex items-center gap-3 px-3 py-2 rounded-lg text-sm font-medium text-gray-600 hover:bg-gray-50 hover:text-gray-900 transition-colors">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                            Pengaturan
                        </a>
                    </li>
                </ul>
            </div>

        </nav>

        {{-- Footer/Logout Area --}}
        <div class="p-4 border-t border-gray-100">
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="flex w-full items-center gap-3 px-3 py-2 rounded-lg text-sm font-medium text-red-600 hover:bg-red-50 transition-colors">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path></svg>
                    Logout
                </button>
            </form>
        </div>

    </aside>

    {{-- ========== MAIN CONTENT ========== --}}
    <main class="flex-1 ml-64 p-8">

        {{-- Top Bar --}}
        <div class="flex justify-between items-center mb-8">
            <h1 class="text-2xl font-bold text-gray-800">
                @yield('title', 'Dashboard')
            </h1>
            
            {{-- User Profile --}}
            <div class="flex items-center gap-2">
                <div class="text-right hidden sm:block">
                    <div class="text-sm font-semibold text-gray-700">{{ Auth::user()->name ?? 'Admin' }}</div>
                    <div class="text-xs text-gray-500">Administrator</div>
                </div>
                <div class="w-10 h-10 rounded-full bg-blue-100 flex items-center justify-center text-blue-600 font-bold">
                    {{ substr(Auth::user()->name ?? 'A', 0, 1) }}
                </div>
            </div>
        </div>

        {{-- Page Content --}}
        <div>
            @yield('content')
        </div>
    </main>

</div>

</body>
</html>