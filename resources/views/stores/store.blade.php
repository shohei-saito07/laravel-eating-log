<a href="{{ route('stores.create') }}"> Create New Store</a>
 
<table>
     <tr>
          <th>Name</th>
          <th>Description</th>
          <th>Price</th>
          <th>Category ID</th>
          <th>Image</th>
          <th>RecommendationFlg</th>
          <th>Action</th>
     </tr>
     @foreach ($stores as $store)
     <tr>
          <td>{{ $store->name }}</td>
          <td>{{ $store->description }}</td>
          <td>{{ $store->price }}</td>
          <td>{{ $store->category_id }}</td>
          <td>{{ $store->image }}</td>
          <td>{{ $store->recommendation_flg }}</td>
          <td>
               <a href="{{ route('stores.show',$store->id) }}">Show</a>
               <a href="{{ route('stores.edit',$store->id) }}">Edit</a>
          </td>
     </tr>
     @endforeach
</table>