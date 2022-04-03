Formulario de edición de productos


<form action="{{url('/product/'.$product->id)}}" method="post" enctype="multipart/form-data">
    @csrf
    {{method_field('PATCH')}}
    @include('product.form');
</form>



