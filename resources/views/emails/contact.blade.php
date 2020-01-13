<!DOCTYPE html>

<html>

<head>

	<meta charset = "utf-8">
	<title>Contacto</title>

	<style>

		body
		{
			width: 100%;
			height: 600px;
			background: #eee;
			font-family: sans-serif;
			position: relative; 
			padding-botton: 40px;
		}

		.message
		{
			width: 60%; 
			background: white;
			position: relative; 
			margin: auto;  
			padding: 20px;
		}

		.title
		{
			background: #00838F;
			width: 90%;
			height: 30px;
			line-height: 2px;
			text-align: center;
			padding: 20px;
			margin-bottom: 60px;
		}

		h2
		{
			font-weight: normal; 
			color: white;
		}

		h3
		{
			font-weight: normal; 
			color: #00838F;
		}

	</style>

</head>

<body>

	<div class = "message">

		<div class = "title">

			<h2>Nuevo contacto</h2>

		</div>

		<h3>Nombres: {{ $names }}</h3>

		<h3>Correo electrónico: {{ $email }}</h3>

		<h3>Mensaje: {{ $send }}</h3>

	</div>
	
</body>

</html>