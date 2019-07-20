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
                            <h4>Manage Knowledge</h4>
                        </div>
                        <a href="{{ route('knowledge.add') }}" class="ml-auto d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm float-right m-3">
                            <i class="fas fa-plus fa-sm text-white-50"></i> Tambah Knowledge Baru
                        </a>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover" style="font-size:13px;">
                                    <thead>
                                        <tr>
                                            <td>No</td>
                                            <td>Nama Kategori</td>
                                            <td>Aksi</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($knowledges as $knowledge)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $knowledge->knowledge_name }}</td>
                                                <td>
                                                    <a href="{{ route('knowledge.detail', $knowledge->id) }}" class="btn btn-sm btn-primary">Detail</a>
                                                    <a href="#" data-id="{{ $knowledge->id }}" class="btn btn-sm btn-secondary editbutton">Edit</a>
                                                    <a onclick="return confirm('Hapus Knowledge ini? Menghapus knowledge akan menghapus semua yang terkait dengan knowledge ini.')" href="{{ route('knowledge.deleteCat', $knowledge->id) }}" class="btn btn-sm btn-danger">Hapus</a>
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
                <form method="POST" action="{{ route('knowledge.knowledgeSave') }}">
                    <input type="hidden" value="" id="knowledge_id" name="knowledge_id">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Perubahan Data</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                 <div class="form-group">
                                    <label for="nama_kategori">Nama Kategori</label>
                                    <input type="text" name="kategori" id="kategori" class="form-control"/>
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
            $.get('/knowledge/getKnowledge/'+data_id, function(data){
                $("#knowledge_id").val(data.id);
                $("#kategori").val(data.knowledge_name);
                $("#editModal").modal('show');
            })
        });
    </script>
@endsection

{{-- @section('css')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
@endsection --}}