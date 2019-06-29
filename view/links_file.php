<?php
//classの呼び出し
include_once "./../class/indexClass.php";
//クエリストリングで取得設定されたID情報を取得する
//echo $_GET[id];
$id=$_GET[id];
$obj =new index();
//echo "<a href=".$_SERVER['HTTP_REFERER'].">".戻る."</a>";
//echo "<a href="."./index.php".">"."top"."</a>";  URLが代わる
?>
<?php
$select_querry=$obj->select_detail($id);
foreach($select_querry as $value){
	$result.="ID:".$value[id]."<hr><br>";
	$result.="date:".$value[date_time]."<hr><br>";
	$result.="title:".$value[title]."<hr><br>";
	$result.="tag:".$value[tag]."<hr><br>";
	$result.="summary:".$value[summary]."<hr><br>";
	$result.="content:".$value[content]."<hr><br>";
	//$result.="image:".'<img src="data:images/jpeg;base64,'.base64_encode($value[image]).'" >';
	$result.="image:".'<img src="data:images/jpeg;base64,'.base64_encode($value["image"]).'" width="300px" height="500px">';	
	$result.="<br><br>";
}
echo $result;
?>