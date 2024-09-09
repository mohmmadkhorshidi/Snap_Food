@extends('layout.master')

@section('title', 'category Create')

@section('content')

<div
                    class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h4 class="fw-bold">اسلایدرها</h4>
                    <a href="{{ route('category.create') }}" class="btn btn-sm btn-outline-primary">ایجاد دسته بندی</a>
                </div>

                <div class="table-responsive">
                    <table class="table align-middle">
                        <thead>
                            <tr>
                                <th>عنوان</th>
                                <th>وضعیت</th>
                                <th>عملیات</th>
                            </tr>
                        </thead>
                        <tbody>
                           @foreach($categories as $category)
                           <tr>
                                
                                <td> {{ $category->name}} </td>
                                <td> {{ $category->status ? 'فعال ': ' غیر فعال'}} </td>
            
                                <td>
                                    <div class="d-flex">
                                        <a class="btn btn-sm btn-outline-info me-2" 
                                        href="{{ route('category.edit', ['category'=> $category->id]) }}"
                                        >ویرایش</a>
                                        <form action="{{ route('category.destroy', ['category'=> $category->id])}}" method="POST"> 
                                           @csrf
                                           @method('DELETE')
                                            
                                        <button type="submit" class="btn btn-sm btn-danger" >حذف</button>
                                        </form>
                                        
                                    </div>
                                </td>
                            </tr>
                           @endforeach
                        </tbody>
                    </table>
                </div>



@endsection