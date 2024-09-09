@extends('layout.master')

@section('title', 'Slider Create')

@section('content')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h4 class="fw-bold">داشبورد</h4>
</div>

<form action="{{ route('slider.store') }}" method="POST" class="row gy-4">
    @csrf
    <div class="col-md-6">
        <label class="form-label">عنوان</label>
        <input name="title" value="{{old('title')}}" type="text" class="form-control" />
        <div class="form-text text-danger"> @error('title') {{ $message }} @enderror </div>
    </div>
    <div class="col-md-3">
        <label  class="form-label" >عنوان لینک</label>
        <input name="link_title" type="text" class="form-control" value="{{old('link_title')}}" />
        <div class="form-text text-danger"> @error('link_title') {{ $message }} @enderror </div>
    </div>
    <div class="col-md-3">
        <label class="form-label">آدرس لینک</label>
        <input name="link_address" type="text" class="form-control" value="{{old('link_address')}}"/>
        <div class="form-text text-danger"> @error('link_address') {{ $message }} @enderror </div>
    </div>
    <div class="col-md-12">
        <label class="form-label">متن</label>
        <textarea name="text" class="form-control" rows="3"> {{ old('text') }} </textarea>
        <div class="form-text text-danger"> @error('text') {{ $message }} @enderror </div>
    </div>

    <div>
        <button type="submit" class="btn btn-outline-dark mt-3">
            ایجاد اسلایدر
        </button>
    </div>
</form>

@endsection