@extends('backend.layouts.master')


@section('main-content')


    <section style="margin-top: 10px; max-width: 1000px;" id="main-content" class="get-in-touch text-center">
        <div class="row">

            {{-- <section class="get-in-touch"> --}}
            <h1 class="title m-auto">Company Profile</h1>

            @if (session('success'))
                <div class="alert alert-success col-12 mb-5">
                    {{ session('success') }}
                </div>
            @endif


            <form action="{{ route('update.company', $company_profile->id) }}" method="POST" enctype="multipart/form-data"
                class="contact-form row m-auto">
                @csrf


                
                    
                <div class="form-field col-lg-6">
                    <label class="label" for="name">Company Name</label>
                    <input value="{{ $company_profile->name }}" name="name" id="name" class="input-text js-input"
                        type="text">

                    @error('name')
                        <span class="text-danger text-left">{{ $message }}</span>
                    @enderror
                </div>

                


                <div class="form-field col-lg-6">
                    <label class="label" for="phone">Phone</label>
                    <input value="{{ $company_profile->phone }}" name="phone" id="phone" class="input-text js-input"
                        type="text">

                    @error('phone')
                        <span class="text-danger text-left">{{ $message }}</span>
                    @enderror
                </div>


                <div class="form-field col-lg-6">
                    <label class="label" for="email">Email</label>
                    <input value="{{ $company_profile->email }}" name="email" id="email" class="input-text js-input"
                        type="text">

                    @error('email')
                        <span class="text-danger text-left">{{ $message }}</span>
                    @enderror
                </div>


                <div class="form-field col-lg-6">
                    <label class="label" for="address">Address</label>
                    <input value="{{ $company_profile->address }}" name="address" id="address" class="input-text js-input"
                        type="text">

                    @error('address')
                        <span class="text-danger text-left">{{ $message }}</span>
                    @enderror
                </div>


                <div style="flex-direction: row" class="form-field col-lg-12">
                    <label class="label my-auto" for="preimg">Previous
                        Logo</label>
                    <img style="border-radius: 5px; margin-left: 10rem" width="250px"
                        src="{{ asset('backend/assets/images/company-logo' . '/' . $company_profile->logo) }}" alt=""
                        id="preimg">
                </div>


                <div class="form-field col-lg-6">
                    <label class="label" for="logo">Choose Company Logo</label>
                    <input name="logo" id="logo" class="input-text js-input" type="file">

                    @error('logo')
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