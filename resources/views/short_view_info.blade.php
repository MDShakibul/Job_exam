@extends('main')
@section('title','Information')
@section('content')

<h1 style="display: flex;
justify-content: center; margin-right: 40px;">Reveiw Your Information</h1>
<div style=" padding: 0px 20px 0px 20px;">
<div class="table-responsive">
<table class="table table-bordered table-striped table-hover styled-table">
  <thead style="font-size: 18px;">
    <tr>
      <th>Father Name</th>
      <th>Mother Name</th>
      <th>NID Number</th>
      <th>Amount Of Land</th>
      <th>Land Image</th>
      <th>Mobile Number</th>
      <th>Images</th>
      <th>Status</th>
      <th>Action</th>
    </tr>
  </thead>
  @foreach($user_list as $list)
  <tbody>
    <tr>
      <td>{{$list->father_name}}</td>
      <td>{{$list->mother_name}}</td>
      <td>{{$list->nid_number}}</td>
      <td>{{$list->amount_land}}</td>
      <?php
      $Images = explode(',', $list->image);
      ?>

      <td>
        @foreach($Images as $image)
        <div>
          <img src="{{ asset($image) }}" style="height: 40px; width: 40px; margin-bottom: 2px;">
        </div>

        @endforeach
      </td>
      <td>{{$list->mobile_number}}</td>

      <?php
      $allImages = explode(',', $list->file);
      ?>
      <td>
        @foreach($allImages as $image)
        <div>
          <img src="{{ asset($image) }}" style="height: 40px; width: 40px; margin-bottom: 2px;">
        </div>

        @endforeach
      </td>


      <td>
        @if ($list->is_verified == '0')
        <span>Admin Checked Your Details. Please wait</span>
        @elseif($list->is_verified == '1')
        <span>Admin Accepted the form</span>
        @else
        <span>Admin rejected your form. Please Contact with Admin</span>
        @endif
      </td>

      <td>
          <a href="{{url('/edit_user_details/'.$list->id)}}"><button class="btn btn-success">Edit</button></a>
          <a href="{{url('/user_comment/'.$list->id)}}"><button class="btn btn-success">Comment</button></a>

      </td>
    </tr>
  </tbody>
  @endforeach
</table>
</div>
</div>


@endsection
