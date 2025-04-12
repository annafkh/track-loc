<!DOCTYPE html>
<html>
<head>
    <title>Login Admin</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-900 flex items-center justify-center min-h-screen text-white">
    <div class="bg-gray-800 p-6 rounded-xl w-full max-w-md shadow-lg">
        <h2 class="text-2xl font-bold mb-6 text-center">🔒 Login Admin</h2>
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <label class="block mb-2">Email</label>
            <input type="email" name="email" class="w-full p-3 mb-4 rounded bg-gray-700" required>

            <label class="block mb-2">Password</label>
            <input type="password" name="password" class="w-full p-3 mb-4 rounded bg-gray-700" required>

            @if ($errors->any())
                <div class="bg-red-500 p-2 rounded text-sm mb-4">{{ $errors->first() }}</div>
            @endif

            <button type="submit" class="w-full bg-blue-500 hover:bg-blue-600 p-3 rounded">
                Masuk
            </button>
        </form>
    </div>
</body>
</html>
