@extends('layouts.admin.app')
@section('admin_content')

    <section>
        <div class="card">
            <div class="card-header">
                <h4>Blog {{ @$edit? 'Update' : "Create" }}</h4>
            </div>
            <div class="card-body">
                @if(@$edit)
                <form action="@route('admin.blog.update', @$edit->blog_id)" enctype="multipart/form-data" method="POST">
                @method('put')
                @else 
                <form action="@route('admin.blog.store')" enctype="multipart/form-data" method="POST">
                @endif
                @csrf

                <div class="row">
                    <div class="col-md-12">
                        <label for="">Title</label>
                        <input type="text" name="title" class="form-control" placeholder="Title" value="{{ @$edit->title }}">
                    </div>

                    <div class="col-md-12 col-lg-12 my-2">
                        <label for="" class="form-label">Blog Image<span class="text-danger">*</span></label>
                        <input  type="file" name="image[]" multiple class="form-control">
                        @if (@$edit->image)
                            @php
                                $image = json_decode($edit->image);
                            @endphp
                            @if (empty($image))
                                <td>Image Not Selected</td>
                            @else
                                <td>
                                    <div class="">
                                        <span>Already Selected Image: </span>
                                        <img class="zoom" src="{{ asset($image[0]) }}" height="50px" width="50px"
                                            alt="">
                                    </div>
                                </td>
                            @endif
                        @endif
                    </div>
                    <div class="col-md-12 col-lg-12">
                        <label for="">Blog Body <span class="text-danger">*</span></label>
                        <textarea name="body" class="tinymce-editor">
                           {!! @$edit->body !!}
                          </textarea><!-- End TinyMCE Editor -->
                    </div>

                    <div class="my-3 form-gorup">
                        <input type="submit" class="btn btn-sm btn-success" value="Submit" name="" id="">
                    </div>
                </div>
            </form>
            </div>
        </div>
    </section>

@endsection