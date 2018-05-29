<?php
	if($_POST['key']=="1"):
			#echo htmlspecialchars("Good");
			header( "Location: ./fun/good.html" );
	elseif($_POST['key']!="1"):
		#echo htmlspecialchars($_POST['bad']==bad);
		header("Location:.");
	endif;
?>