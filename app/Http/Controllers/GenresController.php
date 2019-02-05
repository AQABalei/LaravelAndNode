<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Validator;

class GenresController extends Controller
{
    public function index($genreId = null){

    	$genres = DB::table('genres')->get();
    	if($genreId != null)
    	{
    		$genres = DB::table('genres')->where('GenreId', $genreId)->first();
    		return view('edit', [
	    		'genres' => $genres,
	    		'genreId' =>$genreId
	    	]);
    	}
    	return view('index', [
    		'genres' => $genres
    	]);
    }

    public function store(Request $request, $genreId = null)
    {
    	$input = $request->all();
    	$validation = Validator::make($input, [
    		'GenreName' => 'required|min:3|unique:genres,Name'
    	]);
    	if($validation->fails())
    	{
    		$URL = 'genres/' . $genreId . '/edit';
    		return redirect($URL)
    				->withInput()
            		->withErrors($validation);
    	}
    	DB::table('genres')->where('GenreId', $genreId)->update(['Name' => $input['GenreName']]);
    	return redirect('/genres');
    }
}
