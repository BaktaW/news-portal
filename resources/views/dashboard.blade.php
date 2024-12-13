@extends('layouts.app')

<section class="background-radial-gradient overflow-hidden" style="font-family: Raleway;">
@section('content')


    <div class="container">
    <h2 class="text-center mb-5" style="color: white; font-size: 2.5rem;">Welcome, {{ auth()->user()->username }}</h2>

    <div class="d-flex justify-content-center mb-3">
    <a href="{{ route('articles.createNew') }}" class="btn btn-primary">Create Article</a>
</div>


        <!-- Search Bar -->
        <input type="text" id="search" class="form-control mb-4" placeholder="Search articles by title..." onkeyup="filterArticles()">

        <div class="row" id="article-list">
            @forelse($articles as $article)
                <div class="col-md-4 mb-4 article-card">
                    <div class="card h-100 shadow-sm">
                        <!-- Article Image -->
                        @if($article->image)
                            <img src="{{ asset('storage/'.$article->image) }}" class="card-img-top" alt="Article Image" style="height: 150px; object-fit: cover;">
                        @else
                            <img src="{{ asset('storage/images/default-news.jpg') }}" class="card-img-top" alt="Default Image" style="height: 150px; object-fit: cover;">
                        @endif

                        <!-- Article Content -->
                        <div class="card-body">
                            <h5 class="card-title">{{ $article->title }}</h5>
                            <p class="card-text">
                                {!! Str::limit($article->content, 75) !!} 
                            </p>
                            <a href="{{ route('articles.show', $article->id) }}" class="btn btn-outline-primary btn-sm">Read More</a>
                        </div>
                        
                        <!-- Article Date, Edit, and Delete Buttons -->
                        <div class="card-footer text-muted d-flex justify-content-between align-items-center">
                            @if($article->created_at)
                                <span>Published on {{ $article->created_at->format('M d, Y') }}</span>
                            @else
                                <span>Published date not available</span>
                            @endif

                            <div class="d-flex align-items-center">
                                        <a href="{{ route('articles.edit', $article->id) }}" class="btn btn-outline-warning btn-sm" style="margin-right: 4px;  margin-bottom:auto">Edit</a>
                                        
                                        <form action="{{ route('articles.destroy', $article->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this article?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-outline-danger btn-sm">Delete</button>
                                        </form>
                                    </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12">
                    <p>You have not created any articles yet.</p>
                </div>
            @endforelse
        </div>
    </div>

    <style>
        .article-card {
            max-width: 25%; 
        }
        .card {
            transition: transform 0.2s ease-in-out;
        }
        .card:hover {
            transform: scale(1.02);
        }
        h5.card-title {
            font-weight: bold;
            font-size: 1rem; 
        }
        p.card-text {
            color: #6c757d;
        }
        .background-radial-gradient {
            background-color: hsl(218, 41%, 15%);
            background-image: radial-gradient(650px circle at 0% 0%,
                    hsl(218, 41%, 35%) 15%,
                    hsl(218, 41%, 30%) 35%,
                    hsl(218, 41%, 20%) 75%,
                    hsl(218, 41%, 19%) 80%,
                    transparent 100%),
                radial-gradient(1250px circle at 100% 100%,
                    hsl(218, 41%, 45%) 15%,
                    hsl(218, 41%, 30%) 35%,
                    hsl(218, 41%, 20%) 75%,
                    hsl(218, 41%, 19%) 80%,
                    transparent 100%);
        }
    </style>

    <script>
        function filterArticles() {
            const input = document.getElementById('search');
            const filter = input.value.toLowerCase();
            const cards = document.querySelectorAll('.article-card');

            cards.forEach(card => {
                const title = card.querySelector('.card-title').textContent.toLowerCase();
                if (title.includes(filter)) {
                    card.style.display = ""; // Show card
                } else {
                    card.style.display = "none"; // Hide card
                }
            });
        }
    </script>

</section>

@endsection
