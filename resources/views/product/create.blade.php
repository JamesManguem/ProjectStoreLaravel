Formulario de creación de productos
<form action="{{url('/product')}}" method="post" enctype="multipart/form-data">
    @csrf
    @include('product.form')



</form>
