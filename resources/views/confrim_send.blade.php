@extends('admin.admin_layout')
@section('title', 'Send File')

<style>

/* #form{
    justify-content: center;
    display: flex;

}

    .center{
        margin: auto;
        width: 50%;
        box-shadow: 5px 5px 15px lightgrey;
        padding: 10px;
        border-radius: 10px;
    } */

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
{{-- <div class="center">


    <h2><strong>Please select which person needs to send</strong></h2><br>


<form action="{{URL::to('/send_next_file')}}" method="post" id="form">
    @csrf

    <div>

        <table id="dynamicTable">
            <tr>
                <th>
                    Positon
                </th>
                <th>
                    Name
                </th>

            </tr>
            <tr>
                <input type="hidden" name="application_id" value="{{ $send_id }}">
                <td><select name="position_type" class="positionname" id="positionname">
                    <option>Select option</option>
                        @foreach($posi_list as $list)
                        <option value=" {{ $list->id }}"> {{ $list-> position_name  }}</option>
                        @endforeach
                    </select></td>

                <td><select id="name" class="name" name="name" style="width: 250px; margin: 10px;">
                        <option value=" {{ $list->id }}"></option>
                    </select></td>

                <td>
                    <button class="btn btn-success">Confrim</button>
                </td>
            </tr>

        </table><br>

    </div>
</form>

</div> --}}


<div id="card_center">

    <div class="card shadow mb-4" style="height: 175px;">
        <!-- Card Header - Dropdown -->
        <div
            class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Send File</h6>

        </div>
        <!-- Card Body -->
        <div class="card-body">
            <div class="chart-area">
                <canvas id="myAreaChart"></canvas>
                <form action="{{URL::to('/send_next_file')}}" method="post" id="form">
                    @csrf

                    <div>

                        <table id="dynamicTable">
                            <tr>
                                <th>
                                    Positon
                                </th>
                                <th>
                                    Name
                                </th>

                            </tr>
                            <tr>
                                <input type="hidden" name="application_id" value="{{ $send_id }}">
                                <td><select name="position_type" class="positionname" id="positionname" style="width: 200; margin-right:2px">
                                    <option>Select a option</option>
                                        @foreach($posi_list as $list)
                                        <option value=" {{ $list->id }}"> {{ $list-> position_name  }}</option>
                                        @endforeach
                                    </select></td>

                                <td><select id="name" class="name" name="name" style="width: 300px; margin-right: 10px;">
                                        <option value=" {{ $list->id }}"></option>
                                    </select></td>

                                <td>
                                    <button class="btn btn-success">Confrim</button>
                                </td>
                            </tr>

                        </table><br>

                    </div>
                </form>
            </div>
        </div>
    </div>

</div>


    @endsection
    @section('script')
    <script type="text/javascript">
        $(document).ready(function() {
            $('#positionname').change(function() {
                var id = $('#positionname').val();
                $('#name').html('');
                $.ajax({
                    type: 'get',
                    url: '{{ url("/getemployee")}}' + '/' + id,
                    data: {
                        id: id
                    },
                    dataType: "json",
                    success: function(data) {
                        $.each(data, function(key, employee_login) {
                            $('#name').append(' <option value="' + employee_login.id + '">' + employee_login.employee_name + '</option>');
                        });
                    }
                });
            });
        });
        $(document).ready(() => {
            $("#positionname")
        });
    </script>


    @endsection
