@extends('admin.admin_layout')
@section('title', 'All Application')
@section('admin_content')

@foreach (['danger', 'warning', 'success', 'info'] as $msg)
@if(Session::has('alert-' . $msg))
<p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
@endif
@endforeach


<h2>All Type Of Application</h2>
<table class="styled-table">
    <thead>
        <tr>
            <th>Application Type</th>
            <th>Application Price</th>
            <th>Action</th>
        </tr>
    </thead>
    @foreach($application_list as $list)
    <tbody>
        <tr>
            <input type="hidden" class="serdelete_val_id" value="{{$list->id}}">
            <td>{{$list->application_type}}</td>
            <td>{{$list->application_price}}</td>
            <td>
                <button type="button" class="btn btn-danger servideletebtn" style="margin: 5px;">Delete</button>

                <a href="{{URL::to('/application_edit/'.$list-> id)}}">
                    <button type="button" class="btn btn-success" style="margin: 5px;">Edit</button>
                </a>


            </td>

        </tr>
    </tbody>
    @endforeach
</table>
@endsection

@section('script')

<script>
    $(document).ready(function() {

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $('.servideletebtn').click(function(e) {
            e.preventDefault();

            var delete_id = $(this).closest("tr").find('.serdelete_val_id').val();
            // alert(delete_id);

            swal({
                    title: "Are you sure?",
                    text: "Once deleted, you will not be able to recover this Data",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {

                        var data = {
                            "_token": $('input[name =_token]').val(),
                            "id": delete_id,
                        };

                        $.ajax({
                            type: "GET",
                            url: '{{ url("/delete_app")}}' + '/' + delete_id,
                            data: data,
                            dataType: 'json',
                            success: function(response) {
                                swal(response.status, {
                                        icon: "success",
                                    })
                                    .then((result) => {

                                        location.reload();
                                    });
                            }
                        });


                    }
                });

        });
    });
</script>


@endsection