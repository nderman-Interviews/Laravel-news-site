<li class="list-group-item">
<div class="snippet">
	<div class="h2"><a href="{{url('/'.$article->id)}}">{{ $article->title }}</a></div>
	<div class="h4">{{$article->author->name}}</div>
	{{-- 	<div class="snippet-image"> {{ $image }} </div> --}}
		<div class="snippet-text"> {{$article->snippet_text}}</div>
</div>
</li>