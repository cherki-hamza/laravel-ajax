@extends('frontend.master.app')

@section('title' , 'All Posts')

@section('styles')
    <style>

    </style>
@endsection

@section('content')
    <div class="container my-5">
        <div class="row my-5">
            <span class=""><a class="btn btn-primary btn-add" data-toggle="modal" data-target="#add-new-post" onclick="return (event)" href=""><i class="fal fa-plus-circle mr-2 text-success"></i>Add New Contact</a></span>
            <div class="ml-5">
               <span class="float-right text-right"><a class="btn btn-success" href="{{route('posts.create')}}">Create New Post</a></span>
            </div>
        </div>
        <div class="card shadow my-2 mx-2">
            <h1 class="card-title shadow text-success">All Posts</h1>
            @if($message = session()->get('success'))
            <div class="alert alert-success">
                 {{$message}}
            </div>
            @endif
            <ul  id="success" class="list-unstyled my-2"></ul>
            <div class="card-body shadow my-2 mx-2">
                <table id="contact-table" class="table table-bordered table-hover my-2">
                    <thead>
                    <tr class="table-info">
                        <th>#ID</th>
                        <th>Post Title</th>
                        <th>Post Category</th>
                        <th>Post Body</th>
                        <th>Post Picture</th>
                        <th>Post Created_At</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($posts as $post)
                    <tr>
                        <td>{{$post->id}}</td>
                        <td>{{$post->title}}</td>
                        <td>{{$post->category}}</td>
                        <td>{{$post->body}}</td>
                        <td>
                            <img src="{{$post->picture}}" style="border-radius: 100%; width: 100px;height: 50px;" class="img-fluid" alt="{{$post->title}}">
                        </td>
                        <td>{{$post->created_at}}</td>
                        <td>
                            <div class="row">
                                <span>
                                    <button class="btn btn-warning"><i class="fal fa-eye mr-1 text-primary"></i>Show</button>
                                    <button class="btn btn-warning"><i class="fal fa-edit mr-1 text-success"></i>Edit</button>
                                    <button class="btn btn-warning"><i class="fal fa-trash mr-1 text-danger"></i>Delete</button>
                                </span>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- start modal -->
    <div class="modal fade" id="add-new-post" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-center text-primary" id="staticBackdropLabel"> Add New Post </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <ul  id="errors" class="list-unstyled my-2"></ul>
                    <form action="{{route('posts.store')}}" method="POST" id="addContact" enctype="multipart/form-data">
                         @csrf
                        <div class="form-group">
                            <div class="row p-4">
                                <label for="title" class="text-danger">Post Title</label>
                                <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" id="title">
                                @error('title')
                                <div class="alert alert-danger my-2">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row p-4">
                                <label for="picture" class="text-danger">Post Picture</label>
                                <input type="file" name="picture" class="form-control @error('picture') is-invalid @enderror" id="picture">
                                @error('picture')
                                <div class="alert alert-danger my-2">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row p-4">
                                <label for="category" class="text-danger">Post Category</label>
                                <input type="text" name="category" class="form-control @error('category') is-invalid @enderror" id="category">
                                @error('category')
                                <div class="alert alert-danger my-2">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row p-4">
                                <label for="body" class="text-danger">Post Body</label>
                                <textarea name="body" class="form-control @error('body') is-invalid @enderror" id="body" cols="30" rows="5"></textarea>
                                @error('body')
                                <div class="alert alert-danger my-2">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <input type="submit" name="add-post" id="add-post" class="btn btn-primary" value="Add Post">
                        </div>

                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
        <!-- end modal -->
        @endsection

        @section('scripts')
            <script>

            </script>
@endsection
