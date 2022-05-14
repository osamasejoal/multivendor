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
                                    <th>Category</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($sub_categories as $sub_categorie)

                                    <tr class="alert" role="alert">
                                        <td>
                                            <img style="border-radius: 5px"
                                                src="{{ asset('backend/assets/images/sub-category-img' . '/' . $sub_categorie->image) }}"
                                                alt="img not found" width="150px">
                                        </td>
                                        <td class="col-2">{{ $sub_categorie->name }}</td>
                                        <td class="col-1">{{ $sub_categorie->status == 1 ? 'On' : 'Off' }}</td>
                                        <td class="col-4">{{ $sub_categorie->description }}</td>
                                        <td class="col-1">{{ $sub_categorie->relationToCategory->name }}</td>
                                        <td class="col-2">
                                            <a href="{{route('sub-category.edit', $sub_categorie->id)}}" class="btn btn-sm btn-info mr-2">Edit</a>

                                            <form class="d-inline" action="{{route('sub-category.destroy', $sub_categorie->id)}}" method="POST">
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