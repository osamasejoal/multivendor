@extends('auth.master')

@section('auth-content')


    <div class="card">
        <div class="card-block">

            <div class="account-box">

                <div class="card-box p-5">
                    <h2 class="text-uppercase text-center pb-4">
                        <a href="index.html" class="text-success">
                            <span><img src="{{ asset('backend') }}/assets/images/logo.png" alt="" height="26"></span>
                        </a>
                    </h2>

                    <form class="form-horizontal" action="{{ route('register') }}" method="POST">
                        @csrf

                        @if ($errors->any())
                            <div class="alert alert-warning">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </div>
                        @endif

                        <div class="form-group row m-b-20">
                            <div class="col-12">
                                <label for="username">Full Name</label>
                                <input class="form-control" type="text" name="name" id="username">
                            </div>
                        </div>

                        <div class="form-group row m-b-20">
                            <div class="col-12">
                                <label for="emailaddress">Email address</label>
                                <input class="form-control" type="email" name="email" id="emailaddress">
                            </div>
                        </div>

                        <div class="form-group row m-b-20">
                            <div class="col-12">
                                <label for="password">Password</label>
                                <input class="form-control" type="password" name="password" id="password">
                            </div>
                        </div>

                        <div class="form-group row m-b-20">
                            <div class="col-12">
                                <label for="password">Confirm Password</label>
                                <input class="form-control" type="password" name="password_confirmation" id="password">
                            </div>
                        </div>

                        <div class="form-group row text-center m-t-10 mt-5">
                            <div class="col-12">
                                <button class="btn btn-block btn-custom waves-effect waves-light" type="submit">Sign Up
                                    Free</button>
                            </div>
                        </div>

                    </form>

                    <div class="row m-t-50">
                        <div class="col-sm-12 text-center">
                            <p class="text-muted">Already have an account? <a href="{{ route('login') }}"
                                    class="text-dark m-l-5"><b>Sign In</b></a></p>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>


@endsection
