@extends('admin.admin_layout')
@section('title', 'Setting')

<style>
 /* #center{
        margin: auto;
        width: 50%;
        box-shadow: 5px 5px 15px lightgrey;
        padding: 10px;
    }*/
    .btn{
        margin-top: 20px;
    margin-left: 487px;
    }

    #card_center{

margin: auto;
width: 50%;
border-radius: 10px;
height: 50px;
}

#myAreaChart{
    height: 0rem;
}

.chart-area {
  position: relative;
  height: 20rem;
  width: 50%;
}


</style>
@section('admin_content')

    @foreach (['danger', 'warning', 'success', 'info'] as $msg)
    @if(Session::has('alert-' . $msg))
    <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
    @endif
    @endforeach


    {{-- <div id="center">

        <form action="{{URL::to('/admin_update_password/'.Session::get('admin_id') ) }}" method="post" style="height: 300px; width: 586px;">
            @csrf

            <h2 style="display: flex; justify-content: center;">Change Password</h2>
            <div style=" margin-left: 126px; margin-top: 50px;">

                <label>Old Password:</label>
            <input type="password" name="admin_old_password" placeholder="Old Password" style="margin-left: 66px" required />
            <br />

            <label>New Password:</label>
            <input type="password" name="admin_new_password" placeholder="New Password" style="margin-left: 60px;" required />
            <br />

            <label>Confirm New Password:</label>
            <input type="password" name="admin_confirm_password" placeholder="Confirm New Password" required />
            <br />


            </div>



            <button type="submit" class="btn btn-success">CHANGE</button>
        </form>

    </div>
 --}}


 <div id="card_center">

    <div class="card shadow mb-4" style="height: 300px;">
        <!-- Card Header - Dropdown -->
        <div
            class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Change Password</h6>

        </div>
        <!-- Card Body -->
        <div class="card-body">
            <div class="chart-area">
                <canvas id="myAreaChart"></canvas>
                <form action="{{URL::to('/admin_update_password/'.Session::get('admin_id') ) }}" method="post" style="height: 300px; width: 586px;">
                    @csrf

                    <div style=" margin-left: 87px; margin-top: 38px;">

                        <label>Old Password:</label>
                    <input type="password" name="admin_old_password" placeholder="Old Password" style="margin-left: 66px; width: 276px; border-radius: 15px;" required />
                    <br />

                    <label>New Password:</label>
                    <input type="password" name="admin_new_password" placeholder="New Password" style="margin-left: 60px; width: 276px; border-radius: 15px;" required />
                    <br />

                    <label>Confirm New Password:</label>
                    <input type="password" name="admin_confirm_password" style="width: 276px; border-radius: 15px;"  placeholder="Confirm New Password" required />
                    <br />


                    </div>



                    <button type="submit" class="btn btn-success">CHANGE</button>
                </form>
            </div>
        </div>
    </div>

</div>



    @endsection
