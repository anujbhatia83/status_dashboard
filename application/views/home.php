<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="<?php echo APP_NAME; ?>/public/css/pwa.css" rel="stylesheet" type="text/css">

    <title>Status Dashboard</title>
  </head>
  <body class="fullscreen">
  	<div class="container">
  		<?php foreach ($employees as $e) { ?>
	  		<div class="row">
	  			<div class="col-lg-12 col-sm-12">
	  				<div class="cards">
	  					<div class="row">
	  						<div class="col-8">
	  							<p><?php echo $e['name'] ?></p>
	  							<p><?php echo $e['location'] ?></p>
	  						</div>
	  						<div class="col-4">
	  							<label class="switch">
  									<input type="checkbox">
			 						<span class="slider round"></span>
								</label>
	  						</div>
	  						<!-- <div class="col-4">
	  							<p>Anuj Bhatia</p>
	  							<p>MacArthur Avenue</p>
	  						</div> -->
	  					</div>
	  				</div>
	  			</div>
	  		</div>
	  	<?php } ?>
  		
  	</div>
    

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>