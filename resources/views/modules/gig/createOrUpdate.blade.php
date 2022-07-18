@extends('layouts.admin.app')
@section('title', 'Gig Create')

    @section('admin_content')
    
    <section>
        <div class="row">
          
            
            <div class="col-md-4 col-lg-4 col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h3>Gig  {{ @$edit ? 'Update' : "Create" }}</h3>
                    </div>
                    <div class="card-body">
                        @if (@$edit)
                        <form action="@route('gig.update', @$edit->gig_id)" method="post" enctype="multipart/form-data">
                            @method('put')
                        @else
                        <form action="@route('gig.store')" method="post" enctype="multipart/form-data">
                            @method('post')
                        @endif
                            @csrf
                            <div class="form-gorup">
                                <label for="">Title</label>
                                <input type="text" class="form-control" placeholder="title" name="title" value="{{ @$edit->title }}">
                            </div>
                            <div class="form-gorup">
                                <label for="">Body</label>
                                <textarea placeholder="Body" name="body" class="form-control" id="" cols="10" rows="4">{{ @$edit->body }}</textarea>
                            </div>
                            <div class="text-center my-2">
                                <input type="submit" class="btn btn-sm btn-success" value="Submit" name="" id="">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-8 col-lg-8 col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h3>Gig Lists</h3>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                              <tr>
                                <th scope="col">Index</th>
                                <th scope="col">Name</th>
                                <th scope="col">Body</th>
                                <th scope="col">Action</th>
                              </tr>
                            </thead>
                            <tbody>
                                @foreach ($gigs as $item)
                                <tr>
                                    <th scope="row">{{ $loop->index + 1 }}</th>
                                    <td>{{ $item->title }}</td>
                                    <td>{{ $item->body }}</td>
                                    <td>
                                        @isset(auth()->user()->role->permission['permission']['gig']['edit'])
                                        <a class="btn btn-sm btn-success" href="@route('gig.edit', $item->gig_id)">Edit</a>
                                        @endisset
                                        @isset(auth()->user()->role->permission['permission']['gig']['edit'])
                                        <form action="@route('gig.destroy', $item->gig_id)" method="POST">
                                        @method('delete')
                                        @csrf
                                        <input type="submit" class="btn btn-sm btn-danger" value="Delete">
                                        </form>
                                        @endisset
                                    </td>
                                  </tr>
                                @endforeach
                           
                            </tbody>
                          </table>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @section('js')
    @endsection
@endsection