@extends('layout.master')

@section('title', 'contact Create')

@section('content')

<div
                    class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h4 class="fw-bold">بخش پیام های  ارسالی</h4>
                </div>

                <div class="table-responsive">
                    <table class="table align-middle">
                        <thead>
                            <tr>
                                <th>نام</th>
                                <th>ایمیل </th>
                                <th> موضوع پیام</th>
                                
                                <th> عملیات</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($messages as $messagea )
                            
                            
                           <tr>
                                <td> {{ $messagea->name}} </td>
                                <td> {{ $messagea->email}} </td>
                                <td> {{ $messagea->subject}} </td>
                                <td>
                                <div class="d-flex">
                                        <a class="btn btn-sm btn-outline-info me-2" 
                                        href="{{ route('contact.show', ['contact'=> $messagea->id]) }}"
                                        >نمایش</a>
                                        <form action="{{ route('contact.destroy', ['contact'=> $messagea->id])}}" method="POST"> 
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