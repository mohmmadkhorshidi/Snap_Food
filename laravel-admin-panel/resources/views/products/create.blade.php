@extends('layout.master')
@section('title', 'Category Create')

@section('link')
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
@endsection

@section('script')
    <script type="text/javascript">
        document.addEventListener('alpine:init', () => {
            Alpine.data('imageViewer', () => ({
                imageUrl: '',

                fileChosen(event) {
                    if (event.target.files.length == 0) return;

                    let file = event.target.files[0];
                    let reader = new FileReader()

                    reader.readAsDataURL(file)
                    reader.onload = e => this.imageUrl = e.target.result
                }
            }))
        })
    </script>
@endsection

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h4 class="fw-bold">ایجاد محصول</h4>
    </div>

    <form action="{{ route('product.store') }}" enctype="multipart/form-data" method="POST" class="row gy-4">
        @csrf

        <div class="col-md-12 mb-5">
            <div class="row justify-content-center">
                <div class="col-md-4" x-data="imageViewer()">
                    <label class="form-label">تصویر اصلی</label>

                    <template x-if="imageUrl">
                        <img :src="imageUrl" class="rounded" width=350 height=220 alt="primary-image">
                    </template>

                    <input name="primary_image" @change="fileChosen" type="file" class="form-control mt-3" />

                    <div class="form-text text-danger">
                        @error('primary_image')
                            {{ $message }}
                        @enderror
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <label class="form-label">نام</label>
            <input name="name" value="{{ old('name') }}" type="text" class="form-control" />
            <div class="form-text text-danger">
                @error('name')
                    {{ $message }}
                @enderror
            </div>
        </div>

        {{-- <div class="col-md-3">
            <label class="form-label">وضعیت</label>
            <select name="status" class="form-select">
                <option {{ old('status') === '1' ? 'selected' : '' }} value="1">فعال</option>
                <option {{ old('status') === '0' ? 'selected' : '' }} value="0">غیر فعال</option>
            </select>
            <div class="form-text text-danger">@error('status') {{$message}} @enderror</div>
        </div> --}}

        <div>
            <button type="submit" class="btn btn-outline-dark mt-3">
                ایجاد دسته بندی
            </button>
        </div>
    </form>
@endsection
 