@extends('main')
@section('title','Home')
@section('content')


@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif


<form action="{{URL::to('/user_details')}}" method="post" enctype="multipart/form-data" style="margin-top: 30px;">
    @csrf

    <h2>Please Fill Up The Form</h2>

    <div>
        <label>Application Type:</label>
        <!-- <input type="text" class="input" name="application_type" placeholder="Application Type" required /><br /><br /> -->
        <select name="application_type" class="applicationname" id="app_id">
            <option >Select application type</option>
            @foreach($app_list as $list)
            <option value="{{ $list->id }}"> {{ $list->application_type  }}</option>
            @endforeach

        </select><br /><br />
    </div>
    <label>Application Price:</label>
    <input type="text" class="app_price" name="application_price" readonly />

    <!-- <label>Application Number:</label> -->
    <!-- <label>Aoolication Random Number</label> -->
    <input type="hidden" class="input" name="application_number" /><br /><br />
    <!-- <label>User Id:</label> -->
    <input type="hidden" class="input" name="user_id" value={{Session::get('user_id')}} />
    <label>Father Name:</label>
    <input type="text" class="input" name="father_name" placeholder="Father Name" /><br /><br />

    <label>Mother Name:</label>
    <input type="text" class="input" name="mother_name" placeholder="Mother Name" /><br /><br />

    <label>The Amount of Land:</label>
    <input type=" text" class="input" name="amount_land" placeholder="The Amount of Land" /><br /><br />

    <label>NID Number:</label>
    <input type="text" class="input" name="nid_number" placeholder="NID Number" /><br /><br />

    <table>
        <thead>
            <tr>
                <th>
                    Land Image
                </th>
                <th>
                    Action
                </th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td> <input class="image" name="image[]" type="file" accept='image/jpeg , image/jpg, image/gif, image/png' /></td>
                <td><button type="button" class="btn btn-success" id="add_btn"><i class="glyphicon glyphicon-plus "></i>ADD</button></td>
            </tr>
        </tbody>
    </table><br>

    <label>Select Land Documnet(Only PDF):</label>
    <input class="pdf" name="pdf" type="file" accept="application/pdf" /><br /><br />

    <label>Any Other Files:</label>
    <input class="pdf" name="file[]" type="file" multiple /><br /><br />

    <label>Mobile Number:</label>
    <input type="text" class="input" name="mobile_number" placeholder="Mobile Number" pattern="[0-1]{2}[3-9]{1}[0-9]{8}" /><br /><br />

    <label>Description:</label>
    <textarea class=" discription" name="description" rows="4" cols="50">
        </textarea>


    <button type="submit">Save with Payment</button>
</form>






@endsection
@section('script')

<script type="text/javascript">
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

    $(document).ready(function() {
        $('#add_btn').on('click', function() {
            /* alert('hi'); */
            var html = '';
            html += '<tr>';
            html += '<td> <input class="image" name="image[]" type="file" accept="image/jpeg , image/jpg, image/gif, image/png"/></td>';
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
