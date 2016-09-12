<?php
	//New Post
	if ( $_POST['Info'] <> "" )
	{
		//Zuffalszahl für Zufalslink erstellen damit es keine Events doppelt gibt
		$ID = rand(10000, 99999);
		$LINK = ".php";
		$IDLINK = $ID . $LINK;
		//open stream
		$handle = fopen ( $IDLINK, "w" );
		$handlelisting = fopen ( "listing.html", "a" );
	   	//write from form in stream
	   	
	   	//die neue HTML seite erstellen mit den Infos aus dem Formular
	   	fwrite ( $handle, "<html> 
	   	<head> <meta charset='UTF-8' />
		<meta name='viewport'' content='width=device-width;height=device-height;user-scalable=yes''/>
		<title>VeranstalltungsPlaner</title>		
		<link rel='stylesheet' href='style.css' type='text/css'>
		
		<?php
			include('create.php');
			\$handlezuab = fopen ( '$IDLINK . 1', 'a' );
			fwrite ( \$handlezuab, \$_POST['Name']);
			if( \$_POST['ZuAb'] == 'zusagen')
			{
			fwrite ( \$handlezuab, ' Kommt;' );	
			}
			if( \$_POST['ZuAb'] == 'absagen')
			{
			fwrite ( \$handlezuab, ' Kommt nicht;' );	
			}
			
			fclose ( \$handlezuab );
		?>
		
		</head>
		<body>
		<div id='background'>" 
		);
			
	   	fwrite ( $handle, $_POST['VName']);
	   	fwrite ( $handle, "<br />" );
	   	fwrite ( $handle, $_POST['VDatum']);
	   	fwrite ( $handle, "<br />" );
	   	fwrite ( $handle, $_POST['VZeit']);
	   	fwrite ( $handle, "<br />" );
		fwrite ( $handle, $_POST['Info']);
		fwrite ( $handle, "<br />" );
		
		fwrite ( $handle, "
		<form action='$IDLINK' method='post' align='center'>
		 
		 		<hr>
				<p>	Name:<br />
				<input type='Text' name='Name'>
				</p>
				
				<p>	Zusagen:<br />
				<select name='ZuAb' > 
    			<option value='zusagen'>Zusagen</option> 
        		<option value='absagen'>Absagen</option> 
      			</select> 
				</p>
				<input type='Submit' name='' value='senden'>
				<hr>
				<iframe src='$IDLINK . 1' height='400px' width='90%'></iframe>

		</form>		
		" );
		
		fwrite ( $handle, "	</div></body></html>" );
		
		fwrite ( $handlelisting, $_POST['VName']);
		fwrite ( $handlelisting, $IDLINK);
		fwrite ( $handlelisting, "<br />" );
		fwrite ( $handlelisting, "<hr />" );
		
		//close stream
		fclose ( $handle );	
		fclose ( $handlelisting );
		
		header ($IDLINK);
	    // Datei wird nicht weiter ausgef?hrt
        echo '<script type="text/javascript"> window.location.href = "',$IDLINK,'"; </script>';
	}
?>
