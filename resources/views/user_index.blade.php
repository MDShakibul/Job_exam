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
<h1 style="display: flex;
justify-content: center;">Please Fill Up The Form</h1>

<form action="{{URL::to('/user_details')}}" method="post" enctype="multipart/form-data" style="margin-top: 20px;
height: 1650px; " id="form">
    @csrf



    <div>
        <label>Application Type:</label>
        <!-- <input type="text" class="input" name="application_type" placeholder="Application Type" required /><br /><br /> -->
        <select name="application_type" class="applicationname" id="app_id">
            <option >Select application type</option>
            @foreach($app_list as $list)
            <option value="{{ $list->id }}"> {{ $list->application_type  }}</option>
            @endforeach

        </select><br />    </div>
    <label>Application Price:</label>
    <input type="text" id="input" class="app_price" name="application_price" readonly />

    <input type="hidden" class="input" name="application_number" /><br />    <!-- <label>User Id:</label> -->
    <input type="hidden" class="input" name="user_id" value={{Session::get('user_id')}} />
    <label>Father Name:</label>
    <input type="text" id="input" class="input" name="father_name" placeholder="Father Name" /><br />
    <label>Mother Name:</label>
    <input type="text" id="input" class="input" name="mother_name" placeholder="Mother Name" /><br />
    <label>The Amount of Land:</label>
    <input type=" text" id="input" class="input" name="amount_land" placeholder="The Amount of Land" /><br />
    <label>NID Number:</label>
    <input type="text" id="input" class="input" name="nid_number" placeholder="NID Number" /><br />

    <table>
        <thead>
            <tr>
                <th class="lbl">
                    Land Image
                </th>
                <th class="lbl">
                </th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td> <input id="input" class="image" style="width: 550px; margin-left: 10px;" name="image[]" type="file" accept='image/jpeg , image/jpg, image/gif, image/png' /></td>
                <td><button type="button" class="btn btn-success" id="add_btn"><i class="glyphicon glyphicon-plus "></i>ADD</button></td>
            </tr>
        </tbody>
    </table><br>

    <label>Select Land Documnet(Only PDF):</label>
    <input id="input" class="pdf" name="pdf" type="file" accept="application/pdf" /><br />

    <label>Any Other Files:</label>
    <input id="input" class="pdf" name="file[]" type="file" multiple /><br />

    <label>Mobile Number:</label>
    <input type="text"id="input"  class="input" name="mobile_number" placeholder="Mobile Number" pattern="[0-1]{2}[3-9]{1}[0-9]{8}" /><br />

    <label>Description:</label>
    <textarea id="input" class=" discription" name="description" rows="4" cols="50">
        </textarea>


    <button type="submit" style="margin-top: 20px;">Save with Payment</button>
</form>






@endsection
@section('script')

<script type="text/javascript">
    $(document).ready(function() {

        $(document).on('change', '.applicationname', function() {
            var app_id = $(this).val();
            var a = $(this).parent().parent();
             console.log(app_id);
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
            html += '<td> <input id="input" class="image" style="width: 550px; margin-left: 10px;" name="image[]" type="file" accept="image/jpeg , image/jpg, image/gif, image/png" /></td>';
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
