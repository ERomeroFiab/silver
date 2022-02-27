@extends('listado')



@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">

                <div class="row">
                    <div class="col-12">
                        <h4 class="my-0">ID_CONTRAT_PARTIEL_CONDITION_FIANCIERES: {{ $contrat_partiel_condition_fianciere->ID_CONTRAT_PARTIEL_CONDITION_FIANCIERES }}</h4>
                        <p>Tabla <b>contrat_partiel_condition_fiancieres</b></p>
                    </div>
                </div>

                <div class="row">
                    @foreach (config('tablas') as $table_name => $columns)
                        @if ( $table_name === "contrat_partiel_condition_fiancieres" )
                            @foreach ($columns as $column)
                                <div class="col-3 form-group">
                                    <label>{{ $column }}</label>
                                    <input id="{{ $column }}" type="text" class="form-control" value="{{ $contrat_partiel_condition_fianciere->{$column} }}" disabled title="{{ $contrat_partiel_condition_fianciere->{$column} }}">
                                </div>
                            @endforeach
                        @endif
                    @endforeach

                </div>



                
                @if ( $contrat_partiel_condition_fianciere->contrat_detail_produit )
                    <div class="row">
                        <div class="col-12">
                            <p><b>Tabla contrat_detail_produit</b></p>
                        </div>
                    </div>
                    <div class="row">
                        @foreach (config('tablas')['contrat_detail_produit'] as $column)
                            <div class="col-3 form-group">
                                <label>{{ $column }}</label>
                                <input id="{{ $contrat_partiel_condition_fianciere->contrat_detail_produit->{$column} }}" type="text" class="form-control" value="{{  $contrat_partiel_condition_fianciere->contrat_detail_produit->{$column} }}" disabled title="{{ $contrat_partiel_condition_fianciere->contrat_detail_produit->{$column} }}">
                            </div>
                        @endforeach
                    </div>
                @endif
                
                
                @if ( $contrat_partiel_condition_fianciere->contrat )
                    <div class="row">
                        <div class="col-12">
                            <p><b>Tabla contrat</b></p>
                        </div>
                    </div>
                    <div class="row">
                        @foreach (config('tablas')['contrat'] as $column)
                            <div class="col-3 form-group">
                                <label>{{ $column }}</label>
                                <input id="{{ $contrat_partiel_condition_fianciere->contrat->{$column} }}" type="text" class="form-control" value="{{  $contrat_partiel_condition_fianciere->contrat->{$column} }}" disabled title="{{ $contrat_partiel_condition_fianciere->contrat->{$column} }}">
                            </div>
                        @endforeach
                    </div>

                    @if ( $contrat_partiel_condition_fianciere->contrat->contact )
                        <div class="row">
                            <div class="col-12">
                                <p><b>Tabla contact</b></p>
                            </div>
                        </div>
                        <div class="row">
                            @foreach (config('tablas')['contact'] as $column)
                                <div class="col-3 form-group">
                                    <label>{{ $column }}</label>
                                    <input id="{{ $contrat_partiel_condition_fianciere->contrat->contact->{$column} }}" type="text" class="form-control" value="{{  $contrat_partiel_condition_fianciere->contrat->contact->{$column} }}" disabled title="{{ $contrat_partiel_condition_fianciere->contrat->contact->{$column} }}">
                                </div>
                            @endforeach
                        </div>
                    @endif

                    @if ( $contrat_partiel_condition_fianciere->contrat->identification )
                        <div class="row">
                            <div class="col-12">
                                <p><b>Tabla identification</b></p>
                            </div>
                        </div>
                        <div class="row">
                            @foreach (config('tablas')['identification'] as $column)
                                <div class="col-3 form-group">
                                    <label>{{ $column }}</label>
                                    <input id="{{ $contrat_partiel_condition_fianciere->contrat->identification->{$column} }}" type="text" class="form-control" value="{{  $contrat_partiel_condition_fianciere->contrat->identification->{$column} }}" disabled title="{{ $contrat_partiel_condition_fianciere->contrat->identification->{$column} }}">
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