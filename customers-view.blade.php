<!doctype html>
<html lang="en">

<head>
    <title>COD-customer order detail</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
</head>
<style>
    .decoration-none {
        text-decoration: none;
    }
</style>

<body class="bg-dark text-light">
    <nav class="navbar navbar-expand-lg bg-dark sticky sticky-top ">
        <div class="container-fluid">
            <a class="navbar-brand text-light mr-5" href="#">Welcome -
                @if (session()->has('username'))
                    {{ session()->get('username') }}!!
                @else
                    Guest!!
                @endif
            </a>
            <a class="navbar-brand text-secondary me-5" href="#">COD - customer order detail</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ">
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
    <div class="container my-5">
        <div class="row m-2">

            <div class="form-group col-6">
                <form action="" method="GET">
                    <input type="search" name="search" value="{{ $search }}" id="search"
                        class="form-control m-2 h-25 rounded" placeholder="&#128269;search by name or email"
                        aria-describedby="helpId">
            </div>
            <div class="m-2">
                <button class="btn btn-sm btn-primary">&#128269;</button>
            </div>
            <div class="m-2 mr-5">

                <button class="btn btn-sm btn-secondary">
                    <a class="text-light decoration-none" href="{{ url('/customer/view') }}">Reset</a>
                </button>

            </div>
            </form>

            <div class="m-2 ml-5">
                <button class="btn btn-sm bg-light "><a class="me-2  text-dark decoration-none "
                        href="{{ route('customer.create') }}">Add &#8801;</a></button>
            </div>
            <div class="m-2">
                <button class="btn btn-sm bg-danger "><a class="me-2 text-dark decoration-none "
                        href="{{ route('customer.trash') }}">Go to trash &#128465;</a></button>
            </div>
        </div>
        <h3>&#8801;List of all customers:-</h3>
        <table class="table" id="myTable">
            <thead>
                <tr class="text-light">
                    <th>&#9661;</th>
                    <th>Name</th>
                    <th>E-mail</th>
                    <th>Gender</th>
                    <th>Address</th>
                    <th>DOB</th>
                    <th>Status</th>
                    <th>Points</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $nodata = true;
                @endphp
                @foreach ($customers as $customer)
                    @php
                        $nodata = false;
                    @endphp
                    <tr class="text-light">
                        <td>&#9657;</td>
                        <td> {{ $customer->name }}</td>
                        <td>{{ $customer->email }}</td>
                        <td>{{ $customer->gender }}</td>
                        <td>{{ $customer->address }}</td>
                        <td>{{ $customer->dob }}</td>
                        <td>
                            @if ($customer->status == 1)
                                <a href="">
                                    <button class="badge badge-success"> Active</button>
                                </a>
                            @else
                                <a href="">
                                    <button class="badge badge-danger"> Inactive</button>
                                </a>
                            @endif
                        </td>
                        <td>{{ $customer->points }}</td>

                        <td>
                            <a href="{{ route('customer.delete', ['id' => $customer->customer_id]) }} "
                                class="m-1"><button class="btn btn-sm btn-danger">Move to &#128465;</button></a>

                            <a href="{{ route('customer.edit', ['id' => $customer->customer_id]) }}"><button
                                    class="btn btn-sm btn-primary m-1">Edit &#128393;</button></a>
                        </td>
                        @if ($nodata)
                            <div>
                                <h3 class="text-light">Empty!! No data to show.</h3>
                                <h4>Be the first to take registration.</h4>
                            </div>
                            @endif
                        </tr>
                        @endforeach
                        
                    </table>
                </tbody>
        <hr class="bg-light">

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
    <script src="https://code.jquery.com/jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM="
    crossorigin="anonymous"></script>
    <script src="//cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script>
        let table = new DataTable('#myTable');
        </script>
</body>

</html>
