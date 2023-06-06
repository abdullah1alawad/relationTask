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

    @foreach($inf as $data)
        {{$data['name']}} ---- {{$data['phone']}} ----{{$data['city_name']}} -----
        @foreach($data['plants_name'] as $item)
            {{$item['pivot']}} --------------
        @endforeach
        <form action="{{route('family.addCity')}}" method="PUT">
            @csrf @method('PUT')
            <select name="city_id" id="">
                @foreach($city as $val)
                    <option value="{{$val->id}}">{{$val->name}}</option>
                @endforeach
            </select>
            <input type="text" name="family_id" value="{{$data['id']}}" hidden>
            <input type="submit" value="add-city">
        </form>
        <form action="{{route('family.addPlant')}}" method="POST">
            @csrf @method('POST')
            <select name="plants_id[]" id="" multiple>
                @foreach($plant as $val)
                    <option value="{{$val->id}}">{{$val->type}}</option>
                @endforeach
            </select>
            <input type="text" name="family_id" value="{{$data['id']}}" hidden>
            <input type="submit" value="add-plant">
        </form>
        <br><br>
    @endforeach
</body>
</html>
