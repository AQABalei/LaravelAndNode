@extends('layout')

@section('title', 'Edit Genre Name')

@section('main')
	<div class="row">
	    <div class="col-9">
	      	<form action="/genres/{{$genreId}}/edit" method="post">
	        	@csrf
	        	<div class="form-group">
		          	<input type="text" id="name" name="GenreName" placeholder="Input a new genre name" class="form-control" value="{{(old('GenreName') != null) || ($errors->first('GenreName') == 'The genre name field is required.') ? old('GenreName') : $genres->Name}}">
		          	<small class="text-danger">{{$errors->first('GenreName')}}</small>
	        	</div>
		      	<button type="submit" class="btn btn-primary">
	          		Save
	        	</button>
	        </form>
	    </div>
	</div>
@endsection