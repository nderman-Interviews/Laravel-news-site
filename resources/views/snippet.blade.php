<li class="list-group-item">
<div class="snippet">
	<div class="h2">{{ $article->title }}</div>
	<div class="h4">{{$article->author->name}}</div>
	{{-- 	<div class="snippet-image"> {{ $image }} </div> --}}
		<div class="snippet-text"> {{$article->snippet_text}}</div>
</div>
</li>