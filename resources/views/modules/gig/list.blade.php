@extends('layouts.admin.app')
@section('title', 'Gig Create')

    @section('admin_content')
    
    <section>
        <div class="row">
            @foreach ($gigs as $item)
            <div class="col-md-4 col-lg-4 col-sm-12">
                <div class="card" style="width: 18rem;">
                    <div class="card-body">
                      <h5 class="card-title">{{ $item->title }}</h5>
                      <p class="card-text">{{ $item->body }}.</p>
                      <a href="#" class="card-link">{{ $item->user ? $item->user->name : "" }}</a>
                      <a href="#" class="card-link">{{ $item->user ? $item->user->email : "" }}</a>
                      <a class="card-link" href="@route('driver')" class="card-link">Driver</a>
                    </div>
                </div>
            </div>
            @endforeach
            
        </div>
    </section>

    @section('js')
    @endsection
@endsection