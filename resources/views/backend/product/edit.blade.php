@extends('backend.layouts.master')


@section('main-content')


    <section style="margin-top: 10px; max-width: 1000px;" id="main-content" class="get-in-touch text-center">
        <div class="row">

            {{-- <section class="get-in-touch"> --}}
            <h1 class="title m-auto">Edit Product</h1>

            @if (session('success'))
                <div class="alert alert-success col-12 mb-5">
                    {{ session('success') }}
                </div>
            @endif

            <form action="{{ route('product.update', $products->id) }}" method="POST" enctype="multipart/form-data"
                class="contact-form row m-auto">
                @csrf
                @method('PUT')

                <div class="form-field col-lg-6">
                    <label class="label" for="category_id">Select Category</label>
                    <select style="background-color: aliceblue" name="category_id" id="category_id" class="input-text js-input">
                        <option value="">-- Categories --</option>
                        @foreach ($categories as $category)
                            <option value="{{$category->id}}" {{$category->id == $products->category_id ? 'selected' : ''}}>{{$category->name}}</option>
                        @endforeach
                    </select>
                </div>



                <div class="form-field col-lg-6">
                    <label class="label" for="sub_category_id">Select Sub Category</label>
                    <select style="background-color: aliceblue" name="sub_category_id" id="sub_category_id" class="input-text js-input">
                        <option value="">-- Sub Categories --</option>
                        @foreach ($sub_categories as $sub_category)
                            <option value="{{$sub_category->id}}" {{ $sub_category->id == $products->sub_category_id ? 'selected' : '' }}>{{$sub_category->name}}</option>
                        @endforeach
                    </select>
                </div>



                <div class="form-field col-lg-6">
                    <label class="label" for="name">Product Name</label>
                    <input value="{{$products->name}}" name="name" id="name" class="input-text js-input" type="text">


                    @error('name')
                        <span class="text-danger text-left">{{ $message }}</span>
                    @enderror
                </div>



                <div class="form-field col-lg-6">
                    <label class="label" for="price">Product Price</label>
                    <input value="{{$products->price}}" name="price" id="price" class="input-text js-input" type="text">


                    @error('price')
                        <span class="text-danger text-left">{{ $message }}</span>
                    @enderror
                </div>



                <div class="form-field col-lg-6">
                    <label class="label" for="quantity">Product Quantity</label>
                    <input value="{{$products->quantity}}" name="quantity" id="quantity" class="input-text js-input" type="number">


                    @error('quantity')
                        <span class="text-danger text-left">{{ $message }}</span>
                    @enderror
                </div>



                <div class="form-field col-lg-6">
                    <label class="label" for="status">Product Status</label>
                    <select style="background-color: aliceblue" name="status" id="status" class="input-text js-input">
                        <option value="">-- Status --</option>

                        <option value="1" {{$products->status == 1 ? 'selected' : ''}}>On</option>
                        <option value="0" {{$products->status == 0 ? 'selected' : ''}}>Off</option>
                    </select>


                    @error('status')
                        <span class="text-danger text-left">{{ $message }}</span>
                    @enderror
                </div>



                <div class="form-field col-lg-6">
                    <label class="label" for="deal">Deal of the Day</label>
                    <select style="background-color: aliceblue" name="deal" id="deal" class="input-text js-input">
                        <option value="">-- Deal of the Day --</option>

                        <option value="1" {{$products->deal == 1 ? 'selected' : ''}}>On</option>
                        <option value="0" {{$products->deal == 0 ? 'selected' : ''}}>Off</option>
                    </select>


                    @error('deal')
                        <span class="text-danger text-left">{{ $message }}</span>
                    @enderror
                </div>


                <div class="form-field col-lg-6">
                    <label class="label" for="discount">Product Discount</label>
                    <input value="{{$products->discount}}" name="discount" id="discount" class="input-text js-input" type="number">


                    @error('discount')
                        <span class="text-danger text-left">{{ $message }}</span>
                    @enderror
                </div>



                <div class="form-field col-lg-12 ">
                    <label class="label" for="short_desc">Short Description</label>
                    <textarea style="background-color: aliceblue" name="short_desc" id="short_desc" cols="30" rows="2">{{$products->short_desc}}</textarea>

                    @error('short_desc')
                        <span class="text-danger text-left">{{ $message }}</span>
                    @enderror
                </div>



                <div class="form-field col-lg-12">
                    <label class="label" for="description">Description</label>
                    <textarea style="background-color: aliceblue" name="description" id="description" cols="30" rows="3">{{$products->description}}</textarea>


                    @error('description')
                        <span class="text-danger text-left">{{ $message }}</span>
                    @enderror
                </div>



                <div style="flex-direction: row" class="form-field col-lg-12">
                    <label class="label my-auto" for="preimg">Previous
                        Image</label>
                    <img style="border-radius: 5px; margin-left: 10rem" width="250px"
                        src="{{ asset('backend/assets/images/product-img' . '/' . $products->image) }}" alt=""
                        id="preimg">
                </div>



                <div class="form-field col-lg-6">
                    <label class="label" for="image">Choose New Image</label>
                    <input name="image" id="image" class="input-text js-input" type="file">


                    @error('image')
                        <span class="text-danger text-left">{{ $message }}</span>
                    @enderror
                </div>


                <div class="form-field col-lg-12">
                    <button class="submit-btn" type="submit">Update</button>
                </div>
            </form>

        </div>
    </section>


@endsection
