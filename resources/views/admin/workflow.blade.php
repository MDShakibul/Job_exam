@extends('admin.admin_layout')
@section('title', 'All Application')
@section('admin_content')
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
        <td><select name="position_type" class="positionname" id="posi_id">
                @foreach($posi_list as $list)
                <option value="{{ $list->id }}"> {{ $list-> position_type  }}</option>
                @endforeach

            </select></td>
        <td><input type="text" class="input" name="name[]" placeholder="Enter name" /></td>
        <td><button type="button" class="btn btn-success" id="add_btn"><i class="glyphicon glyphicon-plus "></i>ADD</button></td>
    </tr>
</table><br>







@endsection
@section('script')

<script type="text/javascript">
    $(document).ready(function() {
        $('#add_btn').on('click', function() {
            /* alert('hi'); */
            var html = '';
            html += '<tr>';
            html += '<td> <input type="text" class="input" name="position" placeholder="Enter position name"</td>';
            html += '<td> <input type="text" class="input" name="name[]" placeholder="Enter name" /></td>';
            html += '<td><button type="button" class="btn btn-danger" id="remove"><i class="glyphicon glyphicon-remove"></i>Delete</button></td>';
            html += '</tr>';

            $('#dynamicTable').append(html);

        });

    });

    $(document).on('click', '#remove', function() {

        $(this).closest('tr').remove();
    });
</script>


@endsection