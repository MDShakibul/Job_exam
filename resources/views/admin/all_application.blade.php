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
        <h2 id="head">All Type Of Application</h2>
        <table class="styled-table">
            <thead>
                <tr>
                    <th>Application Type</th>
                    <th>Application Price</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($application_list as $list)
                <tr>
                    <input type="hidden" class="serdelete_val_id" value="{{$list->id}}">
                    <td>{{$list->application_type}}</td>
                    <td>{{$list->application_price}}</td>
                    <td>
                        <button type="button" class="btn btn-danger servideletebtn" style="margin: 5px;">Delete</button>

                        <a href="{{URL::to('application/application_edit/'.$list-> id)}}">
                            <button type="button" class="btn btn-success" style="margin: 5px;">Edit</button>
                        </a>


                    </td>

                </tr>
                @endforeach
            </tbody>
        </table>

    </div>

</div>





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
                            url: '{{ url("application/delete_app")}}' + '/' + delete_id,
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
