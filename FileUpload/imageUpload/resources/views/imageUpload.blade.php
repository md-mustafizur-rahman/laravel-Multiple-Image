<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>ImageUpload</title>
    </head>
    <body>
        <span>{{session()->get('name')}}</span>
        <a href="{{ '/logout' }}"> logout</a>
        <a href="{{'/show'}}"> show</a>
        <form
            action="{{ url('/store') }}"
            method="post"
            enctype="multipart/form-data"
        >
            @csrf
            <input name="images[]" type="file" accept="image/*" multiple />
            <span style="color: red">
                @error('images')
                {{ $message }}
                @enderror
            </span>
            <br />
            <button>submit</button>
        </form>
    </body>
</html>
