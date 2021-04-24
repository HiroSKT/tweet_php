<?php
$connect = mysql_connect("localhost","root","");

//SQLをUTF8形式で書くよ、という意味
mysql_query("SET NAMES utf8",$connect);

//testというデータベースに対してSQLを実行する	
$result = mysql_db_query( "test", "select * from tweet_tbl" );

while(true){
	$row = mysql_fetch_assoc($result);
	if($row == null){
		break;
	}else{
		echo $row["contents"];
		echo "<a href='tweet_del.php'>削除</a>";
		echo "<br>";
	}
}

//データベースとの接続を切る
mysql_close($connect); 

?>