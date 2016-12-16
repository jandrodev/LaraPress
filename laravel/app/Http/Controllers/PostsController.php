<?php

namespace App\Http\Controllers;

use App\Models\Posts;

class PostsController extends Controller
{
	public function index()
	{
//		$data = Posts::all(); --> All posts (published or not)
//		$data = Posts::published()->get();

		$data = Posts::type('post')->published()->paginate(2);

		return view('posts/list', compact('data'));
	}

	public function show($slug)
	{
//		$data = Posts::find($id);
		$data = Posts::where('post_name', '=', $slug)->firstOrFail();

		return view('posts/details', compact('data'));
	}
}
