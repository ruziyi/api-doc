@extends('apidoc::common')
@section('head')
<style type="text/css">
    .title{text-align: center;margin: 100px auto;}
    .module{text-align: center;margin: 20px auto;}
    .search {position: relative;}
    .search .typeahead{width: 80%;font-size: 18px;line-height: 1.3333333;}
    .search input{width: 80%;display: inline-block;}
    .search button{height: 48px;width: 18%; margin-top: -5px; text-transform: uppercase;font-weight: bold;font-size: 14px; }
</style>
<style>
    html{height:100%;}
    body {
        background-image: linear-gradient(to bottom, #57b4ff 0, #3452b1 100%);
        background-repeat: repeat-x;
        filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#57b4ff', endColorstr='#3452b1', GradientType=0);
        color: #fff;
        box-sizing: border-box;
        min-height: 100%;
        height: 100%;
    }
</style>
<script src="{{ Request::root() }}/apidoc/js/bootstrap-typeahead.js" type="text/javascript"></script>
@stop

@section('content')
    <div class="container" style="">
        <div class="container">
            <div class="page-header text-center" style="border-bottom: none;margin-top: 200px;"	>
                <h2>{{$title}} / {{$version}}</h2>
            </div>
            <div class="row" style="margin-top: 100px;">
                <div class="col-xs-12 col-sm-3"></div>
                <div class="col-xs-12 col-sm-4">
                    <input class="form-control input-lg" type="password" id="pass" placeholder="请输入访问密码...">
                </div>
                <div class="col-xs-12 col-sm-2">
                    <button type="button" class="btn btn-info btn-lg btn-block">进入</button>
                </div>
                <div class="col-xs-12 col-sm-3"></div>
            </div>
        </div>
    </div>
@stop

@section('footer')
    <script type="text/javascript">
        $(document).ready(function(){
            $("button").click(function(){
                if($("#pass").val() == ""){
                    alert("请输入密码");$("#pass").focus();
                }else{
                    $.ajax({
                        method: 'post',
                        url: "/doc/login",
                        data: {pass: $("#pass").val() },
                        dataType: "json",
                        success: function(data){
                            if(data.status == 200){
                                location.href = "/doc";
                            }else{
                                alert(data.message);
                            }
                        }
                    });
                }
            })
        });
    </script>
@stop
