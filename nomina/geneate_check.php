<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">

    <style media="screen">

    @media print {

       .s{
         visibility: hidden;
          display: none;
       }
    }

    button {
      background-color: #555;
      color: white;
      float: center;
      border: none;
      outline: none;
      cursor: pointer;
      padding: 14px 16px;
      font-size: 17px;
      width: 25%;
    }

    button:hover{
        background-color: #706f6f;
    }



    </style>
    <title></title>
  </head>
  <body>
    <?php

    $id = $_POST['id'];
    $f = $_POST['f'];
    $w = 12.5;
    $conn = new mysqli("localhost" , "root" , "root" , "business_1");
    $data = $conn->query("SELECT * from workers WHERE id = '$id';");
    $wa =   $conn->query("SELECT * from worker_wage , workers WHERE worker_id = id;");

    while ($t = mysqli_fetch_array($data)) {

        $n = $t ['apellido_paterno']; $n .= " "; $n .= $t['apellido_materno'];  $n .= " "; $n .=  $t['nombre'];
        $h = $t ['work_hours'];
    }

    while ($d = mysqli_fetch_array($wa)) {

        $w = $d ['normal_hour'];
    }


    $isr = 0;

    if ($h > 40){
      $extra_hours = ($h - 40 );
      $net_wage = $w * 40 + ($extra_hours * $w * 2);
    }else{
      $net_wage = $w * $h;
      $extra_hours = 0;
    }

    $ss = $net_wage * 0.075;
    $afore =  $net_wage * 0.065 - $ss;
    $vi = $net_wage * 0.05 - $ss - $afore;

    if ($net_wage > 1000){
      $isr = 0.33 * $net_wage - $ss - $afore - $vi;
    }else{
      $isr = 0.25 * $net_wage - $ss - $afore - $vi;
    }


     ?>
 <img src="bbva.png" align="top">
      <table border="1px" align= center>
        <thead>
          <th style="text-align:center; padding:60px;">Fecha: <?php echo $f; ?> Pagar  a <?php echo $n ?>la cantidad de <?php echo $net_wage - ($ss + $afore + $vi + $isr); ?> USD </th>
        </thead>
        <tbody>
          <tr>
            <td style="text-align:center; padding:60px;" >Autorizado por: Lic. Jorge el Curioso</td>
          </tr>
        </tbody>
      </table>
 <table border= "1px" style="text-align:center;" align="center">
        <thead>
          <th>Total a pagar </th>
        </thead>
        <tbody>
          <tr>
            <td><?php echo $net_wage - ($ss + $afore + $vi + $isr); ?>$</td>
          </tr>
        </tbody>
      </table>
      <div class="s">
        <button onclick="window.print()">Print or download PDF</button>
        <button onclick="window.location.href = 'index.php'">Back</button>
      </div>

  </body>
</html>
