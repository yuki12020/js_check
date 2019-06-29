<?php
class index{

	public function insert($title,$content,$summary,$date,$image){
	//public内で読み込むファイルを読み込んでやらないといけない
	//DB接続用の変数$dbを使用したいのでinclude dirnameをしている
	//絶対パスの入力と　dirname(__FILE__)
	include dirname(__FILE__) ."./../conf/db_connect.php";    
    #データベースのカラム
    //title　   -> varchar
    //content  -> Longtext
    //summary  -> longtext
    //date_time-> timestamp
    //image    -> longtext
    $sql="INSERT INTO movie_info (title,content,summary,date_time,image) VALUES ('$title','$content','$summary','$date',:image);";
	$stmt=$db->prepare($sql);
	// //PDO::PARAM_LOBでimageのバイナリーデータの形式を取得している。
	$stmt->bindValue(':image', $image, PDO::PARAM_LOB);
	$info =$stmt->execute();
	//$info = $db->query($sql);
		//insert文 sample記述
	}

	public function select(){
	include dirname(__FILE__) ."./../conf/db_connect.php";
	$sql .="select * from movie_info";
	$sql .=" where true ";	
	#クエリの実行
	$info = $db->query($sql);	
	#データベースのデータを全て取得fetchAll(PDO::FETCH_ASSOC);
	#データベースのデータを1行取得fetchColumn();
	$results = $info->fetchAll(PDO::FETCH_ASSOC);	
	return $results;
	} 

	public function select_detail($id){
	include dirname(__FILE__) ."./../conf/db_connect.php";
	$sql="select * from movie_info where id=".$id;
	$info= $db->query($sql);
	$results= $info->fetchAll(PDO::FETCH_ASSOC);
	return $results;		
	}	

	
	
}
?>