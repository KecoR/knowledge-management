@extends('knowledge.index')

@section('knowledgeContent')
    <section class="section">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="card card-statistic-1">
                        <div class="card-header">
                            <h4>Log Activity</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover" style="font-size:13px;">
                                    <thead>
                                        <tr>
                                            <td>No</td>
                                            <td>Username</td>
                                            <td>Activity</td>
                                            <td>Time</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($logs as $log)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $log->user->username }}</td>
                                                <td>{{ $log->activity }}</td>
                                                <td>{{ $log->date }}</td>
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

@section('js')
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
    <script>
        $(document).ready(function(){
            $("table").DataTable();
        });
    </script>
@endsection