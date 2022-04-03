<h1>{{ $mode }}Product</h1>

<div class="form-group">

<label for="Name">Name</label>
<input type="text" class="form-control" name="Name" value="{{ isset ($product->Name)? $product->Name:''}}" id="Name">

</div>

<div class="form-group">
<label for="Description">Description</label>
<input type="text" class="form-control" name="Description"  value="{{ isset ($product->Description ) ? $product ->Description: '' }}" id="Description">

</div>

<div class="form-group">
<label for="Price">Price</label>
<input class="form-control" type="text" name="Price"  value="{{ isset ($product->Price) ? $product->Price:''}}" id="Price">

</div>

<div class="form-group">

@if( isset($product->Picture))
<img class="img-thumbnail img-fluid" src="{{asset('storage').'/'.$product->Picture}}"  width="100"   alt="">
@endif
<input type="file" class="form-control" name="Picture"  id="Picture">
</div>
<br>
<input class="btn btn-success" type="submit" value="{{$mode}}">


<a class="btn btn-primary" href="{{url('product/')}}">Regresar</a>

