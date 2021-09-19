@extends('admin.admin_layout')
@section('title', 'All Application')
@section('admin_content')
<table>
    <thead>
        <tr>
            <th>
                Positon
            </th>
            <th>
                Name
            </th>

        </tr>
    </thead>
    <tbody>
        <tr>
            <td><input type="text" class="input" name="position" placeholder="Enter position name" /></td>
            <td><input type="text" class="input" name="name[]" placeholder="Enter name" /></td>
            <td><button type="button" class="btn btn-success" id="add_btn"><i class="glyphicon glyphicon-plus "></i>ADD</button></td>
        </tr>
    </tbody>
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

            $('tbody').append(html);

        });

    });

    $(document).on('click', '#remove', function() {

        $(this).closest('tr').remove();
    });
</script>


@endsection