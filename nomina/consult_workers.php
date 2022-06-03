<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>consult workers</title>
    <link rel="stylesheet" href="style.css">
  </head>
  <body>
<style >
    body {background : black;}
    </style>

    <?php $conn = new  mysqli("localhost" , "root" , "root" , "business_1" );
          $data = $conn->query("SELECT * FROM workers , worker_wage where id = worker_id ORDER BY apellido_paterno; ");?>

  <div class="workers">
    <table border="1px">
      <thead>
        <th>ID</th>
        <th>Nombre (s)</th>
        <th>Apellido Paterno</th>
        <th>Apellido Materno</th>
        <th>Worked Hours</th>
        <th>Wage per hour</th>
      </thead>
      <tbody>
        <?php while ($w = mysqli_fetch_array($data)) { ?>
        <tr>
            <td> <?php echo $w['id']; ?></td>
            <td> <?php echo $w['apellido_paterno']; ?></td>
            <td> <?php echo $w['apellido_materno']; ?></td>
            <td> <?php echo $w['nombre']; ?></td>
            <td> <?php echo $w['work_hours']; ?></td>
            <td> <?php echo $w['normal_hour']; ?></td>
        </tr>
        <?php } ?>
      </tbody>
    </table>
  </div>

  <button class = "back" onclick="window.location.href='manage_workers.php'">BACK</button>

  </body>
</html>
