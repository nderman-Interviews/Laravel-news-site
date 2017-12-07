@extends('app')

@section('title')
{{$article->title}}
@endsection

@section('content')
   <div class="snippet">
	<div class="h4">{{$article->author->name}}</div>
	{{-- 	<div class="snippet-image"> {{ $image }} </div> --}}

	@if ($editing)


  <script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
  <script>tinymce.init({ selector:'textarea' });</script>

  <textarea>{{$article->body}}</textarea>
	@else
	<div class="snippet-text"> {{$article->body}}</div>

	@endif

</div>
@endsection


