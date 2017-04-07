@extends('layouts.app')

@section('content')

@include("errors")
<div class="container micontainer" id="add">
	<div class="row">
		<div class="col-sm-12 col-md-12">
			<div class="panel panel-default">
				<div class="panel-heading"><h3>@yield('title', 'Crear Articulo')</h3></div>
			  <div class="panel-body">
			{{ Form::open(['route' => 'articles.create',"method"=>"POST",'files'=>true,'id'=>'article']) }}

				<div class="form-group">
					{{Form::label('title','Titulo')}}
					{{Form::text('title',null, ['class'=>'form-control','placeholder'=>'Título del Articulo','required'] ) }}
				</div>

				<div class="form-group">
					{{Form::label('content','Contenido')}}
					{{Form::textarea('content',null, ['class'=>'form-control editor','placeholder'=>'Contenido','required'] ) }}
				</div>

				<div class="form-group">
					{{Form::label('image','Imagen')}}
					{{Form::file('image')}}
				</div>

				<div class="form-group">
					{{Form::submit('Crear',['class'=>'btn btn-success']) }}
				</div>
			{{ Form::close() }}
				</div>
			</div>
		</div>
	</div>
</div>
@endsection