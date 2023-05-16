<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
  
<form action="{{url('store')}}" method="post">
    @csrf
   <input type="text" placeholder="Enter name" name="name">
   <input type="email" placeholder="Enter email" name="email">
   <input type="password" placeholder="Enter password" name="password">
    
   <input type="submit" value="Submit" name="action">
   <form>
   
       

</body>
</html>