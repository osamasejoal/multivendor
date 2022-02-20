@extends('layouts.app')



@section('main-style-content')
    {{-- Style for Table --}}
    <link href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,700' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="{{ asset('backend/table/css/style.css') }}">
    {{-- END Style for Table --}}
@endsection



@section('main-content')


    <section style="margin-top: -50px" class="ftco-section">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-10 m-auto">
                    <div class="table-wrap">
                        <table class="table table-responsive-xl text-center">
                            <thead>
                                <tr>
                                    <th>Logo</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Address</th>
                                    <th>Status</th>
                                    <th>Action</th>         
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($vendors as $vendor)

                                    <tr class="alert" role="alert">
                                        <td>
                                            <img style="border-radius: 5px"
                                                src="{{ asset('backend/assets/images/vendor-logo' . '/' . $vendor->logo) }}"
                                                alt="img not found" width="150px">
                                        </td>
                                                
                                        <td>{{ $vendor->relationToUsers->name }}</td>
                                        <td>{{ $vendor->relationToUsers->email }}</td>
                                        <td>{{ $vendor->phone }}</td>
                                        <td>{{ $vendor->address }}</td>
                                        <td>{{ $vendor->status == 1 ? 'on' : 'off' }}</td>
                                        <td class="col-2">
                                            <form class="d-inline" action="{{route('vendor.destroy', $vendor->id)}}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-sm btn-danger">Delete</button>
                                            </form>
                                        </td>
                                    </tr>

                                @endforeach

                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </section>


@endsection




@section('main-script-content')
    {{-- Script for Table --}}
    <script src="{{ asset('backend/table/js/jquery.min.js') }}"></script>
    <script src="{{ asset('backend/table/js/popper.js') }}"></script>
    <script src="{{ asset('backend/table/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('backend/table/js/main.js') }}"></script>
    {{-- END Script for Table --}}
@endsection
