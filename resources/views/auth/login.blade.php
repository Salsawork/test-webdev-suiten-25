<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - PayWiz</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-100 min-h-screen flex items-center justify-center">

    <div class="w-md max-w-sm">

        <div class="bg-white shadow-xl rounded-[8px] p-5 border border-gray-200 flex flex-col gap-[24px] min-w-[400px]">

            <h1 class="text-2xl font-bold text-gray-800 text-center">
                Login
            </h1>

            @if ($errors->any())
                <div class="mb-4 p-4 bg-red-100 text-red-700 rounded-lg text-sm border border-red-300">
                    {{ $errors->first() }}
                </div>
            @endif

            <form action="{{ route('login.process') }}" method="POST" class="flex flex-col gap-[24px]">
                @csrf

                {{-- Email --}}
                <div>
                    <label class="block text-gray-700 font-medium mb-2 text-sm">Email</label>
                    <input
                        type="email"
                        name="email"
                        class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-400 focus:outline-none"
                        placeholder="Masukkan email"
                        required
                    >
                </div>

                {{-- Password --}}
                <div>
                    <label class="block text-gray-700 font-medium mb-1 text-sm">Password</label>
                    <input
                        type="password"
                        name="password"
                        class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-400 focus:outline-none"
                        placeholder="Masukkan password"
                        required
                    >
                </div>

                {{-- Tombol Login --}}
                <button
                    type="submit"
                    class="w-full py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-lg font-semibold transition"
                >
                    Login
                </button>
            </form>
        </div>

    </div>

</body>
</html>
