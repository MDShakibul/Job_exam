<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Comment</title>
    <link href="{{asset('frontend/css/main.css')}}" rel="stylesheet">
    <link href="{{asset('frontend/css/responsive.css')}}" rel="stylesheet">
    <link href="{{asset('frontend/css/style.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

</head>

<body>
    @if(Session::has('message'))
    <h3 class="alert alert-success">{{ Session::get('message') }}</h3>
    @endif

    <form action="{{URL::to('/comments')}}" method="post" enctype="multipart/form-data">
        @csrf
        <h2>Please Type Your Opinion(User)</h2>

        <label>Comment:</label>
        <textarea class=" comment" name="comment_description" rows="4" cols="50" required>
        </textarea>

        <label>Image Comment:</label>
        <input class="image" name="comment_file" type="file" accept='image/jpeg , image/jpg, image/gif, image/png' /><br /><br />

        <input type="hidden" class="input" name="comment_to" value="{{$id}}" />
        <input type="hidden" class="input" name="comment_by" value="{{$id}}" />



        <button type="submit">Done</button>
        <!-- <button type="submit">Back</button> -->
    </form>
    <a href="{{ url('/show_comment/'. $id ) }}"><button>Comments</button></a>

</body>

</html>