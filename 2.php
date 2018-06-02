<?php
  include ('connect.php');
  include('members.php');
  $path = __FILE__;
  $file = basename($path, ".php");
  $query = "SELECT QUESTION FROM `question` WHERE ID=$file";
  $result = mysqli_query($db, $query); 
  while($row=mysqli_fetch_array($result))
  {
    $answer = strtolower($row['QUESTION']);
  }
?>
<html>
    <head>
        <link href="css/main.css" rel="stylesheet">
        <link href="css/share.css" rel="stylesheet">
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
    
    <div class="right">
      <ul class="share-buttons">
      <li>
      	<a href="https://vk.com/share.php?url=https://web-askaptyuk.c9users.io" target="_blank" title="VK">
      		<img alt="Share on VK" src="images/simple_icons_black/vk.png" />
      	</a>
      </li>
      <li>
      	<a href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fweb-askaptyuk.c9users.io%2F1.php&quote=WEB%20Quest" title="Share on Facebook" target="_blank">
      		<img alt="Share on Facebook" src="images/simple_icons_black/Facebook.png" />
      	</a>
      </li>
      <li>
      	<a href="https://twitter.com/intent/tweet?source=https%3A%2F%2Fweb-askaptyuk.c9users.io%2F1.php&text=WEB%20Quest:%20https%3A%2F%2Fweb-askaptyuk.c9users.io%2F1.php" target="_blank" title="Tweet">
      		<img alt="Tweet" src="images/simple_icons_black/Twitter.png" />
      	</a>
      </li>
      </ul>
    </div>
    <a href="index.html" class="link home-link">HOME</a>
    <!-- key="How are you?" -->
  </body>
</html>