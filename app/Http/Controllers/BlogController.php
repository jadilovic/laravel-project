<?php

namespace App\Http\Controllers;
use App\Models\Blog;

use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index() {
        $blogs = Blog::all();
        return view('blog', ['blogs' => $blogs]);
    }

    public function dashboardIndex() {
        try {
            $blogs = Blog::all();
            return view('dashboard.blogs', ['blogs' => $blogs]);
        } catch (\Throwable $th) {
            $blogs = [];
            return view('dashboard.blogs', ['blogs' => $blogs]);
        }
    }

    public function create() {
        return view('dashboard.blogsAddForm');
    }

    public function store(Request $request) {
        try {
            $request->validate([
                'naziv' => 'required',
                'opis' => 'required'
            ]);

            Blog::create([
                'naziv' => $request->naziv,
                'opis' => $request->opis
            ]);

            return redirect()->route('dashboard.blogs')->with('success', 'Blog je uspjesno kreiran');
        } catch (\Throwable $th) {
            return redirect()->route('dashboard.blogs')->with('error', 'Blog nije uspjesno kreiran');
        }
    }

    public function edit($id) {
        try {
            $blog = Blog::findOrFail($id);
            return view('dashboard.blogsEditForm', compact('blog'));
        } catch (\Throwable $th) {
            return redirect()->route('dashboard.blogs')->with('error', 'Blog nije uredjen!');
        }
    }

    public function update(Request $request, $id) {
        try {
            $blog = Blog::findOrFail($id);
            $blog->naziv = $request->naziv;
            $blog->opis = $request->opis;
            $blog->save();

            return redirect()->route('blogs.edit', $id)->with('success', 'Uspjesno ste uredili blog!');
        } catch (\Throwable $th) {
            return redirect()->route('blogs.edit', $id)->with('error', 'Blog nije uredjen!');
        }
    }

    public function destroy($id) {
        try {
            $blog = Blog::findOrFail($id);
            $blog->delete();

            return redirect()->route('dashboard.blogs')->with('success', 'Uspjesno ste obrisali blog!');
        } catch (\Throwable $th) {
            return redirect()->route('dashboard.blogs')->with('error', 'Blog nije obrisan!');
        }
    }
}
