@extends('admin.admin_layout')
@section('title', 'All Application')
@section('admin_content')


@foreach (['danger', 'warning', 'success', 'info'] as $msg)
@if(Session::has('alert-' . $msg))
<p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
@endif
@endforeach

<h2>View Workflow</h2>
<table class="styled-table">
    <thead>
        <tr>
            <th>Position Name</th>
            <th>Employee</th>
            <th>Action</th>
        </tr>
    </thead>
    @for($i=0; $i<count($b); $i++) 
    <tbody>

        <tr>

            <td>{{$b[$i]}}</td>

            <td>
                {{$a[$i]}}
            </td>

            <td>
                <a href="{{URL::to('/delete_work/'.$c[$i])}}">
                    <button type="button" class="btn btn-danger" style="margin: 5px;">Delete</button>
                </a>


                <a href="{{URL::to('/edit_work/'.$c[$i])}}">
                    <button type="button" class="btn btn-success" style="margin: 5px;">Edit</button>
                </a>



            </td>

        </tr>
        </tbody>
        @endfor
</table>
@endsection