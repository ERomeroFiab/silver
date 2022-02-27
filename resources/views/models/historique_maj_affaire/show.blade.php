@extends('listado')



@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">

                <div class="row">
                    <div class="col-12">
                        <h4 class="my-0">ID_HISTORIQUE_MAJ_AFFAIRE: {{ $historique_maj_affaire->ID_HISTORIQUE_MAJ_AFFAIRE }}</h4>
                        <p>Tabla <b>historique_maj_affaire</b></p>
                    </div>
                </div>

                <div class="row">
                    @foreach (config('tablas') as $table_name => $columns)
                        @if ( $table_name === "historique_maj_affaire" )
                            @foreach ($columns as $column)
                                <div class="col-3 form-group">
                                    <label>{{ $column }}</label>
                                    <input id="{{ $column }}" type="text" class="form-control" value="{{ $historique_maj_affaire->{$column} }}" disabled title="{{ $historique_maj_affaire->{$column} }}">
                                </div>
                            @endforeach
                        @endif
                    @endforeach

                </div>



                @if ( $historique_maj_affaire->affaire )
                    <div class="row">
                        <div class="col-12">
                            <p><b>Tabla affaire</b></p>
                        </div>
                    </div>
                    <div class="row">
                        @foreach (config('tablas')['affaire'] as $column)
                            <div class="col-3 form-group">
                                <label>{{ $column }}</label>
                                <input id="{{ $historique_maj_affaire->affaire->{$column} }}" type="text" class="form-control" value="{{  $historique_maj_affaire->affaire->{$column} }}" disabled title="{{ $historique_maj_affaire->affaire->{$column} }}">
                            </div>
                        @endforeach
                    </div>

                    @if ( $historique_maj_affaire->affaire->contact )
                        <div class="row">
                            <div class="col-12">
                                <p><b>Tabla contact</b></p>
                            </div>
                        </div>
                        <div class="row">
                            @foreach (config('tablas')['contact'] as $column)
                                <div class="col-3 form-group">
                                    <label>{{ $column }}</label>
                                    <input id="{{ $historique_maj_affaire->affaire->contact->{$column} }}" type="text" class="form-control" value="{{  $historique_maj_affaire->affaire->contact->{$column} }}" disabled title="{{ $historique_maj_affaire->affaire->contact->{$column} }}">
                                </div>
                            @endforeach
                        </div>
                    @endif

                    @if ( $historique_maj_affaire->affaire->contrat )
                        <div class="row">
                            <div class="col-12">
                                <p><b>Tabla contrat</b></p>
                            </div>
                        </div>
                        <div class="row">
                            @foreach (config('tablas')['contrat'] as $column)
                                <div class="col-3 form-group">
                                    <label>{{ $column }}</label>
                                    <input id="{{ $historique_maj_affaire->affaire->contrat->{$column} }}" type="text" class="form-control" value="{{  $historique_maj_affaire->affaire->contrat->{$column} }}" disabled title="{{ $historique_maj_affaire->affaire->contrat->{$column} }}">
                                </div>
                            @endforeach
                        </div>
                    @endif

                    @if ( $historique_maj_affaire->affaire->identification )
                        <div class="row">
                            <div class="col-12">
                                <p><b>Tabla identification</b></p>
                            </div>
                        </div>
                        <div class="row">
                            @foreach (config('tablas')['identification'] as $column)
                                <div class="col-3 form-group">
                                    <label>{{ $column }}</label>
                                    <input id="{{ $historique_maj_affaire->affaire->identification->{$column} }}" type="text" class="form-control" value="{{  $historique_maj_affaire->affaire->identification->{$column} }}" disabled title="{{ $historique_maj_affaire->affaire->identification->{$column} }}">
                                </div>
                            @endforeach
                        </div>
                    @endif

                    
                @endif


    


            </div>



        </div> <!-- End card -->
    </div>
</div>
@endsection