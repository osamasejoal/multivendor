@extends('backend.layouts.master')


@section('main-content')


    <section style="margin-top: 10px; max-width: 1000px;" id="main-content" class="get-in-touch text-center">
        <div class="row">

            {{-- <section class="get-in-touch"> --}}
            <h1 class="title m-auto">Add Social Media</h1>

            @if (session('success'))
                <div class="alert alert-success col-12 mb-5">
                    {{ session('success') }}
                </div>
            @endif

            <form action="{{ route('company-social.store') }}" method="POST" enctype="multipart/form-data"
                class="contact-form row m-auto">
                @csrf


                <div class="form-field col-lg-6">
                    <label class="label" for="name">Social Media Name</label>
                    <input value="{{ old('name') }}" name="name" id="name" class="input-text js-input" type="text">


                    @error('name')
                        <span class="text-danger text-left">{{ $message }}</span>
                    @enderror
                </div>



                <div class="form-field col-lg-6">
                    <label class="label" for="icon">Social Media Icon</label>
                    <input @if (old('icon'))
                    value="{{old('icon')}}"
                    @else
                    placeholder='Ex: "fa fa-facebook" (Use Fontawesome 4)'
                    @endif
                    name="icon" id="icon" class="input-text js-input" type="text">


                    @error('icon')
                        <span class="text-danger text-left">{{ $message }}</span>
                    @enderror
                </div>



                <div class="form-field col-lg-12">
                    <label class="label" for="link">Profile Link</label>
                    <input value="{{ old('link') }}" name="link" id="link" class="input-text js-input" type="url">


                    @error('link')
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