<!DOCTYPE html>

<html>

	<head>
		<title> <?php echo $this->data[ 'title' ]; ?> </title>
		<link rel="stylesheet" href="/Procres/files/style.css">
		<meta name="viewport" content="width=device-width, initial-scale=1">
	</head>


	<body>

		<?php $this->show_nav(); ?>

		<div class="company"> <?php echo $this->data[ 'company' ]; ?> </div>
		<?php if ( $_SESSION[ 'type' ] != "admin" ) echo "<style> #left_nav { display: none !important; } html { padding-left: 10px !important; } </style>"; ?>
		<a class="signed_in_user" href=<?php echo "\"index.php?path=user_controller/view/" . $_SESSION[ 'id' ] . "\""; ?> > <?php echo $_SESSION[ 'username' ]; ?> </a>


		<div class="center" >

			<h1> <?php echo $this->data[ 'title' ]; ?>  </h1>

			<?php

			// Contract obsolete / finalised

			if ( contract_obsolete( $this->data[ 'id' ] ) or contract_finalised ( $this->data[ 'id' ] ) )
			{

				if ( contract_finalised ( $this->data[ 'id' ] ) and ! contract_obsolete( $this->data[ 'id' ] ) )
					echo "<h2> Contract is done. </h2>";

				if ( ! contract_finalised ( $this->data[ 'id' ] ) and contract_obsolete( $this->data[ 'id' ] ) )
					echo "<h2> Contract is obsolete. </h2>";

				if ( contract_finalised ( $this->data[ 'id' ] ) and contract_obsolete( $this->data[ 'id' ] ) )
					echo "<h2> Contract is done and obsolete. </h2>";


				echo "<style> html{ background-color: rgb( 234, 234, 234 ); } </style>";

				echo "<div class=\"div_center\">";
				if ( $_SESSION[ 'type' ] == "admin" )
					echo "<h2 class=\"delete_border\" style=\"width: 70%; text-align: center;\"> <a href=\"index.php?path=contract_controller/delete/" . $this->data[ 'id' ] . "\">Delete the entire contract</a>, not each  part on its own. </h2>";
				else
					echo "<h2 class=\"delete_border\" style=\"width: 70%;\"> Please tell an admin to delete contract. </h2>";
				echo "</div>";
			}

			?>

	    </div>



		<?php

		$parts = $this->data[ 'parts' ];

		foreach ( $parts as $part )
			if ( $part->get_contract_id() == $this->data[ 'id' ] )
				echo "
				<div class=\"progress_div\"> 
					<b title=\"Progress\">" . $part->get_part_name() . ": </b>
					<div class=\"behind_progress\">
						<div class=\"progress\" style=\"width: " . $part->get_progress() . "%;\" > 
							<span> " . $part->get_progress() . "% </span> 
						</div> 
					</div> 
					<span> / 100% </span>
					<a title=\"Edit Progress\" href=\"index.php?path=part_controller/view/" .$part->get_id() . "\" > Edit Progress</a> 
					<a title=\"Delete this Part\" href=\"index.php?path=part_controller/delete/" .$part->get_id() . "\" > Delete Part</a>				
				</div> ";

		?>

		<br> 

		<a class="add_part_href" title="Add Part" href=<?php echo "index.php?path=part_controller/create/" . $this->data[ 'id' ]; ?> > Add Part </a>


		<br> <br> <br>
 
		<a title="Return to View Contract" href=<?php echo "index.php?path=contract_controller/view/" . $this	->data[ 'id' ]; ?> > Return to View Contract </a>

		<br>


	</body>

</html>