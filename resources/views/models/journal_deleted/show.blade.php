@extends('listado')



@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">

                <div class="row">
                    <div class="col-12">
                        <h4 class="my-0">ID_JOURNAL_DELETED: {{ $journal_deleted->ID_JOURNAL_DELETED }}</h4>
                        <p>Tabla <b>journal_deleted</b></p>
                    </div>
                </div>

                <div class="row">
                    @foreach (config('tablas') as $table_name => $columns)
                        @if ( $table_name === "journal_deleted" )
                            @foreach ($columns as $column)
                                <div class="col-3 form-group">
                                    <label>{{ $column }}</label>
                                    <input id="{{ $column }}" type="text" class="form-control" value="{{ $journal_deleted->{$column} }}" disabled title="{{ $journal_deleted->{$column} }}">
                                </div>
                            @endforeach
                        @endif
                    @endforeach

                </div>

            </div>



        </div> <!-- End card -->
    </div>
</div>
@endsection