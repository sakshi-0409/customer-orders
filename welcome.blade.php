<!doctype html>
<html lang="en">

<head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<style>
    .join {
        width: 80px;
        height: 30px;
        transition-property: width;
        transition-duration: 3s;
        display: block;
        margin: auto;
        padding: 2px 2px 2px 2px;
    }

    .join:hover {
        width: 200px;
    }
</style>
<nav class="navbar navbar-expand-lg bg-body-secondary">
    <div class="container-fluid">
        <a class="navbar-brand text-secondary me-5" href="#">COD - customer order detail</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link active text-light" aria-current="page" href="{{ url('/') }}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-light" href="{{ url('/customer') }}">Registration</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-light" href="{{ url('/customer/view') }}">Customers</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<body class="bg-dark ">
    <div class="container text-center">
        <div class="jumbotron mt-5 shadow-lg">
            <h1 class="display-4">Welcome</h1>
            <p class="lead">Here you can registrate your order to our website.and also you can see the order of all
                the customers.</p>
            <hr class="my-4">
            <p>COD - customers order detail</p>
            <p class="lead">
                <a class="join btn btn-dark btn-sm" href="{{ url('/customer') }}" role="button">Join</a>
            </p>
        </div>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
</body>

</html>
