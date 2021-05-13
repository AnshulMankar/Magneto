<script>

    function approve(id)
    {
        var token = $('meta[name="csrf-token"]').attr('content');

        $.ajax({
            type: 'post',
            url: '{{route('comment.approve')}}',
            data: {id:id,_token:token},
            success: function (data) {
                window.location.reload();
            }
        });

    }
    function rejected(id)
    {
        var token = $('meta[name="csrf-token"]').attr('content');
        $.ajax({
            type: 'post',
            url: '{{route('comment.reject')}}',
            data: {id:id,_token:token},
            success: function (data) {
                alert('data updated');
            }
        });
    }

</script>
@foreach($comments as $comment)
    @if($comment->status == 0)
        <div class="display-comment text-md-left">
            {{--<form action="{{route('comment.remove')}}" method="POST">
                @csrf
                <br><button type="submit">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                         stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                    </svg>
                </button>
            </form>--}}
            <strong class="px-4 pt-3 pb-2 text-gray-800 text-lg">{{ $comment->user->name }}</strong>
            @if(isset(Auth::user()->id) && Auth::user()->id == $comment->user_id)
            <button class="approve btn btn-success" onclick="approve({{$comment->id}})"><span class="glyphicon glyphicon-ok"></span> Approve</button>
            <button class="rejected btn btn-danger" onclick="rejected({{$comment->id}})"><span class="glyphicon glyphicon-remove"></span> Reject</button>
            @endif
            <p class="px-4 pt-3 pb-2 text-gray-800 text-lg">{{ $comment->body }}</p>
            <a href="" id="reply"></a>
            <form method="post" action="{{ route('reply.add') }}">
                @csrf
                @if(!$comment->parent_id)
                    <div class="form-group">
                        <input type="text" name="comment_body"
                               class="bg-gray-0 block border-b-2 w-4/12 h-10 text-3xl outline-none"/>
                        <input type="hidden" name="post_id" value="{{ $post_id }}"/>
                        <input type="hidden" name="comment_id" value="{{ $comment->id }}"/>
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-dark" value="Reply"/>
                    </div>
                @endif
            </form>
            @include('blog.commentsDisplay', ['comments' => $comment->replies])
        </div>
    @endif
@endforeach

