<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="favicon.ico">

    <title>Twitter風掲示板</title>

    <!-- Bootstrap core CSS -->
    <link href="css/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/dashboard.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="css/assets/js/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="tweet.php">Twitter風掲示板</a>
        </div>
        
      </div>
    </nav>

        <div class="col-md-3">
          <form action ="tweet_fin.php" method="GET">
            <br>
            ツイート内容を入力してください。<br> 
            <textarea name="contents" cols="40" rows="4"></textarea>
            <br>
            
            <input type="submit" value="ツイート" class="btn btn-primary" >
          </form>
        </div>

        <div class="col-md-9">

          <div class="table-responsive">
            <p>
              tweet_idが
              <?php
              echo $_GET['tweet_id'];

$connect = mysql_connect("localhost","root","hiro0112");

//SQLをUTF8形式で書くよ、という意味
mysql_query("SET NAMES utf8",$connect);

$tweet_id = $_GET['tweet_id'];

//この１行で実行
mysql_db_query("test","delete from tweet_tbl where tweet_id = $tweet_id");

              ?>
              のデータを削除しました。 

            </p>
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>名前</th>
                  <th>投稿内容</th>
                  <th>投稿時間</th>
                </tr>
              </thead>
              <tbody>
<?php

//ここに実行したいプログラムを書く
//今回は「勝ち」を表す「1」をinsert
$sql = "select * from tweet_tbl order by input_datetime desc";
//echo $sql;

//この１行で実行
$rs = mysql_db_query("test",$sql);

while($row = mysql_fetch_assoc($rs)){
                echo "<tr>";
                echo "<td>{$row['account']}</td>";
                echo "<td>{$row['contents']}</td>";
                echo "<td>{$row['input_datetime']}</td>";
                echo "</tr>";  
}

//データベースとの接続を切る
mysql_close($connect); 


?>

              </tbody>
            </table>
          </div>
        </div>


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="css/dist/js/bootstrap.min.js"></script>
    <script src="css/assets/js/docs.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="css/assets/js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>
