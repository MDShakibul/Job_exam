@extends('main')
@section('title','Information')
@section('content')

<h1>Feedback By Comment</h1>

<table>
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
            <th>Comment By Admin</th>
            <th>Image Comment</th>
        </tr>
    </thead>
    @foreach($view_comment as $list)
    <tbody>
        <tr>
            <td>{{$list->application_type}}</td>
            <td>{{$list->application_price}}</td>
            <td>{{$list->father_name}}</td>
            <td>{{$list->mother_name}}</td>
            <td>{{$list->nid_number}}</td>
            <td>{{$list->amount_land}}</td>
            <td><img src="{{ URL::to($list->image)}}" style="height: 80px; width: 88px;"></td>
            <td><a href="{{ URL::to($list->pdf)}}">Open the pdf</a></td>
            <td>{{$list->mobile_number}}</td>
            <td>{{$list->comment}}</td>
            <td><img src="{{ URL::to($list->image_comment)}}" style="height: 80px; width: 88px;"></td>
        </tr>
    </tbody>
    @endforeach
</table>


@endsection