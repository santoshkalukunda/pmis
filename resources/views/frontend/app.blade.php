<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PMIS</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

</head>

<body  style="background-color: #1c4267">
    <div class="container py-2">
        <div class="row justify-content-center gap-2">
            <div class="text-center text-white font-weight-bold py-2" style="margin-top: 5%">
                <img src="{{ asset('img/logo.png') }}" alt="{{ env('APP_NAME') }}" class="my-1" height="100">
                <h6>प्रदेश सरकार</h6>
                <h3>सुदूरपश्चिम प्रदेश</h3>
                <h5>आयोजना व्यवस्थापन सूचना प्रणाली</h5>
            </div>
        </div>
    </div>
    @yield('content')
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
</script>

</html>
