<form class="form-horizontal" role="form" method='post' action="#">
    <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
    <div class="form-group">
        <label for="inputEmail3" class="col-sm-2 control-label">用户名:</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name='user[name]' value="{{ old('user')['name'] }}"
                   id='user[name]' maxlength='10' placeholder="4-16位数字或字母" required/>
        </div>
    </div>
    <div class="form-group">
        <label for="inputPassword3" class="col-sm-2 control-label">密 &nbsp;&nbsp;码:</label>
        <div class="col-sm-10">
            <input type="password" class="form-control" name='user[passwd]' value="{{ old('user')['passwd'] }}"
                   id='user[passwd]' maxlength='20' placeholder="4-16位数字或字母" required/>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">

        </div>
        <br/>
        <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-default">
                {{ Request::getPathInfo() == '/login' ? '登录' : '注册'}}
            </button>
        </div>
    </div>
