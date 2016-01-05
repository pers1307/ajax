<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>

<head>
	<meta http-equiv="Content-type" content="text/html; charset=windows-1251" />
	<title>Загрузка файлов на сервер без перезагрузки страницы</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" type="text/css" href="imgareaselect-deprecated.css">
	<script type="text/javascript" src="jquery-1.4.2.min.js"></script>
	<script type="text/javascript" src="ajaxupload.js"></script>
	<script type="text/javascript" src="jquery.imgareaselect.min.js"></script>
	<script type="text/javascript">
	$(document).ready(function(){
		var button = $('#butUpload > span'), interval, image, widthImg, heightImg, thumbW, thumbH;
		
		new AjaxUpload(butUpload, {
			action: 'upload.php', 
			onSubmit : function(file, ext){
			if (ext && /^(jpg|png|jpeg|gif)$/.test(ext)) {
				button.text('Загрузка');
				this.disable();
				$("#imgLoad").show();
				
				interval = window.setInterval(function(){
					var text = button.text();
					
					if (text.length < 13){
						button.text(text + '.');					
					} else {
						button.text('Загрузка');				
					}
				}, 200);
				} else {
					alert("Ошибка! только jpg, png, jpeg, gif");
					return false;
				}
			},
			onComplete: function(file, response){
				$("#imgLoad").hide();
				button.text('Загружено, еще?');
				
				window.clearInterval(interval);
				
				image = file;
				
				var ajaxObj = JSON.parse(response);
				
				widthImg = ajaxObj.width;
				heightImg = ajaxObj.height;
				thumbW = ajaxObj.thumbW;
				thumbH = ajaxObj.thumbH;
				
				$("#preview").css({'width': thumbW+'px', 'height': thumbH+'px'});
				$("#min_thumbnail").css({'width': thumbW+'px', 'height': thumbH+'px'});
				
				this.enable();
				
				view(file);
			}
		});
		
		function view (imgName) {
		
			$("#imgEdit").show();
			
			$("#thumbnail").attr("src","uploads/"+imgName);
			$("#min_thumbnail").attr("src","uploads/"+imgName);
		}
		
		$("#thumbnail").imgAreaSelect({aspectRatio: '1:1', handles: true, fadeSpeed: 200, onSelectChange: preview});
		
		function preview (img, selection) {
			if (!selection.width || !selection.height)
				return;
				
			var scaleX = thumbW / selection.width;
			var scaleY = thumbH / selection.height;
			
			$("#min_thumbnail").css({
				width: Math.round(scaleX * widthImg),
				height: Math.round(scaleY * heightImg),
				marginLeft: -Math.round(scaleX * selection.x1),
				marginTop: -Math.round(scaleY * selection.y1)
			});
			
			$("#x1").val(selection.x1);
			$("#y1").val(selection.y1);
			$("#x2").val(selection.x2);
			$("#y2").val(selection.y2);
			$("#w").val(selection.width);
			$("#h").val(selection.height);
			
		}
		
		$("#butSave").click(function () {
		
			var x1 = $("#x1").val();
			var y1 = $("#y1").val();
			var x2 = $("#x2").val();
			var y2 = $("#y2").val();
			var w = $("#w").val();
			var h = $("#h").val();
			$.ajax ({
				url: "upload.php",
				type: "POST",
				data: {image: image, x1: x1, y1: y1, x2: x2, y2: y2, w: w, h: h},
				success: function () {newAvatar(image);}
			
			});
		
			function newAvatar (avatar) {
				$("#thumbnail").imgAreaSelect({hide: true});
				$("#avatar").html("<img src=\"uploads/"+avatar+"\" width=\"200\">");
				$("#minImg").html("<img src=\"uploads/min_"+avatar+"\">");
				$("#imgEdit").hide();
			}
		
		});
		
	});
	</script>
</head>

<body>

<div id="main">
	<div id="header">Upload & crop изображений без перезагрузки страницы</div> <!--end header-->
	<div id="wrapper">
		<div id="content">
			
			<div id="avatar">Где аватара?</div><div id="minImg"></div><div style="clear:both"></div><br />
			<div id="butUpload"><span>Сменить аватару</span><img src="loading.gif" id="imgLoad" align="right" /></div>
			<hr />
			<div id="imgEdit">
				<img src="" style="float: left; margin-right: 10px;" id="thumbnail" />
				<div id="preview" style="width: 100px; height: 100px; overflow: hidden;">
					<img src="" style="width: 100px; height: 100px;" id="min_thumbnail" />
				</div>
				<br style="clear:both;"/>
				<form name="thumbnail">
					<input type="hidden" name="x1" value="" id="x1" />
					<input type="hidden" name="y1" value="" id="y1" />
					<input type="hidden" name="x2" value="" id="x2" />
					<input type="hidden" name="y2" value="" id="y2" />
					<input type="hidden" name="w" value="" id="w" />
					<input type="hidden" name="h" value="" id="h" />
				</form>
				
				<div id="butSave">Сохранить</div>
				
			</div>
		
		</div> <!--end content-->
	</div> <!--end wrapper-->
	<div id="footer"> &copy; Copyright by Maksim Petrenko <a href="http://www.maksimpetrenko.com">[http://www.maksimpetrenko.com]</a></div> <!--end footer-->
</div> <!--end main-->

</body>
</html>