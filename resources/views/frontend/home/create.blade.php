@extends('frontend.master.app')

@section('title' , 'Create New Posts')

@section('styles')
    <style>

    </style>
@endsection

@section('content')
    <div class="container my-5">
        <div class="card shadow my-2 mx-2">
            <h1 class="card-title shadow text-success">Create New Posts</h1>
            <div class="card-body shadow my-2 mx-2">
                <!-- start form add post -->
                <form action="{{route('posts.store')}}" method="POST" id="addContact" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <div class="row p-4">
                            <label for="title" class="text-danger">Post Title</label>
                            <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title') }}" id="title">
                        </div>
                        @error('title')
                        <div class="alert alert-danger my-2">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <div class="row p-4">
                            <label for="picture" class="text-danger">Post Picture</label>
                            <input type="file" name="picture" class="form-control @error('picture') is-invalid @enderror" id="picture">
                        </div>
                        @error('picture')
                        <div class="alert alert-danger my-2">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <div class="row p-4">
                            <label for="category" class="text-danger">Post Category</label>
                            <input type="text" name="category" class="form-control @error('category') is-invalid @enderror" value="{{ old('category') }}" id="category">
                        </div>
                        @error('category')
                        <div class="alert alert-danger my-2">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <div class="row p-4">
                            <label for="body" class="text-danger">Post Body</label>
                            <textarea name="body" class="form-control @error('body') is-invalid @enderror" id="body" cols="30" rows="5">{{ old('body') }}</textarea>
                        </div>
                        @error('body')
                        <div class="alert alert-danger my-2">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <input type="submit" name="add-post" id="add-post" class="btn btn-primary" value="Add Post">
                    </div>

                </form>
                <!-- end form add post -->
            </div>

        </div>
    </div>




@endsection

@section('scripts')
    <script>

    </script>
@endsection
