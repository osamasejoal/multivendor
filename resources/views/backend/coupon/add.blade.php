@extends('backend.layouts.master')


@section('main-content')


    <section style="margin-top: 10px; max-width: 1000px;" id="main-content" class="get-in-touch text-center">
        <div class="row">

            {{-- <section class="get-in-touch"> --}}
            <h1 class="title m-auto">Create Coupon</h1>

            @if (session('success'))
                <div class="alert alert-success col-12 mb-5">
                    {{ session('success') }}
                </div>
            @endif

            <form action="{{ route('coupon.store') }}" method="POST"
                class="contact-form row m-auto">
                @csrf


                <div class="form-field col-lg-6">
                    <label class="label" for="name">Coupon Name *</label>
                    <input value="{{old('name')}}" name="name" id="name" class="input-text js-input" type="text">


                    @error('name')
                        <span class="text-danger text-left">{{ $message }}</span>
                    @enderror
                </div>



                <div class="form-field col-lg-6">
                    <label class="label" for="code">Coupon Code *</label>
                    <input value="{{old('code')}}" name="code" id="code" class="input-text js-input" type="text">


                    @error('code')
                        <span class="text-danger text-left">{{ $message }}</span>
                    @enderror
                </div>



                <div class="form-field col-lg-6">
                    <label class="label" for="discount">Discount Percentage *</label>
                    <input value="{{old('discount')}}" name="discount" id="discount" class="input-text js-input" type="number" max="99">


                    @error('discount')
                        <span class="text-danger text-left">{{ $message }}</span>
                    @enderror
                </div>


                <div class="form-field col-lg-6">
                    <label class="label" for="validity">Coupon Validity *</label>
                    <input value="{{old('validity')}}" name="validity" id="validity" class="input-text js-input" type="date">


                    @error('validity')
                        <span class="text-danger text-left">{{ $message }}</span>
                    @enderror
                </div>


                <div class="form-field col-lg-6">
                    <label class="label" for="limit">Apply Limit *</label>
                    <input value="{{old('limit')}}" name="limit" id="limit" class="input-text js-input" type="number">


                    @error('limit')
                        <span class="text-danger text-left">{{ $message }}</span>
                    @enderror
                </div>
                


                <div class="form-field col-lg-6">
                    <label class="label" for="status">Status *</label>
                    <select style="background-color: aliceblue" name="status" id="status" class="input-text js-input">
                        <option value="">-- Status --</option>

                        <option value="1" {{old('status') == 1 ? 'selected' : ''}}>On</option>
                        <option value="0" {{old('status') == 0 ? 'selected' : ''}}>Off</option>
                    </select>


                    @error('status')
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