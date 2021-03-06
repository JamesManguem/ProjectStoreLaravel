@extends('layouts.app')
@section('content')
<div class="container">



        @if(Session::has('mensaje'))
        <div class="alert alert-success  alert-dismissible fade show" role="alert">
            {{Session::get('mensaje')}}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
            </button>
        </div>
        @endif







<a href="{{url('product/create')}}" class="btn btn-success">Agregar Nuevo Producto</a>
    <br/>
    <br/>
</div>
<table class="table table-light">
    <thead class="thead-light">
    <tr>
        <th>Id</th>
        <th>Foto</th>
        <th>Nombre</th>
        <th>Descripción</th>
        <th>Precio</th>
        <th>Acciones</th>
    </tr>

    </thead>
    <tbody>
      @foreach($products as $product)
        <tr>
            <td>{{$product->id}}</td>
            <td>
                <img class="img-thumbnail img-fluid" src="{{asset('storage').'/'.$product->Picture}}" width="100" alt="">
            </td>
            <td>{{$product->Name}}</td>
            <td>{{$product->Description}}</td>
            <td>{{$product->Price}}</td>
            <td>

                <a href="{{url('/product/'.$product->id.'/edit')}}" class="btn btn-warning">
                    Editar
                </a>
                |


            <form action="{{ url('/product/'.$product->id) }}" class="d-inline" method="post">
              @csrf
                {{method_field('DELETE')}}


                <input class="btn btn-danger" type="submit"  onclick="return confirm('¿Esta seguro que desea eliminar este producto?')" value="Eliminar">

            </form>


            </td>
        </tr>

      @endforeach
    </tbody>


</table>
{!! $products->links() !!}

</div>
@endsection


