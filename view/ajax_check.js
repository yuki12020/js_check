function func(movie_id) {
	//movie_idに固有のIDが送信される
	console.log(movie_id);
	console.log("#ajax_"+movie_id);
    //二回クリックで送信の原因は
	//下記のonclickイベントとタグ内関数のonclickの二回記述により二重クリックが必要になっていた
	//$("#ajax_"+movie_id).on("click", function() {		
        $.get(//送信先URL get方式でmovie_idの値（value["id"]）をjs.phpへと送信する
		"js.php",
		//"./../class/indexClass.php",
		{css : movie_id	},	
		//送信先URLで処理されたデータが返ってくる。そのデータをspanタグに反映される
		function(data) {
			//console.log(data.match("red"));
				if(data.match("red")){				
					$("#ajax_"+movie_id).css('color','rgb(255,0,0)');
					$("#ajax_"+movie_id).text("✔");
					
					$("#text_"+movie_id).css('color','rgb(255,0,0)');
					$("#text_"+movie_id).text("fav");
					
				}else if(data.match("blue")){					
					//$("#ajax_"+movie_id).css('background','rgb(0,255,0)');					
					$("#ajax_"+movie_id).css('color','rgb(0,0,255)');
					$("#ajax_"+movie_id).text("✘");
				
					$("#text_"+movie_id).css('color','rgb(0,0,255)');
					$("#text_"+movie_id).text("disfav");
					
				}
			//js.phpに表示されているデータを取得
			$("#span").text(data);
			//dataはjs.phpのdom
			console.log(data);
			}				
		);    
	//});
};


//background-color change
$(function(){
    var nowchecked = $('input[name=bgc]:checked').val();
    var color="";
	console.log(nowchecked);
	
	$('input[name=bgc]').click(function(){
        if($(this).val() == nowchecked) {
            $(this).prop('checked', false);
			nowchecked = false;
			console.log("チェック外す");
			var element = document.getElementById("table"); 
			element.style.backgroundColor = '#ffffff'; 
			        
		} else {
			nowchecked = $(this).val();
			console.log("チェック");
			var element = document.getElementById("table"); 
			element.style.backgroundColor = '#696969'; 						
			//$("#table").css(' background-color','rgb(255,0,0)');
						
		}
    });
});