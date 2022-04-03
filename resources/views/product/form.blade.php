<h1>{{ $mode }}Product</h1>



<label for="Name">Name</label>
<input type="text" name="Name" value="{{ isset ($product->Name)? $product->Name:''}}" id="Name">
<br>
<label for="Description">Description</label>
<input type="text" name="Description"  value="{{ isset ($product->Description ) ? $product ->Description: '' }}" id="Description">
<br>
<label for="Price">Price</label>
<input type="text" name="Price"  value="{{ isset ($product->Price) ? $product->Price:''}}" id="Price">
<br>
<label for="Picture">Picture</label>
@if( isset($product->Picture))
<img src="{{asset('storage').'/'.$product->Picture}}"  width="100"   alt="">
@endif
<input type="file" name="Picture"  id="Picture">
<br>
<input type="submit" value="{{$mode}}">


<a href="{{url('product/')}}">Regresar</a>
<br>
