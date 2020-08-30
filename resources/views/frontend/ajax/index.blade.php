@extends('frontend.master.app')

@section('title' , 'All Posts')

@section('styles')
    <style>

    </style>
@endsection

@section('content')
    <div class="container my-5">
        <div class="row my-5">
               <div class="ml-5">
               <span class="float-right text-right"><a class="btn btn-success" href="{{route('ajax.create')}}">Create New Post by Ajax</a></span>
            </div>
        </div>
        <div class="card shadow my-2 mx-2">
            <h1 class="card-title shadow text-success">All Posts</h1>

            <div class="alert alert-danger text-center" id="remove_post" style="display: none">
                <span>The Post Removed with success</span>
            </div>

            <div class="card-body shadow my-2 mx-2">
                <table id="contact-table" class="table table-bordered table-hover my-2">
                    <thead>
                    <tr class="table-info">
                        <th>#ID</th>
                        <th>Post Name</th>
                        <th>Post Category</th>
                        <th>Post Body</th>
                        <th>Post Picture</th>
                        <th>Post Created_At</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($posts as $post)
                        <tr class="RowPostId{{$post->id}}">
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
                                    <a href="#" class="btn btn-warning"><i class="fal fa-eye mr-1 text-primary"></i>Show</a>
                                    <a href="{{route('ajax.edit',$post->id)}}"  class="btn btn-warning"><i class="fal fa-edit mr-1 text-success"></i>Edit</a>
                                    <a href="#"  post_id="{{$post->id}}" class="btn btn-warning deletePost"><i class="fal fa-trash mr-1 text-danger"></i>Delete</a>
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

        @endsection

        @section('scripts')
            <script>
                $(document).on('click','.deletePost',function (event){
                    event.preventDefault();
                    let postId = $(this).attr('post_id');
                    $.ajax({
                        type : 'POST',
                        enctype : 'multipart/form-data',
                        url : '{{route('ajax.delete')}}',
                        data : {
                            '_token' : '{{csrf_token()}}',
                            'id' : postId,
                        },
                        success : function (data){
                            if (data.status === true){
                                console.log(data);
                                $('#remove_post').show();
                            }
                            $('.RowPostId'+data.id).remove();
                        },
                        error : function (err){
                            console.log(err);
                        }
                    })
                });
            </script>
@endsection
