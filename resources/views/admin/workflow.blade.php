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
        <td><select name="position_type" class="positionname" id="positionname">
                @foreach($posi_list as $list)
                <option value=" {{ $list->id }}"> {{ $list-> position_type  }}</option>
                @endforeach
            </select></td>

        <td><select id="name" class="name" name="name[]" multiple="multiple" style="width: 500px; ">
                <option></option>
            </select></td>

        <td><button type="button" class="btn btn-success" id="add_btn"><i class="glyphicon glyphicon-plus "></i>ADD</button><br></td>
    </tr>
</table><br>







@endsection
@section('script')

<script type="text/javascript">
    var id = 0;
    $(document).ready(function() {
        $('#add_btn').on('click', function() {
            id++;
            var html = '<tr>' +
                '<td><select name="position_type" class="positionname" id="positionname' + id + '">' +
                '@foreach($posi_list as $list)' +
                '<option value=" {{ $list->id }}"> {{ $list-> position_type  }}</option>' +
                '@endforeach' +
                '</select></td>' +
                '<td><select id="name' + id + '" class="name" name="name[]" multiple="multiple" style="width: 500px;">' +
                '<option></option>' +
                '</select></td>' +
                '<td>' +
                '<td><button type="button" class="btn btn-danger" id="remove"><i class="glyphicon glyphicon-plus "></i>Delete</button></td>' +
                '</tr>'

            $('#dynamicTable').append(html);


            $('#positionname' + id).select2();
            $('#name' + id).select2();

        });

    });



    $(document).ready(function() {
        $('.positionname').change(function() {
            var id = $('.positionname').val();
            $('.name').html('');
            $.ajax({
                type: 'get',
                url: '{{ url("/getemployee")}}' + '/' + id,
                data: {
                    id: id
                },
                dataType: "json",
                success: function(data) {
                    $.each(data, function(key, employee) {
                        $('.name').append(' <option value="' + employee.id + '">' + employee.employee_name + '</option>');
                    });
                }
            });
        });
    });



    $(document).ready(() => {
        $("#positionname")
    });




    $(document).on('click', '#remove', function() {

        $(this).closest('tr').remove();
    });
    $(document).ready(function() {
        $('#name').select2();
    });



    $(document).ready(function() {
        $('.positionname').select2();
    });
</script>


@endsection