@extends('layouts.dashboard')
<style>
    .pagination-box {
        text-align: right;
        padding-right: 15px;
    }

    .btn {
        margin-right: 10px;
    }
</style>
@section('content')
    <!-- /.row -->
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Hover Data Table</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table id="example2" class="table table-bordered table-hover">
                        <caption>用户列表</caption>
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Age</th>
                            <th width="500">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td>{{ $user['id'] }}</td>
                                <td>{{ $user['name'] }}</td>
                                <td>{{ $user['age'] }}</td>
                                <td>
                                    <a class="btn btn-primary"
                                       href="/edit/{{$user['id']}}">
                                        <span>编辑</span>
                                    </a>
                                    <a class="btn btn-danger del" id="{{$user['id']}}">
                                        <span>删除</span>
                                    </a>
                                    <a href="" class="btn btn-success">查看详情</a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                        <tfoot>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Age</th>
                            <th>Action</th>
                        </tr>
                        </tfoot>
                    </table>
                </div>
                <!-- /.box-body -->
                <!-- 分页 -->
                <div class="pagination-box">
                    {{ $users->appends(['name' => $name])->links() }}
                </div>
            </div>
            <!-- /.box -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->

@endsection

@section('js')
    <script>
        $(function () {
            $('.del').click(function () {
                console.log($(this).attr('id'))
                let _this = $(this);
                $.ajaxSetup({headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}});
                $.ajax({
                    type: "delete",
                    url: "/user/" +  _this.attr('id'),
                    data:{
                        'id': _this.attr('id')
                    },
                    success: function (html) {
                        _this.parent().parent().remove();
                        alert('删除成功');
                    }
                });
            })
        });
    </script>
@endsection
