@extends('layout.master')

@section('title', 'About edit')

@section('content')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h4 class="fw-bold">ویرایش درباره ما</h4>
</div>

<form action="{{ route('about.update', ['about' => $about]) }}" method="POST" class="row gy-4">
    @csrf
    @method('PUT')
    <div class="col-md-6">
        <label class="form-label">عنوان</label>
        <input name="title" value="{{ $about->title }}" type="text" class="form-control" />
        <div class="form-text text-danger"> @error('title') {{ $message }} @enderror </div>
    </div>
    <div class="col-md-3">
        <label class="form-label">عنوان لینک</label>
        <input name="link" type="text" class="form-control" value="{{$about->link}}" />
        <div class="form-text text-danger"> @error('link') {{ $message }} @enderror </div>
    </div>
    <div class="col-md-12">
        <label class="form-label">متن</label>
        <textarea name="body" class="form-control" rows="3"> {{ $about->body }} </textarea>
        <div class="form-text text-danger"> @error('body') {{ $message }} @enderror </div>
    </div>

    <div>
        <button type="submit" class="btn btn-outline-dark mt-3">
            ویرایش درباره ما
        </button>
    </div>
</form>

@endsection