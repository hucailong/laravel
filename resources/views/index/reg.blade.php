@extends('layouts.shop')
@section('title', '三级分销注册')
@section('content')
     <header>
      <a href="javascript:history.back(-1)" class="back-off fl"><span class="glyphicon glyphicon-menu-left"></span></a>
      <div class="head-mid">
       <h1>会员注册</h1>
      </div>
     </header>
     <div class="head-top">
      <img src="/static/index/images/head.jpg" />
     </div><!--head-top/-->
     <form  class="reg-login" method="post" action="{{url('\reg')}}">
      <h3>已经有账号了？点此<a class="orange" href="{{url('index\login')}}">登陆</a></h3>
      <div class="lrBox">
       <div class="lrList"><input type="text" placeholder="输入邮箱号" name="account" /></div>
       <div class="lrList2"><input type="text" placeholder="输入短信验证码" name="code" /> <button id="code">获取验证码</button></div>
       <div class="lrList"><input type="text" placeholder="设置新密码（6-18位数字或字母）" name="pwd" /></div>
       <div class="lrList"><input type="text" placeholder="再次输入密码" name="newpwd"/></div>
      </div><!--lrBox/-->
      <div class="lrSub">
       <input type="button"  id="myform" value="立即注册" />
      </div>
     </form><!--reg-login/-->
     <script src="/static/jquery.js"></script>
     <script>
            //点击注册
            $(document).on('click','#myform',function (){
                var _this = $(this);
                var account = $('[name=account]').val();
                if(account==''){
                    alert('邮箱不能为空');
                    return false;
                }
                var code = $('[name=code]').val();
                if(code==''){
                    alert('验证码不能为空');
                    return false;
                }
                var pwd = $('[name=pwd]').val();
                if(pwd==''){
                    alert('密码不能为空');
                    return false;
                }
                var newpwd = $('[name=newpwd]').val();
                if(newpwd==''){
                    alert('再次确认密码不能为空');
                    return false;
                }
                if(pwd != newpwd){
                    alert('两次密码不一致');
                    return false;
                }

                $('form').submit();
            })
            //点击获取
            $(document).on('click','#code',function () {
                var account = $('[name=account]').val();
                var _this = $(this);
                if(account==''){
                    alert('邮箱或手机号不能为空');
                }
                $.post(
                    "{{url('/send')}}",
                    {account:account,_token:"{{csrf_token()}}"},
                    function(res){
                        if(res.code=='1'){
                            alert(res.font);
                        }else{
                            alert(res.font);
                        }
                    },'json'

                )
            })

     </script>
@include('index.public.footer')
@endsection
