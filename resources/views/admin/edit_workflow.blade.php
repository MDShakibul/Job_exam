@extends('admin.admin_layout')
@section('title', 'All Application')
<style>
    #workflow_form {
        width: 585px;
        min-height: 165px;
    }
</style>
@section('admin_content')

@foreach (['danger', 'warning', 'success', 'info'] as $msg)
@if(Session::has('alert-' . $msg))
<p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
@endif
@endforeach

<h2>Update Workflow</h2><br>


<form action="{{URL::to('/update_workflow/'.$workflow_infos[0]->position_id ) }}" method="post" id="workflow_form">
    @csrf
    <table id="dynamicTable">
        <tr>
            <th>
                Positon
            </th>
            <th>
                Name
            </th>

        </tr>

        <tr>
            <td>
                <input type="text" class="position_name" name="position_name0[]" id="position_name" style="width: 120px; margin: 10px;" value="{{ $workflow_infos[0]->position_name }}" required />
            </td>
            <td>
                <select name="employee_name0[]" class="employee_name" id="employee_name" multiple="multiple" style="width: 400px; ">
                    @foreach($employee_infos as $empinfo)
                    <option value="{{ $empinfo->id }}" @foreach($workflow_infos as $workflow_info) @if($workflow_info->employee_id == $empinfo->id)
                        selected
                        @else
                        @endif
                        @endforeach
                        >
                        {{ $empinfo->employee_name }}
                    </option>
                    @endforeach
                </select>
            </td>
        </tr>
    </table>
    <button type="submit" class="btn btn-success">Update</button>
</form>

@endsection

@section('script')

<script type="text/javascript">
    $(document).ready(function() {
        $(".employee_name").chosen();
    });
</script>


@endsection