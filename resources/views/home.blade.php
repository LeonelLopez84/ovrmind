@extends('layouts.app')

@section('content')
<div class="container micontainer" id="home">
    <div class="row">
      @foreach($articles as $article)
        
        <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4 ">
            <div class="panel panel-default">
            <a href="{{url('/articles/'.$article->slug)}}">
            <img class="img-responsive" src="{{url('articles/images/'.$article->images->first()->name)}}" >
            <span class="post-title"> <b>{{$article->title}}</b>
                <br> <b>Por: {{$article->user->name}}</b>
              </span>
              
            </a>
              <div class="panel-footer">
                <p class="pull-right"><i class="fa fa-calendar"></i>  {{$article->created_at->diffForHumans()}}</p>
                <a  href="{{url('/articles/'.$article->slug)}}" >Leer más</a>
              </div>
            </div>
        </div>
        @endforeach 
    </div>
    <div class="row">
      <div class=" col-xs-offset-2 col-sm-offset-2  col-md-offset-4  col-lg-offset-4 col-xs-8 col-sm-8 col-md-4 col-lg-4">
        {{ $articles->links() }}
      </div>
    </div>
  </div>
@endsection
