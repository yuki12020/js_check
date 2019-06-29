<?php
#db接続
include dirname(__FILE__) ."./../conf/db_connect.php";		
//引数の値が送信される
//ajax_check.jsから送信されたmovie_id（value["id"]）を取得する
$css=$_GET['css'];
	//空白じゃない時
	if(!empty($css)){
		$sql .="select css from movie_info";	
		$sql .=" where id =".$css;
		#ｃｓｓの状態を確認するクエリの実行
		$row = $db->query($sql);
		$row = $row->fetchAll(PDO::FETCH_ASSOC);
		var_dump($row[0]["css"]);
			#sql文の初期化処理
			$sql="";
			if($row[0]["css"]==="0"){
				$sql.="update movie_info set css ='1' ";
				$sql.=" where id =".$css;
				//1に切り替えるのでredをajax_check.jsに送信
				echo "red";
				$info = $db->query($sql);
				var_dump($info);
						
			}else if($row[0]["css"]==="1"){
				$sql.="update movie_info set css ='0' ";
				$sql.=" where id =".$css;
				//0に切り替えるのでblueをajax_check.jsに送信
				echo "blue";
				$info = $db->query($sql);
				var_dump($info);		
			}
		}else{
		exit;
}
?>