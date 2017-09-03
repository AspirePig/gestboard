
<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>AspirePig的留言板</title>

    <!-- Bootstrap core CSS -->
    <link href="//cdn.bootcss.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="signin.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="../../assets/js/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="//cdn.bootcss.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="//cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>


<div class="container">
    <div class="row clearfix">
        <div class="col-md-12 column">
            <ul class="nav nav-pills">


                <li >
                    <a  href='logout.php?act=logout'>注销</a>
                </li>
            </ul>
            <h3>
                welcome <?php  echo  $from;?>
                <br/>
                现在你可以给其他用户留言了哦~
            </h3>

            <form class="form-signin" action="send.php" method="POST">
                <textarea  class="form-control" cols="8" rows="4" placeholder="input message"  name='words' id='words' maxlength='220' required></textarea>
                <input name="to" type="text" class="form-control" placeholder="send to?" name='to' id='to' maxlength='20'required><br>
                <input class="btn btn-lg btn-primary btn-block" type="submit" value="Send">
                <input type='hidden' name='from' id='from' value="<?php echo $from ?>"></input>
            </form>
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
                <?php

                $servername = "localhost";
                $username = "gestboard";
                $password = "gestboard";
                $dbname = "gestboard";


                $conn = mysqli_connect($servername, $username, $password, $dbname);

                if (!$conn) {
                    die("Connection failed: " . mysqli_connect_error());
                }

                $sql="SELECT * FROM `message` WHERE `to` = '$from'" ;
                $query=mysqli_query($conn,$sql);



                while($row=mysqli_fetch_assoc($query))
                {
// echo "<tr><td>".($row["from"])."</td><td>".htmlspecialchars($row["time"])."</td><td>".htmlspecialchars($row["words"])."</td></tr>";
// echo "<tr><td>".htmlspecialchars($row["from"])."</td><td>".htmlspecialchars($row["time"])."</td><td>".htmlspecialchars($row["words"])."</td></tr>";

                    echo 				'<tbody>
				<tr>
					<td>'.($row["from"]).'</td>
					<td>'.($row["time"]).'</td>
					<td>'.($row["words"]).'</td>
				</tr>
				</tbody>';
                }


                ?>

            </table>

        </div>
    </div>
</div>

<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
<script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
</body>
</html>




</div>
</body>
</html>