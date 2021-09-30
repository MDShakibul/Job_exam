@extends('admin.admin_layout')
@section('title', 'Add Application')
<style>

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
    #add_btn {
        margin-left: 5px;
    }

    #application_price{
 width: 325px;
    margin-left: 10px;
    }
</style>
@section('admin_content')

{{-- <div id="center">
    <form action="{{URL::to('/update_app/'.$app_info->id)}}" method="post">
        @csrf
        <h2>Inser New Application</h2>
        <label class="mobile_number_lavel">Application Type</label>
        <input type="text" id="application_type" name="application_type" value="{{$app_info->application_type}}" />

        <label class="mobile_number_lavel">Application Price:</label>
        <input type="text" id="application_price" name="application_price" value="{{$app_info -> application_price}}" />



        <button type="submit" class="btn btn-success" style="margin-top: 10px;">Update</button>
    </form>


</div> --}}


{{-- <div id="center">
    <h2 style="display: flex;
    justify-content: center;">Insert New Application</h2><br>

<form action="{{URL::to('/update_app/'.$app_info->id)}}" method="post">
    @csrf
    <table >
        <tr>
            <th>
                New Application
            </th>
            <th>
                Application Price
            </th>

        </tr>

        <div class="center">

            <tr>
                <td>
                    <input type="text" style="border-radius: 40px 20px;" id="application_type" name="application_type" value="{{$app_info->application_type}}" />
                <td>     <input type="text" style="border-radius: 40px 20px;" id="application_price" name="application_price" value="{{$app_info -> application_price}}" />

                <td> <button type="submit" class="btn btn-success">Update</button><br></td>
            </tr>

        </div>

    </table>

</form>


</div> --}}

<div id="card_center">

    <div class="card shadow mb-4" style="height: 175px;">
        <!-- Card Header - Dropdown -->
        <div
            class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Update Application</h6>

        </div>
        <!-- Card Body -->
        <div class="card-body">
            <div class="chart-area">
                <canvas id="myAreaChart"></canvas>
                <form action="{{URL::to('/update_app/'.$app_info->id)}}" method="post">
                    @csrf
                    <table >
                        <tr>
                            <th>
                                New Application
                            </th>
                            <th>
                                Application Price
                            </th>

                        </tr>

                        <div class="center">

                            <tr>
                                <td>
                                    <input type="text" style="border-radius: 40px 20px;" id="application_type" name="application_type" value="{{$app_info->application_type}}" />
                                <td>     <input type="text" style="border-radius: 40px 20px;" id="application_price" name="application_price" value="{{$app_info -> application_price}}" />

                                <td> <button type="submit" class="btn btn-success">Update</button><br></td>
                            </tr>

                        </div>

                    </table>

                </form>
            </div>
        </div>
    </div>

</div>


@endsection
