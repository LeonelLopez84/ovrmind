@extends('layouts.app')

@section('content')
 <div class="container micontainer" id="article">
	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<h1>{{$article->title}}</h1>
			<p class="lead"><i class="fa fa-user"></i>  {{$article->user->name}}</p>
			<p><img class="img-thumbnail" src="{{url('articles/images/'.$article->images->first()->name)}}"></p>
			<blockquote>{{$article->content}}</blockquote>
			<p class="pull-right"><i class="fa fa-calendar"></i>  {{$article->created_at->diffForHumans()}}</p>
		</div>
	</div>
</div>
@endsection