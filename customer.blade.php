<!doctype html>
<html lang="en">

<head>
    <title>Customer form</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<style>
    .pointer {
        cursor: pointer;
    }

    input:hover {
        border: 2px solid gray;
        background-color: rgb(248, 246, 246);
    }

    input:focus {
        outline: none !important;
        border-color: #2d32368a;
        box-shadow: 0 0 10px #0d0e0f70;
    }
 
/* width */
::-webkit-scrollbar {
  width: 5px;
}

/* Track */
::-webkit-scrollbar-track {
  box-shadow: inset 0 0 5px rgb(221, 215, 215); 
  border-radius: 20px;
}
 
/* Handle */
::-webkit-scrollbar-thumb {
  background: rgba(57, 59, 66, 0.795); 
  border-radius: 20px;
  border: 2px solid rgb(202, 194, 194)
}

/* Handle on hover */
::-webkit-scrollbar-thumb:hover {
  background: #171920; 
  width: 10px;
}

.submit{
  width: 100px;
  height: 30px;
  transition-property: width;
  transition-duration: 3s;
  display: block;
  margin: auto;
  padding: 2px 2px 2px 2px;
}
.submit:hover{
    width: 400px;
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
            <a class="navbar-brand text-secondary ml-5 me-5" href="#">COD - customer order detail</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active text-light ml-5" aria-current="page" href="{{ url('/') }}">Home</a>
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
    <div class="container">
        <h3 class="text-center my-5">
            {!! $title !!} 
        </h3>
        <div class="container p-3 m-2 mb-5 border rounded bg-secondary">
            <h4 class="text-center mb-4 text-dark ">Please fill your details to get in contact with us!!</h4>
            <hr>
            <form action={{ $url }} method="POST" class="row g-3">
                @csrf
                <div class="col-md-6">
                    <label for="name" class="form-label mt-2 mb-0">Name -</label>
                    <input type="text" name="name" class="form-control shadow-lg" id="name"
                        placeholder="Enter your name" value="{{@$customer != null ?  @$customer->name  : old('name')}}">
                    <span class="text-danger">
                        @error('name')
                            {{ $message }}
                        @enderror
                    </span>
                </div>
                <div class="col-md-6">
                    <label for="email" class="form-label mt-2 mb-0">Email -</label>
                    <input type="email" name="email" class="form-control shadow-lg"
                        placeholder="Enter your e-mail id" id="email" value="{{@$customer != null ?  @$customer->email  : old('email')}}">
                    <span class="text-danger">
                        @error('email')
                            {{ $message }}
                        @enderror
                    </span>
                </div>
                <fieldset class="row-12 mb-3 col-md-6">
                    <legend class="col-form-label mt-2 mb-0">Gender -</legend>
                    <span class="text-danger">
                        @error('gender')
                            {{ $message }}
                        @enderror
                    </span>
                    <div class="row mx-2">
                        <div class="form-check">
                            <input class="form-check-input pointer" type="radio" name="gender" id="male"
                                value="Male" {{ @$customer->gender == 'Male' ? 'checked' : '' }}>
                            <label class="form-check-label " for="gender">Male</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input pointer mx-0" type="radio" name="gender" id="female"
                                value="Female" {{ @$customer->gender == 'Female' ? 'checked' : '' }}>
                            <label class="form-check-label mx-3" for="gender">Female</label>
                        </div>
                        <div class="form-check ">
                            <input class="form-check-input pointer" type="radio" name="gender" id="other"
                                value="Other" {{ @$customer->gender == 'Other' ? 'checked' : '' }}>
                            <label class="form-check-label" for="gender">Other</label>
                        </div>
                    </div>
                </fieldset>

                <div class="col-md-6">
                    <label for="state" class="form-label mt-2 mb-0">state -</label>
                    <input type="text" class="form-control shadow-lg" name="state" placeholder="Enter your state"
                        id="inputCity" value="{{@$customer != null ?  @$customer->state  : old('state')}}">
                    <span class="text-danger">
                        @error('state')
                            {{ $message }}
                        @enderror
                    </span>
                </div>
                <div class="row-md-9 col-md-12">
                    <label for="address" class="form-label mt-2 mb-0">Address -</label>
                    <input type="text" class="form-control shadow-lg" placeholder="Enter your street address"
                        name="address" id="address" placeholder="" value="{{@$customer != null ?  @$customer->address  : old('address')}}">
                    <span class="text-danger">
                        @error('address')
                            {{ $message }}
                        @enderror
                    </span>
                </div>
                <div class="col-md-6">
                    <label for="country" class="form-label mt-2 mb-0">Country -</label>
                    <input type="text" name="country" class="form-control shadow-lg" placeholder="Enter country"
                        id="country" value="{{@$customer != null ?  @$customer->country  : old('country')}}">
                    <span class="text-danger">
                        @error('country')
                            {{ $message }}
                        @enderror
                    </span>
                </div>
                <div class="col-md-6">
                    <label for="dob" class="form-label mt-2 mb-0">Date of birth -</label>
                    <input type="date" name="dob" class="form-control shadow-lg" id="dob"
                        value="{{@$customer != null ?  @$customer->dob  : old('dob')}}">
                    <span class="text-danger">
                        @error('dob')
                            {{ $message }}
                        @enderror
                    </span>
                </div>
                <div class="col-md-6">
                    <label for="password" class="form-label mt-2 mb-0">Password -</label>
                    <input type="password" name="password" placeholder="Enter a strong password"
                        class="form-control shadow-lg" id="password">
                    <span class="text-danger">
                        @error('password')
                            {{ $message }}
                        @enderror
                    </span>
                </div>
                <div class="col-md-6">
                    <label for="password_confirmation" class="form-label mt-2 mb-0">Confirm Password -</label>
                    <input type="password" name="password_confirmation" placeholder="Re-enter your password"
                        class="form-control shadow-lg" id="password_confirmation">
                    <span class="text-danger">
                        @error('password')
                            {{ $message }}
                        @enderror
                    </span>
                </div>

                <div class="col-12">
                    <button type="submit" class="btn col-md-12 btn-dark my-3 submit shadow-lg"><span class="text-success">&#10003;</span>  Submit </button>
            </form>
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
