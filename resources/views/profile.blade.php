@extends('layouts.user.app')
@section('user_content')

<section class="container my-5" >
    <h2 class="text-center text-uppercase text-dark"><br> Profile</h2><hr>
         <div class="row justify-content-center">
             <div class="col-md-6">
                 <div class="card">
                     <div class="card-header">{{ $user->name }}</div>
                 </div>
                 <div class="card-body">
                     <p>{{ $user->email }}</p>
                 </div>
                 <div class="card-footer">
                     <a class="btn btn-success form-control" href="@route('logout')">Logout</a>
                 </div>
             </div>
         </div>
  </section>
@endsection