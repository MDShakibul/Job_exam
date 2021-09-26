@extends('main')
@section('title', 'Setting')
@section('content')
@if(Session::has('message'))
<h3 class="alert alert-success">{{ Session::get('message') }}</h3>
@endif

<form action="{{URL::to('/comments')}}" method="post" enctype="multipart/form-data" style="margin: 30px;">
    @csrf
    <h2>Please Type Your Opinion(User)</h2>

    <label>Comment:</label>
    <textarea class=" comment" name="comment_description" rows="4" cols="50" required>
        </textarea>

    <label>Image Comment:</label>
    <input class="image" name="comment_file" type="file" accept='image/jpeg , image/jpg, image/gif, image/png' /><br /><br />

    <input type="hidden" class="input" name="comment_to" value="{{$id}}" />
    <input type="hidden" class="input" name="comment_by" value="{{$id}}" />



    <button class="btn btn-success" style=" padding: 10px;" type="submit">Done</button>
    <!-- <button type="submit">Back</button> -->
</form>
<div>
<a href="{{ url('/show_comment/'. $id ) }}"><button class="btn btn-success" style="margin-left: 579px; margin-top: -10px;
    padding: 10px;">Comments</button></a>
</div>


@endsection