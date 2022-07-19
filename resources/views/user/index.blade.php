@extends('layouts.user.app')
@section('user_content')
    <!--slider start here-->
    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img src="{{ asset('user') }}/public/slider/s1.jpg" class="d-block w-100" alt="...">
          </div>
          <div class="carousel-item">
            <img src="{{ asset('user') }}/public/slider/s2.jpg" class="d-block w-100" alt="...">
          </div>
          <div class="carousel-item">
            <img src="{{ asset('user') }}/public/slider/s3.jpg" class="d-block w-100" alt="...">
          </div>
        </div>
       <button class="carousel-control-prev" type="button" data-target="#carouselExampleControls" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-target="#carouselExampleControls" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </button>
    </div>
    <!--slider end here-->

    <!--why Weight Scale start-->
    <section class="why-bg" >
            <h2 class="text-center text-uppercase h-color"><br> Why Weight Scale</h2>
        <div class="row justify-content-center my-5">
            <div class="col-md-7 my-5">
                <div class="row why-content">
                    <div class="col-md-4 text-center">
                        <div class="container text-light">
                            <img height="80px"  src="{{ asset('user') }}/public/icon/hours.png" alt="">
                            <p class="h4 my-4">24 / 7 Service</p>
                        </div>
                    </div>
                    <div class="col-md-4 text-center">
                        <div class="container text-light">
                            <img height="80px" src="{{ asset('user') }}/public/icon/progress.png" alt="">
                            <p class="h4 my-4">Work Progress</p>
                        </div>
                    </div>
                    <div class="col-md-4 text-center">
                        <div class="container text-light">
                            <img height="80px" src="{{ asset('user') }}/public/icon/trac.png" alt="">
                            <p class="h4 my-4">Work Track</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--why Weight Scale end-->

    <!--services start -->
    <section class="" >
      <h2 class="text-center text-uppercase text-dark"><br> Our Services</h2>
      <div class="row justify-content-center my-5">
        <div class="col-md-7 my-5">
            <div class="row why-content">
                @foreach ($servies as $ser)
                <div class="col-md-4 text-center">
                    <div class="container ">
                        @php
                        $image = json_decode($ser->image);
                        @endphp
                        @if (empty($image))
                        <td>Image Not Selected</td>
                        @else
                            <td><img class="zoom" src="{{ asset($image[0]) }}" height="80px" alt=""> </td>
                        @endif
                        
                        <p class="h5 text-dark">{{ $ser->name }}</p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
      </div>
    </section>
    <!--service end here-->

    <!--bloog section start-->
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
    <!--end blog section-->
    @endsection