@extends('layouts.app')
@section('content')
    <div class="w-4/5 m-auto text-center">
        <div class="py-15 border-b border-gray-200">
            <h1 class="text-6xl">
                Blog Post
            </h1>
        </div>
    </div>
    @if(session()->has('message'))
        <div class="pt-15 w-4/5 m-auto">
            <p>
                {{session()->get('message')}}
            </p>
        </div>
    @endif

    @if(Auth::check())
        <div class="container-fluid">
            <a href="/blog/create"
               class="btn btn-default ">
                <button class="btn btn-outline-success">Create Post</button>
            </a>
        </div>
    @endif

    @foreach($posts as $post)

        <div class="container mt-5 mb-5">
            <div class="row d-flex align-items-center justify-content-center">
                <div class="col-md-6">
                    <div class="card">
                        <div class="d-flex justify-content-between p-2 px-3">
                            <div class="d-flex flex-row align-items-center">
                                <div class="d-flex flex-column ml-2"> <span class="font-weight-bold">{{Auth::user()->name}}</span> <small class="text-primary">Blogger</small> </div>
                            </div>
                            <div class="d-flex flex-row mt-1 ellipsis"> <small class="mr-2">{{date('jS M Y',strtotime($post->updated_at))}}</small> <i class="fa fa-ellipsis-h"></i> </div>
                        </div> <img src="{{asset('images/'.$post->image_path)}}" class="img-fluid">
                        <div class="container-fluid">
                            <p class="text-justify">{{substr($post->description, 0, 125)}}</p>
                            <div><a class="btn-outline-success"
                                    href="/blog/{{$post->slug}}"><button class="btn btn-dark">Keep Reading</button></a></div>
                        </div>
                        <div class="margin-bottom">
{{--
                            @if(isset(Auth::user()->id) && Auth::user()->id == $post->user_id)
--}}
                                <span class="float-right">
                            <a href="/blog/{{$post->slug}}/edit"
                               class="text-gray-700 italic hover:text-gray-900 pb-1 border-b-2">
                            <button class="btn btn-outline-secondary">Edit</button>
                            </a>
                            </span>

                                <span class="float-right">
                            <form action="/blog/{{$post->slug}}"
                                  method="POST">
                                @csrf
                                @method('delete')
                            <button class="btn btn-outline-danger">
                                Delete
                            </button>
                            </form>
                            </span>
{{--
                            @endif
--}}
                        </div>

                    </div>
                </div>
            </div>
        </div>

        {{--
                <div class="sm:grid grid-cols-2 gap-20 w-4/5 mx-auto py-15 border-b border-gray-200">
                    <div>
                        <img src="{{asset('images/'.$post->image_path)}}" width="400px" alt="">
                    </div>
                    <div>
                        <h2 class="text-gray-700 font-bold text-5xl pb-4">
                            {{$post->title}}
                        </h2>
                        <span class="text-gray-400">
                by<span class="font-bold italic text-gray-800"> {{$post->user->name}}</span>, Created at
                    {{date('jS M Y',strtotime($post->updated_at))}}
                </span>
                        <p class="text-xl text-gray-500 pt-8 pb-10 leading-8 font-light">
                            {{substr($post->description, 0, 125)}}
                        </p>
                        <a class="uppercase bg-blue-500 text-gray-100 text-s font-extrabold py-3 px-8 rounded-3xl"
                           href="/blog/{{$post->slug}}">Keep Reading</a>
                        @if(isset(Auth::user()->id) && Auth::user()->id == $post->user_id)
                            <span class="float-right">
                            <a href="/blog/{{$post->slug}}/edit"
                               class="text-gray-700 italic hover:text-gray-900 pb-1 border-b-2">
                            <button class="text-red-500 pr-3">Edit</button>
                            </a>
                            </span>

                            <span class="float-right">
                            <form action="/blog/{{$post->slug}}"
                                  method="POST">
                                @csrf
                                @method('delete')
                            <button class="text-red-500 pr-3">
                                Delete
                            </button>
                            </form>
                            </span>
                        @endif
                    </div>
                </div>
        --}}
    @endforeach

@endsection
