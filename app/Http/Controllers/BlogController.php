<?php

namespace App\Http\Controllers;
use App\Models\Blog;
use App\Models\BlogCategory;
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
        $kategorije = BlogCategory::all();
        return view('dashboard.blogsAddForm', compact('kategorije'));
    }

    public function store(Request $request) {
        try {
            $request->validate([
                'naziv' => 'required',
                'opis' => 'required',
                'slika' => 'image|mimes:jpeg,png,jpg,gif|max:2048'
            ]);

            $category_id = null;
            if($request->kategorija != '') {
                $category_id = $request->kategorija;
            }

            if ($request->hasFile('slika')) {
                $slika = $request->file('slika');
                $imeSlike = time() . '_' . $slika->getClientOriginalName();
                $slika->storeAs('public/slike', $imeSlike);

                Blog::create([
                    'naziv' => $request->naziv,
                    'opis' => $request->opis,
                    'slika' => $imeSlike,
                    'category_id' => $category_id
                ]);
            } else {
                Blog::create([
                    'naziv' => $request->naziv,
                    'opis' => $request->opis,
                    'category_id' => $category_id
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
            $kategorije = BlogCategory::all();
            return view('dashboard.blogsEditForm', compact('blog', 'kategorije'));
        } catch (\Throwable $th) {
            return redirect()->route('dashboard.blogs')->with('error', 'Blog nije uredjen!');
        }
    }

    public function update(Request $request, $id) {
        try {
            $blog = Blog::findOrFail($id);
            $blog->naziv = $request->naziv;
            $blog->opis = $request->opis;
           
            $category_id = null;
            if($request->kategorija != '') {
                $category_id = $request->kategorija;
            }
            $blog->category_id = $category_id;
            
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
