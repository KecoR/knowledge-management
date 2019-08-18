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
                            <h4>Add Knowledge</h4>
                        </div>
                        <div class="card-body">
                            <form method="POST" id="myForm" action="{{ route('knowledge.infoSave') }}" class="needs-validation" novalidate="">
                                @csrf
                                <input type="hidden" value="{{ $datas['info']->id }}" id="info_id" name="info_id">
                                <div class="form-group">
                                    <label for="nama_kategori">Nama Informasi</label>
                                    <input type="text" name="info" id="info" class="form-control" value="{{ $datas['info']->info_name }}"/>
                                </div>
                                <div class="form-group">
                                    <label for="nama_kategori">Isi</label>
                                    <textarea name="content" id="ckeditor" class="form-control ckeditor" width="500px"  tabindex="4" required>{{ $datas['content']->content }}</textarea>
                                </div>
                                <button type="submit" class="btn btn-block btn-primary">Simpan Data</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('js')
    <script>
        $(document).ready(function(){
            $("table").DataTable();
            // $('#ckeditor').cleditor();
        });
    </script>
@endsection