@extends('layouts.admin.app')

    @section('title', 'Dashboard')

    @section('admin_content')
    <div class="container">
        <form action="@route('admin.permission.update',$permission->id)" method="POST">
            @method('put')
            @csrf

            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <select name="role_id" class="form-control">
                            <option value="">Please select a role</option>
                            @foreach(\App\Models\Role::all() as $role)
                                <option value="{{$role->id}}"
                                        @if($role->id===$permission->role_id) selected @endif>{{$role->name}}</option>
                            @endforeach
                        </select>
                        @error('role_id')
                        <span class="text-danger">
                              {{$message}}
                          </span>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
                <div class="col-md-8">
                    <table class="responsive-table-input-matrix">
                        <thead>
                        <tr>
                            <th>Permission</th>
                            <th>Add</th>
                            <th>Edit</th>
                            <th>View</th>
                            <th>Delete</th>
                            <th>List</th>
                        </tr>
                        </thead>
                        <tbody>

                        <tr>
                            <td>Roles</td>
                            <td>
                                <input type="checkbox" name="permission[role][add]"
                                       @isset($permission['permission']['role']['add']) checked @endisset
                                       value="1">
                            </td>
                            <td>
                                <input type="checkbox" name="permission[role][edit]"
                                       @isset($permission['permission']['role']['edit']) checked @endisset
                                       value="1">
                            </td>
                            <td>
                                <input type="checkbox" name="permission[role][view]"
                                       @isset($permission['permission']['role']['view']) checked @endisset
                                       value="1">

                            </td>
                            <td>
                                <input type="checkbox" name="permission[role][delete]"
                                       @isset($permission['permission']['role']['delete']) checked @endisset
                                       value="1" >
                            </td>
                            <td>
                                <input type="checkbox" name="permission[role][list]"
                                       @isset($permission['permission']['role']['list']) checked @endisset
                                       value="1">
                            </td>

                        </tr>
                        <tr>
                            <td>Permissions</td>
                            <td>
                                <input type="checkbox" name="permission[permission][add]"
                                       @isset($permission['permission']['permission']['add']) checked @endisset
                                       value="1">
                            </td>
                            <td>
                                <input type="checkbox" name="permission[permission][edit]" value="1"
                                       @isset($permission['permission']['permission']['edit']) checked @endisset
                                >
                            </td>
                            <td>
                                <input type="checkbox" name="permission[permission][view]" value="1"
                                       @isset($permission['permission']['permission']['view']) checked @endisset
                                ></td>
                            <td>
                                <input type="checkbox" name="permission[permission][delete]"
                                       @isset($permission['permission']['permission']['delete']) checked @endisset
                                       value="1">
                            </td>
                            <td>
                                <input type="checkbox" name="permission[permission][list]"
                                       @isset($permission['permission']['permission']['list']) checked @endisset
                                       value="1">
                            </td>
                        </tr>
                        <tr>
                            <td>Users</td>
                            <td>
                                <input type="checkbox" name="permission[user][add]"
                                       @isset($permission['permission']['user']['add']) checked @endisset
                                       value="1">
                            </td>
                            <td>
                                <input type="checkbox" name="permission[user][edit]"
                                       @isset($permission['permission']['user']['edit']) checked @endisset
                                       value="1">
                            </td>
                            <td>
                                <input type="checkbox" name="permission[user][view]"
                                       @isset($permission['permission']['user']['view']) checked @endisset
                                       value="1">
                            </td>
                            <td>
                                <input type="checkbox" name="permission[user][delete]"
                                       @isset($permission['permission']['user']['delete']) checked @endisset
                                       value="1">
                            </td>
                            <td>
                                <input type="checkbox" name="permission[user][list]"
                                       @isset($permission['permission']['user']['list']) checked @endisset
                                       value="1">
                            </td>
                        </tr>


                        <tr>
                            <td>Category</td>
                            <td>
                                <input type="checkbox" name="permission[category][add]"
                                       @isset($permission['permission']['category']['add']) checked @endisset
                                       value="1">
                            </td>
                            <td>
                                <input type="checkbox" name="permission[category][edit]"
                                       @isset($permission['permission']['category']['edit']) checked @endisset
                                       value="1">
                            </td>
                            <td>
                                <input type="checkbox" name="permission[category][view]"
                                       @isset($permission['permission']['category']['view']) checked @endisset
                                       value="1">
                            </td>
                            <td>
                                <input type="checkbox" name="permission[category][delete]"
                                       @isset($permission['permission']['category']['delete']) checked @endisset
                                       value="1">
                            </td>
                            <td>
                                <input type="checkbox" name="permission[category][list]"
                                       @isset($permission['permission']['category']['list']) checked @endisset
                                       value="1">
                            </td>
                        </tr>

                        <!-- category end -->
                        <tr>
                            <td>Seller Gig</td>
                            <td>
                                <input type="checkbox" name="permission[gig][add]"
                                       @isset($permission['permission']['gig']['add']) checked @endisset
                                       value="1">
                            </td>
                            <td>
                                <input type="checkbox" name="permission[gig][edit]"
                                       @isset($permission['permission']['gig']['edit']) checked @endisset
                                       value="1">
                            </td>
                            <td>
                                <input type="checkbox" name="permission[gig][view]"
                                       @isset($permission['permission']['gig']['view']) checked @endisset
                                       value="1">
                            </td>
                            <td>
                                <input type="checkbox" name="permission[gig][delete]"
                                       @isset($permission['permission']['gig']['delete']) checked @endisset
                                       value="1">
                            </td>
                            <td>
                                <input type="checkbox" name="permission[gig][list]"
                                       @isset($permission['permission']['gig']['list']) checked @endisset
                                       value="1">
                            </td>
                        </tr>
                        <!-- gig end -->

                        <!-- driver end -->
                        <tr>
                            <td>Driver</td>
                            <td>
                                <input type="checkbox" name="permission[driver][add]"
                                       @isset($permission['permission']['driver']['add']) checked @endisset
                                       value="1">
                            </td>
                            <td>
                                <input type="checkbox" name="permission[driver][edit]"
                                       @isset($permission['permission']['driver']['edit']) checked @endisset
                                       value="1">
                            </td>
                            <td>
                                <input type="checkbox" name="permission[driver][view]"
                                       @isset($permission['permission']['driver']['view']) checked @endisset
                                       value="1">
                            </td>
                            <td>
                                <input type="checkbox" name="permission[driver][delete]"
                                       @isset($permission['permission']['driver']['delete']) checked @endisset
                                       value="1">
                            </td>
                            <td>
                                <input type="checkbox" name="permission[driver][list]"
                                       @isset($permission['permission']['driver']['list']) checked @endisset
                                       value="1">
                            </td>
                        </tr>
                        <!-- driver end -->


                        <!-- service end -->
                        <tr>
                            <td>Service</td>
                            <td>
                                <input type="checkbox" name="permission[service][add]"
                                       @isset($permission['permission']['service']['add']) checked @endisset
                                       value="1">
                            </td>
                            <td>
                                <input type="checkbox" name="permission[service][edit]"
                                       @isset($permission['permission']['service']['edit']) checked @endisset
                                       value="1">
                            </td>
                            <td>
                                <input type="checkbox" name="permission[service][view]"
                                       @isset($permission['permission']['service']['view']) checked @endisset
                                       value="1">
                            </td>
                            <td>
                                <input type="checkbox" name="permission[service][delete]"
                                       @isset($permission['permission']['service']['delete']) checked @endisset
                                       value="1">
                            </td>
                            <td>
                                <input type="checkbox" name="permission[service][list]"
                                       @isset($permission['permission']['service']['list']) checked @endisset
                                       value="1">
                            </td>
                        </tr>
                        <!-- service end -->


                        <!-- blog end -->
                        <tr>
                            <td>Blog</td>
                            <td>
                                <input type="checkbox" name="permission[blog][add]"
                                       @isset($permission['permission']['blog']['add']) checked @endisset
                                       value="1">
                            </td>
                            <td>
                                <input type="checkbox" name="permission[blog][edit]"
                                       @isset($permission['permission']['blog']['edit']) checked @endisset
                                       value="1">
                            </td>
                            <td>
                                <input type="checkbox" name="permission[blog][view]"
                                       @isset($permission['permission']['blog']['view']) checked @endisset
                                       value="1">
                            </td>
                            <td>
                                <input type="checkbox" name="permission[blog][delete]"
                                       @isset($permission['permission']['blog']['delete']) checked @endisset
                                       value="1">
                            </td>
                            <td>
                                <input type="checkbox" name="permission[blog][list]"
                                       @isset($permission['permission']['blog']['list']) checked @endisset
                                       value="1">
                            </td>
                        </tr>
                        <!-- blog end -->


                        <!-- blog end -->
                        <tr>
                            <td>contact</td>
                            <td>
                                <input type="checkbox" name="permission[contact][add]"
                                       @isset($permission['permission']['contact']['add']) checked @endisset
                                       value="1">
                            </td>
                            <td>
                                <input type="checkbox" name="permission[contact][edit]"
                                       @isset($permission['permission']['contact']['edit']) checked @endisset
                                       value="1">
                            </td>
                            <td>
                                <input type="checkbox" name="permission[contact][view]"
                                       @isset($permission['permission']['contact']['view']) checked @endisset
                                       value="1">
                            </td>
                            <td>
                                <input type="checkbox" name="permission[contact][delete]"
                                       @isset($permission['permission']['contact']['delete']) checked @endisset
                                       value="1">
                            </td>
                            <td>
                                <input type="checkbox" name="permission[contact][list]"
                                       @isset($permission['permission']['contact']['list']) checked @endisset
                                       value="1">
                            </td>
                        </tr>
                        <!-- blog end -->

                       


                        </tbody>
                    </table>
                </div>
            </div>
        </form>
    </div>
    @endsection

    @section('js')
    @endsection
