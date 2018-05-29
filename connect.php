<?php
    header('Content-Type: text/html; charset=utf-8'); //Корректное отображение кириллицы
    // A simple PHP script demonstrating how to connect to MySQL.
    // Press the 'Run' button on the top to start the web server,
    // then click the URL that is emitted to the Output tab of the console.

    $servername = getenv('IP');
    $username = getenv('C9_USER');
    $password = "includer";
    $database = "c9";
    $dbport = 3306;

    // Create connection
    $db = new mysqli($servername, $username, $password, $database, $dbport);
    mysqli_set_charset($db, 'utf8');
    // Check connection
    if ($db->connect_error) 
    {
        die("Connection failed: " . $db->connect_error);
    }
    //SELECT in DB
    
    /*$query = "SELECT ID FROM `question` WHERE ID=1";
    $result = mysqli_query($db, $query); // запрос на выборку

    #echo mysqli_result($result);
    
    while($row=mysqli_fetch_array($result))
    {
    #echo '<p><b>ID=</b>'.$row['ID'].'. <b>Вопрос:</b> '.$row['QUESTION'].'</p>';// выводим данные
    echo $row['ID'];
    }*/
    
    #header("Location:index.php");
?>