<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class BlogApiController extends Controller
{
    public function index() {
        $blogs = Blog::all();
        return response()->json($blogs);
    }

    public function show($id) {
        $blog = Blog::find($id);
        return response()->json($blog);
    }

    public function store(Request $request) {
        $blog = new Blog;
        // $blog->title = $request->input('title');
        // $blog->content = $request->input('content');
        // $blog->category_id = $request->input('category_id');
        $blog->naziv = $request->naziv;
        $blog->opis = $request->opis;
        $blog->category_id = $request->kategorija;
        $blog->save();

        return response()->json($blog, 201);
    }

    public function update(Request $request, $id) {
        $blog = Blog::find($id);
        $blog->naziv = $request->naziv;
        $blog->opis = $request->opis;
        $blog->category_id = $request->kategorija;
        $blog->save();

        return response()->json($blog);
    }

    public function destroy($id) {
        $blog = Blog::find($id);
        $blog->delete();

        return response()->json(null, 204);
    }
}
