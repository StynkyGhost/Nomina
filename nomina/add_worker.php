<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>consult workers</title>
    <link rel="stylesheet" href="style.css">
  </head>
      <style >
    body {background : black;}
    </style>
  <body>
   
    <?php
      $n = $_POST['n'];
      $ap = $_POST['ap'];
      $am = $_POST['am'];
      $h = $_POST['h'];
      $w = $_POST['w'];
      $conn = new  mysqli("localhost" , "root" , "root" , "business_1" );
        ?>

  <div class="workers">
    <form class="" action="add_worker.php" method="post">
      <input type="text"  name="n" placeholder="nombre (s)">
      <input type="text"  name="ap" placeholder="apellido_paterno">
      <input type="text"  name="am" placeholder="apellido_materno">
      <input  type="number" name="h" placeholder="horas trabajadas">
      <input  type="number" name="w" placeholder="Salario por hora">
      <input class = "m_button" type="Submit" name="s" value="ADD">

    </form>
  </div>

  <?php  if (isset($_REQUEST['s'])){
          $sql = "INSERT INTO workers (nombre , apellido_paterno, apellido_materno , work_hours) VALUES ('$n' , '$ap' , '$am', '$h' );";
          $sql_2 = "INSERT into worker_wage (normal_hour) values ('$w');";
             if ($n != "" && $ap != ""){
              if ( $conn->query($sql) && $conn->query($sql_2)){
               $conn->close();
              ?> <h2 style="color:green">Worker saved ,  click <a href= "consult_workers.php" >Here  </a> to see </h2>
            <?php }else {
              echo "An error ocurred :( ";
            }

          }else{
              ?> <h2 style="color:red">Name and last name are needed</h2>;
            <?php  }

          } ?>

  <button class = "back" onclick="window.location.href='manage_workers.php'">BACK</button>

  </body>
</html>
