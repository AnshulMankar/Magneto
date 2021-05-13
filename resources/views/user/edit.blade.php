@extends('layouts.app')
@section('content')
    <div class="w-4/5 m-auto text-center">
        <div class="py-15 border-b border-gray-200">
            <h1 class="text-6xl">
                Edit User
            </h1>
        </div>
    </div>

    {{-- @if($error->all())
         <div class="w-4/5">
             <ul>
                 @foreach($error->all() as $error )
                     <li class="w-1/5 mb-4">
                         {{$error}}
                     </li>
                 @endforeach
             </ul>
         </div>
     @endif--}}
    <div class="w-4/5 m-auto pt-10">
        <form
            action="/user/{{Auth()->user()->id}}/edit"
            method="POST"
            enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <input
                type="text"
                placeholder="Enter Updated Name "
                value="{{$edit->name}}"
                name="title"
                class="bg-gray-0 block border-b-2 w-full h-10 text-3xl outline-none">
            <input
                type="text"
                placeholder="Enter Updated Name "
                value="{{$edit->email}}"
                name="title"
                class="bg-gray-0 block border-b-2 w-full h-10 text-3xl outline-none">
            <button
                type="submit"
                class="uppercase mt-15 bg-blue-500 text-gray-100 text-lg
                    font-extrabold py-4 px-8 rounded-3xl text-sm-center">Submit
            </button>
        </form>
    </div>
@endsection
