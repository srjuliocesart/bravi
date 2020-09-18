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
  CURLOPT_URL => "http://localhost:8000/api/v1/person",
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


$pessoas = json_decode($response);

//print_r($pessoas[0]->name);
?>
<div class="adcNovo btn btn-outline-primary">Adicionar novo registro</div>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>Nome</th>
            <th>Email</th>
            <th>Telefone</th>
            <th>WhatsApp</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
        <?php
            $qtd_pessoas = count($pessoas);
            for($i = 0; $i < $qtd_pessoas; $i++){
                echo "<tr>";
                echo "<td>".$pessoas[$i]->name."</td>";
                echo "<td>".$pessoas[$i]->email."</td>";
                echo "<td>".$pessoas[$i]->phone."</td>";
                echo "<td>".$pessoas[$i]->wpp."</td>";
                echo "<td><div class='EdtPessoa btn btn-primary' id=".$pessoas[$i]->id.">Editar</div><div class='DltPessoa btn btn-danger' id=".$pessoas[$i]->id.">Deletar</div></td></tr>";
            }
        ?>
    </tbody>
</table>
<footer>
    <!-- JS, Popper.js, and jQuery -->
	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" crossorigin="anonymous"></script>
	<script>
    $(document).ready(function(){
        $('.EdtPessoa').on('click',function(){
            var idpessoa = $(this).attr('id');
            window.location = 'lista-edit.php?id='+idpessoa;
        });
        $('.DltPessoa').on('click',function(){
            var idpessoa = $(this).attr('id');
            var settings = {
            "url": "http://localhost:8000/api/v1/person/"+idpessoa,
            "method": "DELETE",
            "timeout": 0,
            "success": function(){
                alert('Registro deletado');
                location.reload();
            }
            };

            $.ajax(settings).done(function (response) {
            console.log(response);
            });
        });
        $('.AdcNovo').on('click',function(){
            window.location = 'lista-new.php';
        });
    });
    </script>
</footer>    
</body>
</html>