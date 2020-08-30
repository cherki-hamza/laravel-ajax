@extends('frontend.master.app')

@section('title' , 'All Posts')

@section('content')
 <div class="container my-5">
     <div class="card shadow my-3">
         <h2 class="card-title text-primary text-center">Course</h2>
         <div class="card-body shadow my-2">
              {{$collection}}
             <hr style="border: solid 2px #1d68a7">
             {{$coll}}
         </div>
     </div>
 </div>
@endsection

        @section('scripts')
            <script>

            </script>
@endsection
