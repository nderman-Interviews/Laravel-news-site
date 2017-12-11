@extends('layouts.app')


@section('content')
<div class="container">
	@if ($editing)
	Create or Edit your Article
	@else

	<div class="snippet panel panel-default">
		<div class="panel-heading">
			<h3 class="panel-title">{{$article->title}}</h3>
			<div class="small">{{$article->author->name or ''}} </div>
		</div>
		<div class="panel-body">
			@endif
			@if ($editing)


			<script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
			<script>tinymce.init({ selector:'textarea' });</script>
			<form method="post" action='{{ url("/update") }}'>
				<input name="title" type="text" placeholder="Article Title" value="{{$article->title or ''}}">
				<input name="id" type="hidden" placeholder="" value="{{$article->id or ''}}">
				<textarea name="body">{{$article->body or ''}}</textarea>

				{{ csrf_field() }}

				<button type="submit"  > Save</button>
			</form>
			@else

			<div class="snippet-text"> {!!$article->body!!}</div>

			@endif

		</div>
	</div>
	@if (Auth::user())
		  @foreach ($comments as $comment)
			   <ul class="list-group">
			       @include('comment', ['comment' => $comment])
			   </ul>
		   @endforeach
	@endif
</div>
@endsection


