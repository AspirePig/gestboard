<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>第一个简单的jQuery程序</title>
    <style type="text/css">
        div{
            padding:8px 0px;
            font-size:12px;
            text-align:center;
            border:solid 1px #888;
        }
    </style>
    <script src="http://libs.baidu.com/jquery/1.9.1/jquery.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $("div").html("您好！通过慕课网学习jQuery才是最佳的途径。");
        });
    </script>
</head>
<body>
<div></div>
</body>
</html>