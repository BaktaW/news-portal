@extends('layouts.app')

<section class="background-radial-gradient overflow-hidden" style="font-family: Raleway;">
@section('content')

    <div class="container">
        <h2 class="text-center mb-5 text-white" style="font-size: 2.5rem;">Latest News</h2>
        
        <!-- Wrapper for Filters and Articles -->
        <div class="row mb-4">
            <!-- Filter Section -->
            <div class="col-md-3"> 
                <form id="filterForm" method="GET" action="{{ route('articles.index') }}">
                    <h5 class="mb-3 text-white">Filter Articles</h5>
                    
                    <!-- Filter by Year -->
                    <div class="mb-3">
                        <label for="years" class="form-label text-white">Filter by Year:</label>
                        <div id="years">
                            @foreach ($availableYears as $year)
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="years[]" value="{{ $year }}" id="year{{ $year }}" 
                                           {{ in_array($year, request('years', [])) ? 'checked' : '' }} 
                                           onchange="document.getElementById('filterForm').submit();">
                                    <label class="form-check-label text-white" for="year{{ $year }}">
                                        {{ $year }}
                                    </label>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <!-- Filter by Month -->
                    <div class="mb-3">
                        <label for="months" class="form-label text-white">Filter by Month:</label>
                        <div id="months">
                            @foreach ($availableMonths as $month => $monthName)
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="months[]" value="{{ $month }}" id="month{{ $month }}" 
                                           {{ in_array($month, request('months', [])) ? 'checked' : '' }} 
                                           onchange="document.getElementById('filterForm').submit();">
                                    <label class="form-check-label text-white" for="month{{ $month }}">
                                        {{ $monthName }}
                                    </label>
                                </div>
                            @endforeach
                        </div>
                    </div>

                </form>
              </div>

            <!-- Articles Section -->
            <div class="col-md-9"> <!-- Adjusted to occupy 9 columns -->
                <div class="row"> <!-- Changed to a row for article cards -->
                    @forelse($articles as $article)
                        <div class="col-md-4 mb-4 d-flex justify-content-center"> <!-- Center cards in their column -->
                            <div class="card h-100 shadow-sm">
                                <!-- Article Image -->
                                @if($article->image)
                                    <img src="{{ asset('storage/'.$article->image) }}" class="card-img-top" alt="Article Image" style="height: 200px; object-fit: cover;">
                                @else
                                    <img src="{{ asset('storage/images/default-news.jpg') }}" class="card-img-top" alt="Default Image" style="height: 200px; object-fit: cover;">
                                @endif

                                <!-- Article Content -->
                                <div class="card-body">
                                    <h5 class="card-title text-card">{{ $article->title }}</h5>
                                    <p class="card-text text-muted">
                                        {!! Str::limit($article->content, 100) !!} 
                                    </p>
                                    <a href="{{ route('articles.show', $article->id) }}" class="btn btn-outline-primary btn-sm">Read More</a>
                                </div>

                                <!-- Article Date, Edit, and Delete Buttons -->
                                <div class="card-footer text-muted d-flex justify-content-between align-items-center">
                                    @if($article->created_at)
                                        <span class="text-card">Published on {{ $article->created_at->format('M d, Y') }}</span>
                                    @else
                                        <span class="text-card">Published date not available</span>
                                    @endif

                                    @if (auth()->check() && auth()->id() === $article->user_id)
                                        <div class="d-flex align-items-center">
                                            <a href="{{ route('articles.edit', $article->id) }}" class="btn btn-outline-warning btn-sm" style="margin-right: 4px; margin-bottom:auto">Edit</a>

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
                    @empty
                        <div class="col-12">
                            <p class="text-white">No articles found.</p>
                        </div>
                    @endforelse
                </div>

                <!-- Simplified Pagination -->
                <div class="d-flex justify-content-center mt-4">
                    <div>
                        @if ($articles->onFirstPage())
                            <span class="btn btn-link disabled">Previous</span>
                        @else
                            <a href="{{ $articles->previousPageUrl() }}" class="btn btn-link">Previous</a>
                        @endif
                    </div>

                    @for ($i = 1; $i <= $articles->lastPage(); $i++)
                        <a href="{{ $articles->url($i) }}" class="btn btn-link {{ ($i == $articles->currentPage()) ? 'active' : '' }}">
                            {{ $i }}
                        </a>
                    @endfor

                    <div>
                        @if ($articles->hasMorePages())
                            <a href="{{ $articles->nextPageUrl() }}" class="btn btn-link">Next</a>
                        @else
                            <span class="btn btn-link disabled">Next</span>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        .card {
            width: 100%; /* Use full width of the column */
            height: 100%; /* Use full height of the column */
            overflow: hidden; /* Hide overflow if content exceeds the card size */
            transition: transform 0.2s ease-in-out; /* Add transition for hover effect */
        }
        .card:hover {
            transform: scale(1.05);
        }
        .card-img-top {
            height: 200px; /* Fixed height for images */
            object-fit: cover; /* Cover the area without distorting */
        }
        h5.card-title {
            font-weight: bold;
            font-size: 1.25rem;
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

</section>
@endsection
