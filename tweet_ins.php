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

        <form action="tweet_view_link.php" method="post">
          <input type="submit" value="ツイート一覧に戻る" class="btn btn-primary" > 
        </form>

        <div class="col-md-9">

          <div class="table-responsive">
            <p>ここにツイートを表示する。</p>

        
<?php

  //DBへ接続するために，DB，ユーザ名，パスワードを指定
  $dsn = 'mysql:host=localhost;dbname=test;charset=utf8;';
  $user = 'root';
  $password = 'hiro0112';

  //try catch　で通常処理と例外処理を定義する
  try {
      //SQLの実行
      $dbh = new PDO($dsn, $user, $password);
      $dbh -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

      $contents = $_GET["contents"];
      $len = mb_strlen($contents,"utf-8");

      if($len == 0){
        echo "空白です";
      }else if($len > 140){
        echo "文字数オーバーです";
      }else{
        //testというデータベースに対してSQLを実行する 
        $stmt = $dbh->query("INSERT tweet_tbl(account, contents, input_datetime) VALUES ('sakata', '$contents', sysdate())");
        $stmt->execute();
        // mysql_db_query( "test", "insert tweet_tbl(account,contents,input_datetime)
        // values('junchiba','$contents',sysdate())" );
      
        echo "ツイートしました";
      }

      

  } catch (PDOException $e) {
      //例外が発生した場合
      echo 'Connection failed:'.$e->getMessage();
  }

?>


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
