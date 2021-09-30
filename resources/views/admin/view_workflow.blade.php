@extends('admin.admin_layout')
@section('title', 'All Application')

<style>


    #center{
        margin: auto;
        width: 40%;
        padding: 10px;
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
        justify-content: center; margin-right: 40px;">View Workflow</h2>
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


    </div>


            @endfor
    </table>

</div>


@endsection
