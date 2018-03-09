<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php echo ($title); ?></title>
    <meta name="viewport" content="width=device-width,initial-scale=1"/>
    <script type="text/javascript" src="/Cart/Public/js/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="/Cart/Public/css/bootstrap.min.css" />
    <script type="text/javascript" src="/Cart/Public/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="/Cart/Public/css/OrderHandle.css" />
    <script type="text/javascript" src="/Cart/Public/js/postUpload.js"></script>
    <style>
        body{background-color: #E5E3E3}
        .container{padding: 0}
        .panel-body{padding-top: 8px;padding-bottom: 3px}
        .col-xs-6,col-xs-8{padding: 0}
        .panel{margin-bottom: 10px}
        /*.panel-body span,.panel-body small{color: #88B871}*/
    </style>
    <script>
        $(function () {
            $('.getBack').click(function () {
                window.history.go(-1);
            });
        })
    </script>
</head>
<body>
<div class="container">
    <div style="padding: 6px 0;background-color: white">
        <strong class="text-left text-muted" style="margin: 0;font-size: 18px">
            <span class="glyphicon glyphicon-chevron-left getBack" ></span>
            <span><?php echo ($title); ?></span>
        </strong>
    </div><!--从后台传输的url 的 way-->
    <a href="/Cart/index.php/Home/Index/detailInfo/way/1">
        <div class="panel panel-default">
            <div class="panel-heading">
                <p class="col-xs-12">
                    <span class="col-xs-6 text-left">收货人：the name</span>
                    <span class="col-xs-6 text-right">143546789922</span>
                </p>
                <p>
                    <span>河南大学金明校区12号宿舍楼123宿舍</span>
                </p>
            </div>
            <div class="panel-body" >
                <p class="col-xs-6">
                    <strong>消费金额：￥1236.0元</strong>
                </p>
                <p class="col-xs-6 text-right">
                    <strong>下单时间：2016-5-6 </strong>
                </p>
            </div>
        </div>
    </a>
    <div class="panel panel-default">
        <div class="panel-heading">
            <p class="col-xs-12">
                <span class="col-xs-6 text-left">收货人：the name</span>
                <span class="col-xs-6 text-right">143546789922</span>
            </p>
            <p>
                <span>河南大学金明校区12号宿舍楼123宿舍</span>
            </p>
        </div>
        <div class="panel-body">
            <p class="col-xs-6">
                <small>消费金额：￥1236.0元</small>
            </p>
            <p class="col-xs-6 text-right">
                <span>下单时间：2016-5-6 </span>
            </p>
        </div>
    </div>
    <div class="panel panel-default">
        <div class="panel-heading">
            <p class="col-xs-12">
                <span class="col-xs-6 text-left">收货人：the name</span>
                <span class="col-xs-6 text-right">143546789922</span>
            </p>
            <p>
                <span>河南大学金明校区12号宿舍楼123宿舍</span>
            </p>
        </div>
        <div class="panel-body">
            <p class="col-xs-6">
                <small>消费金额：￥1236.0元</small>
            </p>
            <p class="col-xs-6 text-right">
                <span>下单时间：2016-5-6 </span>
            </p>
        </div>
    </div>
    <div class="panel panel-default">
        <div class="panel-heading">
            <p class="col-xs-12">
                <span class="col-xs-6 text-left">收货人：the name</span>
                <span class="col-xs-6 text-right">143546789922</span>
            </p>
            <p>
                <span>河南大学金明校区12号宿舍楼123宿舍</span>
            </p>
        </div>
        <div class="panel-body">
            <p class="col-xs-6">
                <small>消费金额：￥1236.0元</small>
            </p>
            <p class="col-xs-6 text-right">
                <span>下单时间：2016-5-6 </span>
            </p>
        </div>
    </div>
</div>
</body>
</html>