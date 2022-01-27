@extends('layouts.app')



@section('main-style-content')
    {{-- Style for Form --}}
    <link rel="stylesheet" href="{{ asset('backend/form/style.css') }}">
    {{-- END Style for Form --}}
@endsection



@section('main-content')


    <section style="margin-top: 10px; max-width: 1000px;" id="main-content" class="get-in-touch text-center">
        <div class="row">

            {{-- <section class="get-in-touch"> --}}
            <h1 class="title m-auto">Add Product</h1>

            @if (session('success'))
                <div class="alert alert-success col-12 mb-5">
                    {{ session('success') }}
                </div>
            @endif

            <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data"
                class="contact-form row m-auto">
                @csrf

                <div class="form-field col-lg-6">
                    <label class="label" for="category_id">Select Category</label>
                    <select style="background-color: aliceblue" name="category_id" id="category_id" class="input-text js-input">
                        <option value="">-- Categories --</option>
                        @foreach ($categories as $category)
                            <option value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                    </select>
                </div>



                <div class="form-field col-lg-6">
                    <label class="label" for="sub_category_id">Select Sub Category</label>
                    <select style="background-color: aliceblue" name="sub_category_id" id="sub_category_id" class="input-text js-input">
                        <option value="">-- Sub Categories --</option>
                        @foreach ($sub_categories as $sub_category)
                            <option value="{{$sub_category->id}}" {{ old($sub_category->id) == $sub_category->id ? 'selected' : '' }}>{{$sub_category->name}}</option>
                        @endforeach
                    </select>
                </div>



                <div class="form-field col-lg-6">
                    <label class="label" for="name">Product Name</label>
                    <input value="{{old('name')}}" name="name" id="name" class="input-text js-input" type="text">


                    @error('name')
                        <span class="text-danger text-left">{{ $message }}</span>
                    @enderror
                </div>



                <div class="form-field col-lg-6">
                    <label class="label" for="price">Product Price</label>
                    <input value="{{old('price')}}" name="price" id="price" class="input-text js-input" type="text">


                    @error('price')
                        <span class="text-danger text-left">{{ $message }}</span>
                    @enderror
                </div>



                <div class="form-field col-lg-6">
                    <label class="label" for="quantity">Product Quantity</label>
                    <input value="{{old('quantity')}}" name="quantity" id="quantity" class="input-text js-input" type="number">


                    @error('quantity')
                        <span class="text-danger text-left">{{ $message }}</span>
                    @enderror
                </div>



                <div class="form-field col-lg-6">
                    <label class="label" for="status">Product Status</label>
                    <select style="background-color: aliceblue" name="status" id="status" class="input-text js-input">
                        <option value="">-- Status --</option>

                        <option value="1" {{old('status') == 1 ? 'selected' : ''}}>On</option>
                        <option value="0" {{old('status') == 0 ? 'selected' : ''}}>Off</option>
                    </select>


                    @error('status')
                        <span class="text-danger text-left">{{ $message }}</span>
                    @enderror
                </div>



                <div class="form-field col-lg-12 ">
                    <label class="label" for="short_desc">Short Description</label>
                    <textarea style="background-color: aliceblue" name="short_desc" id="short_desc" cols="30" rows="2">{{old('short_desc')}}</textarea>

                    @error('short_desc')
                        <span class="text-danger text-left">{{ $message }}</span>
                    @enderror
                </div>



                <div class="form-field col-lg-12">
                    <label class="label" for="description">Description</label>
                    <textarea style="background-color: aliceblue" name="description" id="description" cols="30" rows="3">{{old('description')}}</textarea>


                    @error('description')
                        <span class="text-danger text-left">{{ $message }}</span>
                    @enderror
                </div>



                <div class="form-field col-lg-6">
                    <label class="label" for="image">Choose Product Image</label>
                    <input name="image" id="image" class="input-text js-input" type="file">


                    @error('image')
                        <span class="text-danger text-left">{{ $message }}</span>
                    @enderror
                </div>


                <div class="form-field col-lg-12">
                    <button class="submit-btn" type="submit">Create</button>
                </div>
            </form>

        </div>
    </section>


@endsection




@section('main-script-content')
    {{-- Script for Form in Banner/Edit --}}
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    {{-- END Script for Form in Banner/Edit --}}
@endsection
