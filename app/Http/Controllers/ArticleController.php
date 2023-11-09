<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Articles;
use Illuminate\Support\Facades\Storage;

class ArticleController extends Controller
{




    public function index()
    {
        return view('index', [
            'articles' => Articles::latest()->paginate(8)
        ]);
    }
    public function show(Articles $article)
    {
        return view('articles.show', [
            'article' => $article
        ]);
    }

    public function store(Request $request)
    {
        // dd($request);
        $incomingFields = $request->validate(
            [
                "title" => "required",
                "body" => "required",
            ]

        );
        if ($request->hasFile('thumbnail')) {
            $incomingFields['thumbnail'] = $request->file('thumbnail')->store('thumbnail', 'public');
        }
        $incomingFields['user_id'] = auth()->id();
        Articles::create($incomingFields);

        return back()->with('message', 'Post has been Created successfully!');
    }


    public function create()
    {
        return view('articles.create');
    }

    public function edit(Articles $articles)
    {
        if (auth()->user()->id !== $articles->user_id) {
            return redirect('/');
        }
        return view('articles.edit', ['articles' => $articles]);
    }
    public function update(Articles $articles, Request $request)
    {

        if (auth()->user()->id !== $articles->user_id) {
            return redirect('/');
        }

        $incomingFields = $request->validate(
            [
                "title" => "required",
                "body" => "required",
            ]

        );


        if ($request->hasFile('thumbnail')) {
            $incomingFields['thumbnail'] = $request->file('thumbnail')->store('thumbnail', 'public');
        }

        $articles->update($incomingFields);

        return back()->with('message', 'Article updated successfully!');
    }

    public function destroy(Articles $articles)
    {
        // Make sure logged in user is owner
        if ($articles->user_id != auth()->id()) {


            abort(403, 'Unauthorized Action');
            return redirect('/')->with('message', 'You are not the owner of this article');
        }

        if ($articles->thumbnail && Storage::disk('public')->exists($articles->thumbnail)) {
            Storage::disk('public')->delete($articles->thumbnail);
        }
        $articles->delete();
        return redirect('/')->with('message', 'Listing deleted successfully');
    }


}
