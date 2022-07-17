@extends('layouts.admin.app')

@section('admin_content')




@section('title', 'Role List')

@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
<section class="container card">
    <div class="card-header">
        <h3 class="card-title"> <i class="fas fa-list"></i> LIST OF ROLE</h3>
    </div>
    <div class="row">
        <div class="col-sm-12 col-lg-3 col-md-3">
            <div class="card">
                <div class="card-header">
                    <h5><i class="text-secondary fas fa-box"></i> {{ @$edit ? 'UPDATE ROLE' : 'CREATE NEW ROLE' }} </h5>
                </div>
                <div class="card-body">
                    @if (isset($edit))
                    <form action="@route('admin.role.update',$edit->id)" class="form.group" method="POST">
                        @method('put')
                    @else
                    <form action="@route('admin.role.store')" class="form.group" method="POST">
                    @endif
                        @csrf
                        <div class="mb-3">
                            <label for="brand-name" class="col-form-label">Role Name: <span
                                    class="text-danger">*</span></label>
                            <input type="text" name="name" placeholder=" type here name"
                                class="form-control" value="{{ @$edit->name }}" maxlength="30" minlength="2" id="" required>
                        </div>
                        <div class="mb-2">
                            @if (isset($edit))
                                <input class="btn btn-primary" type="submit" name="" value="Update Role" id="">
                            @else
                                <input class="btn btn-primary" type="submit" name="" value="Add New Role" id="">
                            @endif
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-sm-12 col-lg-9 col-md-9">
        <div class="card-body">
        <table id="example" class="table table-striped table-bordered" style="width:100%">
            <thead>
                <tr>
                    <th>Action</th>
                    <th>Name </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($roles as $item)
                <tr>
                    <td>
                        <a class=" btn btn-sm btn-success" href="@route('admin.role.edit', $item->id)">Edit</a>
                        <form action="@route('admin.role.destroy',$item->id)" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class=" btn btn-sm btn-danger">Delete</button>
                        </form>
                    </td>
                    <td>{!! $item->name !!}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
        </div>
    </div>
</section>





@endsection