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

                                    @if (auth()->user()->roll == 1)
                                        <th>Vendor</th>
                                    @endif
                                    
                                    <th>Image</th>
                                    <th>Name</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Category</th>
                                    <th>Sub Category</th>
                                    <th>Short desc</th>
                                    <th>Description</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                @if (auth()->user()->roll == 1)
                                    @foreach ($products as $product)
                                        <tr class="alert" role="alert">
                                            <td>{{ $product->relationToUser->name }}</td>

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
                                            <td>{{ $product->status == 1 ? 'On' : 'Off' }}</td>

                                            <td>
                                                <form class="d-inline"
                                                    action="{{ route('product.destroy', $product->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-sm btn-danger">Delete</button>
                                                </form>
                                            </td>

                                        </tr>

                                    @endforeach

                                @elseif (auth()->user()->roll == 2)

                                    @forelse ($vendor_product as $vendor_products)

                                        <tr class="alert" role="alert">
                                            <td>
                                                <img style="border-radius: 5px"
                                                    src="{{ asset('backend/assets/images/product-img' . '/' . $vendor_products->image) }}"
                                                    alt="img not found" width="150px">
                                            </td>

                                            <td>{{ $vendor_products->name }}</td>
                                            <td>{{ '$' . $vendor_products->price }}</td>
                                            <td>{{ $vendor_products->quantity }}</td>
                                            <td>{{ $vendor_products->relationToCategory->name }}</td>
                                            <td>{{ $vendor_products->relationToSubCategory->name }}</td>
                                            <td>{{ $vendor_products->short_desc }}</td>
                                            <td>{{ $vendor_products->description }}</td>
                                            <td>{{ $vendor_products->status == 1 ? 'On' : 'Off' }}</td>

                                            <td class="col-2">
                                                <a href="{{ route('product.edit', $vendor_products->id) }}"
                                                    class="btn btn-sm btn-info mr-2">Edit</a>

                                                <form class="d-inline"
                                                    action="{{ route('product.destroy', $vendor_products->id) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-sm btn-danger">Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr class="text-center text-danger">
                                            <td colspan="10">No data to show</td>
                                        </tr>
                                    @endforelse
                                @endif




                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </section>
@endsection
