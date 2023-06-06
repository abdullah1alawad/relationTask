<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<form action="{{route('family.store')}}" method="POST">
    @csrf
    @method('POST')
    name :<input type="text" name="name"><br>
    nationlId:<input type="text" name="nationalId"><br>
    phone:<input type="text" name="phone"><br>
    city: <select name="city_id" id="">
        <option value=""></option>
    @foreach($city as $row)
            <option value="{{$row->id}}">{{$row->name}}</option>
    @endforeach
    </select>
    <input type="submit">
</form>
<br>
<a href="{{url('family/show')}}">show all</a>
</body>
</html>
