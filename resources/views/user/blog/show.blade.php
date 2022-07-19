@extends('layouts.user.app')
@section('user_content')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb container">
      <li class="breadcrumb-item "><a class="text-dark" href="{{ url('/') }}">Home</a></li>
      <li class="breadcrumb-item active" aria-current="page">Blog Page Details</li>
    </ol>
  </nav>

    <section class="container">
        <div class="row my-5">
            <div class="col-sm-12 col-md-8 col-lg-8">
                <div class="card my-2">
                    <div class="card-body">
                        @php
                        $image = json_decode($blog->image);
                        @endphp
                        @if (empty($image))
                        <td>Image Not Selected</td>
                        @else
                            <td><img class="zoom" src="{{ asset($image[0]) }}" height="250px" width="100%" alt=""> </td>
                        @endif
                        
                        <div>
                            <h3 class="my-3">{{ $blog->title }}</h3> <hr>
                            <p>
                                {!! $blog->body !!}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-4 col-lg-4">
                @foreach ($blogs as $item)
                <div class="card my-2">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4 col-lg-4 col-sm-6">
                                @php
                                $image = json_decode($item->image);
                                @endphp
                                @if (empty($image))
                                <td>Image Not Selected</td>
                                @else
                                    <img height="68px" width="100%" class="zoom" src="{{ asset($image[0]) }}" height="250px" width="100%" alt="">
                                @endif
                            </div>
                            <div class=" text-light col-md-8 col-lg-8 col-sm-6">
                                <a class="text-dark" href="@route('blog', $item->blog_id)">{{ $item->title }}</a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    @endsection