@extends('listado')



@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">

                <div class="row">
                    <div class="col-12">
                        <h4 class="my-0">ID_AFFAIRE_CONDITIONS_FINANCIERES: {{ $affaire_conditions_financiere->ID_AFFAIRE_CONDITIONS_FINANCIERES }}</h4>
                        <p>Tabla <b>affaire_conditions_financieres</b></p>
                    </div>
                </div>

                <div class="row">
                    @foreach (config('tablas') as $table_name => $columns)
                        @if ( $table_name === "affaire_conditions_financieres" )
                            @foreach ($columns as $column)
                                <div class="col-3 form-group">
                                    <label>{{ $column }}</label>
                                    <input id="{{ $column }}" type="text" class="form-control" value="{{ $affaire_conditions_financiere->{$column} }}" disabled title="{{ $affaire_conditions_financiere->{$column} }}">
                                </div>
                            @endforeach
                        @endif
                    @endforeach

                </div>


                @if ( $affaire_conditions_financiere->affaire )
                    <div class="row">
                        <div class="col-12">
                            <p><b>Tabla affaire</b></p>
                        </div>
                    </div>
                    <div class="row">
                        @foreach (config('tablas')['affaire'] as $column)
                            <div class="col-3 form-group">
                                <label>{{ $column }}</label>
                                <input id="{{ $affaire_conditions_financiere->affaire->{$column} }}" type="text" class="form-control" value="{{  $affaire_conditions_financiere->affaire->{$column} }}" disabled title="{{ $affaire_conditions_financiere->affaire->{$column} }}">
                            </div>
                        @endforeach
                    </div>

                    @if ( $affaire_conditions_financiere->affaire->contact )
                        <div class="row">
                            <div class="col-12">
                                <p><b>Tabla contact</b></p>
                            </div>
                        </div>
                        <div class="row">
                            @foreach (config('tablas')['contact'] as $column)
                                <div class="col-3 form-group">
                                    <label>{{ $column }}</label>
                                    <input id="{{ $affaire_conditions_financiere->affaire->contact->{$column} }}" type="text" class="form-control" value="{{  $affaire_conditions_financiere->affaire->contact->{$column} }}" disabled title="{{ $affaire_conditions_financiere->affaire->contact->{$column} }}">
                                </div>
                            @endforeach
                        </div>
                    @endif
                    
                    @if ( $affaire_conditions_financiere->affaire->identification )
                        <div class="row">
                            <div class="col-12">
                                <p><b>Tabla identification</b></p>
                            </div>
                        </div>
                        <div class="row">
                            @foreach (config('tablas')['identification'] as $column)
                                <div class="col-3 form-group">
                                    <label>{{ $column }}</label>
                                    <input id="{{ $affaire_conditions_financiere->affaire->identification->{$column} }}" type="text" class="form-control" value="{{  $affaire_conditions_financiere->affaire->identification->{$column} }}" disabled title="{{ $affaire_conditions_financiere->affaire->identification->{$column} }}">
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



