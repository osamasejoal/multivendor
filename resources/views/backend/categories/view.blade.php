@extends('backend.layouts.master')

@section('main-content')


    <section style="margin-top: -50px" class="ftco-section">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="table-wrap">
                        <table class="table table-responsive-xl text-center">
                            <thead>
                                <tr>
                                    <th>Image</th>
                                    <th>Name</th>
                                    <th>Status</th>
                                    <th>Description</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($categories as $categorie)

                                    <tr class="alert" role="alert">
                                        <td>
                                            <img style="border-radius: 5px"
                                                src="{{ asset('backend/assets/images/category-img' . '/' . $categorie->image) }}"
                                                alt="img not found" width="150px">
                                        </td>
                                        <td class="col-2">{{ $categorie->name }}</td>
                                        <td class="col-1">{{ $categorie->status == 1 ? 'On' : 'Off' }}</td>
                                        <td class="col-5">{{ $categorie->description }}</td>
                                        <td class="col-2">
                                            <a href="{{route('category.edit', $categorie->id)}}" class="btn btn-sm btn-info mr-2">Edit</a>
                                            {{-- <a href="#" class="btn btn-sm btn-danger">Delete</a> --}}

                                            <form class="d-inline" action="{{route('category.destroy', $categorie->id)}}" method="POST">
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