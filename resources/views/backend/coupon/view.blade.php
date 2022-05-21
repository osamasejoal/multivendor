@extends('backend.layouts.master')


@section('main-content')
    <section style="margin-top: -50px" class="ftco-section">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="table-wrap">
                        <table class="table table-responsive-xl text-center">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Code</th>
                                    <th>Discount</th>
                                    <th>Validity</th>
                                    <th>Limit</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($coupons as $coupon)
                                    <tr class="alert" role="alert">
                                        <td>{{ $coupon->name }}</td>
                                        <td>{{ $coupon->code }}</td>
                                        <td>{{ $coupon->discount }}% </td>
                                        <td>{{ $coupon->validity }}</td>
                                        <td>{{ $coupon->limit }}</td>
                                        <td>{{ $coupon->status == 1 ? 'On' : 'Off' }}</td>

                                        <td class="col-2">
                                            <a href="{{ route('coupon.edit', $coupon->id) }}"
                                                    class="btn btn-sm btn-info mr-2">Edit</a>

                                            <form class="d-inline"
                                                action="{{ route('coupon.destroy', $coupon->id) }}" method="POST">
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
