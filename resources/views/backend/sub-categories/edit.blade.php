@extends('backend.layouts.master')


@section('main-content')


    <section style="margin-top: 10px" id="main-content" class="get-in-touch text-center">
        <div class="row">

            {{-- <section class="get-in-touch"> --}}
            <h1 class="title m-auto">Edit Sub Category</h1>

            @if (session('success'))
                <div class="alert alert-success col-12 mb-5">
                    {{ session('success') }}
                </div>
            @endif

            <form action="{{route('sub-category.update', $sub_categories->id)}}" method="POST" enctype="multipart/form-data" class="contact-form row m-auto">
                @csrf
                @method('PUT')

                <div class="form-field col-lg-6">
                    <label class="label" for="name">Sub Category Name</label>
                    <input value="{{ $sub_categories->name }}" name="name" id="name" class="input-text js-input" type="text">


                    @error('name')
                        <span class="text-danger text-left">{{ $message }}</span>
                    @enderror
                </div>





                <div class="form-field col-lg-6">
                    <label class="label" for="status">Sub Category status</label>
                    <select style="background-color: aliceblue" name="status" id="status" class="input-text js-input">
                        <option value="1" {{ $sub_categories->status == 1 ? 'selected' : '' }}>On</option>
                        <option value="0" {{ $sub_categories->status == 0 ? 'selected' : '' }}>Off</option>
                    </select>
                </div>



                <div class="form-field col-lg-6">
                    <label class="label" for="status">Select Category</label>
                    <select style="background-color: aliceblue" name="category_id" id="status" class="input-text js-input">
                        <option value="">-- Select a Category --</option>
                        @foreach ($categories as $category)
                            <option value="{{$category->id}}" {{ $category->id == $sub_categories->category_id ? 'selected' : '' }}>{{$category->name}}</option>
                        @endforeach
                    </select>

                    @error('category_id')
                        <span class="text-danger text-left">{{ $message }}</span>
                    @enderror
                </div>



                <div class="form-field col-lg-12 ">
                    <label class="label" for="description">Sub Category Description</label>
                    <input value="{{ $sub_categories->description }}" name="description" id="description"
                        class="input-text js-input" type="text">


                    @error('description')
                        <span class="text-danger text-left">{{ $message }}</span>
                    @enderror
                </div>


                <div style="flex-direction: row" class="form-field col-lg-12">
                    <label class="label my-auto" for="preimg">Previous
                        Image</label>
                    <img style="border-radius: 5px; margin-left: 10rem" width="250px"
                        src="{{ asset('backend/assets/images/sub-category-img' . '/' . $sub_categories->image) }}" alt=""
                        id="preimg">
                </div>

                <div class="form-field col-lg-6">
                    <label class="label" for="image">Choose Sub Category Image</label>
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