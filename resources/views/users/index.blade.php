@extends('knowledge.index')

@section('knowledgeContent')
    <section class="section">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="card card-statistic-1">
                    <!-- <div class="card-icon bg-primary">
                        <i class="far fa-user"></i>
                    </div> -->
                    <div class="card-wrap">
                        @if(session('fail'))
                            <div class="alert alert-danger">
                                {{session('fail')}}
                            </div>
                        @endif
                        @if(session('status'))
                            <div class="alert alert-success">
                                {{session('status')}}
                            </div>
                        @endif
                        <div class="card-header">
                            <h4>Manage User</h4>
                        </div>
                        <a href="#" class="ml-auto d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm float-right m-3" data-toggle="modal" data-target="#addModal">
                            <i class="fas fa-plus fa-sm text-white-50"></i> Tambah User Baru
                        </a>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover" style="font-size:13px;">
                                    <thead>
                                        <tr>
                                            <td>No</td>
                                            <td>Nama Lengkap</td>
                                            <td>Username</td>
                                            <td>Role</td>
                                            <td>Aksi</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($users as $user)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $user->full_name }}</td>
                                                <td>{{ $user->username }}</td>
                                                <td>{{ $user->level }}</td>
                                                <td>
                                                    <a href="#" data-id="{{ $user->id }}" class="btn btn-sm btn-primary editbutton">Edit</a>
                                                    @if (\Auth::user()->id == $user->id)
                                                        <a onclick="return confirm('Hapus User ini? Menghapus user akan menghapus semua yang terkait dengan user ini.')" href="{{ route('users.deleteUser', $user->id) }}" class="btn btn-sm btn-danger disabled">Hapus</a>
                                                    @else
                                                        <a onclick="return confirm('Hapus User ini? Menghapus user akan menghapus semua yang terkait dengan user ini.')" href="{{ route('users.deleteUser', $user->id) }}" class="btn btn-sm btn-danger">Hapus</a>
                                                    @endif
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('modal')
    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <form method="POST" action="{{ route('users.editUser') }}">
                    <input type="hidden" value="" id="knowledge_id" name="knowledge_id">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Perubahan Data</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        @csrf
                        <input type="hidden" name="username_old" id="username_old">
                        <input type="hidden" name="password_old" id="password_old">
                        <input type="hidden" name="user_id" id="user_id">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="full_name">Nama Lengkap</label>
                                    <input type="text" name="full_name" id="full_name" class="form-control"/>
                                </div>
                                <div class="form-group">
                                    <label for="username">Username</label>
                                    <input type="text" name="username" id="username" class="form-control"/>
                                </div>
                                <div class="form-group">
                                    <label for="password">New Password</label>
                                    <input type="password" name="password" id="password" class="form-control"/>
                                    <span style="font-size:10px;">Kosongkan jika tidak ingin mengganti password</span>
                                </div>
                                <div class="form-group">
                                    <label for="role">Role</label>
                                    <select name="role" id="role" class="form-control">
                                        <option value="ADMIN">ADMIN</option>
                                        <option value="USER">USER</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Simpan Data</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <form method="POST" action="{{ route('users.store') }}">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Penambahan Data</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="full_name">Nama Lengkap</label>
                                    <input type="text" name="full_name" id="full_name" class="form-control"/>
                                </div>
                                <div class="form-group">
                                    <label for="username">Username</label>
                                    <input type="text" name="username" id="username" class="form-control"/>
                                </div>
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input type="password" name="password" id="password" class="form-control"/>
                                </div>
                                <div class="form-group">
                                    <label for="role">Role</label>
                                    <select name="role" id="role" class="form-control">
                                        <option value="ADMIN">ADMIN</option>
                                        <option value="USER">USER</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Simpan Data</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
    <script>
        $(document).ready(function(){
            $("table").DataTable();
        });
        $(document).on("click",".editbutton",function(){
            let data_id = $(this).attr('data-id');
            $.get('/users/'+data_id, function(data){
                $("#user_id").val(data.id);
                $("#username_old, #username").val(data.username);
                $("#password_old").val(data.password);
                $("#full_name").val(data.full_name);
                $("#role").val(data.level);
                $("#editModal").modal('show');
            })
        });
    </script>
@endsection

{{-- @section('css')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
@endsection --}}