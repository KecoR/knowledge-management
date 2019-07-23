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
                            <h4>Ask Knowledge</h4>
                        </div>
                        <div class="card-body">
                            <form method="POST" id="myForm" action="{{ route('knowledge.saveAsk') }}" class="needs-validation" novalidate="">
                                @csrf
                                <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="knowledge">Nama Kategori</label>
                                                <select name="knowledge" id="knowledge" class="form-control" tabindex="1" required autofocus>
                                                    <option value="" selected disabled>Pilih Kategori</option>
                                                    @foreach ($knowledges as $knowledge)
                                                        <option value="{{ $knowledge->id }}">{{ $knowledge->knowledge_name }}</option>
                                                    @endforeach
                                                    <option value="new">Kategori Baru</option>
                                                </select>
                                                <div class="invalid-feedback">
                                                    Tolong pilih kategori
                                                </div>
                                            </div>
            
                                            <div class="form-group" id="newknowledge">
                                                
                                            </div>
                                        
                                            <div class="form-group" id="fungsi">
                                                <div class="d-block">
                                                    <label for="child" class="control-label">Nama Fungsi</label>
                                                </div>
                                                <select name="child" id="child" class="form-control" tabindex="2" required autofocus>
                                                    <option value="">Pilih kategori terlebih dahulu</option>
                                                </select>
                                                <div class="invalid-feedback">
                                                Tolong isi nama fungsi
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group" id="newfungsi">
                                            
                                            </div>
                                            <div class="form-group">
                                                <div class="d-block">
                                                    <label for="info" class="control-label">Informasi</label>
                                                </div>
                                                <input id="text" type="text" class="form-control" name="info" tabindex="3" required>
                                                <div class="invalid-feedback">
                                                Tolong isi informasi
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <div class="d-block">
                                                    <label for="content" class="control-label">Isi</label>
                                                </div>
                                                <textarea name="content" id="content" class="test" cols="40" rows="30" tabindex="4" required></textarea>
                                                <div class="invalid-feedback">
                                                Tolong isi isian dari knowledge
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <button class="btn btn-primary btn-lg btn-block">Simpan</button>
                                            </div>
                                        </div>
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
        tinymce.init({selector:'textarea#content'});
        
        $("#knowledge").on("change", function(){
            var knowledge = document.getElementById("knowledge").value;
            if(knowledge == "new") {
                $("#newfungsi").empty();
                $("#newknowledge").empty();
                $("#fungsi").empty();
                let label = '<div class="d-block"><label for="cat" class="control-label">Nama Kategori Baru</label></div>';
                let label1 = '<div class="d-block"><label for="child" class="control-label">Nama Fungsi</label></div>';
                let child = '<input id="text" type="text" class="form-control" name="newcat" tabindex="3" required>';
                let child1 = '<input id="text" type="text" class="form-control" name="fungsi" tabindex="3" required>';
                $("#fungsi").append(label1);
                $("#fungsi").append(child1);
                $("#newknowledge").append(label);
                $("#newknowledge").append(child);
            } else {
                $("#newfungsi").empty();
                $("#newknowledge").empty();
                $("#fungsi").empty();
                let label1 = '<div class="d-block"><label for="child" class="control-label">Nama Fungsi</label></div>';
                let select = '<select name="child" id="child" class="form-control" tabindex="2" required autofocus></select>';
                $("#fungsi").append(label1);
                $("#fungsi").append(select);
                let newfungsi = '<option value="newfungsi">Fungsi Baru</option>'
                let fungsi = 0;
                $.get('/knowledge/getFungsi/'+knowledge, function(data){
                    $.each(data, function(key, val){
                        let list = '<option value="'+val.id+'">'+val.child_name+'</option>';
                        $("#child").append(list);
                        fungsi++;
                    })
                    $("#child").append(newfungsi);
                });

                $("#fungsi").on("change", function(){
                    var valfungsi = document.getElementById("child").value;
                    if(valfungsi == "newfungsi") {
                        $("#newfungsi").empty();    
                        let label1 = '<div class="d-block"><label for="child" class="control-label">Nama Fungsi</label></div>';
                        let child1 = '<input id="text" type="text" class="form-control" name="newchild" tabindex="3" required>';
                        $("#newfungsi").append(label1);
                        $("#newfungsi").append(child1);
                    }
                });
            }
        });
    </script>
@endsection