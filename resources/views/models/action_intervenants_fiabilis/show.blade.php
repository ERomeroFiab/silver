@extends('listado')



@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">

                <div class="row">
                    <div class="col-12">
                        <h4 class="my-0">ID_ACTION_INTERVENANTS_FIABILIS: {{ $action_intervenants_fiabilis->ID_ACTION_INTERVENANTS_FIABILIS }}</h4>
                        <p>Tabla <b>action_intervenants_fiabilis</b></p>
                    </div>
                </div>

                <div class="row">
                    @foreach (config('tablas') as $table_name => $columns)
                        @if ( $table_name === "action_intervenants_fiabilis" )
                            @foreach ($columns as $column)
                                <div class="col-3 form-group">
                                    <label>{{ $column }}</label>
                                    <input id="{{ $column }}" type="text" class="form-control" value="{{ $action_intervenants_fiabilis->{$column} }}" disabled title="{{ $action_intervenants_fiabilis->{$column} }}">
                                </div>
                            @endforeach
                        @endif
                    @endforeach

                </div>

                @if ( $action_intervenants_fiabilis->action )
                    <div class="row">
                        <div class="col-12">
                            <p><b>Tabla action</b></p>
                        </div>
                    </div>
                    <div class="row">
                        @foreach (config('tablas')['action'] as $column)
                            <div class="col-3 form-group">
                                <label>{{ $column }}</label>
                                <input id="{{ $action_intervenants_fiabilis->action->{$column} }}" type="text" class="form-control" value="{{  $action_intervenants_fiabilis->action->{$column} }}" disabled title="{{ $action_intervenants_fiabilis->action->{$column} }}">
                            </div>
                        @endforeach
                    </div>

                    @if ( $action_intervenants_fiabilis->action->contact )
                        <div class="row">
                            <div class="col-12">
                                <p><b>Tabla contact</b></p>
                            </div>
                        </div>
                        <div class="row">
                            @foreach (config('tablas')['contact'] as $column)
                                <div class="col-3 form-group">
                                    <label>{{ $column }}</label>
                                    <input id="{{ $action_intervenants_fiabilis->action->contact->{$column} }}" type="text" class="form-control" value="{{  $action_intervenants_fiabilis->action->contact->{$column} }}" disabled title="{{ $action_intervenants_fiabilis->action->contact->{$column} }}">
                                </div>
                            @endforeach
                        </div>
                    @endif

                    @if ( $action_intervenants_fiabilis->action->identification )
                        <div class="row">
                            <div class="col-12">
                                <p><b>Tabla identification</b></p>
                            </div>
                        </div>
                        <div class="row">
                            @foreach (config('tablas')['identification'] as $column)
                                <div class="col-3 form-group">
                                    <label>{{ $column }}</label>
                                    <input id="{{ $action_intervenants_fiabilis->action->identification->{$column} }}" type="text" class="form-control" value="{{  $action_intervenants_fiabilis->action->identification->{$column} }}" disabled title="{{ $action_intervenants_fiabilis->action->identification->{$column} }}">
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
