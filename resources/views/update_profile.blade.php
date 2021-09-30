@extends('main')
@section('title', 'Setting')
<style>
    #center{
           margin: auto;
           width: 50%;
           box-shadow: 5px 5px 15px lightgrey;
           padding: 10px;
       }
       .btn{
           margin-left: 400px;
       margin-top: 20px;
       }

   </style>
@section('content')

@foreach (['danger', 'warning', 'success', 'info'] as $msg)
@if(Session::has('alert-' . $msg))
<p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
@endif
@endforeach

<div id="center">

    <form action="{{URL::to('/update_password')}}" method="post" style="height: 300px; width: 586px;">
        @csrf
        <h1 style="display: flex; justify-content: center;
        margin-left: 100px;">Change Password</h1>
            <div style=" margin-left: 126px; margin-top: 50px;">

        <label>Old Password:</label>
        <input type="password" name="old_password" style="margin-left: 87px; width: 220px; border-radius: 15px;" placeholder="old Password" required />
        <br />

        <label>New Password:</label>
        <input type="password" name="new_password" style="margin-left: 78px; width: 220px; border-radius: 15px;" placeholder="new Password" required />
        <br />

        <label>Confirm New Password:</label>
        <input type="password" name="confirm_password" style="width: 220px; border-radius: 15px;"  placeholder="confirm New Password" required />
        <br />

            </div>
            <div>
                <button type="submit" class="btn btn-success">CHANGE</button>
            </div>


    </form>

</div>





@endsection
