@extends('app')

@section('title')
{{$article->title}}
@endsection

@section('content')
   <div class="snippet">
	<div class="h4">{{$article->author->name}}</div>
	{{-- 	<div class="snippet-image"> {{ $image }} </div> --}}
		<div class="snippet-text"> {{$article->body}}</div>
</div>
@endsection


