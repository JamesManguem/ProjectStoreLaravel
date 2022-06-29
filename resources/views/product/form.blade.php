<h1>{{ $mode }}Producto</h1>


@if(count($errors)>0)

    <div class="alert alert-danger" role="alert">
        <ul>
        @foreach($errors->all() as $error)

          <li> {{$error}}</li>

            @endforeach
        </ul>
    </div>



@endif


<!-- ============================================================== -->
<!-- wrapper  -->
<!-- ============================================================== -->
<div class="dashboard-wrapper">
    <div class="dashboard-ecommerce">
        <div class="container-fluid dashboard-content ">

            <div class="row">
                <div class="offset-xl-2 col-xl-8 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="row">
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 pr-xl-0 pr-lg-0 pr-md-0  m-b-30">
                            <div class="product-slider">
                                @if( isset($product->Picture))
                                    <img class="img-thumbnail img-fluid" src="{{asset('storage').'/'.$product->Picture}}"  width="100"   alt="">
                                @endif
                                <input type="file" class="form-control" name="Picture"  id="Picture">
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 pl-xl-0 pl-lg-0 pl-md-0 border-left m-b-30">
                            <div class="product-details">
                                <div class="border-bottom pb-3 mb-3">
                                    <label for="Name">Nombre</label>
                                    <input type="text" class="form-control" name="Name" value="{{ isset ($product->Name)? $product->Name:old('Name')}}" id="Name">

                                    <label for="Price">Precio</label>
                                    <input class="form-control" type="text" name="Price"  value="{{ isset ($product->Price) ? $product->Price:old('Price')}}" id="Price">
                                </div>

                                <div class="product-description">
                                    <label for="Description">Descripción</label>
                                    <input type="text" class="form-control" name="Description"  value="{{ isset ($product->Description ) ? $product ->Description:old('Description') }}" id="Description">


                                    </textarea>
                                    <br>
                                    <input class="btn btn-success" type="submit" value="{{$mode}}">
                                    <a class="btn btn-primary" href="{{url('product/')}}">Regresar</a>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

            </div>

        </div>

    </div>
