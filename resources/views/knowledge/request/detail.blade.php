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
                            <h4>Detail Request Knowledge</h4>
                        </div>
                        <div class="card-body">
                            <form method="POST" id="myForm" action="{{ route('knowledge.requestTerima') }}" class="needs-validation" novalidate="">
                                @csrf
                                <input type="hidden" name="cat_id" value="{{ $req->knowledge_parent_id }}">
                                <input type="hidden" name="fungsi_id" value="{{ $req->knowledge_child_id }}">
                                <input type="hidden" name="id" value="{{ $req->id }}">
                                <input type="hidden" name="user_id" value="{{ $req->user_id }}">
                                <div class="form-group">
                                    <label for="user">User</label>
                                    <input type="text" name="user" class="form-control" value="{{ $req->user->full_name }}" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="knowledge">Nama Kategori</label>
                                    @if (!empty($req->knowledge_parent_id))
                                        <input type="text" name="cat" class="form-control" value="{{ $req->kategori->knowledge_name }}">
                                        <div class="invalid-feedback">
                                            Tolong pilih kategori
                                        </div>
                                    @else
                                        <input type="text" name="cat" class="form-control" value="{{ $req->knowledge_parent_name }}">
                                        <div class="invalid-feedback">
                                            Tolong pilih kategori
                                        </div>
                                    @endif
                                </div>
                            
                                <div class="form-group" id="fungsi">
                                    <div class="d-block">
                                        <label for="child" class="control-label">Nama Fungsi</label>
                                    </div>
                                    @if (!empty($req->knowledge_child_id))
                                        <input type="text" name="fungsi" class="form-control" value="{{ $req->child->child_name }}">
                                        <div class="invalid-feedback">
                                        Tolong isi nama fungsi
                                        </div>
                                    @else
                                        <input type="text" name="fungsi" class="form-control" value="{{  $req->knowledge_child_name }}">
                                        <div class="invalid-feedback">
                                        Tolong isi nama fungsi
                                        </div>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <div class="d-block">
                                        <label for="info" class="control-label">Informasi</label>
                                    </div>
                                    <input id="text" type="text" class="form-control" name="info" tabindex="3" value="{{ $req->info_name }}">
                                    <div class="invalid-feedback">
                                    Tolong isi informasi
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="date_req">Tanggal Request</label>
                                    <input type="text" class="form-control" name="date_req" value="{{ $req->tgl_request }}" readonly>
                                </div>
                                <div class="form-group">
                                    <div class="d-block">
                                        <label for="content" class="control-label">Isi</label>
                                    </div>
                                    <textarea name="content" id="content" class="test" cols="40" rows="30" tabindex="4">{{ $req->content }}</textarea>
                                    <div class="invalid-feedback">
                                    Tolong isi isian dari knowledge
                                    </div>
                                </div>
                                <div class="form-group">
                                    <button class="btn btn-primary btn-lg btn-block">Terima</button>
                                    {{-- <button class="btn btn-danger btn-lg btn-block">Tolak</button> --}}
                                    <td><a href="{{ route('knowledge.requestTolak',$req->id) }}" class="btn btn-lg btn-danger btn-block">Tolak</a></td>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('js')
    <script src="https://cdn.tiny.cloud/1/w57e5t6j6gjkeogxi4qvwewvg8qf7ujjg6qm7hhuty7w1bb8/tinymce/5/tinymce.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#content').cleditor();
        });
    </script> 
@endsection