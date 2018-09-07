<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html>
<head>
	<title>Короткие ссылки</title>
</head>
<body>
	<h3>Получить короткую ссылку</h3>
	<form method="post" action="/index.php/shorturl/save">
		<input type="text" name ="full" placeholder="Введи меня" />
		<button>Получить короткую сылку</button>
	</form>
	<p style="color:red"></p>
	<script  src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
	<script>
		$('form').on('submit', function(){
			$.ajax({
		        type: $(this).attr('method'),
        		url: $(this).attr('action'),
        		data: $(this).serialize(),
		        success: function (data) {
		            $('p').html(data);
		        }
	    	});

	    	return false;
		});
		
		
	</script>
</body>
</html>