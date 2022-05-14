@extends('backend.layouts.master')


@section('main-content')


    <section style="margin-top: 10px; max-width: 1000px;" id="main-content" class="get-in-touch text-center">
        <div class="row">

            {{-- <section class="get-in-touch"> --}}
            <h1 class="title m-auto">Create Vendor</h1>

            @if (session('success'))
                <div class="alert alert-success col-12 mb-5">
                    {{ session('success') }}
                </div>
            @endif

            <form action="{{ route('vendor.store') }}" method="POST" enctype="multipart/form-data"
                class="contact-form row m-auto">
                @csrf

                <div class="form-field col-lg-6">
                    <label class="label" for="name">Vendor Name</label>
                    <input value="{{old('name')}}" name="name" id="name" class="input-text js-input" type="text">

                    @error('name')
                        <span class="text-danger text-left">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-field col-lg-6">
                    <label class="label" for="email">Email</label>
                    <input value="{{old('email')}}" name="email" id="email" class="input-text js-input" type="text">

                    @error('email')
                        <span class="text-danger text-left">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-field col-lg-6">
                    <label class="label" for="address">Address</label>
                    <input value="{{old('address')}}" name="address" id="address" class="input-text js-input" type="text">

                    @error('address')
                        <span class="text-danger text-left">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-field col-lg-6">
                    <label class="label" for="phone">Phone</label>
                    <input value="{{old('phone')}}" name="phone" id="phone" class="input-text js-input" type="text">

                    @error('phone')
                        <span class="text-danger text-left">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-field col-lg-6">
                    <label class="label" for="logo">Select Vendor logo</label>
                    <input name="logo" id="logo" class="input-text js-input" type="file">


                    @error('logo')
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