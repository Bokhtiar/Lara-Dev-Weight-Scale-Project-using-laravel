@extends('layouts.admin.app')
@section('title', 'Work List')

    @section('admin_content')
    
    <section>
        <div class="row">
            @foreach ($works as $item)
            @if (Auth::user()->role_id == 2)
            <div class="col-md-4 col-lg-4 col-sm-12">
                <div class="card" style="width: 18rem;">
                    <div class="card-body">
                    <p class="h6">Already Accept The Driver, <br>
                        Name is :  {{ $item->driver ? $item->driver->name : "" }}</p>
                        Email is :  {{ $item->driver ? $item->driver->email : "" }}</p> <br>

                        @if ($item->body == null)
                            <form action="{{ url('request/work/store', $item->request_work_id) }}" method="POST">
                            @csrf
                            <div class="">
                                <label for="">Select Seller</label>
                                <select name="seller_id" class="form-control" id="">
                                    <option value="">Select Seller</option>
                                    @foreach ($sellers as $seller)
                                    <option value="{{ $seller->id }}">{{ $seller->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div>
                                <label for="">Description</label>
                                <textarea class="form-control" name="body" id="" cols="10" rows="4"></textarea>
                            </div>
                            <div class="text-center my-2">
                                <input type="submit" name="" class="btn btn-sm btn-success" value="submit" id="">
                            </div>
                            </form>
                        @else
                        {{ $item->body }} <br>
                        @if ($item->user_status == 1)
                        <a href="{{ url('user/get', $item->request_work_id) }}" class="card-link">Already Recived</a>
                        @else 
                        <a href="{{ url('user/get', $item->request_work_id) }}" class="card-link">Waiting For Recived</a>
                        @endif
                        @endif
                    </div>
                </div>
            </div>
            @elseif(Auth::user()->role_id == 3)
            <div class="col-md-4 col-lg-4 col-sm-12">
                <div class="card" style="width: 18rem;">
                    <div class="card-body">
                    <p class="h3">  Request to you from 
                        <a href="#" class="card-link">{{ $item->user ? $item->user->name : "" }}</a></p><br>

                        <>
                            <h3>Seller Information</h3>
                            <a href="#" class="card-link">Name : {{ $item->seller ? $item->seller->name : "" }}</a>
                            <a href="#" class="card-link">Email: {{ $item->seller ? $item->seller->email : "" }}</a><br>
                        </p>
                     
                      <p class="h5">
                        @if($item->body == null)
                        <p>Waiting for More Details Information</p>
                        @else
                        {{ $item->body }}
                        @endif
                      </p>

                      @if ($item->driver_status == 0)
                      <a href="{{ url('driver/accept', $item->request_work_id) }}" class="card-link">No-Accept</a>
                      @else 
                      <a href="{{ url('driver/accept', $item->request_work_id) }}" class="card-link">Accept</a>
                      @endif

                     
                    </div>
                </div>
            </div>
            @elseif(Auth::user()->role_id == 4)
            <div class="col-md-12 col-lg-12 col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Information</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                <h6>User Info</h6><hr>
                                <span> <strong>Name:</strong>{{ $item->user ? $item->user->name : "" }} </span><br>
                                <span> <strong>Email:</strong>{{ $item->user ? $item->user->email : "" }} </span><br>
                            </div>
                            <div class="col-md-4">
                                <h6>Driver Info</h6><hr>
                                <span> <strong>Name:</strong>{{ $item->driver_id ? $item->driver->name : "" }} </span><br>
                                <span> <strong>Email:</strong>{{ $item->driver_id ? $item->driver->email : "" }} </span><br>
                            </div>
                            <div class="col-md-4">
                                <h6>Description:</h6> <hr>
                                <span><strong>Des:</strong>{{ $item->body }}</span>
                            </div>
                        </div>
                        @if ($item->seller_status == 0)
                        <a class="btn btn-sm btn-danger" href="{{ url('seller/status', $item->request_work_id) }}">Pending</a>
                        @else
                        <a class="btn btn-sm btn-success" href="">Deleverd</a>
                        @endif
                       
                    </div>
                </div>
            </div>
            @endif
            @endforeach
            
        </div>
    </section>

    @section('js')
    @endsection
@endsection