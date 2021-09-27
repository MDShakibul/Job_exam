@extends('admin.admin_layout')
@section('title', 'Comment')
@section('admin_content')



@foreach (['danger', 'warning', 'success', 'info'] as $msg)
@if(Session::has('alert-' . $msg))
<p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
@endif
@endforeach



<form action="{{URL::to('/comments')}}" method="post" enctype="multipart/form-data" style="margin: 30px; width: 586px;">
    @csrf
    <h2>Please Type Your Opinion(Admin)</h2>

    <label>Comment:</label>
    <textarea class=" comment" name="comment_description" rows="4" cols="50" style=" width: 495px;" required>
        </textarea>

    <label>Image Comment:</label>
    <input class="image" name="comment_file" type="file" accept='image/jpeg , image/jpg, image/gif, image/png' /><br /><br />

    <input type="hidden" class="input" name="comment_to" value="{{$id}}" />
    <input type="hidden" class="input" name="comment_by" value="{{Session::get('admin_id')}}" />



    <button type="submit" class="btn btn-success" style=" padding: 10px; margin-top: -33px;">Done</button>
    <!-- <button type="submit">Back</button> -->
</form>

<div>
    <a href="{{ url('/show_comment/'. $id ) }}"><button class="btn btn-success" style="margin-left: 450px; margin-top: -10px;
    padding: 10px;">Comments</button></a>

</div>

@endsection
