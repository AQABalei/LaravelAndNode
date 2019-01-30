<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class TracksController extends Controller
{
    public function index(){
    	$sGenre = urldecode($_GET["genre"]);
    	$query1 = DB::table('tracks')->select('tracks.Name AS TrackName', 'albums.Title AS AlbumTitle', 'artists.Name AS ArtistsName', 'tracks.UnitPrice AS UnitPrice');
    	$query2 = $query1->join('genres', 'tracks.GenreId', '=', 'genres.GenreId');
    	$query3 = $query2->join('albums', 'tracks.AlbumId', '=', 'albums.AlbumId');
    	$query4 = $query3->join('artists', 'albums.ArtistId', '=', 'artists.ArtistId');
    	$query5 = $query4->where('genres.Name', '=', $sGenre);
    	$tracks = $query5->get();
    	return view('tracks', [
    		'tracks' => $tracks
    	]);
    }
}
