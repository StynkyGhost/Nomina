<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="style.css">
  </head>
  <style >
    body {background : black;}
    </style>
  <body>

      <div class="formulario">
        <form class="" action="payroll_3.php" method="post">
          <input type="text" name="n" placeholder="Nombre completo por apellidos">
          <input type="text" name="f" placeholder="Fecha">
          <input type="number" name="w" placeholder="Salario por hora">
          <input type="number" name="h" placeholder="Horas de trabajo">

          <input type="submit" name="s" value="GENERATE">

          
        </form>
      </div>

      <button class="tablink" onclick="window.location.href='index.php'">BACK</button>

  </body>
</html>
