@extends('layouts.dashboard')

@section('content')
    <div class="login-box">
        <div class="login-logo">
            <p><b>编辑用户</b></p>
        </div>
        <!-- /.login-logo -->
        <div class="login-box-body">
            <p class="login-box-msg">Edit userInfo in the From </p>

            <form action="" method="get" onsubmit="return false">
                <div class="form-group has-feedback">
                    <input name="editName" type="text" class="form-control" placeholder="请输入姓名">
                    <input type="hidden" value="{{$id}}">
                    <span class="glyphicon  glyphicon-user form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback">
                    <input type="text" name="age" class="form-control" placeholder="请输入年龄">
                    <span class="glyphicon glyphicon-dashboard form-control-feedback"></span>
                </div>
                <div class="row">

                    <!-- /.col -->
                    <div class="col-xs-12">
                        <button type="submit" id="edit-btn" class="btn btn-primary btn-block btn-flat">点 击 编 辑</button>
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
    <script>
        $(function () {
            $('#edit-btn').click(function () {
                $.ajax({
                    type: "get",
                    url: '/user/' + $('input[type=hidden]').val() + '/edit',
                    data: {
                        "name": $('input[name=editName]').val(),
                        "age": $('input[name=age]').val()
                    },
                    success: function (data) {
                        console.log(data);
                        alert('编辑成功');
                        go();

                    },
                    error: function (err) {
                      alert('编辑失败')
                        console.log(err)
                    }
                })
            })
            //    返回
            $('#back-btn').click(function () {
                back();
            })
        })

        function go() {
            window.location.href = '/user';
        }

        function back() {
            window.history.go(-1);
        }
    </script>
@endsection
