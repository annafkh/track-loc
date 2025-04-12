<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>📍 Dashboard Pelacakan</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
  <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
  <style>
    #map { height: 500px; border-radius: 1.5rem; }
    .table th, .table td {
      padding: 12px 18px;
      text-align: left;
    }
    .table tbody tr:hover {
      background-color: rgba(255, 255, 255, 0.05);
    }
    .btn {
      transition: background-color 0.3s ease, transform 0.3s ease;
    }
    .btn:hover {
      background-color: #2b6cb0;
      transform: scale(1.05);
    }
    .form-select {
      transition: border-color 0.3s ease;
    }
    .form-select:hover {
      border-color: #3182ce;
    }
    /* Elegant background */
    .bg-elegant {
      background: #1a202c;
      background-image: linear-gradient(45deg, #2d3748, #1a202c);
    }
    .shadow-custom {
      box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
    }
    .card {
      background-color: #2d3748;
      border-radius: 1rem;
      padding: 20px;
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
    }
  </style>
</head>
<body class="bg-gray-950 text-white min-h-screen font-sans p-8">
  <div class="max-w-7xl mx-auto space-y-8">
    <div class="flex items-center justify-between">
      <h1 class="text-4xl font-extrabold text-transparent bg-clip-text bg-gradient-to-r from-red-400 to-indigo-600">📍 Dashboard Pelacakan</h1>
      <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button class="bg-red-600 hover:bg-red-700 transition px-6 py-3 rounded-lg text-sm font-semibold">Logout</button>
      </form>
    </div>

    @if(session('success'))
    <div class="bg-green-600 text-white p-4 rounded-lg shadow-lg transform transition duration-300 ease-in-out">
      {{ session('success') }}
    </div>
    @endif

    <div class="card bg-elegant">
      <label for="userSelect" class="block text-lg font-semibold mb-4">🎯 Pilih Target:</label>
      <select id="userSelect" class="w-full bg-gray-800 text-white p-4 rounded-lg border border-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-400">
        <option value="">-- Tampilkan Semua --</option>
        @foreach ($targets as $t)
          <option value="{{ $t->id }}">{{ $t->slug }}</option>
        @endforeach
      </select>
    </div>

    <div id="map" class="shadow-custom mt-8"></div>

    <div class="card bg-elegant mt-8">
      <h2 class="text-2xl font-bold text-blue-300 mb-6">📄 Data Lokasi Target</h2>
      <div class="overflow-x-auto">
        <table class="min-w-full text-sm table-auto">
          <thead class="bg-gray-800 text-gray-400">
            <tr>
              <th class="p-3">Slug</th>
              <th class="p-3">Latitude</th>
              <th class="p-3">Longitude</th>
              <th class="p-3">Last Access</th>
              <th class="p-3">User Agent</th>
              <th class="p-3">Aksi</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($targets as $t)
            <tr class="border-t border-gray-700 hover:bg-gray-800 transition duration-300 ease-in-out">
              <td class="p-3">{{ $t->slug }}</td>
              <td class="p-3">{{ $t->latitude }}</td>
              <td class="p-3">{{ $t->longitude }}</td>
              <td class="p-3">{{ $t->accessed_at }}</td>
              <td class="p-3">{{ Str::limit($t->user_agent, 40) }}</td>
              <td class="p-3">
                <div class="flex gap-4">
                  <a href="{{ route('target.edit', $t->id) }}" class="text-blue-400 hover:underline">Edit</a>
                  <form method="POST" action="{{ route('target.delete', $t->id) }}" onsubmit="return confirm('Hapus target ini?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="text-red-500 hover:underline">Hapus</button>
                  </form>
                </div>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>

  <script>
    const map = L.map('map').setView([-2.5489, 118.0149], 5);
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
      maxZoom: 18,
    }).addTo(map);

    const allTargets = @json($targets);
    let markers = [];

    function updateMap(targetId = null) {
      markers.forEach(marker => map.removeLayer(marker));
      markers = [];

      const filtered = targetId
        ? allTargets.filter(t => t.id == targetId)
        : allTargets;

      filtered.forEach(t => {
        if (t.latitude && t.longitude) {
          const marker = L.marker([t.latitude, t.longitude])
            .addTo(map)
            .bindPopup(`<b>${t.slug}</b><br>${t.accessed_at || '-'}`);
          markers.push(marker);
          map.setView([t.latitude, t.longitude], 12);
        }
      });

      if (filtered.length === 0) {
        map.setView([-2.5489, 118.0149], 5);
      }
    }

    updateMap();

    document.getElementById('userSelect').addEventListener('change', function () {
      const selectedId = this.value;
      updateMap(selectedId || null);
    });
  </script>
</body>
</html>
