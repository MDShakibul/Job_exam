@extends('admin.admin_layout')
@section('title', 'Dashboard')
@section('admin_content')



<h1 class="mt-4">Your File</h1>

<table class="styled-table">
    <thead>
        <tr>
            <th>Application Type</th>
            <th>Application Price</th>
            <th>Father Name</th>
            <th>Mother Name</th>
            <th>NID Number</th>
            <th>Amount Of Land</th>
            <th>Land Document</th>
            <th>Mobile Number</th>
            <th>Action</th>
        </tr>
    </thead>
    @foreach($files as $list)
    <tbody>
        <tr>
            <td>{{$list->application_type}}</td>
            <td>{{$list->application_price}}</td>
            <td>{{$list->father_name}}</td>
            <td>{{$list->mother_name}}</td>
            <td>{{$list->nid_number}}</td>
            <td>{{$list->amount_land}}</td>
            <td><a href="{{ URL::to($list->pdf)}}">Open the pdf</a></td>
            <td>{{$list->mobile_number}}</td>
            <td><a href="{{ URL::to('/send_another_employee/'.$list->id) }}"><button>send</button></a>

            </td>
        </tr>
    </tbody>
    @endforeach
</table>

@endsection