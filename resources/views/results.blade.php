@extends('app')

@section('content')
    <p>This is my body content.</p>

    @foreach ($articles as $article)
    	@include('snippet', ['title' => $article->title, 'content' => $article->snippet_text])
    @endforeach
    {{ $articles->links() }}
@endsection