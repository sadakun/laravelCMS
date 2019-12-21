@extends('layouts.admin')
@section('content-header')
@if (Session::has('deleted_user'))
{{session('deleted_user')}}

@endif
<!-- /.container-fluid -->
<div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1>Show All Users</h1>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">User Panel</a></li>
                <li class="breadcrumb-item active">Show All User</li>
            </ol>
        </div>
    </div>
</div>
<!-- /.container-fluid -->
@endsection
@section('content')
<!-- Default box -->
<!-- /.row -->
<div class="container-fluid">
    <div class="row mb-2">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">USERS TABLE</h3>

                    <div class="card-tools">
                        <div class="input-group input-group-sm" style="width: 150px;">
                            <input type="text" name="table_search" class="form-control float-right"
                                placeholder="Search">

                            <div class="input-group-append">
                                <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover">
                        {{-- @if (count($users) < 0) --}}
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Photo</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Status</th>
                                <th>Created</th>
                                <th>Updated</th>
                                <th>More</th>
                            </tr>
                        </thead>
                        <tbody>
                            {{-- @if($users) --}}
                            @foreach($users as $user)
                            <tr>
                                <td> {{$user->id}} </td>
                                <td><img height="50"
                                        src="{{$user->photo ? $user->photo->file : asset('/images/img/default-profile.png')}}"
                                        alt="User profile picture">
                                </td>
                                <td> {{$user->name}} </td>
                                <td> {{$user->email}} </td>
                                <td> {{ucfirst($user->role ? $user->role->name : 'User ha no role')}} </td>
                                <td> {{$user->status == 1 ? 'Active' : 'Nonactive'}} </td>
                                <td> {{$user->created_at->toCookieString()}} </td>
                                <td> {{$user->updated_at->diffForHumans()}} </td>
                                <td>
                                    <a href="{{route('users.edit', $user->id)}}">
                                        <button type="submit" class="btn btn-block btn-sm btn-outline-primary" data-toggle="tooltip" title="Edit more?">
                                            <i class='fas fa-tools fa-2x text-default'></i>
                                        </button>
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                            {{-- @else
                            <h1 class="text-center">NO USERS</h1>
                            @endif --}}
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </div>
</div>
<!-- /.row -->
@endsection

@section('scripts')
<script>
    $(document).ready(function(){
      $('[data-toggle="tooltip"]').tooltip();
    });
</script>

@endsection
