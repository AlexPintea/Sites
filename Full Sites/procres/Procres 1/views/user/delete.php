<!DOCTYPE html>

<html>

	<head>
		<title> <?php echo $this->data[ 'title' ]; ?> </title>
		<link rel="stylesheet" href="/Procres/files/style.css">
		<meta name="viewport" content="width=device-width, initial-scale=1">
	</head>



	<style>

		span 
		{
			margin: 5px 0px !important;
			font-size: 10px;
		}

	</style>



	<body>

		<?php $this->show_nav(); ?>

		<div class="company"> <?php echo $this->data[ 'company' ]; ?> </div>
		<?php if ( $_SESSION[ 'type' ] != "admin" ) echo "<style> #left_nav { display: none !important; } html { padding-left: 10px !important; } </style>"; ?>
		<a class="signed_in_user" href=<?php echo "\"index.php?path=user_controller/view/" . $_SESSION[ 'id' ] . "\""; ?> > <?php echo $_SESSION[ 'username' ]; ?> </a>


		<div class="center" >

			<h1> Delete user? </h2>

			<div class="delete_border_center">
			    <div class="delete_border">
					<span> <b>Id:</b> <?php echo $this->data[ 'id' ]; ?> </span> <br>
					<span> <b>Username:</b>  <?php echo $this->data[ 'username' ]; ?> </span> <br>
					<span> <b>Firstname:</b> <?php echo $this->data[ 'firstname' ]; ?> </span> <br>
					<span> <b>Lastname:</b> <?php echo $this->data[ 'lastname' ]; ?> </span> <br>
					<span> <b>Email:</b> <?php echo $this->data[ 'email' ]; ?> </span> <br>
					<span> <b>Type:</b> <?php echo $this->data[ 'type' ]; ?> </span> <br>
				</div> 
			</div>

			<br>

			<b> Deleting User also deletes </b> <br> <b> tasks / contracts ( if user is client ). </b> <br> <br>

			<a class="delete" href=<?php echo "index.php?path=user_controller/delete_user/" . $this->data[ 'id' ]; ?> > Delete</a> - cannot be reversed <br> <br>

			<a href=<?php echo "index.php?path=user_controller/view/" . $this->data[ 'id' ]; ?> > Return to View User </a>

	    </div>

	</body>

</html>