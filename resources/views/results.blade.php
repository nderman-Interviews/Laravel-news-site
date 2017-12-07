@extends('app')

@section('title')
{{$title}}
@endsection

@section('content')
	<div class="panel-default">
        <div class="h2"><a href="{{url('/new')}}"><button>New Article</button></a></div>
    </div>
    @foreach ($articles as $article)
    	<ul class="list-group">
    	@include('snippet', ['artilce' => $article])
    </ul>
    @endforeach
    {{ $articles->links() }}
@endsection