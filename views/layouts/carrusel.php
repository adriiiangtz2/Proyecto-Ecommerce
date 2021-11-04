<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Carousel / Slider con Glider.js</title>
	<link href="https://fonts.googleapis.com/css2?family=Montserrat&family=Open+Sans&display=swap" rel="stylesheet"> 
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/normalize.css@8.0.1/normalize.min.css">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/glider-js@1.7.3/glider.min.css">
	<link rel="stylesheet" href="css/estilos.css">
</head>
<body>
	<div class="">

		<div class="carousel">
			<div class="carousel__contenedor">
				<button aria-label="Anterior" class="carousel__anterior">
					<i class="fas fa-chevron-left"></i>
				</button>

				<div class="carousel__lista">
					<div class="carousel__elemento">
						<img src="img/carrusel/pexels-1.jpg" alt="Rock and Roll Hall of Fame">
						<p>Rock and Roll Hall of Fame</p>
					</div>
					<div class="carousel__elemento">
						<img src="img/carrusel/pexels-2.jpg" alt="Constitution Square - Tower I">
						<p>Constitution Square - Tower I</p>
					</div>
					<div class="carousel__elemento">
						<img src="img/carrusel/pexels-3.jpg" alt="Empire State Building">
						<p>Empire State Building</p>
					</div>
					<div class="carousel__elemento">
						<img src="img/carrusel/pexels-4.jpg" alt="Harmony Tower">
						<p>Harmony Tower</p>
					</div>
	
					<div class="carousel__elemento">
						<img src="img/carrusel/pexels-5.jpg" alt="Empire State Building">
						<p>Empire State Building</p>
					</div>
					<div class="carousel__elemento">
						<img src="img/carrusel/pexels-6.jpg" alt="Harmony Tower">
						<p>Harmony Tower</p>
					</div>
					<div class="carousel__elemento">
						<img src="img/carrusel/pexels-7.jpg" alt="Empire State Building">
						<p>Empire State Building</p>
					</div>
					<div class="carousel__elemento">
						<img src="img/carrusel/pexels-8.jpg" alt="Harmony Tower">
						<p>Harmony Tower</p>
					</div>
				</div>

				<button aria-label="Siguiente" class="carousel__siguiente">
					<i class="fas fa-chevron-right"></i>
				</button>
			</div>

			<div role="tablist" class="carousel__indicadores"></div>
		</div>
	</div>

	<script src="https://cdn.jsdelivr.net/npm/glider-js@1.7.3/glider.min.js"></script>
	<script src="https://kit.fontawesome.com/2c36e9b7b1.js" crossorigin="anonymous"></script>
	<script src="js/carrusel.js"></script>
</body>
</html>