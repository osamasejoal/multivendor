@extends('backend.layouts.master')


@section('main-content')




    <section style="margin-top: 10px; max-width: 1000px;" id="main-content" class="get-in-touch text-center">
        <div class="row">

            {{-- <section class="get-in-touch"> --}}
            <h1 class="title m-auto">Edit Testimonial</h1>

            @if (session('success'))
                <div class="alert alert-success col-12 mb-5">
                    {{ session('success') }}
                </div>
            @endif

            <form action="{{ route('testimonial.update', $testimonial->id) }}" method="POST" enctype="multipart/form-data"
                class="contact-form row m-auto">
                @method('PUT')
                @csrf

                <div class="form-field col-lg-6">
                    <label class="label" for="name">Name</label>
                    <input value="{{ $testimonial->name }}" name="name" id="name" class="input-text js-input" type="text">

                    @error('name')
                        <span class="text-danger text-left">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-field col-lg-6">
                    <label class="label" for="profession">Profession</label>
                    <input value="{{ $testimonial->profession }}" name="profession" id="profession" class="input-text js-input" type="text">

                    @error('profession')
                        <span class="text-danger text-left">{{ $message }}</span>
                    @enderror
                </div>


                <div class="form-field col-lg-12 ">
                    <label class="label" for="comment">Comment</label>
                    <textarea style="background-color: aliceblue" name="comment" id="comment" cols="30"
                        rows="2">{{ $testimonial->comment }}</textarea>

                    @error('comment')
                        <span class="text-danger text-left">{{ $message }}</span>
                    @enderror
                </div>


                <div class="form-field col-lg-6">
                    <label class="label" for="status">Testimonial Status</label>
                    <select style="background-color: aliceblue" name="status" id="status" class="input-text js-input">
                        <option value="">-- Status --</option>

                        <option value="1" {{$testimonial->status == 1 ? 'selected' : ''}}>On</option>
                        <option value="0" {{$testimonial->status == 0 ? 'selected' : ''}}>Off</option>
                    </select>


                    @error('status')
                        <span class="text-danger text-left">{{ $message }}</span>
                    @enderror
                </div>


                <div style="flex-direction: row" class="form-field col-lg-12">
                    <label class="label my-auto" for="preimg">Previous
                        Image</label>
                    <img style="border-radius: 5px; margin-left: 10rem" width="250px"
                        src="{{ asset('backend/assets/images/testimonial-img' . '/' . $testimonial->image) }}" alt=""
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