<!--  成功提示框 -->
@if(\Illuminate\Support\Facades\Session::has('success'))
<div class="alert alert-success alert-dismissable" role="alert" >
    <button type="button" class="close" data-dismiss="alert" aria-lable="close">
    <span aria-hidden="true">&times;</span>
        </button>
    <strong>{{ \Illuminate\Support\Facades\Session::pull('success') }}</strong>
</div>
@endif


<!--  失败提示框 -->
@if(\Illuminate\Support\Facades\Session::has('error'))
<div class="alert alert-danger alert-dismissable" role="alert" >
    <button type="button" class="close" data-dismiss="alert" aria-lable="close">
        <span aria-hidden="true">&times;</span>
    </button>
    <strong>{{ \Illuminate\Support\Facades\Session::pull('error') }}</strong>
</div>
@endif