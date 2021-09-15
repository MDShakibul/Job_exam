<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Setting</title>
    <link href="{{asset('frontend/css/main.css')}}" rel="stylesheet">
    <link href="{{asset('frontend/css/responsive.css')}}" rel="stylesheet">
    <link href="{{asset('frontend/css/style.css')}}" rel="stylesheet">

</head>

<body>

    @foreach (['danger', 'warning', 'success', 'info'] as $msg)
    @if(Session::has('alert-' . $msg))
    <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
    @endif
    @endforeach


    <form action="{{URL::to('/admin_update_password/'.Session::get('admin_id') ) }}" method="post">
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

        <button type="submit">CHANGE</button>
    </form>
</body>

</html>