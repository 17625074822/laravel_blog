<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<h1>编辑用户</h1>
<form action="/user/{{$id}}/edit" method="get">
    用户名: <input type="text" name="name">
    <br>
    年龄: &nbsp; &nbsp; <input type="text" name="age">
    <br>
    <input type="submit" value="提交">
</form>
</body>
</html>
