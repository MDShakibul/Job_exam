@extends('admin.admin_layout')
@section('title', 'All Application')
<style>
    #center{
        margin: auto;
        width: 40%;
        padding: 10px;
    }

    #head{
        display: flex;
        justify-content: center;
        margin-right: 40px;
    }

    table tr:first-child th:first-child {
        border-top-left-radius: 6px;
    }

    table tr:first-child th:last-child {
        border-top-right-radius: 6px;
    }

    table tr:last-child td:first-child {
        border-bottom-left-radius: 6px;
    }

    table tr:last-child td:last-child {
        border-bottom-right-radius: 6px;
    }
</style>

@section('admin_content')

@foreach (['danger', 'warning', 'success', 'info'] as $msg)
@if(Session::has('alert-' . $msg))
<p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
@endif
@endforeach

<div class="table-responsive">

    <div id="center">

        <h2 style="display: flex;
        justify-content: center; margin-right: 40px;">All User</h2>
    <table class="styled-table">
        <thead>
            <tr>
                <th>Applicant Name</th>
                <th>Applicant Email</th>
                <th>Status</th>
                <th>Acction</th>
            </tr>
        </thead>
        <tbody>
            @foreach($applicant_list as $list)
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
            @endforeach
        </tbody>
    </table>

    </div>

</div>






@endsection
