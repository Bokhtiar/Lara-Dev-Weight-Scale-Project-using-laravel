@extends('layouts.admin.app')
@section('title', 'List Of blog')
@section('css')
    <style>
        .zoom:hover {
            transform: scale(2.5);
        }
    </style>
@endsection

@section('admin_content')

    <div class="pagetitle">
        <h1>blog Tables</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item">Tables</li>
                <li class="breadcrumb-item active">blog Table</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-header">
                        <x-notification></x-notification>
                        @if (session('error'))
                            <div class="alert alert-danger">{{ session('error') }}</div>
                        @endif
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">blog Table</h5>

                        <!-- Table with stripped rows -->
                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th scope="col">SL</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Image</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($blogs as $item)
                                    <tr>
                                        <th scope="row">{{ $loop->index + 1 }}</th>
                                        <td>{{ $item->title }}</td>
                                        @php
                                            $image = json_decode($item->image);
                                            
                                        @endphp
                                        @if (empty($image))
                                            <td>Image Not Selected</td>
                                        @else
                                            <td><img class="zoom" src="{{ asset($image[0]) }}" height="50px"
                                                    width="50px" alt=""> </td>
                                        @endif

                                       
                                        <td class="form-inline">
                                            <a class="btn btn-sm btn-info text-light" href="@route('admin.blog.show', $item->blog_id)"> <i
                                                    class="ri-eye-fill"></i></a>
                                            <a class="btn btn-sm btn-primary" href="@route('admin.blog.edit', $item->blog_id)"> <i
                                                    class="ri-edit-box-fill"></i></a>
                                            <form method="POST" action="@route('admin.blog.destroy',$item->blog_id)" class="mt-1">
                                                @csrf
                                                @method('Delete')
                                                <button class="btn btn-sm btn-danger" type="submit"> <i
                                                    class="ri-delete-bin-6-fill"></i></button>
                                            </form>


                                        </td>
                                    </tr>
                                @empty
                                    <h2 class="bg-danger text-light text-center">blog Is empty</h2>
                                @endforelse
                            </tbody>
                        </table>
                        <!-- End Table with stripped rows -->

                    </div>
                </div>

            </div>
        </div>
    </section>

    @section('js')
    @endsection

@endsection