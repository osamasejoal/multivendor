@extends('backend.layouts.master')


@section('main-content')

    <section style="margin-top: 10px; max-width: 1000px;" id="main-content" class="get-in-touch text-center">
        <div class="row">

            {{-- <section class="get-in-touch"> --}}
            <h1 class="title m-auto">Edit Banner</h1>

            @if (session('success'))
                <div class="alert alert-success col-12 mb-5">
                    {{ session('success') }}
                </div>
            @endif

            <form action="{{ route('banner.update', $banner->id) }}" method="POST" enctype="multipart/form-data"
                class="contact-form row m-auto">
                @method('PUT')
                @csrf

                <div class="form-field col-lg-6">
                    <label class="label" for="title">Title</label>
                    <input value="{{ $banner->title }}" name="title" id="title" class="input-text js-input" type="text">

                    @error('title')
                        <span class="text-danger text-left">{{ $message }}</span>
                    @enderror
                </div>


                <div class="form-field col-lg-6">
                    <label class="label" for="status">Banner Status</label>
                    <select style="background-color: aliceblue" name="status" id="status" class="input-text js-input">
                        <option value="">-- Status --</option>

                        <option value="1" {{$banner->status == 1 ? 'selected' : ''}}>On</option>
                        <option value="0" {{$banner->status == 0 ? 'selected' : ''}}>Off</option>
                    </select>


                    @error('status')
                        <span class="text-danger text-left">{{ $message }}</span>
                    @enderror
                </div>


                <div class="form-field col-lg-12 ">
                    <label class="label" for="description">Description</label>
                    <textarea style="background-color: aliceblue" name="description" id="description" cols="30"
                        rows="2">{{ $banner->description }}</textarea>

                    @error('description')
                        <span class="text-danger text-left">{{ $message }}</span>
                    @enderror
                </div>


                <div style="flex-direction: row" class="form-field col-lg-12">
                    <label class="label my-auto" for="preimg">Previous
                        Image</label>
                    <img style="border-radius: 5px; margin-left: 10rem" width="250px"
                        src="{{ asset('backend/assets/images/banner-img' . '/' . $banner->image) }}" alt=""
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