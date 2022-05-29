@extends('backend.layouts.master')

@section('main-content')
    <section style="margin-top: -80px" class="ftco-section">
        <div class="container-fluid">
            <div class="row">

                <h1 class="text-info text-uppercase m-auto pb-4">Countries List</h1>

                <div class="col-md-12">

                    @if (session('success'))
                        <div class="alert alert-danger text-center">
                            {{ session('success') }}
                        </div>
                    @endif

                    <div class="table-wrap">
                        <table class="table table-responsive-xl text-center">
                            <thead>
                                <tr>
                                    <th>SL</th>
                                    <th>Country</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($countries as $country)
                                    <tr class="alert" role="alert">
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $country->name }}</td>

                                        <td>
                                            <form class="d-inline"
                                                action="{{ route('country.destroy', $country->id) }}" method="POST">
                                                @csrf
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
