@extends('backend.layouts.master')


@section('main-content')


    <section style="margin-top: 10px; max-width: 1000px;" id="main-content" class="get-in-touch text-center">
        <div class="row">

            
            <h1 class="title m-auto" style="padding: 50px 100px">Add City</h1>

            @if (session('success'))
                <div class="alert alert-success col-12 mb-5">
                    {{ session('success') }}
                </div>
            @endif

            <form action="{{ route('city.store') }}" method="POST" class="contact-form row m-auto">
                @csrf

                <div class="form-field col-lg-6">
                    <label class="label" for="country_id">Select Country</label>
                    <select style="background-color: aliceblue" name="country_id" id="country_id" class="input-text js-input">
                        <option value="">-- Countries --</option>
                        @foreach ($countries as $country)
                            <option value="{{$country->id}}">{{$country->name}}</option>
                        @endforeach
                    </select>
                </div>


                <div class="form-field col-lg-6">
                    <label class="label" for="name">Name</label>
                    <input value="{{old('name')}}" name="name" id="name" class="input-text js-input" type="text">

                    @error('name')
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