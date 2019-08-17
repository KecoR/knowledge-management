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
                        <h4>{{ $content->info->info_name }}</h4>
                    </div>
                    <div class="card-body">
                        {!! $content->content !!}
                    </div>
                    <div class="card-footer">
                        <span style="font-size:12px;">Created by {{ $content->user->username }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection