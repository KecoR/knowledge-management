@extends('knowledge.index')

@section('knowledgeContent')
<section class="section">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="card ">
                <!-- <div class="card-icon bg-primary">
                    <i class="far fa-user"></i>
                </div> -->
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>{{ $child->child_name }}</h4>
                    </div>
                    <div class="card-body">
                        @if (count($infos) > 0)
                            @foreach ($infos as $info)
                                <a href="{{ route('knowledge.content', $info->id) }}" class="btn btn-primary btn-lg col-lg-12 mb-1">{{ $info->info_name }}</a>
                            @endforeach
                        @else
                            Tidak Ada Data
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection