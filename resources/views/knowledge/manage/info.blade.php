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
                            <h4>Data Informasi</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover" style="font-size:13px;">
                                    <thead>
                                        <tr>
                                            <td>No</td>
                                            <td>Nama Informasi</td>
                                            <td>Aksi</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($info as $child)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $child->info_name }}</td>
                                                <td>
                                                    <a href="{{ route('knowledge.content', $child->id) }}" class="btn btn-sm btn-primary">Detail</a>
                                                    <a href="#" data-id="{{ $child->id }}" class="btn btn-sm btn-secondary editbutton">Edit</a>
                                                    <a onclick="return confirm('Hapus Informasi ini?')"  href="{{ route('knowledge.deleteInfo', $child->id) }}" class="btn btn-sm btn-danger">Hapus</a>
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
                <form method="POST" action="{{ route('knowledge.infoSave') }}">
                    <input type="hidden" value="" id="info_id" name="info_id">
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
                                    <label for="nama_kategori">Nama Informasi</label>
                                    <input type="text" name="info" id="info" class="form-control"/>
                                </div>
                                <div class="form-group">
                                    <label for="nama_kategori">Isi</label>
                                    <textarea name="content" id="content" class="form-control"  tabindex="4" required></textarea>
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
    <script src="https://cdn.tiny.cloud/1/w57e5t6j6gjkeogxi4qvwewvg8qf7ujjg6qm7hhuty7w1bb8/tinymce/5/tinymce.min.js"></script>
    <script>
        $(document).ready(function(){
            $("table").DataTable();
        });
        $(document).on("click",".editbutton",function(){
            let data_id = $(this).attr('data-id');
            $.get('/knowledge/getInfo/'+data_id, function(data){
                $("#info_id").val(data.info.id);
                $("#info").val(data.info.info_name);
                $("#content").val(data.content.content);
                $('#content').cleditor();
                $("#editModal").modal('show');
            })
        });
    </script>
@endsection

{{-- @section('css')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
@endsection --}}