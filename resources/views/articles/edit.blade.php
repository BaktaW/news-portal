@extends('layouts.app')

<section class="background-radial-gradient overflow-hidden flex-grow-1" style="font-family: Raleway;">

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-8 col-md-10">
            <div class="card shadow p-4" style="background-color: #f7f7f7; border-radius: 10px;">
                <h2 class="text-center mb-4">EDIT ARTICLE</h2>

                <form method="POST" action="{{ route('articles.update', $article) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <!-- Title -->
                    <div class="form-group mb-3">
                    <h1 for="title" class="form-label text-center font-weight-bold d-block">Judul</h1>
                        <input id="title" name="title" type="text" class="form-control" value="{{ $article->title }}" required>
                    </div>

                    <!-- Content -->
                    <div class="form-group mb-4">
                    <h1 for="content" class="form-label text-center font-weight-bold d-block">Isi Artikel</h1>
                        <textarea id="content" name="content" class="form-control" rows="10" required>{{ $article->content }}</textarea>
                        <script src="https://cdn.ckeditor.com/ckeditor5/35.3.1/classic/ckeditor.js"></script> <!-- implementasi text editor -->
                        <script>
    ClassicEditor
        .create(document.querySelector('#content'), {
            toolbar: {
    items: [
        'undo', 'redo',
        '|',
        'heading',
        '|',
        'bold', 'italic',
        '|',
        'link', 'blockQuote',
        '|',
        'bulletedList', 'numberedList'
    ],
    shouldNotGroupWhenFull: false
}
        })
        .then(editor => {
            editorInstance = editor;
        })
        .catch(error => {
            console.error(error);
        });

        document.querySelector('form').addEventListener('submit', function(event) {
        // Get the editor's content
        const content = editorInstance.getData();

        // untuk memastiken article berisi suatu kontent, tag require di textarea harus dihilangkan dan dibuat exeption secara manual
        if (!content.trim()) {
            event.preventDefault();  // Prevent form submission
            alert('isi artikel harus diisi');  // Display a message
        }
    });
</script>
                    </div>

                    <!-- Image -->
                    <div class="form-group mb-4">
                        <label for="image" class="form-label">Image</label>
                        @if ($article->image)
                            <img src="{{ asset('storage/' . $article->image) }}" alt="Image" class="img-fluid mb-3" style="max-width: 100%; height: auto;">
                        @endif
                        <input id="image" name="image" type="file" class="form-control-file">
                    </div>

                    <!-- Submit Button -->
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary">Update Article</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<style>
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

    /* Optional: Styling for form elements */
    .form-control {
        border-radius: 0.25rem;
        padding: 10px;
    }
    textarea.form-control {
        resize: vertical;
        font-size: 1.1rem;
    }
    .form-control-file {
        padding: 5px;
    }
</style>
@endsection
