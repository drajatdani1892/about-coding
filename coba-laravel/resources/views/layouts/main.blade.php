<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
        <!-- manifest -->
    <link rel="manifest" href="{{ url('/manifest.json') }}"/>
    <link rel="shortcut icon" href="{{ url('/icons/icon.png') }}" type="image/png">
  <link rel="apple-touch-icon" href="{{ url('/icons/icon-192.png') }}" type="image/png">
  </head>
  <body>
        @include('partials.navbar')
        <div class="container mt-5">
           @yield('container')
        </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <script>
            var BASE_URL = "{{ url('/') }}";
            document.addEventListener('DOMContentLoaded', init, false);

            function init() {
                if ('serviceWorker' in navigator && navigator.onLine) {
                    navigator.serviceWorker.register( BASE_URL + '/service-worker.js')
                    .then((reg) => {
                        console.log('Registrasi service worker Berhasil', reg);
                    }, (err) => {
                        console.error('Registrasi service worker Gagal', err);
                    });
                }
            }
</script>
  </body>
</html>