<!DOCTYPE html>
<html>
<head>
    <title>Edit Target</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-900 text-white min-h-screen flex items-center justify-center p-6">
    <div class="bg-gray-800 p-6 rounded-xl w-full max-w-md shadow-xl">
        <h2 class="text-xl font-bold mb-4">✏️ Edit Target</h2>
        <form method="POST" action="{{ route('target.update', $target->id) }}">
            @csrf
            @method('PUT')
            <label class="block mb-2 font-semibold">Slug:</label>
            <input type="text" name="slug" value="{{ $target->slug }}"
                   class="w-full p-2 rounded bg-gray-700 focus:outline-none mb-4" required>

            <div class="flex justify-between">
                <a href="/dashboard" class="text-gray-300 hover:underline">← Kembali</a>
                <button type="submit" class="bg-blue-500 px-4 py-2 rounded hover:bg-blue-600">Simpan</button>
            </div>
        </form>
    </div>
</body>
</html>
