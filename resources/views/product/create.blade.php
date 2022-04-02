Formulario de creación de productos
<form action="{{url('/product')}}" method="post" enctype="multipart/form-data">
    @csrf

    <label for="Name">Name</label>
    <input type="text" name="Name" id="Name">
    <br>
    <label for="Description">Description</label>
    <input type="text" name="Description" id="Description">
    <br>
    <label for="Price">Price</label>
    <input type="text" name="Price" id="Price">
    <br>
    <label for="Picture">Picture</label>
    <input type="file" name="Picture" id="Picture">
    <br>
    <input type="submit" value="Save">
    <br>


</form>
