@extends('../common.layouts')

@section('title', '留言')
@section('header')
    <div class="container">
        <div class="row clearfix">
            <div class="col-md-12 column">
                <ul class="nav nav-pills">


                    <li >
                        <a  href='logout'>注销</a>
                    </li>
                </ul>
                <h3>
                    welcome {{ $user }}
                    <br/>
                    现在你可以给其他用户留言了哦~
                </h3>

                <form class="form-signin" action="user/send" method="POST">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
                    <input style="height: 130px" class="form-control" cols="8" rows="4"  value="{{ old('send')['words'] }}"
                               placeholder="input message" name='send[words]' id='words' maxlength='220' required></input>
                    <input name="send[to]" type="text" class="form-control" value="{{ old('send')['to'] }}"
                           placeholder="send to?必须是已存在用户如:1234" name='send[to]' id='to' maxlength='20' required><br>
                    <input class="btn btn-lg btn-primary btn-block" type="submit" value="Send">
                </form>
                    @include('./common/message')
                <h3>
                    你也可以看见其他用户给你的留言
                </h3>
                <table class="table">
                    <thead>
                    <tr>
                        <th>留言者</th>
                        <th>时间</th>
                        <th>信息</th>
                    </tr>
                    </thead>
                    @foreach($messages as $message)
                    <tbody>
                    <tr>
                        <td>{{ $message->from }}</td>
                        <td>{{ $message->time }}</td>
                        <td>{{ $message->words }}</td>
                    </tr>
                    </tbody>
                    @endforeach
                <!-- 分页-->
                </table>
                <div>
                    <div class="text-center">
                        {{ $messages->render() }}
                    </div>
                </div>
            </div>
        </div>
    </div>





@endsection
