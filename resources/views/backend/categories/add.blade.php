@extends('layouts.app')



@section('main-style-content')
    {{-- Style for Form --}}
    <link rel="stylesheet" href="{{ asset('backend/form/style.css') }}">
    {{-- END Style for Form --}}
@endsection



@section('main-content')


    <section style="margin-top: 10px" id="main-content" class="get-in-touch text-center">
        <div class="row">

            {{-- <section class="get-in-touch"> --}}
            <h1 class="title m-auto">Add Category</h1>

            @if (session('success'))
                <div class="alert alert-success col-12 mb-5">
                    {{ session('success') }}
                </div>
            @endif

            <form action="{{ route('category.store') }}" method="POST" enctype="multipart/form-data"
                class="contact-form row m-auto">
                @csrf
                <div class="form-field col-lg-6">
                    <label class="label" for="name">Category Name</label>
                    <input value="{{old('name')}}" name="name" id="name" class="input-text js-input" type="text">


                    @error('name')
                        <span class="text-danger text-left">{{ $message }}</span>
                    @enderror
                </div>





                <div class="form-field col-lg-6">
                    <label class="label" for="status">Category status</label>
                    <select style="background-color: aliceblue" name="status" id="status" class="input-text js-input">
                        <option value="1" {{old('status') == 1 ? 'selected' : ''}}>On</option>
                        <option value="0" {{old('status') == 0 ? 'selected' : ''}}>Off</option>
                    </select>
                </div>



                <div class="form-field col-lg-12 ">
                    <label class="label" for="description">Description</label>
                    <input value="{{old('description')}}" name="description" id="description" class="input-text js-input" type="text">


                    @error('description')
                        <span class="text-danger text-left">{{ $message }}</span>
                    @enderror
                </div>




                <div class="form-field col-lg-6">
                    <label class="label" for="image">Choose Category Image</label>
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
