@extends('admin.admin_layout')
@section('title', 'Dashboard')
@section('admin_content')

@foreach (['danger', 'warning', 'success', 'info'] as $msg)
@if(Session::has('alert-' . $msg))
<p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
@endif
@endforeach

<h1 class="mt-4">All Users</h1>

<table class="styled-table">
    <thead>
        <tr>
            <th>Application Type</th>
            <th>Application Price</th>
            <th>Father Name</th>
            <th>Mother Name</th>
            <th>NID Number</th>
            <th>Amount Of Land</th>
            <th>Land Image</th>
            <th>Land Document</th>
            <th>Mobile Number</th>
            <th>Status</th>
            <th>Action</th>
            <th>Approval</th>
        </tr>
    </thead>
    @foreach($user_list as $list)
    <tbody>
        <tr>
            <td>{{$list->app_type}}</td>
            <td>{{$list->application_price}}</td>
            <td>{{$list->father_name}}</td>
            <td>{{$list->mother_name}}</td>
            <td>{{$list->nid_number}}</td>
            <td>{{$list->amount_land}}</td>
            <?php
            $Images = explode(',', $list->image);
            //print_r($allImages);
            ?>

            <td>
                @foreach($Images as $image)
                <div>
                    <img src="{{ asset($image) }}" style="height: 40px; width: 40px; margin-bottom: 2px;">
                </div>

                @endforeach
            </td>
            <td><a href="{{ URL::to($list->pdf)}}">Open the pdf</a></td>
            <td>{{$list->mobile_number}}</td>
            <td>
                @if ($list->is_verified == '0')
                <span>Processing.....</span>
                @elseif($list->is_verified == '1')
                <span>Success.....</span>
                @else
                <span>Reject.....</span>
                @endif
            </td>
            <td><a href="{{ URL::to('/comment/'.$list-> id)}}"><button> Comment</button></a></td>




            <td class="center">
                @if($list->is_verified == '0')
                <a class="btn btn-success" href="{{URL::to('/pending/'.$list-> id)}}">
                    <i>Accept</i>
                </a>

                @elseif($list->is_verified == '1')
                <a class="btn btn-danger" href="{{URL::to('/reject/'.$list-> id)}}">
                    <i>Reject</i>
                </a>

                @else
                <a class="btn btn-info" href="{{URL::to('/success/'.$list-> id)}}">
                    <i>Pending</i>
                </a>
                @endif

                </a>
            </td>
        </tr>
    </tbody>
    @endforeach
</table>





@endsection