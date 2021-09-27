<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<link rel="stylesheet" href="{{asset('css/style.css')}}">
	<style>
	.code{
		margin-top: 50%;
		box-shadow: 10px 10px 15px #565656;
		background-color: red;
	}
	
	@media only screen and (max-width: 768px) {
	  /* For mobile phones: */
	  [class*="input"] {
		height: 25px;
	    width: 80vw;
	  }
	}

	@media (min-width: 1500px) {
	  /* For mobile phones: */
	  [class*="input"] {
		height: 40px;
	  }
	}

	.other__div{
		position: relative;
		display: flex;
		justify-content: center;
  		align-items: center;
  		background-color: red;
		height: 0px;
	}
	#particles-js{
		position: fixed;
	}
	</style>	
</head>
<body>
	<div id="particles-js"></div>
	<div class="other__div">
		<div class="code">
		{!! QrCode::size(300)->generate($link); !!}
		</div>
	</div>


<script src="{{asset('js/particles.js')}}"></script>
<script src="{{asset('js/app.js')}}"></script>
</body>
</html>