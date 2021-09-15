@extends('admin.admin_layout')
@section('title', 'Add Application')
@section('admin_content')

<form action="{{URL::to('/update_app/'.$app_info->id)}}" method="post">
    @csrf
    <h2>Inser New Application</h2>
    <label class="mobile_number_lavel">Application Type</label>
    <input type="text" id="application_type" name="application_type" value="{{$app_info->application_type}}" />

    <label class="mobile_number_lavel">Application Price:</label>
    <input type="text" id="application_price" name="application_price" value="{{$app_info -> application_price}}" />



    <button type="submit">Update</button>
</form>
@endsection