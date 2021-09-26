@extends('admin.admin_layout')
@section('title', 'Dashboard')
@section('admin_content')



<table>
    <tr>
        <td>
            <h3>Check your file section </h3>
        </td>
        <td><a href="{{URL::to('/check_file/'.Session::get('id') )}}"><button class="btn btn-success">Check Me</button></a></td>
    </tr>
</table>

@endsection