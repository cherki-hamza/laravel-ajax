@extends('frontend.master.app')

@section('title' , 'Create New Posts')

@section('styles')
    <style>

    </style>
@endsection

@section('content')
    <div class="container my-5">
        <div class="card shadow my-2 mx-2">
            <h1 class="card-title shadow text-success">Create New Posts By Ajax</h1>

            <div class="alert alert-success text-center" id="success_msg" style="display: none">
               <span>The Post saved with success</span>
            </div>

            <div class="card-body shadow my-2 mx-2">
                <!-- start form add post -->
                <form action="" id="post_form_data">
                    @csrf
                    <div class="form-group">
                        <div class="row p-4">
                            <label for="title" class="text-danger">Post Title</label>
                            <input type="text" name="title" class="form-control"  value="{{ old('title') }}" id="title">
                        </div>
                        <div id="title_error" class="alert alert-danger my-2"></div>
                    </div>

                    <div class="form-group">
                        <div class="row p-4">
                            <label for="picture" class="text-danger">Post Picture</label>
                            <input type="file" name="picture" class="form-control" id="picture">
                        </div>
                        <div id="picture_error" class="alert alert-info my-2">The Picture is nor required</div>
                    </div>

                    <div class="form-group">
                        <div class="row p-4">
                            <label for="category" class="text-danger">Post Category</label>
                            <input type="text" name="category" class="form-control" value="{{ old('category') }}" id="category">
                        </div>
                        <div id="category_error" class="alert alert-danger my-2"></div>
                    </div>

                    <div class="form-group">
                        <div class="row p-4">
                            <label for="body" class="text-danger">Post Content</label>
                            <textarea name="body" class="form-control" id="body" cols="30" rows="5">{{ old('body') }}</textarea>
                        </div>
                        <div id="body_error" class="alert alert-danger my-2"></div>
                    </div>

                    <div class="form-group">
                        <button  id="add-post" class="btn btn-primary">Add Post</button>
                    </div>

                </form>
                <!-- end form add post -->
            </div>

        </div>
    </div>




@endsection

@section('scripts')
    <script>
        $(document).ready(function (){
            $('.alert').css('display' , 'none');
        });

     $(document).on('click','#add-post',function (event){
         event.preventDefault();
         let formData = new FormData($('#post_form_data')[0])
         $.ajax({
             type : 'POST',
             enctype : 'multipart/form-data',
             url : '{{route('ajax.store')}}',
             data : formData,
             processData : false,
             contentType : false,
             cache : false,
             success : function (data){
                 if (data){
                     console.log(data);
                     $('#success_msg').show();
                     $('#title').val('');
                     $('#category').val('');
                     $('#picture').val('');
                     $('#body').val('');
                 }

             },
             error : function (reject){
                // let response = $.parseJSON(reject.responseText);
                //  $(".alert").css("display", "block");
                //     $.each(response.errors , function (key,val){
                //         $('#' + key + "_error").text(val[0]);
                //             $('input').addClass('is-invalid');
                //             $('textarea').addClass('is-invalid');
                //         $('#success_msg').hide();
                //
                //     });

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
