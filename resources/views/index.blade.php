<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<link rel="stylesheet" href="{{secure_asset('css/style.css')}}">
	<style>
	form{
		margin-top: 50%;
	}
	input {
		width: 40vw;
		height: 30px;

	}
	input:focus {
		box-shadow: 10px 10px 15px #565656;
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
		<form id="form" action="/api/generate" method="GET">
			@csrf
			<input id="input" class="input" name="link" type="text" placeholder="https://www.instagram.com/someone">

		</form>
	</div>


<script src="{{secure_asset('js/particles.js')}}"></script>
<script src="{{secure_asset('js/app.js')}}"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script
  src="https://code.jquery.com/jquery-3.6.0.js"
  integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
  crossorigin="anonymous"></script>
<script>

	$("#form").submit(function(e) {

	    e.preventDefault(); // avoid to execute the actual submit of the form.
	    var form = $(this);
	    var url = form.attr('action');
	    $.ajax({
	       type: "GET",
	       url: url,
	       processData: false,
	       data: form.serialize(), // serializes the form's elements.
	     }).done(function(data){
	     	Swal.fire({
			  html: data,
			  heightAuto: true
			 });
	     	let windowWidth = $(window).width();
			let size = windowWidth > 768 ? 300 : 200 ;

			if(windowWidth < 400) { size = 150}

			console.log('size', size)
		 	document.getElementsByTagName('svg')[0].setAttribute("height", size + "px");
		 	document.getElementsByTagName('svg')[0].setAttribute("width", size + "px");

	     }).fail(function(jqXHR, textStatus, errorThrown) {
		   	Swal.fire('error', 'Something went wrong')
		 });
	});

</script>
</body>
</html>