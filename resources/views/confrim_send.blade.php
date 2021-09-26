@extends('admin.admin_layout')
@section('title', 'All Application')

@section('admin_content')


@foreach (['danger', 'warning', 'success', 'info'] as $msg)
@if(Session::has('alert-' . $msg))
<p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
@endif
@endforeach

<h2><strong>Please select which person needs to send</strong></h2><br>

<form action="{{URL::to('/send_next_file')}}" method="post">
    @csrf
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