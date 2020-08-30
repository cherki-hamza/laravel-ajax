@extends('frontend.master.app')

@section('title' , 'All Posts')

@section('styles')
    <style>

    </style>
@endsection

@section('content')
    <div class="container my-5">
        <div class="row my-5">
            <span class="float-right"><a class="btn btn-primary btn-add" data-toggle="modal" data-target="#add-new-post" onclick="return (event)" href=""><i class="fal fa-plus-circle mr-2 text-success"></i>Add New Contact</a></span>
        </div>
        <div class="card shadow my-2 mx-2">
            <h1 class="card-title shadow text-success">All Posts</h1>
            <ul  id="success" class="list-unstyled my-2"></ul>
            <div class="card-body shadow my-2 mx-2">
                <table id="contact-table" class="table table-bordered table-hover my-2">
                    <thead>
                    <tr class="table-info">
                        <th>#ID</th>
                        <th>Contact Name</th>
                        <th>Contact Picture</th>
                        <th>Contact Email</th>
                        <th>Contact Phone</th>
                        <th>Contact Created_At</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        All Posts
                    </tr>
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
                    <h5 class="modal-title text-center text-primary" id="staticBackdropLabel"> Add New Contact </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <ul  id="errors" class="list-unstyled my-2"></ul>
                    <form id="addContact">

                        <div class="form-group">
                            <div class="row p-4">
                                <label for="name" class="text-danger">Contact Name</label>
                                <input type="text" name="name" class="form-control" id="name">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row p-4">
                                <label for="picture" class="text-danger">Contact Picture</label>
                                <input type="text" name="picture" class="form-control" id="picture">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row p-4">
                                <label for="email" class="text-danger">Contact Email</label>
                                <input type="email" name="email" class="form-control" id="email">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row p-4">
                                <label for="phone" class="text-danger">Contact Telphone</label>
                                <input type="tel" name="phone" class="form-control" id="phone">
                            </div>
                        </div>

                        <div class="form-group">
                            <input type="submit" name="submit" class="btn btn-primary" value="Add Contact">
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
