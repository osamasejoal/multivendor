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
                <div class="col-md-12">
                    <div class="table-wrap">
                        <table class="table table-responsive-xl text-center">
                            <thead>
                                <tr>
                                    <th>Image</th>
                                    <th>Name</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Category</th>
                                    <th>Sub category_id</th>
                                    <th>Short desc</th>
                                    <th>Description</th>
                                    <th>Status</th>
                                    <th>Action</th>         
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($products as $product)

                                    <tr class="alert" role="alert">
                                        <td>
                                            <img style="border-radius: 5px"
                                                src="{{ asset('backend/assets/images/product-img' . '/' . $product->image) }}"
                                                alt="img not found" width="150px">
                                        </td>
                                                
                                        <td>{{ $product->name }}</td>
                                        <td>{{ '$' . $product->price }}</td>
                                        <td>{{ $product->quantity }}</td>
                                        <td>{{ $product->relationToCategory->name }}</td>
                                        <td>{{ $product->relationToSubCategory->name }}</td>
                                        <td>{{ $product->short_desc }}</td>
                                        <td>{{ $product->description }}</td>
                                        {{-- <td>{{ $product->relationToCategory->name }}</td> --}}
                                        <td>{{ $product->status == 1 ? 'On' : 'Off' }}</td>
                                        <td class="col-2">
                                            <a href="{{route('product.edit', $product->id)}}" class="btn btn-sm btn-info mr-2">Edit</a>

                                            <form class="d-inline" action="{{route('product.destroy', $product->id)}}" method="POST">
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
