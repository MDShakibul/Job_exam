@extends('admin.admin_layout')
@section('title', 'All Application')
<style>
    #workflow_form {
        width: 600px;
        min-height: 165px;
    }

    #add_btn {
        margin-left: 5px;
    }
</style>
@section('admin_content')

@foreach (['danger', 'warning', 'success', 'info'] as $msg)
@if(Session::has('alert-' . $msg))
<p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
@endif
@endforeach

<h2>Creat Workflow</h2><br>

<form action="{{URL::to('/work_flow')}}" method="post" enctype="multipart/form-data" id="workflow_form">
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
            <td>
                <input type="text" class="position_name" name="position_name0[]" id="position_name" style="width: 110px; margin: 10px;" />
            </td>

            <td><select name="employee_name0[]" class="employee_name" id="employee_name" multiple="multiple" style="width: 350px; height:110px;">

                    @foreach($emp_name as $list)

                    <option value="{{ $list->id }}"> {{ $list->employee_name  }}</option>
                    @endforeach

                </select>

            <td><button type="button" class="btn btn-success" id="add_btn"><i class="glyphicon glyphicon-plus "></i>ADD</button><br></td>
        </tr>
    </table>
    <button type="submit" class="btn btn-success">Save</button>
</form>

@endsection
@section('script')

<script type="text/javascript">
    var id = 0;
    $(document).ready(function() {

        $('#add_btn').on('click', function() {
            id++;
            var html = '<tr>' +
                '<td>' +
                '<input type="text" class="position_name' + id + '" name="position_name' + id + '[]" id="position_name' + id + '" />' +
                '</td>' +
                '<td><select name="employee_name' + id + '[]" class="employee_name' + id + '" id="employee_name' + id + ' "multiple="multiple" " style="width: 350px; ">' +
                '@foreach($emp_name as $list)' +
                '<option value="{{ $list->id }}"> {{ $list->employee_name  }}</option>' +
                ' @endforeach' +
                '</select>' +
                '<td><button type="button" class="btn btn-danger" id="remove"><i class="glyphicon glyphicon-plus "></i>Delete</button><br></td>' +
                '<tr>'

            $('#dynamicTable').append(html);

            $(".employee_name" + id).chosen();
        });


    });

    $(document).on('click', '#remove', function() {
        $(this).closest('tr').remove();
    });

    $(document).ready(function() {
        $(".employee_name").chosen();
    });
</script>


@endsection