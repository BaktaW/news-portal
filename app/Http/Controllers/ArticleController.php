<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use App\Models\Article;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;


class ArticleController extends Controller
{
    use AuthorizesRequests;

    public function index(Request $request)
    {
        // Fetch all articles
        $query = Article::query();
    
        // Check  filters
        if ($request->has('months') && !empty($request->months)) {
            $query->whereIn(DB::raw('MONTH(created_at)'), $request->months);
        }
    
        if ($request->has('years') && !empty($request->years)) {
            $query->whereIn(DB::raw('YEAR(created_at)'), $request->years);
        }
    
        // Paginate, 6 item per page
        $articles = $query->paginate(6);
    
        $availableYears = $articles->pluck('created_at')
        ->filter() // Remove null
        ->map(function ($date) {
            return $date->format('Y');
        })
        ->unique() // untuk tahun-tahun kedepanya
        ->sort()
        ->values();
    
        // Prepare available months (1-12)
        $availableMonths = [];
        for ($i = 1; $i <= 12; $i++) {
            $availableMonths[$i] = date('F', mktime(0, 0, 0, $i, 1)); // Month name
        }
    
        return view('articles.index', compact('articles', 'availableMonths', 'availableYears'));
    }
    
    
    

    // Show the form for creating a new article
    public function createNew()
    {
        $this->authorize('create', Article::class);
        return view('create.create');
    }

    // Store a newly created article in storage
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
            'image' => 'nullable|image'
        ]);

        $article = new Article();
        $article->title = $request->title;        
        $article->content = $request->content;
        $article->user_id = auth()->id();

        if ($request->hasFile('image')) {
            $article->image = $request->file('image')->store('images', 'public');
        }

        $article->save();

        return redirect()->route('articles.index')->with('success', 'Article created successfully!');
    }

    // Display the specified article
    public function show($id)
    {
        $article = Article::findOrFail($id);
        $latestArticles = Article::orderBy('created_at', 'desc')->take(5)->get();
    
        return view('articles.show', compact('article', 'latestArticles'));
    }
    

    // Show the form for editing the specified article
    public function edit(Article $article)
    {
        $this->authorize('update', $article);
        return view('articles.edit', compact('article'));
    }

    // Update the specified article in storage
    public function update(Request $request, Article $article)
    {
        $this->authorize('update', $article);

        $request->validate([
            'title' => 'required',
            'content' => 'required',
            'image' => 'nullable|image'
        ]);

        $article->title = $request->title;
        $article->content = $request->content;

        if ($request->hasFile('image')) {
            // Delete the old image if it exists
            if ($article->image) {
                Storage::delete($article->image);
            }
            $article->image = $request->file('image')->store('images');
        }

        $article->save();

        return redirect()->route('articles.index')->with('success', 'Article updated successfully!');
    }

    // Remove the specified article from storage
    public function destroy(Article $article)
    {
        $this->authorize('delete', $article);

        // Delete the image if it exists
        if ($article->image) {
            Storage::delete($article->image);
        }
        
        $article->delete();

        return redirect()->route('articles.index')->with('success', 'Article deleted successfully!');
    }

    public function dashboard()
    {
        // Get the currently authenticated user
        $user = auth()->user();
    
        // Fetch articles created by the logged-in user
        $articles = Article::where('user_id', $user->id)->get();
    
        // Pass the articles to the dashboard view
        return view('dashboard', compact('articles'));
    }
    
    

}
