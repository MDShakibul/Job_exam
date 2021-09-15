<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Comment</title>
    <style>
        .comment-container {
            display: flex;
        }

        .admin,
        .user {
            width: 50%;
            border: 1px solid lightgrey;
            /* / box-shadow: 5px 5px 15px lightgrey; / */
            margin: 10px;
            padding: 10px 20px;
        }

        .heading {
            text-align: center;
        }
    </style>
</head>

<body>
    <div>
        <h1 class="heading">Comments</h1>
        <div class="comment-container">
            <div class="admin">
                <h2 class="heading">Admin</h2>
                @foreach($view_admin_comment as $list)
                <p><strong>Comments:</strong> {{$list->comment_description}}</p>
                <img src="{{ URL::to($list->comment_file)}}" style="height: 80px; width: 88px;">
                @endforeach

            </div>
            <div class="user">
                <h2 class="heading">User</h2>
                @foreach($view_user_comment as $list)
                <p><strong>Comments:</strong> {{$list->comment_description}}</p>
                <img src="{{ URL::to($list->comment_file)}}" style="height: 80px; width: 88px;">
                @endforeach

            </div>
        </div>
    </div>
</body>

</html>