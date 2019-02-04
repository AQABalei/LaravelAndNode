<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Validator;

class TracksController extends Controller
{
    public function index(){
    	$URL = $_SERVER['REQUEST_URI'];
        $availableAlbums = DB::table('albums')->get();
        $availableMediaTypes = DB::table('media_types')->get();
        $availableGenres = DB::table('genres')->get();
        $tempTracks = DB::table('tracks')->select('tracks.TrackId AS TrackId', 'tracks.Name AS TrackName', 'albums.Title AS AlbumTitle', 'artists.Name AS ArtistsName', 'tracks.UnitPrice AS UnitPrice')->join('genres', 'tracks.GenreId', '=', 'genres.GenreId')
                    ->join('albums', 'tracks.AlbumId', '=', 'albums.AlbumId')
                    ->join('artists', 'albums.ArtistId', '=', 'artists.ArtistId');
        if(substr($URL, -6) == 'tracks')
        {   
            $tracks = $tempTracks->get();
        }
        else if(substr($URL, -3) == 'new')
        {
            $tracks = $tempTracks->get();
            return view('new', [
            'tracks' => $tracks,
            'albums' => $availableAlbums,
            'mediaTypes' => $availableMediaTypes,
            'genres' => $availableGenres
        ]);
        }
        else
        {
            $sGenre = urldecode($_GET["genre"]);
            $tracks = $tempTracks->where('genres.Name', '=', $sGenre)->get();
        }
    	return view('tracks', [
    		'tracks' => $tracks,
            'albums' => $availableAlbums,
            'mediaTypes' => $availableMediaTypes,
            'genres' => $availableGenres
    	]);
    }

    public function store(Request $request)
    {
        $input = $request->all();
        $validation = Validator::make($input, [
            'TrackName' => 'required',
            'ComposerName' => 'required',
            'Milliseconds' => 'numeric',
            'Bytes' => 'numeric',
            'UnitPrice' => 'numeric'
        ]);
        if($validation->fails())
        {
            return redirect('/tracks/new')
            ->withInput()
            ->withErrors($validation);
        }
        DB::table('tracks')->insert([
            'Name' => $request->TrackName,
            'AlbumId' => $request->AlbumId,
            'MediaTypeId' => $request->MediaTypeId,
            'GenreId' => $request->GenreId,
            'Composer' => $request->ComposerName,
            'Milliseconds' => $request->Milliseconds,
            'Bytes' => $request->Bytes,
            'UnitPrice' => $request->UnitPrice
        ]);
        return redirect('/tracks');
    }
}
