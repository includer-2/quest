<?php
  include ('connect.php');
  $path = __FILE__;
  $file = basename($path, ".php");
  $query = "SELECT QUESTION FROM `question` WHERE ID=$file";
  $result = mysqli_query($db, $query); 
  while($row=mysqli_fetch_array($result))
  {
    $answer = strtolower($row['QUESTION']);
  }
  echo strtolower($answer);
?>
<html>
    <head>
        <link href="css/main.css" rel="stylesheet">
        <title>Part II</title>
    </head>
  <body>
    <div class="container">
      <div class="row content">
        <div class="col-md-6 ff text-center" align=center>
          <div class='hint'><?php echo $answer; ?></div>
          <img src="https://qph.fs.quoracdn.net/main-qimg-c51824c3579eb96c436345ce433058e3" width="250"></img>
          <p id="nome">white</p>
          <form name="key" align=center action="" method=post>
            <input type="text" name="key" class="text-center" placeholder="key"><br><br>
            <button type="submit">Go!</button>
              <?php
              	if(strtolower($_POST['key']) == $answer):
              	  header( "Location: ./fun/good.html" );
              	elseif ($_POST['key']!=$answer): {
                  echo "<br / >".strtolower($_POST['key']).": не верно";
              	}
              	endif;
              ?>
          </form>
        </div>
      </div>
    </div>
    <a href="index.html" class="link home-link">HOME</a>
    <!-- key="How are you?" -->
  </body>
</html>