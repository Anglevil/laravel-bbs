<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Demo</title>

    </head>
    <body>
        <form action="{{ url('/common/upload') }}?field=avatar" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            <input type="file" name="file"><button type="submit">上传</button>
        </form>
    </body>
</html>
