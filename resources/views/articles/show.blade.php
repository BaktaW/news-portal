@extends('layouts.app')

<section class="background-radial-gradient overflow-hidden flex-grow-1" style="font-family: Raleway;">
@section('content')
    <div class="container px-4 py-5 px-md-5 text-center text-lg-start my-5">
        <div class="row gx-lg-5 align-items-start mb-5">
            <!-- Left column: 5 latest articles and Back button -->
            <div class="col-lg-3 mb-5 mb-lg-0" style="position: absolute; left: 0;">
                <div class="text-left mb-4">
                    <a href="{{ route('articles.index') }}" class="btn btn-outline-primary">
                        <i class="fas fa-arrow-left"></i> Back to Articles
                    </a>
                </div>

                <div class="latest-articles">
                    <h5 class="text-white">Latest News</h5>
                    <ul class="list-group">
                        @foreach ($latestArticles as $latestArticle)
                            <li class="list-group-item">
                                <a href="{{ route('articles.show', $latestArticle->id) }}">
                                    {{ $latestArticle->title }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>

            <!-- Right column: Main article content -->
            <div class="col-lg-8 offset-lg-3 position-relative">
                <h1 style="color: #ffffff; text-align: center;">{{ $article->title }}</h1>

                @if($article->image)
                    <img src="{{ asset('storage/' . $article->image) }}" alt="{{ $article->title }}" class="img-fluid mb-4" style="display: block; margin: 0 auto;">
                @endif

                <!-- Render article content with HTML formatting -->
                <div class="article-content-box" style="margin-left: 10px; color: #f8f9fa; text-align: justify;">
                    {!! $article->content !!}
                </div>

                @if (auth()->check() && auth()->id() === $article->user_id)
                    <div class="d-flex justify-content-center mt-4">
                        <a href="{{ route('articles.edit', $article->id) }}" class="btn btn-outline-warning btn-sm" style="margin-right: 4px;">Edit</a>
                        <form action="{{ route('articles.destroy', $article->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this article?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-outline-danger btn-sm">Delete</button>
                        </form>
                    </div>
                @endif
            </div>
        </div>
    </div>

    <style>
        .background-radial-gradient {
            background-color: hsl(218, 41%, 15%);
            background-image: radial-gradient(650px circle at 0% 0%, hsl(218, 41%, 35%) 15%, hsl(218, 41%, 30%) 35%, hsl(218, 41%, 20%) 75%, hsl(218, 41%, 19%) 80%, transparent 100%),
                radial-gradient(1250px circle at 100% 100%, hsl(218, 41%, 45%) 15%, hsl(218, 41%, 30%) 35%, hsl(218, 41%, 20%) 75%, hsl(218, 41%, 19%) 80%, transparent 100%);
        }

        .latest-articles h5 {
            color: #f8f9fa;
        }

        .list-group-item {
            background-color: hsl(218, 41%, 20%);
            color: #f8f9fa;
            border: none;
        }

        .list-group-item a {
            color: #f8f9fa;
            text-decoration: none;
        }

        .list-group-item:hover {
            background-color: hsl(218, 41%, 30%);
        }

        .btn-outline-primary {
            color: #fff;
            border-color: #fff;
        }

        .btn-outline-primary:hover {
            background-color: #fff;
            color: #000;
        }

        .fas.fa-arrow-left {
            margin-right: 5px;
        }

        .btn-outline-warning, .btn-outline-danger {
            margin: 0 5px;
        }

        .indented-paragraph {
            text-indent: 30px;
            margin-bottom: 1.5em;
        }
    </style>
</section>
@endsection
