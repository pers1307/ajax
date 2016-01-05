<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>

<head>
	<meta http-equiv="Content-type" content="text/html; charset=windows-1251" />
	<title>Загрузка файлов на сервер без перезагрузки страницы</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<script type="text/javascript" src="jquery-1.4.2.min.js"></script>
	<script type="text/javascript" src="ajaxupload.js"></script>
	<script type="text/javascript">
	$(document).ready(function(){
		var button = $('#butUpload > span'), interval;
		
		new AjaxUpload(butUpload, {
			action: 'upload.php', 
			onSubmit : function(file, ext){
			if (ext && /^(rar|zip|gzip|jpg)$/.test(ext)) {
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
					$("<li></li>").appendTo("#files").text("такой тип файлов не поддерживается");
					return false;
				}
			},
			onComplete: function(file, response){
				$("#imgLoad").hide();
				button.text('Загружено, еще?');
				window.clearInterval(interval);
				this.enable();
				$('<li></li>').appendTo('#files').text(file);						
			}
		});
	});
	</script>
</head>

<body>

<div id="main">
	<div id="header">Загрузка файлов на сервер без перезагрузки страницы</div> <!--end header-->
	<div id="wrapper">
		<div id="content">
			
			<div id="butUpload"><span>Выбрать файл</span><img src="loading.gif" id="imgLoad" align="right" /></div>
			<ol id="files"></ol>
		
		</div> <!--end content-->
	</div> <!--end wrapper-->
	<div id="footer"> &copy; Copyright by Maksim Petrenko <a href="http://www.maksimpetrenko.com">[http://www.maksimpetrenko.com]</a></div> <!--end footer-->
</div> <!--end main-->

</body>
</html>