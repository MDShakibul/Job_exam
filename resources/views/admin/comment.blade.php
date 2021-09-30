@extends('admin.admin_layout')
@section('title', 'Comment')
<style>

    #form{
        justify-content: center;
        display: flex;

    }





        #myAreaChart{
    height: 0rem;
}

.chart-area {
  position: relative;
  height: 20rem;
  width: 50%;
}


#card_center{

margin: auto;
width: 50%;
border-radius: 10px;
height: 50px;
}

    </style>
@section('admin_content')



@foreach (['danger', 'warning', 'success', 'info'] as $msg)
@if(Session::has('alert-' . $msg))
<p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
@endif
@endforeach

{{-- <div class="center">

    <form action="{{URL::to('/comments')}}" method="post" enctype="multipart/form-data" style="margin: 30px; width: 586px;">
        @csrf
        <h2 style="display: flex;
        justify-content: center;">Please Type Your Opinion(Admin)</h2>

        <label>Comment:</label>
        <textarea class=" form-control comment" name="comment_description" rows="4" cols="50" style=" width: 587px;" required>
            </textarea>

        <label style="margin-top: 20px;">Image Comment:</label>
        <input class="form-control image" name="comment_file" type="file" accept='image/jpeg , image/jpg, image/gif, image/png' /><br /><br />

        <input type="hidden" class="input" name="comment_to" value="{{$id}}" />
        <input type="hidden" class="input" name="comment_by" value="{{Session::get('admin_id')}}" />



        <button type="submit" class="btn btn-success" style=" padding: 10px; margin-top: -19px; margin-left: 490px;">Done</button>
        <!-- <button type="submit">Back</button> -->
    </form>

    <div>
        <a href="{{ url('/admin_show_comment/'. $id ) }}"><button class="btn btn-success" style="margin-left: 503px; margin-top: -10px;
        padding: 10px;">Comments</button></a>

    </div>

</div> --}}


<div id="card_center">

    <div class="card shadow mb-4" style="height: 500px;">
        <!-- Card Header - Dropdown -->
        <div
            class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Comments</h6>

        </div>
        <!-- Card Body -->
        <div class="card-body">
            <div class="chart-area">
                <canvas id="myAreaChart"></canvas>
                <form action="{{URL::to('/comments')}}" method="post" enctype="multipart/form-data" style="margin: 30px; width: 586px;">
                    @csrf

                    <label>Comment:</label>
                    <textarea class=" form-control comment" name="comment_description" rows="4" cols="50" style=" width: 587px; border-radius: 40px 20px;" required>
                        </textarea>

                    <label style="margin-top: 20px;">Image Comment:</label>
                    <input class="form-control image" name="comment_file" type="file" accept='image/jpeg , image/jpg, image/gif, image/png' /><br /><br />

                    <input type="hidden" class="input" name="comment_to" value="{{$id}}" />
                    <input type="hidden" class="input" name="comment_by" value="{{Session::get('admin_id')}}" />



                    <button type="submit" class="btn btn-success" style=" padding: 8px; margin-top: -19px; margin-left: 490px;">Done</button>
                    <!-- <button type="submit">Back</button> -->
                </form>

                <div>
                    <a href="{{ url('/admin_show_comment/'. $id ) }}"><button class="btn btn-success" style="margin-left: 10px; margin-top: -10px;
                    padding: 10px;">Comments</button></a>

                </div>
            </div>
        </div>
    </div>

</div>



@endsection
