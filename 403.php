<!DOCTYPE html>
<html>
<head>
	<meta charset='utf-8'>
	<meta http-equiv='X-UA-Compatible' content='IE=edge'>
	<title>Erreur 403</title>
	<meta name='viewport' content='width=device-width, initial-scale=1'>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<style>
		$font: 'Poppins', sans-serif;
		.fonta{
			background-color: #8c7ae6; !important
		}
		body {
		width: 100%;
		height: 100vh;
		display: flex;
		align-items: center;
		justify-content: center;
		flex-direction: column;
		family: $font;
			background-image: linear-gradient(45deg, #f6d200 25%, #181617 25%, #181617 50%, #f6d200 50%, #f6d200 75%, #181617 75%, #181617 100%);
		}

		h1 { 
		text-transform: uppercase;
		background: repeating-linear-gradient(
		45deg,
		#f6d200 ,
		#f6d200  10px,
		#181617  10px,
		#181617  20px
		);
		-webkit-background-clip: text;
		-webkit-text-fill-color: transparent;
		/*animation: move 5s ease infinite;*/
		font-size: 384px;
		margin: 0;
		line-height: .7;
		position: relative;
		&:before,
		&:after{
			content: "Caution";
				background-color: #f6d200;
				color: #181617;
				border-radius: 10px;
				font-size: 35px;
				position: absolute;
				padding: 31px;
				text-transform: uppercase;
				font-weight: bold;
				-webkit-text-fill-color: #181617;
				left: 50%;
				top: 50%;
				transform: translate(-50%, -50%) rotate(20deg);
		}
		&:before {
			content: "";
			padding: 70px 130px;
			background: repeating-linear-gradient(45deg, #f6d200, #f6d200 10px, #181617 10px, #181617 20px);
			box-shadow: 0px 0px 10px #181617;
		}
		& span:before,
		& span:after{
			content: "";
				width: 8px;
				height: 8px;
				background: #757575;
				color: #757575;
				border-radius: 50%;
				position: absolute;
				bottom: 0;
				margin: auto;
				top: 20%;
				z-index: 3;
				box-shadow: 0px 60px 0 0px;
		}
		span:before {
			left: 37%;
		transform: rotate(22deg);
		top: -44%;
		}
		span:after {
			right: 34%;
		transform: rotate(22deg);
		top: 3%;
		}
	}

	.grade{
		margin: 150px 0 ;
	}
	.txt{
		margin: 20px 0; 
		color: whitesmoke;
		background-color: #353b48;
		box-shadow: 10px 5px 5px grey;
	}
</style>


<body>
<div class="fonta">
	<h1 class="d-flex justify-content-center grade"><span>403</span></h1>
	<h3 class="d-flex justify-content-center txt">Actuellement, nous trouvons aucune session de votre part veuillez vous reconnecter.</h3>
	<div class="d-flex justify-content-center"><button class="btn btn-secondary btn-lg" type="button" onclick="openindex()">Je m'identifie.</button></div>
	
</div>
</body>
</html>


<script>
function openindex()
{
	window.location.replace("index.php");
}
</script>