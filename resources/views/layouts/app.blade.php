<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - Offerwork</title>
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>

<body class="bg-gray-100 text-green-800">
    <div class="container mt-3">
        <!-- <h1>Bienvenido a Offerwork</h1> -->
        @if (session('message'))
        <div class="toast align-items-center text-white bg-success" role="alert" aria-live="assertive" aria-atomic="true" data-bs-delay="3000">
            <div class="d-flex">

                <div class="toast-body">
                    {{ session('message') }}
                </div>
                <button type="button" class="btn-close me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
        </div>
        @endif
    </div>

    @yield('content')
    <section class="datos text-center mt-5">
        <h4>Clima en Sevilla</h4>
        <p class="t"></p>
        <p class="d"> </p>
        <p class="v"> </p>
        <p class="p"> </p>
    </section>
    <script>
        let url = `https://api.openweathermap.org/data/2.5/weather?q=Sevilla&lang=sp&appid=45eb395852579c2b29bed49a43597576&units=metric`;
        fetch(url).then(response => response.json())
            .then(data => {
                //document.querySelector(".datos").innerText=JSON.stringify(data);
                console.log(data);
                document.querySelector(".datos h4").innerText = `El tiempo en  ${data.name}`;
                document.querySelector(".datos .t").innerText = `Temperatura: ${data.main.temp} ºC`;
                document.querySelector(".datos .d").innerText = `Descripción: ${data.weather[0].description}`;
                document.querySelector(".datos .v").innerText = `Viento: ${data.wind["speed"]} Velocidad`;
                document.querySelector(".datos .p").innerText = `País: ${data.sys["country"]} `;
                
                
                

            });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-7hJ7Qgv9e6krSFVrLY/IyZzTwKb7PLoLWhh5Q+A1fXl95xskpJLl5Cm+4Ji/XU4l" crossorigin="anonymous"></script>
    @if (session('message'))
    <script>
        var toastElList = [].slice.call(document.querySelectorAll('.toast'));
        var toastList = toastElList.map(function(toastEl) {
            return new bootstrap.Toast(toastEl);
        });
        toastList[toastList.length - 1].show();
    </script>
    @endif
</body>

</html>