<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Show Image</title>
    </head>
    <body>
        <a href="{{ '/addimage' }}"> add image</a>
        <a href="{{'/logout'}}"> logout</a>
        <br />
        <br />
        <br />
        @foreach ( $imageHouse as $image)
        <img
            src="{{ asset('storage/uploads') }}\{{$image}}"
            alt=""
            style="width: 300px; height: 400px; box-shadow: 1px 1px 10px"
        />
        @endforeach
    </body>
</html>
