@extends('admin.admin_layout')
@section('title', 'Add Application')
@section('admin_content')

@foreach (['danger', 'warning', 'success', 'info'] as $msg)
@if(Session::has('alert-' . $msg))
<p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
@endif
@endforeach

<form action="{{URL::to('/application_add')}}" method="post">
    @csrf
    <h2>Insert New Application</h2>
    <label class="mobile_number_lavel">Application Type</label>
    <input type="text" id="application_type" name="application_type" placeholder="Application Type" required />

    <label class="mobile_number_lavel">Application Price:</label>
    <input type="text" id="application_price" name="application_price" placeholder="Application Price" required />



    <button type="submit">ADD</button>
</form>
@endsection