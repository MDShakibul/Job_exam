@extends('admin.admin_layout')
@section('title', 'Add Application')
<style>

#myAreaChart{
    height: 0rem;
}

.chart-area {
  position: flex;
  height: 10rem;
  width: 50%;
}
#workflow_form {
        width: 600px;
        min-height: 165px;
    }

    #card_center{

        margin: auto;
        width: 50%;
        border-radius: 10px;
        height: 25px;
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

@foreach (['danger', 'warning', 'success', 'info'] as $msg)
@if(Session::has('alert-' . $msg))
<p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
@endif
@endforeach


{{-- <div id="center">
    <h2 style="display: flex;
    justify-content: center;">Insert New Application</h2><br>

<form action="{{URL::to('/application_add')}}" method="post"" enctype="multipart/form-data" id="workflow_form">
    @csrf
    <table id="dynamicTable">
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
                    <input type="text" id="application_type" name="application_type" placeholder="application type" required /> </td>

                <td> <input type="text" id="application_price" name="application_price" placeholder="application price" required /></td>


                <td><button type="Submit"  class="btn btn-success" id="add_btn">ADD</button><br></td>
            </tr>

        </div>

    </table>

</form>


</div> --}}

<div id="card_center">

    <div class="card shadow mb-4" style="height: 174px;">
        <!-- Card Header - Dropdown -->
        <div
            class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Insert New Application</h6>

        </div>
        <!-- Card Body -->
        <div class="card-body">
            <div class="chart-area">
                <canvas id="myAreaChart"></canvas>
                <form action="{{URL::to('/application_add')}}" method="post"" enctype="multipart/form-data" id="workflow_form">
                    @csrf
                    <table id="dynamicTable">
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
                                    <input type="text" style="border-radius: 40px 20px;" id="application_type" name="application_type" placeholder="application type" required /> </td>

                                <td> <input type="text" style="border-radius: 40px 20px;" id="application_price" name="application_price" placeholder="application price" required /></td>


                                <td><button type="Submit"  class="btn btn-success" id="add_btn">ADD</button><br></td>
                            </tr>

                        </div>

                    </table>

                </form>
            </div>
        </div>
    </div>

</div>



@endsection


