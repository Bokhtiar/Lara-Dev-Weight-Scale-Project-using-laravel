@extends('layouts.admin.app')
@section('title', 'Driver')

    @section('admin_content')
    <x-notification></x-notification>
    <section>
        <div class="row">
            @foreach ($drivers as $item)
            <div class="col-md-4 col-lg-4 col-sm-12">
                <div class="card" style="width: 18rem;">
                    <div class="card-body">
                      <h5 class="card-title">{{ $item->name }}</h5>
                      <p class="card-text">{{ $item->email }}.</p>
                      <a href="#" class="card-link">Phone: 0129121212</a> <br>
                      <a class="btn btn-sm btn-success" href="@route('request', $item->id)" >Reuest</a>
                    </div>
                </div>
            </div>
            @endforeach
            
        </div>
    </section>

    @section('js')
    @endsection
@endsection