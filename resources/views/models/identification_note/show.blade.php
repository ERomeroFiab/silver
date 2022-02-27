@extends('listado')



@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">

                <div class="row">
                    <div class="col-12">
                        <h4 class="my-0">ID_IDENTIFICATION_NOTE: {{ $identification_note->ID_IDENTIFICATION_NOTE }}</h4>
                        <p>Tabla <b>identification_note</b></p>
                    </div>
                </div>

                <div class="row">
                    @foreach (config('tablas') as $table_name => $columns)
                        @if ( $table_name === "identification_note" )
                            @foreach ($columns as $column)
                                <div class="col-3 form-group">
                                    <label>{{ $column }}</label>
                                    <input id="{{ $column }}" type="text" class="form-control" value="{{ $identification_note->{$column} }}" disabled title="{{ $identification_note->{$column} }}">
                                </div>
                            @endforeach
                        @endif
                    @endforeach

                </div>

                @if ( $identification_note->identification )
                    <div class="row">
                        <div class="col-12">
                            <p><b>Tabla Identification</b></p>
                        </div>
                    </div>
                    <div class="row">
                        @foreach (config('tablas')['identification'] as $column)
                            <div class="col-3 form-group">
                                <label>{{ $column }}</label>
                                <input id="{{ $identification_note->identification->{$column} }}" type="text" class="form-control" value="{{  $identification_note->identification->{$column} }}" disabled title="{{ $identification_note->identification->{$column} }}">
                            </div>
                        @endforeach
                    </div>
                @endif




            </div>



        </div> <!-- End card -->
    </div>
</div>
@endsection