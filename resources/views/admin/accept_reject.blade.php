@extends('admin.admin_layout')
@section('title', 'All Application')
@section('admin_content')

@foreach (['danger', 'warning', 'success', 'info'] as $msg)
@if(Session::has('alert-' . $msg))
<p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
@endif
@endforeach

<h2>All User</h2>
<table class="styled-table">
    <thead>
        <tr>
            <th>Applicant Name</th>
            <th>Applicant Email</th>
            <th>Status</th>
            <th>Acction</th>
        </tr>
    </thead>
    @foreach($applicant_list as $list)
    <tbody>
        <tr>
            <td>{{$list->name}}</td>
            <td>{{$list->email}}</td>
            <td>
                @if ($list->is_verified == '1')
                <span>Active</span>
                @else
                <span>Inactive</span>
                @endif
            </td>


            <td class="center">
                @if($list->is_verified == '1')

                <a class="btn btn-danger" href="{{URL::to('/block/'.$list-> id)}}">
                    <i>Reject</i>
                </a>
                @else
                <a class="btn btn-success" href="{{URL::to('/ok/'.$list-> id)}}">
                    <i>Accept</i>
                </a>
                @endif

                </a>
            </td>


        </tr>
    </tbody>
    @endforeach
</table>


@endsection