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
                    <p>Already Accept The Driver, <br>
                        Name is :  {{ $item->driver ? $item->driver->name : "" }}</p> <br>

                        @if ($item->body == null)
                            <form action="{{ url('request/work/store', $item->request_work_id) }}" method="POST">
                            @csrf
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
            <div class="col-md-4 col-lg-4 col-sm-12">
                <div class="card" style="width: 18rem;">
                    <div class="card-body">
                      <h5 class="card-title">{{ $item->title }}</h5>
                      <p class="card-text">{{ $item->body }}.</p>
                      <a href="#" class="card-link">{{ $item->user ? $item->user->name : "" }}</a>
                      <a href="#" class="card-link">{{ $item->user ? $item->user->email : "" }}</a>
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