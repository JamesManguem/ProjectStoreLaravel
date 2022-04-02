show proudct list :)

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
            <td>{{$product->Picture}}</td>
            <td>{{$product->Name}}</td>
            <td>{{$product->Description}}</td>
            <td>{{$product->Price}}</td>
            <td>Edit |

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


