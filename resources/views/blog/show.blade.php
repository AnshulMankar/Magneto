@extends('layouts.app')
<style xmlns="http://www.w3.org/1999/html">
    .display-comment {
        margin-left: 40px
    }
</style>
@section('content')
    <div class="container">
        <div class="container-fluid">
            <h1 class="text-black-100">
                {{$post->title}}
            </h1>
        </div>
    </div>

    <div class="container">
        <span class="container-fluid text-center">
            By <span class="text-black-100 text-center">
                {{$post->user->name}}
            </span>,
            <span class="font-italic">created on  {{date('jS M Y',strtotime($post->updated_at))}}
            </span>
        <br>
        <br>
        <div>
        <p class="align font-italic">
            {{$post->description}}
        </p>
        </div>

        <br>
       <div class="text-md-left text-left display-comment"><h3>Comments</h3></div>

        <hr/>
        <br>
        @include('blog.commentsDisplay', ['comments' => $post->comments, 'post_id' => $post->id])
        <div class="flex mx-auto items-center justify-center shadow-lg mt-56 mx-8 mb-4 max-w-lg">
            <form class="w-full max-w-xl bg-white rounded-lg px-4 pt-2" method="post"
                  action="{{ route('comment.add') }}">
                @csrf
                <div class="flex-lg-column wrap">
                    <h2 class="px-4 pt-3 pb-2 text-gray-800 text-lg">Add a new comment</h2>
                    <div class="w-full md:w-full px-3 mb-2 mt-2">
                        <textarea name="comment_body"
                                  class="bg-gray-100 rounded border border-gray-400 leading-normal resize-none w-full h-20 py-2 px-3 font-medium placeholder-gray-700 focus:outline-none focus:bg-white"
                                  name="body" placeholder='Type Your Comment' required></textarea>
                        <input type="hidden" name="post_id" value="{{ $post->id }}"/>
                    </div>
                    <div class="w-full md:w-full flex items-start md:w-full px-3">
                        <div class="flex items-start w-1/2 text-gray-700 px-2 mr-auto">

                            <p class="text-xs md:text-sm pt-px"></p>
                        </div>
                        <div class="-mr-1">
                            <input type='submit'
                                   class="bg-white text-gray-700 font-medium py-1 px-4 border border-gray-400 rounded-lg tracking-wide mr-1 hover:bg-gray-100"
                                   value='Post Comment'>
                        </div>
                    </div>
                </div>

            </form>

        </div>
        </span>
    </div>



   {{--<div class="container mt-5 mb-5">
       <div class="row d-flex align-items-center justify-content-center">
           <div class="col-md-6">
               <div class="card">
                   <div class="d-flex justify-content-between p-2 px-3">
                       <div class="d-flex flex-row align-items-center">
                           <div class="d-flex flex-column ml-2"> <span class="font-weight-bold">Jeanette Sun</span> <small class="text-primary">Collegues</small> </div>
                       </div>
                       <div class="d-flex flex-row mt-1 ellipsis"> <small class="mr-2">20 mins</small> <i class="fa fa-ellipsis-h"></i> </div>
                   </div> <img src="https://i.imgur.com/xhzhaGA.jpg" class="img-fluid">
                   <div class="p-2">
                       <p class="text-justify">{{$post->title}}</p>
                       <hr>
                       <div class="d-flex justify-content-between align-items-center">
                           <div class="d-flex flex-row icons d-flex align-items-center"> <i class="fa fa-heart"></i> <i class="fa fa-smile-o ml-2"></i> </div>
                           <div class="d-flex flex-row muted-color"> <span>2 comments</span> <span class="ml-2">Share</span> </div>
                       </div>
                       <hr>
                       <div class="comments">
                           <div class="d-flex flex-row mb-2"> <img src="https://i.imgur.com/9AZ2QX1.jpg" width="40" class="rounded-image">
                               <div class="d-flex flex-column ml-2"> <span class="name">Daniel Frozer</span> <small class="comment-text">I like this alot! thanks alot</small>
                                   <div class="d-flex flex-row align-items-center status"> <small>Like</small> <small>Reply</small> <small>Translate</small> <small>18 mins</small> </div>
                               </div>
                           </div>
                           <div class="d-flex flex-row mb-2"> <img src="https://i.imgur.com/1YrCKa1.jpg" width="40" class="rounded-image">
                               <div class="d-flex flex-column ml-2"> <span class="name">Elizabeth goodmen</span> <small class="comment-text">Thanks for sharing!</small>
                                   <div class="d-flex flex-row align-items-center status"> <small>Like</small> <small>Reply</small> <small>Translate</small> <small>8 mins</small> </div>
                               </div>
                           </div>
                           <div class="comment-input"> <input type='submit' class="form-control">
                               <div class="fonts"> <i class="fa fa-camera"></i> </div>
                           </div>
                       </div>
                   </div>
               </div>
           </div>
       </div>
   </div>--}}
@endsection
