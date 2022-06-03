<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
 <style >
    body {background : black;}
    </style>
    <?php
    $n = $_GET["i_name"];
    $conn = new mysqli('localhost' , 'root' , 'root' , 'save_names'); ?>

    <form class="" action="add.php" method="GET">
      <input type="text" name="i_name" value="" placeholder="enter a name">
      <input type="submit" name="" value="submit name">

      <?php

    if (isset($_REQUEST["i_name"])){
      $sql = " INSERT INTO m_names VALUES ('$n');";

      if ($conn->query($sql) == TRUE)
      {
        echo "New name was added successfully"; ?> <h2>click <a href= "conexion.php">here</a> to go back</h2> <?php
        $conn->close();
      }
      else { echo "There was a problem";
      $conn->close();}
    }
         ?>
    </form>

  </body>
</html>
