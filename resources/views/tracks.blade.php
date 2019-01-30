@extends('layout')

@section('title', 'Tracks')

@section('main')
	<table class="table">
		<tr>
			<th>Track Name</th>
			<th>Album Title</th>
			<th>Artist Name</th>
			<th>Unit Price</th>
		</tr>
		@foreach($tracks as $track)
	      <tr>
	        <td>
	        	{{$track->TrackName}}
	        </td>
	        <td>
				{{$track->AlbumTitle}}
	        </td>
	        <td>
	        	{{$track->ArtistsName}}
	        </td>
	        <td>
	        	{{$track->UnitPrice}}
	        </td>
	      </tr>
	    @endforeach
	</table>
@endsection