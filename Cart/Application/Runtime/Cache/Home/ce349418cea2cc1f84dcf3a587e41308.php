<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>提交订单</title>
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <link rel="stylesheet" href="/Cart/Public/css/bootstrap.min.css">
    <link rel="stylesheet" href="/Cart/Public/css/detial.css">
    <script src="/Cart/Public/js/jquery.js"></script>
    <script src="/Cart/Public/js/bootstrap.min.js"></script>
    <script type="text/javascript">
        $(function(){
            /*-----------加载初始页面----------*/
            $('select.university').change(function(){
                $.ajax({
                    type:"POST",
                    url:"/Cart/index.php/Home/Index/dormitory",
                    data:{
                        uid:$(this).val(),
                    },
                    success:function(response){
                        var str='';
                        for(var i=0;i<response.length;i++){
                            str+='<option value="'+response[i].id+'">'+response[i].dormitory+'号楼</option>';
                        }
                        $("select.dormitory").html(str);
                    }
                })
            });
            $.ajax({
                type:"POST",
                url:"/Cart/index.php/Home/Index/showcart.html",
                success:function(response){
                    var jsonobj=eval("("+response+")");
                    var str='';
                    for(var i=0;i<jsonobj.length;i++){
                        str+='<li class="detail">'+jsonobj[i].name+
                            '<span >￥'+
                            '<span class="price">'+jsonobj[i].price+'</span></span>'+
                            '</li>';
                    }
                    $("#cartdetail").html(str);
                }
            });
            /*-----------手机号验证--------------*/
            var myreg = /^(((13[0-9]{1})|(15[0-9]{1})|(18[0-9]{1}))+\d{8})$/;
            $('input[name=phonenumber]').change(function(){
                if(!(myreg.test($(this).val()))){
                    $(this).focus();
                    $("div.error").eq(1).html("不是完整的11位手机号或者正确的手机号前七位");
                    $('span.score').html('0');
                }else{
                    $("div.error").eq(1).html("");
                    $.ajax({
                        type:"POST",
                        url:"/Cart/index.php/Home/Index/getScore.html",
                        data:{
                            phonenumber:$(this).val(),
                        },
                        success:function(response){
                            if(response){
                                $('span.score').html(response);
                            }
                        }
                    })
                }

            });
            /*----------提交验证----------------*/
            $('#submit').click(function(event){
                event.preventDefault();
                flag=1;
               if($('input[name=phonenumber]').val()==''||(!(/^(((13[0-9]{1})|(15[0-9]{1})|(18[0-9]{1}))+\d{8})$/.test($('input[name=phonenumber]').val())))){
                      $("div.error").eq(1).html("手机号为空或者格式不正确");
                      flag=0;
                }
                if($('input[name=customname]').val()==''){
                    $("div.error").eq(0).html("收货人名称不能为空");
                    flag=0;
                }
                if($('input[name=Home]').val()==''){
                    $("div.error").eq(4).html("宿舍号不能为空");
                    flag=0;
                }
                if(flag==1){
                    $.ajax({
                        type:"POST",
                        url:"/Cart/index.php/Home/Index/addorder.html",
                        data:$('form').serialize(),
                        beforeSend:function () {

                        }
                    })
                }
            });
        });

    </script>
    <style>
        .form-group{
            margin-top: 0;
            margin-bottom: 0;
        }
        .error{
            padding-left: 15px;
            height:15px;
            color:red;
            font-size: 11px;

        }
        li.detail{
            height: 18px;

            font-size: 12px;
            list-style: none;
           border-bottom: 1px #999 dashed;
            width:100%;
        }
        li.detail span:first-child{
            float: right;
        }
        #toast-error,#toast-success,#toast-loading{
            background-color:rgba(0,0,0,.5);
            width:50px;height:50px;
            position: absolute;
        }
        p.title{
            border-left:3px solid orange;
            font-size:12px;
            color:#333;
            letter-spacing:1px;

            padding-left:7px;
            background:#E6E6E6;
        }

    </style>
</head>
<body>

<div class="well" style="background-color: #369;color:#eee;margin-bottom: 0;">欢迎来到支付界面</div>
<div class="container" >
    <form >
    <div class="input-group input-group-sm  col-xs-12">
        <span class="input-group-addon ">姓名 ：</span>
        <input type="text" name="customname" class="form-control" placeholder="请输入收货人姓名">
    </div>

    <div class="row">
        <div class=" col-xs-12  error"></div>
    </div>

    <div class="input-group input-group-sm">
        <span class="input-group-addon">手机号 ：</span>
        <input type="text" name="phonenumber" class="form-control" placeholder="请输入手机号">
    </div>

    <div class="row">
        <div class=" col-xs-12  error"></div>
    </div>

    <div class="input-group input-group-sm">
        <span class="input-group-addon">学校 ：</span>
            <select name="universty" class="form-control university">
                <?php if(is_array($university)): $i = 0; $__LIST__ = $university;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vo["id"]); ?>"><?php echo ($vo["uname"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
            </select>
    </div>
        <div class="row">
            <div class=" col-xs-12  error"></div>
        </div>
    <div class="input-group input-group-sm">
        <span class="input-group-addon">宿舍楼号 ：</span>
        <select name="dormitory" class="form-control dormitory">
            <?php if(is_array($dormitory)): $i = 0; $__LIST__ = $dormitory;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option ><?php echo ($vo["dormitory"]); ?>号楼</option><?php endforeach; endif; else: echo "" ;endif; ?>
        </select>
    </div>
        <div class="row">
            <div class=" col-xs-12  error"></div>
        </div>
    <div class="input-group input-group-sm">
        <span class="input-group-addon">宿舍 ：</span>
        <input type="text" name="Home" class="form-control" placeholder="请输入宿舍号 如101">
    </div>
    <div class="row">
            <div class=" col-xs-12  error"></div>
     </div>
    <div   >
        <p class="title"> 订单详情</p>
        <div id="cartdetail">

        </div>
    </div>
     <div class="checkbox" style="margin-top: 5px;font-size:13px;">
       <div class=" col-xs-7 "  style="text-align: left;padding:0;"> 可用积分: <span class="score">0</span>分
          <span class="" style="float: right;color:red;">可抵扣<span >2.01元</span></span>
       </div>
        <label class="pull-right">
                <input type="checkbox"  >是否使用积分
         </label>
      </div>
      <div  >
          <label  class="col-xs-4" style="padding-left: 0px;">支付方式:</label>
            <div class="radio">
                <label >
                    <input type="radio"  name="pay"  checked>货到付款
                </label>
                <label >
                    <input type="radio" name="pay" >其他方式
                </label>
            </div>
        </div>
        <div class="form-group col-xs-8 col-xs-offset-2" >
               <button class="btn btn-primary"  id="submit"  style="width:100%;">支付</button>
        </div>
    </form>
</div>

<div id="toast-error" >
    <img src="" alt="">
</div>
<div id="toast-success" >
    <img src="" alt="">
</div>
<div id="toast-laoding" >
    <img src="" alt="">
</div>

</body>
</html>