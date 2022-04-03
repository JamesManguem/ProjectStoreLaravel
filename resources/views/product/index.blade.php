show proudct list :)
@if(Session::has('message'))
    {{Session::get('message')}}
@endif

<a href="{{url('product/create')}}">Add New Product</a>
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
                <img src="{{asset('storage').'/'.$product->Picture}}" width="100" alt="">
            </td>
            <td>{{$product->Name}}</td>
            <td>{{$product->Description}}</td>
            <td>{{$product->Price}}</td>
            <td>

                <a href="{{url('/product/'.$product->id.'/edit')}}">
                    Edit
                </a>
                |


            <form action="{{ url('/product/'.$product->id) }}" method="post">
              @csrf
                {{method_field('DELETE')}}


                <input type="submit"  onclick="return confirm('Are you sure you want to delete the product?')" value="Delete">

            </form>


            </td>
        </tr>

      @endforeach
    </tbody>


</table>


