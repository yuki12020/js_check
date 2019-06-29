<?php 
//classの呼び出し
include_once "./../class/indexClass.php";
?>　
<!DOCTYPE html>
<html>
<head>　
    <title><?=$title?></title>
    <style>	
	</style>
	<script src="//code.jquery.com/jquery-3.1.1.min.js"></script>
	<script type="text/javascript" src="ajax_check.js"></script>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>     
<!--cssの状態表示、js.phpのイフ文内表示-->
<div id="span"></div>
<!---select文-->
<div class="content">
</div>
	<div class="Ccontents_box">
		<body id="table">
			<table border=0 cellpadding=0 cellspacing=0 width=100% height=100%>
			<tr>
				<td align=center valign=middle>
<?php
	//var_dump($target);
   //インスタンス呼び
   $obj = new index();
   $select_querry = $obj->select();
   $i=1;
	echo "<div class="."box22".">";
	echo "<table width="."80%".">";
	echo "<p>";
   foreach($select_querry as $key => $value){
	if($i===1 && $i===2 && $i===3 && $i===4){
		$smt.="<tr>";
		}else{}
		$smt.="<td  class="."style_td"." align="."center"." width="."100"."height="."200".">";           
		$smt.= "<br><a href="."./links_file.php/?id=".htmlspecialchars($value["id"],ENT_QUOTES,'UTF-8').">".$value["title"]."</a><br>";
		$smt.="image:".'<img src="data:images/jpeg;base64,'.base64_encode($value["image"]).'" width="100px" height="100px">';
		$smt.= "id:".$value["id"]."<br>";
		$smt.= "time:".$value["date_time"]."<br>";
		$smt.= "ｃｓｓ状態:".$value["css"]."<br>";
		if($value["css"]==="0"){
		$smt.="<div class='btn'>";
		$smt.="<button 
		type="."submit".
		"class="."square_btn"."
		style="."color:"."rgb(0,0,255);
		id="."ajax_".$value["id"]."  
		onclick=func(".$value["id"].")>
		✘</button>";
		$smt.="</div>";
		}else if($value["css"]==="1"){
		$smt.="<div class='btn'>";
		$smt.="<button
		type="."submit".
		"class="."square_btn"."
		style="."color:"."rgb(255,0,0);
		id="."ajax_".$value["id"]."  
		onclick=func(".$value["id"].")>
		✔</button>";
		$smt.="</div>";
		}					
		//$smt.="<button type="."submit"." class="."square_btn"." id="."ajax_".$value["id"]."  onclick=func(".$value["id"].")>☆</button>";
		//チェックマーク
		$smt.="<div id="."ajax_".$value["id"]."></div>";
		
		$smt.="<div id="."text_".$value["id"]."></div>";
		$smt.= "</td>";
	if($i%4===0){
		$smt.="</tr>";
		}else{}
	$i++;
	}
	echo "</p>";
		//array 文字　出力されている模様
		 echo $smt;
		 echo "</table>";
	echo "</div>";            
// header('Location:'.$url.'');
// exit();
?>
				</td>
			</tr>
		</table>
		</body>
	</div>
</div>
</div>