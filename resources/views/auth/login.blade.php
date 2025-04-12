<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap');
        body { font-family: 'Inter', sans-serif; }
    </style>
</head>
<body class="bg-gradient-to-br from-gray-900 to-gray-800 flex items-center justify-center min-h-screen text-white">

    <div class="bg-gray-900 bg-opacity-80 backdrop-blur-md p-8 rounded-2xl w-full max-w-md shadow-2xl transition-all duration-500 ease-in-out transform hover:scale-[1.01]">
        <h2 class="text-3xl font-bold mb-6 text-center text-white">🔒 Login Admin</h2>
        
        <form method="POST" action="{{ route('login') }}" class="space-y-5">
            @csrf

            <div>
                <label class="block text-sm font-medium mb-1">Email</label>
                <input type="email" name="email" placeholder="admin@example.com"
                    class="w-full p-3 rounded-lg bg-gray-800 border border-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-500 transition duration-200" required>
            </div>

            <div>
                <label class="block text-sm font-medium mb-1">Password</label>
                <input type="password" name="password" placeholder="••••••••"
                    class="w-full p-3 rounded-lg bg-gray-800 border border-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-500 transition duration-200" required>
            </div>

            @if ($errors->any())
                <div class="bg-red-600/90 p-3 rounded-md text-sm text-white text-center shadow-inner">
                    {{ $errors->first() }}
                </div>
            @endif

            <button type="submit"
                class="w-full bg-blue-600 hover:bg-blue-700 transition-all duration-300 p-3 rounded-lg font-semibold shadow-md">
                Masuk
            </button>
        </form>
    </div>

</body>
</html>