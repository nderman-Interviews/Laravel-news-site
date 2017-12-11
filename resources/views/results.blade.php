@extends('layouts.app')

@section('title')
{{$title}}
@endsection

@section('content')
<div class="container">
	<div class="panel-default">
		@if (!Auth::guest())

		@if (Auth::user()->is_admin())
       <div class="h2"><a href="{{url('/new')}}"><button>New Article</button></a></div>
       @endif

       @endif
   </div>
   @foreach ($articles as $article)
   <ul class="list-group">
    @include('snippet', ['article' => $article])
   </ul>
   @endforeach
   {{ $articles->links() }}
</div>
@endsection