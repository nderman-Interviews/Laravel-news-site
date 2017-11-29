@extends('app')

@section('title')
{{$title}}
@endsection

@section('content')
    @foreach ($articles as $article)
    	<ul class="list-group">
    	@include('snippet', ['artilce' => $article])
    </ul>
    @endforeach
    {{ $articles->links() }}
@endsection