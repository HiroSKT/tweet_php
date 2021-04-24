<?php
$connect = mysql_connect("localhost","root","");

//SQLをUTF8形式で書くよ、という意味
mysql_query("SET NAMES utf8",$connect);

echo "select * from tweet_tbl";

//データベースとの接続を切る
mysql_close($connect); 

?>