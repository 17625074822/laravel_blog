<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <style>
        ul {
            padding: 0;
        }

        .page {
            width: 500px;
            margin: 0 auto;
        }

        .pagination {
            display: flex;
            justify-content: space-between;
        }

        li {
            text-decoration: none;
            list-style: none;
        }
    </style>
    <title>Document</title>
</head>
<body>

<div class="box">
    <div class="sidebar;">
        <ul>
            <li>
                <a href="/add">
                    添加用户
                </a>
            </li>
            <li>
                查询用户
                <form action="/select" method="get">
                    <input type="text" name="name" placeholder="请输入用户名">
                    <br>
                    <input type="submit" value="提交">
                </form>
            </li>
        </ul>
    </div>
    <table width="500" border="1" cellpadding="10" cellspacing="1" align="center">
        <caption>用户列表</caption>
        <th>ID</th>
        <th>Name</th>
        <th>Age</th>
        <th>Action</th>
        @foreach ($users as $user)
            <tr align="center">
                <td>{{ $user['id'] }}</td>
                <td>{{ $user['name'] }}</td>
                <td>{{ $user['age'] }}</td>
                <td>
                    <a href="/edit/{{$user['id']}}">
                        <span>编辑</span>
                    </a>
                    <a href="/user/{{$user['id']}}/delete">
                        <span>删除</span>
                    </a>
                </td>
            </tr>
        @endforeach
    </table>
    <div class="page">
        {{ $users->appends(['name'=>$name])->links() }}
    </div>
</div>

</body>
<script>

</script>
</html>
