@extends('main')
@section('title', 'Setting')
@section('content')

@foreach (['danger', 'warning', 'success', 'info'] as $msg)
@if(Session::has('alert-' . $msg))
<p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
@endif
@endforeach


<form action="{{URL::to('/update_password')}}" method="post" style="margin-top: 35px;">
    @csrf
    <h2>Change Password</h2>

    <label>Old Password</label>
    <input type="password" name="old_password" placeholder="Old Password" required />
    <br />

    <label>New Password</label>
    <input type="password" name="new_password" placeholder="New Password" required />
    <br />

    <label>Confirm New Password</label>
    <input type="password" name="confirm_password" placeholder="Confirm New Password" required />
    <br />

    <button type="submit">CHANGE</button>
</form>


@endsection