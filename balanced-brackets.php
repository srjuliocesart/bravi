<!DOCTYPE html>
<html>
<head>
	<title></title>
	<!-- CSS only -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
	<style>
		body{
			width: 80%;
			margin: 0 auto;
			padding-top: 10px;
		}
	</style>
</head>
<body>
<div class="form-row">
	<div class="col">
		<label for="input-brackets">Coloque a sequência logo abaixo</label><br>
	</div>
</div>
<div class="form-row">
	<div class="col">
		<input type="text" class="form-control input-brackets" name="input-brackets"/>	
	</div>	
	<div class="col">
		<div class="btn btn-primary" id="valida">Validar</div>
	</div>
</div>
<div class="form-row">
	<div class="col">
		<p class="resposta"></p>
	</div>
</div>
<footer>
	<!-- JS, Popper.js, and jQuery -->
	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" crossorigin="anonymous"></script>
	<script>
		$(document).ready(function(){
			$('#valida').on('click',function(){
				var textoValidar = $('.input-brackets').val();
				//alert(textoValidar);
				$.ajax({
					url: 'balanced-brackets-back.php',
					data: 'validar='+textoValidar,
					method: 'POST',
					success: function(result){
						$('.resposta').text(result);
					},
					error: function(err){
						$('.resposta').text(err);	
					}
				});
			});
		});
	</script>
</footer>		
</body>
</html>