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
</head>
<style>
    .decoration-none {
        text-decoration: none;
    }
</style>

<body class="bg-dark text-light">
    <nav class="navbar navbar-expand-lg bg-dark sticky sticky-top">
        <div class="container-fluid">
            <a class="navbar-brand text-light mr-5" href="#">Welcome -
                @if (session()->has('username'))
                {{session()->get('username')}}!!
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
        
        <div class="d-flex flex-row-reverse">
            <button class="btn btn-sm bg-primary decoration-none"><a class="me-2 text-dark text-light "
                    href="{{ url('/customer/view') }}">Go to Customers list &#8801;</a></button>
        </div>
        <h3>&#128465; Trash Bin:-</h3>
        <table class="table">
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
                            <a href="{{ route('customer.destroy', ['id' => $customer->customer_id]) }}"><button
                                    class="btn btn-sm btn-danger">Delete &#10007;</button></a>

                            <a href="{{ route('customer.restore', ['id' => $customer->customer_id]) }}"><button
                                    class="btn btn-sm btn-primary">Restore &#8634;</button></a>
                        </td>
                        @if($nodata)
                            <div>
                                <h3 class="text-light">Empty!! No data to show.</h3>
                                <h4>Be the first to take registration.</h4>
                            </div>
                        @endif
                    </tr>
                @endforeach
            </table>
            <hr class="bg-light">
    </div>
    </tbody>
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
