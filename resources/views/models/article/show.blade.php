@extends('listado')



@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">

                <div class="row">
                    <div class="col-12">
                        <h4 class="my-0">ID_ARTICLE: {{ $article->ID_ARTICLE }}</h4>
                        <p>Tabla <b>action</b></p>
                    </div>
                </div>

                <div class="row">
                    @foreach (config('tablas') as $table_name => $columns)
                        @if ( $table_name === "article" )
                            @foreach ($columns as $column)
                                <div class="col-3 form-group">
                                    <label>{{ $column }}</label>
                                    <input id="{{ $column }}" type="text" class="form-control" value="{{ $article->{$column} }}" disabled title="{{ $article->{$column} }}">
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