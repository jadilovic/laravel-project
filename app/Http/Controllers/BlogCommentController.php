<?php

namespace App\Http\Controllers;

use App\Models\BlogComment;
use Illuminate\Http\Request;

class BlogCommentController extends Controller
{
    //
    public function store(Request $request) {
        $data = $request->validate([
            'blog_id' => 'required',
            'ime' => 'required',
            'email' => 'required|email',
            'tekst' => 'required'
        ]);
        
        BlogComment::create($data);

        return redirect()->back()->with('success', 'Komentar je uspjesno dodan!');
    }
}
