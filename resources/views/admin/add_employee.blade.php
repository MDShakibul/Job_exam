@extends('admin.admin_layout')
@section('title', 'Add Application')
@section('admin_content')

@foreach (['danger', 'warning', 'success', 'info'] as $msg)
@if(Session::has('alert-' . $msg))
<p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
@endif
@endforeach

<form action="{{URL::to('/employee_add')}}" method="post">
    @csrf
    <h2>Join New Employee</h2>
    <div>
        <label>Position Type:</label>
        <!-- <input type="text" class="input" name="application_type" placeholder="Application Type" required /><br /><br /> -->
        <select name="position_type" class="positionname" id="posi_id">
            @foreach($posi_list as $list)
            <option value="{{ $list->id }}"> {{ $list-> position_type  }}</option>
            @endforeach

        </select><br /><br />
    </div>
    <label>Employee Name</label>
    <input type="text" class="employee_name" name="employee_name" placeholder="Employee Name" required />



    <button type="submit">ADD</button>
</form>
@endsection