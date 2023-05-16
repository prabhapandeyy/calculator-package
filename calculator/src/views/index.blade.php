<a class='btn btn-primary btn-sm' href="{{url('create')}}">Create</a>
<table>
    <thead>
    <tr>
        <th>id</th>
        <th>name</th>
        <th>email</th>
        <th>action</th>
         
    </tr>
    </thead>
    <tbody>
        
            @foreach($data as $item)
            <tr> <td>
                    {{$item->id}}
            </td>
            <td>
                {{$item->name}}
            </td>
            <td>
                {{$item->email}}
            </td>
           
            <td>
            <form method='POST' action="{{url('user/delete/' . $item->id)}}">
                <input name='_method' type='hidden' value='DELETE'><input name='_token' type='hidden' value='" . csrf_token() . "'>
            
                <a class='btn btn-primary btn-sm' href="{{url('user/edit/' . $item->id)}}">Edit</a>
                <button type='submit' class='ms-1 btn btn-danger text-white btn-sm'>Delete</button>
                                                                                                   
                                                
                                                                    </form> 
            </td>
                                                                </tr>
            @endforeach
       
    </tbody>
</table>