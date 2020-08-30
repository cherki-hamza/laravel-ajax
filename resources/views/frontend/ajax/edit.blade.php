@extends('frontend.master.app')

@section('title' , 'Edit Post By Ajax')

@section('styles')
    <style>

    </style>
@endsection

@section('content')
    <div class="container my-5">
        <div class="card shadow my-2 mx-2">
            <h1 class="card-title shadow text-success">Edit Posts By Ajax</h1>

            <div class="alert alert-success text-center" id="success_msg" style="display: none">
               <span>The Post Updated with success</span>
            </div>

            <div class="card-body shadow my-2 mx-2">
                <!-- start form add post -->
                <form action="" id="post_form_data_update">
                    @csrf
                    <div class="form-group">
                        <div class="row p-4">
                            <label for="title" class="text-danger">Post Title</label>
                            <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" value="{{$post->title}}" id="title">
                            <input  type="hidden" name="post_id" class="form-control" value="{{$post->id}}">
                        </div>
                        @error('title')
                        <div class="alert alert-danger my-2">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <div class="row p-4">
                            <label for="picture" class="text-danger">Post Picture</label>
                            <div class="row">
                                <div class="col-md-6">
                                    <input type="file" name="picture" class="form-control @error('picture') is-invalid @enderror" id="picture">
                                </div>
                                <div class="col-md-6">
                                    <img id="img" src="{{asset(''.$post->picture)}}" style="width: 100%;height: 50px;" class="img-fluid" alt="{{$post->title}}">
                                </div>
                            </div>
                        </div>
                        @error('picture')
                        <div class="alert alert-danger my-2">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <div class="row p-4">
                            <label for="category" class="text-danger">Post Category</label>
                            <input type="text" name="category" class="form-control @error('category') is-invalid @enderror" value="{{ $post->category }}" id="category">
                        </div>
                        @error('category')
                        <div class="alert alert-danger my-2">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <div class="row p-4">
                            <label for="body" class="text-danger">Post Content</label>
                            <textarea name="body" class="form-control @error('body') is-invalid @enderror" id="body" cols="30" rows="5">{{ $post->body }}</textarea>
                        </div>
                        @error('body')
                        <div class="alert alert-danger my-2">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <button  id="updatePost" class="btn btn-primary">Update Post</button>
                    </div>

                </form>
                <!-- end form add post -->
            </div>

        </div>
    </div>




@endsection

@section('scripts')
    <script>
     $(document).on('click','#updatePost',function (event){
         event.preventDefault();
         let formData = new FormData($('#post_form_data_update')[0])
         $.ajax({
             type : 'POST',
             enctype : 'multipart/form-data',
             url : '{{route('ajax.update')}}',
             data : formData,
             processData : false,
             contentType : false,
             cache : false,
             success : function (data){
                 if (data){
                     console.log(data);
                     $('#success_msg').show();
                 }
             },
             error : function (err){
                 console.log(err);
             }
         })
     });

    </script>
@endsection



{{--'_token' : '{{csrf_token()}}',--}}
{{--'title' : $("input[name='title']").val() ,--}}
{{--'category' : $("input[name='category']").val() ,--}}
{{--'body' : $('textarea#body').val() ,--}}
{{--//'picture' : $("input[name='picture']").val() ,--}}
