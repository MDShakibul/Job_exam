@extends('admin.admin_layout')
@section('title', 'Comment')
@section('admin_content')

    @foreach (['danger', 'warning', 'success', 'info'] as $msg)
    @if(Session::has('alert-' . $msg))
    <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
    @endif
    @endforeach


    <form action="{{URL::to('/admin_update_password/'.Session::get('admin_id') ) }}" method="post" style="height: 513px; width: 586px;">
        @csrf

        <h2>Change Password</h2>

        <label>Old Password</label>
        <input type="password" name="admin_old_password" placeholder="Old Password" required />
        <br />

        <label>New Password</label>
        <input type="password" name="admin_new_password" placeholder="New Password" required />
        <br />

        <label>Confirm New Password</label>
        <input type="password" name="admin_confirm_password" placeholder="Confirm New Password" required />
        <br />

        <button type="submit" class="btn btn-success">CHANGE</button>
    </form>

    @endsection
