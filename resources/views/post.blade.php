@extends('layouts.blog-post')


@section('content')

<!-- Title -->
<h1>{{$post->title}}</h1>

<!-- Author -->
<p class="lead">
	by <a href="#">{{$post->user->name}}</a>
</p>

<hr>

<!-- Date/Time -->
<p><span class="glyphicon glyphicon-time"></span> Posted {{$post->created_at->diffForHumans()}}</p>

<hr>

<!-- Preview Image -->
<img class="img-responsive" src="{{$post->photo ? asset($post->photo->file) : null }}" alt="">

<hr>

<!-- Post Content -->
<p class="lead">{!! $post->body !!}</p>

<hr>

@if(Session::has('comment_message'))

	{{session('comment_message')}}
	
@endif

<!-- Blog Comments -->

@if(Auth::check())

<!-- Comments Form -->
<div class="well">
	<h4>Leave a Comment:</h4>
	
	{!! Form::open(['method' => 'POST', 'action' => 'PostCommentsController@store' ]) !!}
	
	{{csrf_field()}}
	
	<input type="hidden" name="post_id" value="{{$post->id}}">
	
	<div class="form-group">
		{!! Form::label('body', 'Body:') !!}
		{!! Form::textarea('body', null, ['class' => 'form-control', 'rows'=>3]) !!}
	</div>	
	
	<div class="form-group">
		{!! Form::submit('Submit Comment', ['class' => 'btn btn-primary']) !!}
	</div>
	
	{!! Form::close() !!}
	
	
</div>

@endif

<hr>

<!-- Posted Comments -->

@if(count($comments) > 0)


<!-- Comment -->

@foreach($comments as $comment)

	<div class="media">
		<a class="pull-left" href="#">
			<img height="64" class="media-object" src="{{asset($comment->photo)}}" alt="">
		</a>
		<div class="media-body">
			<h4 class="media-heading">{{$comment->author}}
				<small>{{$comment->created_at->diffForHumans()}}</small>
			</h4>
			<p>{{$comment->body}}</p>
		
			{!! Form::open(['method'=>'POST', 'action'=>'CommentRepliesController@createReply']) !!}
			
				<div class="form-group">
				
					<input type="hidden" name="comment_id" value="{{$comment->id}}">
					
					{!! Form::label('body', 'Reply:') !!}
					{!! Form::textarea('body', null, ['class'=>'form-control', 'rows'=>1]) !!}
				</div>
				
				<div class="form-group">
					{!! Form::submit('submit', ['class'=>'btn btn-primary']) !!}
				</div>
				
			{!! Form::close() !!}			
			
			
		@if(count($comment->replies) > 0)
		
<div class="comment-reply-container">

	
	<button class="toggle-reply btn btn-primary pull-right">Show Replies</button>
	
	
		<div class="comment-reply">
			
		
				<hr>
		
			@foreach($comment->replies()->whereIsActive(1)->get() as $reply)
			
		<!-- Nested Comment -->
		<div class="media">
			<a class="pull-left" href="#">
				<img height="64" class="media-object" src="{{asset($reply->photo)}}" alt="">
			</a>
			<div class="media-body">
				<h4 class="media-heading">{{$reply->author}}
					<small>{{$reply->created_at->diffForHumans()}}</small>
				</h4>
				<p>{{$reply->body}}</p>
			</div>
			
		</div>
		
		<!-- End Nested Comment -->
		
				<hr>
		
			@endforeach
			
	</div>
			
</div>
		
		@endif
					

		
		
		</div>
	</div>

@endforeach

@endif


@stop



@section('scripts')

	<script>
		
		$(".comment-reply-container .toggle-reply").click(function(){
			
			$(this).next().slideToggle("slow");
			
		});
		
		
	   $(".comment-reply-container .toggle-reply").click(function () {
		  $(this).text(function(i, text){
			  return text === "Show Replies" ? "Hide Replies" : "Show Replies";
		  })
	   });
		
	</script>

@stop