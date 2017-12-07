<li class="list-group-item">
<div class="snippet row">
	<div class="col-xs-12">
		<div class="h2 row">
			<a class="col-xs-9" href="{{url('/'.$article->id)}}">{{ $article->title }}</a>
			<div class="col-xs-3"> <a href="{{url('/edit/'.$article->id)}}"><button>Edit</button> </a></div>
		</div>

	</div>

	<div class="col-xs-12">
		<div class="h4">{{$article->author->name}}  </div>
	</div>

	<div class="col-xs-12">
		<div class="snippet-text"> {{$article->snippet_text}}</div>
	</div>
</div>
</li>