@extends('layouts.user.app')
@section('user_content')

<section class="container" >
    <h2 class="text-center text-uppercase text-dark"><br> Our Blogs</h2><hr>
          <div class="row why-content">
              @foreach ($blogs as $blog)
              <div class="col-md-4 col-lg-4 col-sm-12 text-center">
                  <div class="container ">
                      @php
                      $image = json_decode($blog->image);
                      @endphp
                      @if (empty($image))
                      <td>Image Not Selected</td>
                      @else
                          <td><img class="zoom" src="{{ asset($image[0]) }}"  height="164px" alt=""> </td>
                      @endif
                      <br>
                      <a  href="@route('blog', $blog->blog_id)" class="h5 text-dark my-3">{{ $blog->title }}</a>
                  </div>
              </div>
              @endforeach
          </div>
  </section>
@endsection