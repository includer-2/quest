<?php
  include ('connect.php');
  /*Отладочная инфа*/
  echo "Connected to DB: (".$db->host_info.") <br />";

  /*
  Уже сделал:
  1. В момент прогрузки страницы делать селект в БД с номером вопроса(брать из измени php файла) и получать правильный ответ
  2. По сути номер страницы = 1, равен номеру вопроса = 1
  3. В конце делаем проверку, что если введенный ответ=ответу из БД, то редиректим дальше.
  4. Вводимый текст обернул в strtoupper, чтобы он всегда был заглавными буквами, из БД тоже все получаю в strtoupper.
   
  TODO:
  1. Надо изучить лоигн с куками чтобы: добавить логин, либо добавить проверку, чтобы участник не могу пройти дальше использую URL.
      Реализация такая → Добавить участнику признак в БД, в который будет писаться его текущий уровень=уровню страницы.
                       → При входе на страницу 2 с уровнем 1, будет проверка, не больше ли его уровень, чем страница. Если больше, то редиректить или еще что делать
  */
  /*Концепция ниже → Возьму название страницы для выборки из БД, т.е. страница №1 = вопросу №1*/
  $path = __FILE__;
  $file = basename($path, ".php");
  $query = "SELECT QUESTION FROM `question` WHERE ID=$file";
  $result = mysqli_query($db, $query); 
  while($row=mysqli_fetch_array($result))
  {
    $answer = strtoupper($row['QUESTION']);
    echo $row['QUESTION'];
  }
?>
<html>
    <head>
        <link href="css/main.css" rel="stylesheet">
        <title>Part I</title>
    </head>
  <body>
    <div class="container">
      <div class="row content">
        <div class="col-md-6 ff text-center" align=center>
          <img src="https://open-paas.org/images/icon-opensource.svg" width="250">
          <p id="nome">source</p>
          <form name="key" align=center action="" method=post>
            <input type="text" name="key" class="text-center" placeholder="key"><br><br>
            <button type="submit">Go!</button>
              <?php
              	if(strtoupper($_POST['key']) == $answer):
              	  header( "Location: ./fun/good.html" );
              	elseif ($_POST['key']!=$answer): {
                  echo "<br / >".strtoupper($_POST['key']).": не верно";
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