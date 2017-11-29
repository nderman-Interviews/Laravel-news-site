@extends('app')

@section('title')
{{$title}}
@endsection

@section('content')
    @foreach ($articles as $article)
    	@include('snippet', ['title' => $article->title, 'content' => $article->snippet_text])
    @endforeach
    {{ $articles->links() }}
@endsection