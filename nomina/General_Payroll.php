
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


h{ align-text:center }h1

    </style>
    <title></title>
  </head>
  <body>
                <h1> Nomina </h1>


   

    <?php
    $conn = new mysqli("localhost" , "root" , "root" , "business_1");
    $data = $conn->query("SELECT * from workers order by apellido_paterno;");
    $wa =   $conn->query("SELECT * from worker_wage , workers WHERE worker_id = id;");

  while ($t = mysqli_fetch_array($data)){


    $id = $t ['id'];
    $f = "NA";


    $n = $t ['apellido_paterno']; $n .= " "; $n .= $t['apellido_materno'];  $n .= " "; $n .=  $t['nombre'];
    $h = $t ['work_hours'];

    while ($d = mysqli_fetch_array($wa)){

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
    $afore =  abs($net_wage * 0.065 - $ss);
    $vi = abs($net_wage * 0.05 - $ss - $afore);

    if ($net_wage > 1000){
      $isr = abs(0.33 * $net_wage - $ss - $afore - $vi);
    }else{
      $isr = abs(0.25 * $net_wage - $ss - $afore - $vi);
    }


     ?>
      <img src="em.png" width="300" height="150" alt="imagen">
      <table border = "1px" style = "text-align:center; width:100%;">
        <thead>
          <th>Nombre</th>
          <th>Fecha</th>
          <th>Horas</th>
        </thead>
        <thead>
          <th><?php echo $n; ?></th>
          <th><?php echo $f; ?></th>
          <th><?php echo $h; ?></th>
        </thead>
        <thead>
          <th>Abono</th>
          <th>Concepto</th>
          <th>Deducciones</th>
        </thead>
        <tbody>
          <tr>
            <td><?php echo $net_wage - ($extra_hours * $w * 2) ; ?></td>
            <td>Salario neto</td>
            <td></td>
          </tr>
          <tr>
            <td><?php echo ($extra_hours * $w * 2) ; ?></td>
            <td>Horas extra</td>
            <td></td>
          </tr>
          <tr>
            <td></td>
            <td>Seguro social</td>
            <td><?php echo $ss; ?></td>
          </tr>
          <tr>
            <td></td>
            <td>Afore</td>
            <td><?php echo $afore; ?></td>
          </tr>
          <tr>
            <td></td>
            <td>Vivienda</td>
            <td><?php echo $vi;?></td>
          </tr>
          <tr>
            <td></td>
            <td>ISR</td>
            <td><?php echo $isr ; ?></td>
          </tr>
          <tr>
            <td>Total = <?php echo $net_wage; ?></td>
            <td></td>
            <td>Total = <?php echo $ss + $afore + $vi + $isr; ?></td>
          </tr>
          <tr>

          </tr>
        </tbody>
      </table>
      


     

      <table border="1px" style="margin-bottom: 0%;">
        <thead>
          <th style="text-align:left; padding:60px;"> Pagar  a <?php echo "$n " ?>la cantidad de <?php echo $net_wage - ($ss + $afore + $vi + $isr); ?> USD </th>
        </thead>
        <tbody>
          <tr>
            <td style="text-align:left; padding:60px;" >Autorizado por: Lic. Jorge el Curioso</td>
          </tr>
        </tbody>
      </table>
      
      <table border= "3px" style="text-align:center;">
        <thead>
          <th>TOTAL A LIQUIDAR</th>
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
      
       
    <?php } ?>

  </body>
</html>
