@extends('layout')

@section('title', 'Genres')

@section('main')
	<body>
		<table class="table">
			<tr>
				<th>ID</th>
				<th>Genre Name</th>
			</tr>
			@foreach($genres as $genre)
				<tr>
					<td>
						{{$genre->GenreId}}
					</td>
					<td>
						<a href="/tracks?genre=<?php echo urlencode($genre->Name) ?>">{{$genre->Name}}</a>
					</td>
				</tr>
			@endforeach
		</table>
	</body>
@endsection