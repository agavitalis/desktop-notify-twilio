<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Events\PostCreated;
use App\Post;

class PostController extends Controller
{
	public function store(Request $request) {
    // ...
    // validation can be done here before saving 
    // with $this->validate($request, $rules)
    // ...

    // get data to be saved in an associative array using $request->only()
		$data = $request->only(['title', 'description']);

    //  save post and assign return value of created post to $post array
		$post = Post::create($data);

		// fire PostCreated event after post is successfully added to database
		event(new PostCreated($post));
		// or
		// \Event::fire(new PostCreated($post))

    // return post as response, Laravel automatically serializes this to JSON
		return response($post, 201);
	}
}
