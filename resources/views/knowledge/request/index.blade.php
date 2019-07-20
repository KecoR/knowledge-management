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
                            <h4>Request List</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover" style="font-size:13px;">
                                    <thead>
                                        <tr>
                                            <td>No</td>
                                            @if (\Auth::user()->level == "ADMIN")
                                                <td>User</td>
                                            @endif
                                            <td>Nama Kategori</td>
                                            <td>Nama Fungsi</td>
                                            <td>Informasi</td>
                                            <td>Waktu Request</td>
                                            @if (\Auth::user()->level == "USER")
                                                <td>Waktu Diterima</td>
                                            @endif
                                            <td>Status</td>
                                            @if (\Auth::user()->level == "ADMIN")
                                                <td>Aksi</td>
                                            @endif
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if (\Auth::user()->level == "ADMIN")
                                            @foreach ($reqs as $req)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $req->user->full_name }}</td>
                                                    @if (!empty($req->knowledge_parent_id))
                                                        <td>{{ $req->kategori->knowledge_name }}</td>
                                                    @else
                                                        <td>{{ $req->knowledge_parent_name }}</td>
                                                    @endif
                                                    @if (!empty($req->knowledge_child_id))
                                                        <td>{{ $req->child->child_name }}</td>
                                                    @else
                                                        <td>{{ $req->knowledge_child_name }}</td>
                                                    @endif
                                                    <td>{{ $req->info_name }}</td>
                                                    <td>{{ $req->tgl_request }}</td>
                                                    @if ($req->status == "0")
                                                        <td><span class="alert alert-secondary">On-Process</span></td>
                                                    @else
                                                        @if ($req->status == "1")
                                                            <td><span class="alert alert-success">Diterima</span></td>
                                                        @else
                                                            <td><span class="alert alert-danger">Ditolak</span></td>
                                                        @endif
                                                    @endif
                                                    <td><a href="{{ route('knowledge.requestDetail',$req->id) }}" class="btn btn-sm btn-primary"><i class="fa fa-sm fa-edit text-white"> Detail</i></a></td>
                                                </tr>
                                            @endforeach
                                        @else
                                            @foreach ($reqs as $req)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    @if (!empty($req->knowledge_parent_id))
                                                        <td>{{ $req->kategori->knowledge_name }}</td>
                                                    @else
                                                        <td>{{ $req->knowledge_parent_name }}</td>
                                                    @endif
                                                    @if (!empty($req->knowledge_child_id))
                                                        <td>{{ $req->child->child_name }}</td>
                                                    @else
                                                        <td>{{ $req->knowledge_child_name }}</td>
                                                    @endif
                                                    <td>{{ $req->info_name }}</td>
                                                    <td>{{ $req->tgl_request }}</td>
                                                    <td>{{ $req->tgl_accept != NULL ? $req->tgl_accept : "Belum ada tanggal" }}</td>
                                                    @if ($req->status == "0")
                                                        <td><span class="alert alert-secondary">On-Process</span></td>
                                                    @else
                                                        @if ($req->status == "1")
                                                            <td><span class="alert alert-success">Diterima</span></td>
                                                        @else
                                                            <td><span class="alert alert-danger">Ditolak</span></td>
                                                        @endif
                                                    @endif
                                                </tr>
                                            @endforeach
                                        @endif
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

@section('js')
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
    <script>
        // $(document).ready(function(){
        // $("table").DataTable({
        //     "ordering" : false
        //     });
        // });
        $(document).ready(function(){
            $("table").DataTable();
        });
    </script>
@endsection

{{-- @section('css')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
@endsection --}}