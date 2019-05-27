<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">
	<title>CI URL-Shortener</title>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<!-- Custom CSS for basic styling -->
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/style.css" />
</head>
<body>
	<nav class="navbar navbar-default navbar-fixed-top">
		<div class="container">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="#">CI URL-Shortener</a>
			</div>
			<div id="navbar" class="collapse navbar-collapse">
				<ul class="nav navbar-nav">
					<li class="active"><a href="<?php echo base_url(); ?>">Home</a></li>					
				</ul>
			</div>
		</div>
	</nav>
	<div class="container main-container">
		<div class="intro">
			<h1>URL shortener</h1>
		</div>			
		<?php echo form_open(); ?>
		<div class="row">
			<div class="col-lg-8 col-lg-offset-2">
				<div class="input-group">
					<input type="url" name="url" class="form-control" placeholder="Enter your URL here...(eg:http://google.com)" autocomplete="off" />
					<span class="input-group-btn">
						<button class="btn btn-default" type="submit">Go!</button>
					</span>
				</div>
				<?php if( $error ): ?>
					<p class="text-danger"><?php echo $error; ?></p>
				<?php endif; ?>
			</div>
		</div>
		<?php echo form_close(); ?>

		<?php if( $show_details ): ?>
			<div class="well url_data">
				<h2>Your new created Short-URL:</h2>
				<div class="input-group">
					<input type="text" value="<?php echo base_url( $url_data->alias ); ?>" class="form-control input-lg" readonly="readonly" />
					<span class="input-group-btn">
						<a href="<?php echo base_url( $url_data->alias ); ?>" class="btn btn-default btn-lg" target="_blank">
							<span class="glyphicon glyphicon-share-alt" aria-hidden="true"></span>
						</a>
					</span>
				</div>			
			</div>
		<?php endif; ?>
	</div>	
</body>
</html>