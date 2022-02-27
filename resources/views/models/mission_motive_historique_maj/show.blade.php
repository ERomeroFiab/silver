@extends('listado')



@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">

                <div class="row">
                    <div class="col-12">
                        <h4 class="my-0">ID_MISSION_MOTIVE_HISTORIQUE_MAJ: {{ $mission_motive_historique_maj->ID_MISSION_MOTIVE_HISTORIQUE_MAJ }}</h4>
                        <p>Tabla <b>mission_motive_historique_maj</b></p>
                    </div>
                </div>

                <div class="row">
                    @foreach (config('tablas') as $table_name => $columns)
                        @if ( $table_name === "mission_motive_historique_maj" )
                            @foreach ($columns as $column)
                                <div class="col-3 form-group">
                                    <label>{{ $column }}</label>
                                    <input id="{{ $column }}" type="text" class="form-control" value="{{ $mission_motive_historique_maj->{$column} }}" disabled title="{{ $mission_motive_historique_maj->{$column} }}">
                                </div>
                            @endforeach
                        @endif
                    @endforeach

                </div>


                @if ( $mission_motive_historique_maj->mission )
                    <div class="row">
                        <div class="col-12">
                            <p><b>Tabla mission</b></p>
                        </div>
                    </div>
                    <div class="row">
                        @foreach (config('tablas')['mission'] as $column)
                            <div class="col-3 form-group">
                                <label>{{ $column }}</label>
                                <input id="{{ $mission_motive_historique_maj->mission->{$column} }}" type="text" class="form-control" value="{{  $mission_motive_historique_maj->mission->{$column} }}" disabled title="{{ $mission_motive_historique_maj->mission->{$column} }}">
                            </div>
                        @endforeach
                    </div>

                    @if ( $mission_motive_historique_maj->mission->contrat )
                        <div class="row">
                            <div class="col-12">
                                <p><b>Tabla contrat</b></p>
                            </div>
                        </div>
                        <div class="row">
                            @foreach (config('tablas')['contrat'] as $column)
                                <div class="col-3 form-group">
                                    <label>{{ $column }}</label>
                                    <input id="{{ $mission_motive_historique_maj->mission->contrat->{$column} }}" type="text" class="form-control" value="{{  $mission_motive_historique_maj->mission->contrat->{$column} }}" disabled title="{{ $mission_motive_historique_maj->mission->contrat->{$column} }}">
                                </div>
                            @endforeach
                        </div>
                    @endif

                    @if ( $mission_motive_historique_maj->mission->identification )
                        <div class="row">
                            <div class="col-12">
                                <p><b>Tabla identification</b></p>
                            </div>
                        </div>
                        <div class="row">
                            @foreach (config('tablas')['identification'] as $column)
                                <div class="col-3 form-group">
                                    <label>{{ $column }}</label>
                                    <input id="{{ $mission_motive_historique_maj->mission->identification->{$column} }}" type="text" class="form-control" value="{{  $mission_motive_historique_maj->mission->identification->{$column} }}" disabled title="{{ $mission_motive_historique_maj->mission->identification->{$column} }}">
                                </div>
                            @endforeach
                        </div>
                    @endif

                    
                @endif

                @if ( $mission_motive_historique_maj->mission_motive )
                    <div class="row">
                        <div class="col-12">
                            <p><b>Tabla mission_motive</b></p>
                        </div>
                    </div>
                    <div class="row">
                        @foreach (config('tablas')['mission_motive'] as $column)
                            <div class="col-3 form-group">
                                <label>{{ $column }}</label>
                                <input id="{{ $mission_motive_historique_maj->mission_motive->{$column} }}" type="text" class="form-control" value="{{  $mission_motive_historique_maj->mission_motive->{$column} }}" disabled title="{{ $mission_motive_historique_maj->mission_motive->{$column} }}">
                            </div>
                        @endforeach
                    </div>
                @endif




            </div>



        </div> <!-- End card -->
    </div>
</div>
@endsection