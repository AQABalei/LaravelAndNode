@extends('layout')

@section('title', 'Add Track')

@section('main')
	<div class="row">
	    <div class="col">
	      	<form action="/tracks/new" method="post">
	        	@csrf
	        	<div class="form-group">
		          	<input type="text" id="name" name="TrackName" placeholder="Track Name" class="form-control" value="{{old('TrackName')}}">
		          	<small class="text-danger">{{$errors->first('TrackName')}}</small>
		          	<select name="AlbumId">
						@foreach($albums as $album)
					    <option value="{{$album->AlbumId}}" {{ old('AlbumId') == $album->AlbumId ? "selected" : ""}}>
					    	{{$album->Title}}
					    </option>
					  	@endforeach
					</select>
					<select name="MediaTypeId">
						@foreach($mediaTypes as $mediaType)
					    <option value="{{$mediaType->MediaTypeId}}" {{ old('MediaTypeId') == $mediaType->MediaTypeId? "selected" : ""}}>
					    	{{$mediaType->Name}}
					    </option>
					  	@endforeach
					</select>
					<select name="GenreId">
						@foreach($genres as $genre)
					    <option value="{{$genre->GenreId}}" {{ old('GenreId') == $genre->GenreId ? "selected" : ""}}>
					    	{{$genre->Name}}
					    </option>
					  	@endforeach
					</select>
					<input type="text" id="name" name="ComposerName" placeholder="Composer" class="form-control" value="{{old('ComposerName')}}">
		          	<small class="text-danger">{{$errors->first('ComposerName')}}</small>
		          	<input type="text" id="name" name="Milliseconds" placeholder="Milliseconds" class="form-control" value="{{old('Milliseconds')}}">
		          	<small class="text-danger">{{$errors->first('Milliseconds')}}</small>
		          	<input type="text" id="name" name="Bytes" placeholder="Bytes" class="form-control" value="{{old('Bytes')}}">
		          	<small class="text-danger">{{$errors->first('Bytes')}}</small>
		          	<input type="text" id="name" name="UnitPrice" placeholder="Unit Price" class="form-control" value="{{old('UnitPrice')}}">
		          	<small class="text-danger">{{$errors->first('UnitPrice')}}</small>
	        	</div>
		      	<button type="submit" class="btn btn-primary">
	          		Save
	        	</button>
	        </form>
	    </div>
	</div>
@endsection