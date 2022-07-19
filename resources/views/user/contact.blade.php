@extends('layouts.user.app')
@section('user_content')

<nav aria-label="breadcrumb">
    <ol class="breadcrumb container">
      <li class="breadcrumb-item "><a class="text-dark" href="#">Home</a></li>
      <li class="breadcrumb-item active" aria-current="page">Contact-us</li>
    </ol>
  </nav>


      <!--contact form start here-->
        <section class="container my-5">
            <h2 class="text-center my-5">Contact-Us</h2>
            <div class="row">
                <div class="col-sm-12 col-md-4 col-lg-4">
                    <div class="card">
                        <div class="card-body">
                            <form action="@route('contact.store')" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="">Enter Your Name:</label>
                                    <input type="text" class="form-control" name="name" placeholder="type here name" id="">
                                </div>

                                <div class="form-group">
                                    <label for="">Enter Your E-mail:</label>
                                    <input type="text" class="form-control" name="email" placeholder="type here email" id="">
                                </div>

                                <div class="form-group">
                                    <label for="">Enter Your Message:</label>
                                    <textarea name="body" id="" cols="10" rows="4" class="form-control" placeholder="type here message"></textarea>
                                </div>

                                <div class="form-gorup my-2">
                                    <input value="Submit" type="submit" name="" class="btn btn-success btn-outline-success" id="">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-8 col-lg-8">
                    <div class="mapouter"><div class="gmap_canvas"><iframe width="819" height="500" id="gmap_canvas" src="https://maps.google.com/maps?q=2880%20Broadway,%20New%20York&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe><a href="https://123movies-to.org"></a><br><style>.mapouter{position:relative;text-align:right;height:500px;width:819px;}</style><a href="https://www.embedgooglemap.net">embed responsive google map</a><style>.gmap_canvas {overflow:hidden;background:none!important;height:500px;width:819px;}</style></div></div>
                </div>
            </div>
        </section>
      <!--contact form end here-->
      @endsection