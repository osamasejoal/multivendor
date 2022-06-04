@extends('frontend.layouts.master')

@section('main-content')
    <div class="container-fluid" style="width: 90%">
        <div class="row">
            <div class="col-lg-3 py-5 pr-5 pull-left">

                <div class="card border-primary" style="min-height: 50vh">
                    <div class="card-body">
                        <a href="{{ route('my.profile') }}" class="d-block mb-3" style="font-size:20px;">My Profile</a>
                        <a href="{{ route('my.orders') }}" class="d-block mb-3" style="font-size:20px;font-weight:600">My
                            Orders</a>
                    </div>
                </div>
            </div>

            <div class="col-lg-9 py-5 pull-right">
                <div class="card border-info">
                    <div class="card-header text-center">
                        <h1>My Orders</h1>
                    </div>



                    @if (session('success'))
                        <div class="alert alert-success col-12 mb-5 text-center">
                            {{ session('success') }}
                        </div>
                    @endif

                    <table class="table table-striped text-center">
                        <thead>
                            <tr>
                                <th>SL</th>
                                <th>Grand Total</th>
                                <th>Payment Option</th>
                                <th>Payment Status</th>
                                <th>Order Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($order_summaries as $order_summary)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$order_summary->grand_total}}</td>
                                    <td>{{$order_summary->payment_option == 1 ? 'Cash on delivery' : 'Online Payment'}}</td>
                                    <td>{{$order_summary->payment_status == 1 ? 'Paid' : 'Not paid yet'}}</td>
                                    <td>Pending</td>
                                    <td>
                                        <a class="mr-3" href="#" style="font-size:25px;">
                                            <abbr title="Order Details"><i class="fa fa-info-circle"></i></abbr>
                                        </a>
                                        <a href="#" style="font-size:25px;">
                                            <abbr title="Download Invoice"><i class="fa fa-file-pdf-o"></i></abbr>
                                        </a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="10" class="text-danger text-center">
                                        There are no Orders
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>

                    {{-- <div class="col-md-10 m-auto"> --}}
                    {{-- <div class="table-wrap">
                        <table class="table table-responsive-xl text-center">
                            <thead>
                                <tr>
                                    <th>SL</th>
                                    <th>Grand Total</th>
                                    <th>Payment Option</th>
                                    <th>Payment Status</th>
                                    <th>Order Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                @forelse ($order_summaries as $order_summary)
                                    <tr class="alert" role="alert">
                                        <td>{{ $order_summary->loop->iteration }}</td>
                                        <td>{{ $order_summary->grand_total }}</td>
                                        <td>{{ $order_summary->payment_option == 1 ? 'Cash on Delivery' : 'Online Payment' }}
                                        </td>
                                        <td>{{ $order_summary->payment_status == 1 ? 'Paid' : 'Not paid yet' }}</td>
                                        <td class="col-2">
                                            <form class="d-inline" action="{{ route('vendor.destroy', $vendor->id) }}"
                                                method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-sm btn-danger">Delete</button>
                                            </form>
                                        </td>
                                    </tr>

                                @empty

                                    <tr>
                                        <td colspan="10" class="text-danger text-center">There are no orders.</td>
                                    </tr>
                                @endforelse

                            </tbody>
                        </table>
                    </div> --}}

                    {{-- </div> --}}

                </div>
            </div>

            <div class="clearfix"></div>
        </div>
    </div>
@endsection
