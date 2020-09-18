<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
<?php

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "http://localhost:8000/api/v1/person/".$_GET['id'],
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "GET",
  CURLOPT_HTTPHEADER => array(
    "Content-Type: application/x-www-form-urlencoded"
  ),
));

$response = curl_exec($curl);


$registro = json_decode($response);

//print_r($registro->name);
?>
<div class="atualizar btn btn-outline-primary" id="<?php echo $registro->id; ?>">Atualizar</div>
<div class="form-group">
<label for="name">Nome</label>
<input name="name" class="name form-control" type="text" value='<?php echo $registro->name; ?>'>
<label for="email">Email</label>
<input name="email" class="email form-control" type="text" value='<?php echo $registro->email; ?>'>
<label for="phone">Telefone</label>
<input name="phone" class="phone form-control" type="text" value='<?php echo $registro->phone; ?>'>
<label for="wpp">WhatsApp</label>
<input name="wpp" class="wpp form-control" type="text" value='<?php echo $registro->wpp; ?>'>
</div>
<footer>
    <!-- JS, Popper.js, and jQuery -->
	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" crossorigin="anonymous"></script>
	<script>
    $(document).ready(function(){
        $('.atualizar').on('click',function(){
            var idpessoa = $(this).attr('id');
            var name = $('.name').val();
            var phone = $('.phone').val();
            var email = $('.email').val();
            var wpp = $('.wpp').val();
            var settings = {
                "url": "http://localhost:8000/api/v1/person/"+idpessoa,
                "method": "PUT",
                "timeout": 0,
                "headers": {
                    "Content-Type": "application/x-www-form-urlencoded"
                },
                "data": {
                    "email": email,
                    "name": name,
                    "wpp": wpp,
                    "phone": phone
                }
                "success": function(){
                    alert("Edição efetuada com sucesso");
                    window.history.back();
                }
            };

            $.ajax(settings).done(function (response) {
                console.log(response);
            });
        });
    });
    </script>
</footer>    
</body>
</html>