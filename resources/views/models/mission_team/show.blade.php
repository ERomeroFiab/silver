@extends('listado')



@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">

                <div class="row">
                    <div class="col-12">
                        <h4 class="my-0">ID_MISSION_TEAM: {{ $mission_team->ID_MISSION_TEAM }}</h4>
                        <p>Tabla <b>mission_team</b></p>
                    </div>
                </div>

                <div class="row">
                    @foreach (config('tablas') as $table_name => $columns)
                        @if ( $table_name === "mission_team" )
                            @foreach ($columns as $column)
                                <div class="col-3 form-group">
                                    <label>{{ $column }}</label>
                                    <input id="{{ $column }}" type="text" class="form-control" value="{{ $mission_team->{$column} }}" disabled title="{{ $mission_team->{$column} }}">
                                </div>
                            @endforeach
                        @endif
                    @endforeach

                </div>

                @if ( $mission_team->identification )
                    <div class="row">
                        <div class="col-12">
                            <p><b>Tabla Identification</b></p>
                        </div>
                    </div>
                    <div class="row">
                        @foreach (config('tablas')['identification'] as $column)
                            <div class="col-3 form-group">
                                <label>{{ $column }}</label>
                                <input id="{{ $mission_team->identification->{$column} }}" type="text" class="form-control" value="{{  $mission_team->identification->{$column} }}" disabled title="{{ $mission_team->identification->{$column} }}">
                            </div>
                        @endforeach
                    </div>
                @endif

                @if ( $mission_team->mission )
                    <div class="row">
                        <div class="col-12">
                            <p><b>Tabla mission</b></p>
                        </div>
                    </div>
                    <div class="row">
                        @foreach (config('tablas')['mission'] as $column)
                            <div class="col-3 form-group">
                                <label>{{ $column }}</label>
                                <input id="{{ $mission_team->mission->{$column} }}" type="text" class="form-control" value="{{  $mission_team->mission->{$column} }}" disabled title="{{ $mission_team->mission->{$column} }}">
                            </div>
                        @endforeach
                    </div>

                    @if ( $mission_team->mission->identification )
                        <div class="row">
                            <div class="col-12">
                                <p><b>Tabla identification</b></p>
                            </div>
                        </div>
                        <div class="row">
                            @foreach (config('tablas')['identification'] as $column)
                                <div class="col-3 form-group">
                                    <label>{{ $column }}</label>
                                    <input id="{{ $mission_team->mission->identification->{$column} }}" type="text" class="form-control" value="{{  $mission_team->mission->identification->{$column} }}" disabled title="{{ $mission_team->mission->identification->{$column} }}">
                                </div>
                            @endforeach
                        </div>
                    @endif

                    @if ( $mission_team->mission->contrat )
                        <div class="row">
                            <div class="col-12">
                                <p><b>Tabla contrat</b></p>
                            </div>
                        </div>
                        <div class="row">
                            @foreach (config('tablas')['contrat'] as $column)
                                <div class="col-3 form-group">
                                    <label>{{ $column }}</label>
                                    <input id="{{ $mission_team->mission->contrat->{$column} }}" type="text" class="form-control" value="{{  $mission_team->mission->contrat->{$column} }}" disabled title="{{ $mission_team->mission->contrat->{$column} }}">
                                </div>
                            @endforeach
                        </div>

                        @if ( $mission_team->mission->contrat->contact )
                            <div class="row">
                                <div class="col-12">
                                    <p><b>Tabla contact</b></p>
                                </div>
                            </div>
                            <div class="row">
                                @foreach (config('tablas')['contact'] as $column)
                                    <div class="col-3 form-group">
                                        <label>{{ $column }}</label>
                                        <input id="{{ $mission_team->mission->contrat->contact->{$column} }}" type="text" class="form-control" value="{{  $mission_team->mission->contrat->contact->{$column} }}" disabled title="{{ $mission_team->mission->contrat->contact->{$column} }}">
                                    </div>
                                @endforeach
                            </div>
                        @endif

                        
                    @endif

                    
                @endif


    

            </div>



        </div> <!-- End card -->
    </div>
</div>
@endsection