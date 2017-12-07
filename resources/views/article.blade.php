@extends('app')

@section('title')
	@if ($editing)
 		Create or Edit your Article
 	@else
 		{{$article->title}}
 	@endif
@endsection

@section('content')
   <div class="snippet">
	<div class="h4">{{$article->author->name or ''}} </div>
	{{-- 	<div class="snippet-image"> {{ $image }} </div> --}}

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
	<div class="snippet-text"> {{$article->body}}</div>

	@endif

</div>
@endsection


