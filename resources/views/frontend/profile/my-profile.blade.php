@extends('frontend.layouts.master')

@section('main-content')
    <div class="fluid-container">
        <div class="row">
            <div class="col-lg-3 py-5 pr-5 pull-left">

                <div class="card border-primary" style="min-height: 50vh">
                    <div class="card-body">
                        <a href="#" class="d-block mb-3" style="font-size:20px;font-weight:500">My Profile</a>
                        <a href="#" class="d-block mb-3" style="font-size:20px;font-weight:500">My Orders</a>
                    </div>
                </div>
            </div>

            <div class="col-lg-9 py-5 pull-right">
                <div class="card border-info">
                    <div class="card-header text-center">
                        <h1>My Profile</h1>
                    </div>
                    


                    @if (session('success'))
                <div class="alert alert-success col-12 mb-5 text-center">
                    {{ session('success') }}
                </div>
            @endif

            <form action="{{ route('update.my.profile') }}" method="POST" enctype="multipart/form-data"
                class="contact-form row m-auto p-5">
                @csrf
                <div class="form-field col-lg-6">
                    <label class="label" for="name">Name</label>
                    <input style="background: transparent" value="{{ auth()->user()->name }}" name="name" id="name" class="input-text js-input"
                        type="text">
                </div>

                @error('name')
                    <span style="margin-top: -30px" class="text-danger d-flex col-lg-12 mb-4">{{ $message }}</span>
                @enderror

                <div class="form-field col-lg-6 ">
                    <label class="label" for="email">Email</label>
                    <input style="background: transparent" value="{{ auth()->user()->email }}" name="email" id="email" class="input-text js-input"
                        type="text">
                </div>

                @error('email')
                    <span style="margin-top: -30px" class="text-danger d-flex col-lg-12 mb-4">{{ $message }}</span>
                @enderror

                <div class="form-field col-lg-12">
                    <label class="label" for="previous_img">Previous
                        Image</label>
                    <img style="border-radius: 50%" width="100px" src="{{asset('backend/assets/images/profile-pic') .'/' . auth()->user()->image}}" alt="" id="previous_img">
                </div>

                <div class="form-field col-lg-6">
                    <label class="label" for="image">Choose Profile
                        picture</label>
                    <input style="background: transparent" name="image" id="image" class="input-text js-input" type="file">
                </div>

                @error('image')
                    <span style="margin-top: -35px" class="text-danger d-flex col-lg-12 mb-4">{{ $message }}</span>
                @enderror

                <div class="form-field col-lg-12">
                    <button class="submit-btn" type="submit">Update</button>
                </div>
            </form>





                </div>
            </div>

            <div class="clearfix"></div>
        </div>
    </div>

    {{-- <section id="main-content" class="get-in-touch text-center">
        <div class="row">

            <h1 class="title m-auto">Your Profile</h1>

            @if (session('success'))
                <div class="alert alert-success col-12 mb-5">
                    {{ session('success') }}
                </div>
            @endif

            <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data"
                class="contact-form row m-auto">
                @csrf
                <div class="form-field col-lg-6">
                    <label class="label" for="name">Name</label>
                    <input style="background: transparent" value="{{ auth()->user()->name }}" name="name" id="name" class="input-text js-input"
                        type="text">
                </div>

                @error('name')
                    <span style="margin-top: -30px" class="text-danger d-flex col-lg-12 mb-4">{{ $message }}</span>
                @enderror

                <div class="form-field col-lg-6 ">
                    <label class="label" for="email">Email</label>
                    <input style="background: transparent" value="{{ auth()->user()->email }}" name="email" id="email" class="input-text js-input"
                        type="text">
                </div>

                @error('email')
                    <span style="margin-top: -30px" class="text-danger d-flex col-lg-12 mb-4">{{ $message }}</span>
                @enderror

                <div class="form-field col-lg-12">
                    <label class="label" for="previous_img">Previous
                        Image</label>
                    <img style="border-radius: 50%" width="100px" src="{{asset('backend/assets/images/profile-pic') .'/' . auth()->user()->image}}" alt="" id="previous_img">
                </div>

                <div class="form-field col-lg-6">
                    <label class="label" for="image">Choose Profile
                        picture</label>
                    <input style="background: transparent" name="image" id="image" class="input-text js-input" type="file">
                </div>

                @error('image')
                    <span style="margin-top: -35px" class="text-danger d-flex col-lg-12 mb-4">{{ $message }}</span>
                @enderror

                <div class="form-field col-lg-12">
                    <button class="submit-btn" type="submit">Update</button>
                </div>
            </form>

        </div>
    </section> --}}
@endsection
