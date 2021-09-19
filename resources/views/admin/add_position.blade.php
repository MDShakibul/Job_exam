@extends('admin.admin_layout')
@section('title', 'Add Application')
@section('admin_content')

@foreach (['danger', 'warning', 'success', 'info'] as $msg)
@if(Session::has('alert-' . $msg))
<p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
@endif
@endforeach

<form action="{{URL::to('/position_add')}}" method="post">
    @csrf
    <h2>Add New Position</h2>
    <label >Position Type</label>
    <input type="text" id="position_type" name="position_type" placeholder="Position Type" required />



    <button type="submit">ADD</button>
</form>
@endsection