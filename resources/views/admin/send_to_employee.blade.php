@extends('admin.admin_layout')
@section('title', 'All Application')
@section('admin_content')
<form action="{{URL::to('/send_file')}}" method="post" enctype="multipart/form-data">
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
            <td><select name="position_type" class="positionname" id="positionname">
                    @foreach($posi_list as $list)
                    <option value=" {{ $list->id }}"> {{ $list-> position_type  }}</option>
                    @endforeach
                </select></td>

            <td><select id="name" class="name" name="name" style="width: 200px; ">
                    <option></option>
                </select></td>
        </tr>
    </table><br>



    <h2>Check The Form</h2>


    <div>
        <label>Application Type:</label>

        <!-- <input type="text" class="input" name="application_type" placeholder="Application Type" required /><br /><br /> -->
        <select name="application_type" class="applicationname" id="app_id">
            @foreach($app_list as $list)
            <option readonly value="{{ $list->id }}"> {{ $list->application_type  }}</option>
            @endforeach

        </select><br /><br />
    </div>
    <label>Application Price:</label>
    <input type="text" class="app_price" name="application_price" value="{{$app_info->application_price}}" required readonly />

    <!-- <label>Application Number:</label> -->

    <label>Father Name:</label>
    <input type="text" class="input" name="father_name" value="{{$app_info->father_name}}" required />

    <label>Mother Name:</label>
    <input type="text" class="input" name="mother_name" value="{{$app_info->mother_name}}" required />

    <label>The Amount of Land:</label>
    <input type=" text" class="input" name="amount_land" value="{{$app_info->amount_land}}" required />

    <label>NID Number:</label>
    <input type="text" class="input" name="nid_number" value="{{$app_info->nid_number}}" required />

    <input type="hidden" name="old_file" value="{{$app_info->pdf}}">

    <label>Select Land Documnet(Only PDF):</label>
    <input class="pdf" name="pdf" type="file" accept="application/pdf" />





    <label>Mobile Number:</label>
    <input type="text" class="input" name="mobile_number" pattern="[0-1]{2}[3-9]{1}[0-9]{8}" value="{{$app_info->mobile_number}}" required />

    <label>Description:</label>
    <textarea class=" discription" name="description" rows="4" cols="50">{{$app_info->description}}
    </textarea>

    <label>Comment:</label>
    <textarea class="comment" name="comment" rows="4" cols="50">
    </textarea>


    <button type="submit">send</button>
</form>







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
                    $.each(data, function(key, employee) {
                        $('#name').append(' <option value="' + employee.id + '">' + employee.employee_name + '</option>');
                    });
                }
            });
        });
    });
    $(document).ready(() => {
        $("#positionname")
    });


    $(document).ready(function() {

        $(document).on('change', '.applicationname', function() {
            var app_id = $(this).val();
            var a = $(this).parent().parent();
            // console.log(app_id);
            $.ajax({
                type: 'get',
                url: '{!! URL::to("/application_price")!!}',
                data: {
                    'id': app_id
                },
                dataType: 'json',
                success: function(data) {
                    /* console.log("application_price");
                    console.log(data.application_price); */
                    a.find('.app_price').val(data.application_price);
                },
                error: function() {

                }
            });


        });

    });
</script>


@endsection