@extends('layouts.dashboard')

@section('content')
    <div class="login-box">
        <div class="login-logo">
            <p><b>添加用户</b></p>
        </div>
        <!-- /.login-logo -->
        <div class="login-box-body">
            <p class="login-box-msg">Create userInfo in the From </p>

            <form action="/user/create" method="get" onsubmit="return false">
                <div class="form-group has-feedback">
                    <input name="addName" type="text" class="form-control" placeholder="请输入姓名">
                    <span class="glyphicon  glyphicon-user form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback">
                    <input type="text" name="age" class="form-control" placeholder="请输入年龄">
                    <span class="glyphicon glyphicon-dashboard form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback">
                    <input type="text" name="pwd" class="form-control" placeholder="请输入密码">
                    <span class="glyphicon glyphicon-dashboard form-control-feedback"></span>
                </div>
                <div class="row">

                    <!-- /.col -->
                    <div class="col-xs-12">
                        <button type="submit" id="create-btn" class="btn btn-primary btn-block btn-flat">点 击 创 建
                        </button>
                    </div>
                    <!-- /.col -->
                </div>
            </form>

            <div class="social-auth-links text-center">
                <a href="#" style="padding-left:0px;text-align: center;"
                   id="back-btn"
                   class="goback btn btn-block btn-social btn-facebook btn-flat">返&nbsp;&nbsp;&nbsp;回</a>
            </div>
        </div>
        <!-- /.login-box-body -->
    </div>
    <!-- /.login-box -->
@endsection

@section('js')
    <!-- 添加用户 -->
    <script>
        $(function () {
            $('#create-btn').click(function () {
                // alert('123');
                console.log($("form").serializeArray());
                $.ajax({
                    type: 'get',
                    url: '/user/create',
                    data: {
                        name: $('input[name=addName]').val(),
                        age: $('input[name=age]').val(),
                        pwd: $('input[name=pwd]').val()
                    },
                    success: function (data) {
                        if (data) {
                            alert('添加成功')
                            window.location.href = '/user';
                        } else {
                            alert('添加失败')
                        }
                    }
                })
            })
            //返回
            $('#back-btn').click(function () {
                window.history.go(-1);
            })
        })
    </script>
@endsection

