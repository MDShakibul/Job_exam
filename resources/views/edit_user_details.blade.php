@extends('main')
@section('title','Home')
@section('content')





@if(Session::has('message'))
<h3 class="alert alert-success">{{ Session::get('message') }}</h3>
@endif



<form action="{{URL::to('/update_user_details/'.$app_info->id)}}" method="post" enctype="multipart/form-data">
    @csrf

    <h2>Please Fill Up The Form</h2>

    <div>
        <label>Application Type:</label>
        <!-- <input type="text" class="input" name="application_type" placeholder="Application Type" required /><br /><br /> -->
        <select name="application_type" class="applicationname" id="app_id">
            @foreach($app_list as $list)
            <option value="{{ $list->id }}"> {{ $list->application_type  }}</option>
            @endforeach

        </select><br /><br />
    </div>
    <label>Application Price:</label>
    <input type="text" class="app_price" name="application_price" value="{{$app_info->application_price}}" required readonly />

    <!-- <label>Application Number:</label> -->
    <input type="hidden" class="input" name="application_number" /><br /><br />

    <input type="hidden" class="input" name="user_id" value={{Session::get('user_id')}} />
    <label>Father Name:</label>
    <input type="text" class="input" name="father_name" value="{{$app_info->father_name}}" required /><br /><br />

    <label>Mother Name:</label>
    <input type="text" class="input" name="mother_name" value="{{$app_info->mother_name}}" required /><br /><br />

    <label>The Amount of Land:</label>
    <input type=" text" class="input" name="amount_land" value="{{$app_info->amount_land}}" required /><br /><br />

    <label>NID Number:</label>
    <input type="text" class="input" name="nid_number" value="{{$app_info->nid_number}}" required /><br /><br />

    <label>Select Land Image:</label>
    <input class="image" name="image" type="file" accept='image/jpeg , image/jpg, image/gif, image/png' value="{{$app_info->image}}" required /><br /><br />

    <label>Select Land Documnet(Only PDF):</label>
    <input class="pdf" name="pdf" type="file" accept="application/pdf" value="{{$app_info->pdf}}" required /><br /><br />


    <label>Any Other Files:</label>
    <input class="pdf" name="file[]" type="file" value="{{$app_info->image}}" multiple /><br /><br />


    <label>Mobile Number:</label>
    <input type="text" class="input" name="mobile_number" pattern="[0-1]{2}[3-9]{1}[0-9]{8}" value="{{$app_info->mobile_number}}" required /><br /><br />

    <label>Description:</label>
    <textarea class=" discription" name="description" rows="4" cols="50">{{$app_info->description}}
    </textarea>


    <button type="submit">Update</button>
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
</script>
@endsection