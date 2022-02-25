@extends('listado')


@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
           <div class="card-body">
               <form action="{{ route('buscar') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-12">
                            <label class="form-group text-center" style="width: 250px;">
                                Ingresa el RUT:
                                <input name="rut" type="text" class="form-control" placeholder="Ej: 12444999-k">
                            </label>
                            <input class="btn btn-sm btn-success" type="submit" value="Buscar">
                        </div>
                    </div>
               </form>
           </div>
        </div> <!-- End card -->
    </div>
</div>
@endsection

