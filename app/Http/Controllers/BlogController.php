<?php

namespace App\Http\Controllers;
use App\Models\Blog;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
                'opis' => 'required',
                'slika' => 'image|mimes:jpeg,png,jpg,gif|max:2048'
            ]);

            if ($request->hasFile('slika')) {
                $slika = $request->file('slika');
                $imeSlike = time() . '_' . $slika->getClientOriginalName();
                $slika->storeAs('public/slike', $imeSlike);

                Blog::create([
                    'naziv' => $request->naziv,
                    'opis' => $request->opis,
                    'slika' => $imeSlike
                ]);
            } else {
                Blog::create([
                    'naziv' => $request->naziv,
                    'opis' => $request->opis
                ]);
            }

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
            if ($request->hasFile('slika')) {
                $slika = $request->file('slika');
                $imeSlike = time() . '_' . $slika->getClientOriginalName();
                $slika->storeAs('public/slike', $imeSlike);
                $blog->slika = $imeSlike;
            }
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
