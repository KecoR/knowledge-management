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
                            <h4>Data Fungsi</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover" style="font-size:13px;">
                                    <thead>
                                        <tr>
                                            <td>No</td>
                                            <td>Nama Fungsi</td>
                                            <td>Aksi</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($fungsi as $child)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $child->child_name }}</td>
                                                <td>
                                                    <a href="{{ route('knowledge.detailInfo', $child->id) }}" class="btn btn-sm btn-primary">Detail</a>
                                                    <a href="#" data-id="{{ $child->id }}" class="btn btn-sm btn-secondary editbutton">Edit</a>
                                                    <a onclick="return confirm('Hapus Fungsi ini? Menghapus fungsi akan menghapus semua yang terkait dengan fungsi ini.')" href="{{ route('knowledge.deleteFungsi', $child->id) }}" class="btn btn-sm btn-danger">Hapus</a>
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
                <form method="POST" action="{{ route('knowledge.childSave') }}">
                    <input type="hidden" value="" id="fungsi_id" name="fungsi_id">
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
                                    <label for="nama_kategori">Nama Fungsi</label>
                                    <input type="text" name="fungsi" id="fungsi" class="form-control"/>
                                </div>
                                <div class="form-group">
                                    <label for="nama_kategori">Nama Kategori</label>
                                    <select class="form-control" name="kategori" id="kategori">
                                        @foreach ($knowledges as $knowledge)
                                            <option value="{{ $knowledge->id }}">{{ $knowledge->knowledge_name }}</option>
                                        @endforeach
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
            $.get('/knowledge/getChild/'+data_id, function(data){
                $("#fungsi_id").val(data.id);
                $("#fungsi").val(data.child_name);
                $("#kategori").val(data.knowledge_id);
                $("#editModal").modal('show');
            })
        });
    </script>
@endsection

{{-- @section('css')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
@endsection --}}