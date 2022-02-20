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
            <h1 class="title m-auto">Add Testimonal</h1>

            @if (session('success'))
                <div class="alert alert-success col-12 mb-5">
                    {{ session('success') }}
                </div>
            @endif

            <form action="{{ route('testimonial.store') }}" method="POST" enctype="multipart/form-data"
                class="contact-form row m-auto">
                @csrf

                <div class="form-field col-lg-6">
                    <label class="label" for="name">Name</label>
                    <input value="{{old('name')}}" name="name" id="name" class="input-text js-input" type="text">

                    @error('name')
                        <span class="text-danger text-left">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-field col-lg-6">
                    <label class="label" for="profession">Profession</label>
                    <input value="{{old('profession')}}" name="profession" id="profession" class="input-text js-input" type="text">

                    @error('profession')
                        <span class="text-danger text-left">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-field col-lg-12 ">
                    <label class="label" for="comment">Comment</label>
                    <textarea style="background-color: aliceblue" name="comment" id="comment" cols="30" rows="2">{{old('comment')}}</textarea>

                    @error('comment')
                        <span class="text-danger text-left">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-field col-lg-6">
                    <label class="label" for="image">Choose Client Image</label>
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

    {{-- Jquery CDN --}}
    {{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script> --}}
    {{-- END Jquery CDN --}}


    {{-- Ajax for category and sub category --}}
    {{-- <script>

        $('#category_id').on('change', function(e){
            console.log(e);

            var cat_id = e.target.value;

            // Ajax
            $.get('/ajax-subcat?cat_id=' + cat_id, function(data){
                // success data
                $('#sub_category_id').empty();

                $.each(data, function(index, subcatObj){

                    $('#sub_category_id').append('<option value="'+subcatObj.id+'">'+subcatObj.name+'</option>');

                });
            });
        });

    </script> --}}
    {{-- END Ajax for category and sub category --}}
    {{-- Script for Form in Banner/Edit --}}
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    {{-- END Script for Form in Banner/Edit --}}
@endsection
