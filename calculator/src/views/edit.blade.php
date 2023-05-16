<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

    {{-- <form action="{{url('user/update/' . $user->id)}}" method="post"> --}}
        <form action="{{url('user/update',$user->id)}}" method="post">

        @csrf
       
        <input type="text" placeholder="Enter name" name="name" value="{{$user->name}}">
        <input type="email" placeholder="Enter email" name="email" value="{{$user->email}}">
        <input type="password" placeholder="Enter password" name="password" value="{{$user->password}}">       
        
        <button type="submit" name="action" value="Update"
                            class="btn btn-primary">{{ __('Update') }}</button>
    </form>
       

</body>
</html>