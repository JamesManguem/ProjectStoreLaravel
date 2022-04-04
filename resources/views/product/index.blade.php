@extends('layouts.app')
@section('content')
<div class="container">

    <div class="alert alert-success fade show" role="alert">

        @if(Session::has('mensaje'))
            {{Session::get('mensaje')}}
        @endif

        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>

    </div>





<a href="{{url('product/create')}}" class="btn btn-success">Add New Product</a>
    <br/>
    <br/>
</div>
<table class="table table-light">
    <thead class="thead-light">
    <tr>
        <th>#</th>
        <th>Picture</th>
        <th>Name</th>
        <th>Description</th>
        <th>Price</th>
        <th>Actions</th>
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
                    Edit
                </a>
                |


            <form action="{{ url('/product/'.$product->id) }}" class="d-inline" method="post">
              @csrf
                {{method_field('DELETE')}}


                <input class="btn btn-danger" type="submit"  onclick="return confirm('Are you sure you want to delete the product?')" value="Delete">

            </form>


            </td>
        </tr>

      @endforeach
    </tbody>


</table>
</div>
@endsection
