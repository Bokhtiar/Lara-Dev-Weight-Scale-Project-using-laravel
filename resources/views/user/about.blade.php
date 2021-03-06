@extends('layouts.user.app')
@section('user_content')

<nav aria-label="breadcrumb">
    <ol class="breadcrumb container">
      <li class="breadcrumb-item "><a class="text-dark" href="#">Home</a></li>
      <li class="breadcrumb-item active" aria-current="page">About</li>
    </ol>
  </nav>

      <!--about us start here-->
        <div class="row justify-content-center ">

            <div class="col-md-10">
                <h2 class="text-center my-5">About Us</h2>
                <div class="row">
                    <div class="col-md-4 col-lg-4 col-sm-12 my-3 text-center">
                        <img height="150px" src="{{ asset('user') }}/public//icon//truck.gif" alt="">
                    </div>
                    <div class="col-md-8 col-lg-8 col-sm-12">
                        <p class="lead">
                             This Project Name is Weight Scale, There are three role name is Admin, User, Sellers, Driver, User can hire Driver User can request driver then when driver
                            accept the request then user can seller information send him , then when driver get the product and update this website user can see the details infomation, and seller
                            can see the details how many product get him and details information and admin can each and everything controll the website

                            [Nb : user find truck and send him details information seller then select select_seller productDetails information input then user can see the details information when truck
                            delevery complete then status change ]

                            </p>
                    </div>
                </div>
            </div>
        </div>
      <!--about us end here-->


      <!--contact form start here-->
        <section class="container my-5">
            <h2 class="text-center my-5">Contact-Us</h2>
            <div class="row">
                <div class="col-sm-12 col-md-4 col-lg-4">
                    <div class="card">
                        <div class="card-body">
                            <form action="">
                                <div class="form-group">
                                    <label for="">Enter Your Name:</label>
                                    <input type="text" class="form-control" name="" placeholder="type here name" id="">
                                </div>

                                <div class="form-group">
                                    <label for="">Enter Your E-mail:</label>
                                    <input type="text" class="form-control" name="" placeholder="type here email" id="">
                                </div>

                                <div class="form-group">
                                    <label for="">Enter Your Message:</label>
                                    <textarea name="" id="" cols="10" rows="4" class="form-control" placeholder="type here message"></textarea>
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