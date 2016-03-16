<?php
$salario     = $_POST['salario'];
$irrf        = 0;
$inss        = 0;
$salario_liquido = 0;
$salario_bruto   = 0;
$deducao     = 0;
$faixairrf   = "string";
$faixainss   = "string";
?>
<!DOCTYPE html>
<html>
<head>
  <title>Calculo IR</title>
  <meta charset="utf-8">
</head>
<body>
<h2 align="center"><font face="Verdana">CALCULO DO IRRF</font></h2>

<center><font face="verdana" color="red">Obs.: Use ponto no lugar da virgula</font><br><br></h1></center>

<font face="Verdana"><center>

  	
		<?php 
    $salario_bruto = $salario;

  if ($salario <= 1556.94)
     
      {
            $inss=($salario * 0.08 );
            $faixainss=("Faixa A do  INSS é de 8% \n");
       
      }
      elseif ($salario > 1556.94 && $salario <= 2594.92) 
      {
            $inss=($salario * 0.09);
            $faixainss=("Faixa B do  INSS é de 9% \n");
      }
      elseif ($salario > 2594.92 && $salario <= 5189.82) 
      {
            $inss=($salario * 0.11);
            $faixainss=("Faixa C do  INSS é de 11% \n");
      }
      elseif ($salario > 5189.82) 
      {
           $inss=(5189.82 * 0.11);
           $faixainss=("Faixa D do  INSS acima do teto é de 11% sobre R$ 5189.82 \n");
      }

     ?>

     <?php

    // Calculo de IR
     $salario-=$inss;
   if ($salario <= 1903.98)
     {
            $irrf=0;
            $faixairrf=("Faixa isenta de cobranca de IRRF");
            $deducao = 0;
       

     }
     elseif ($salario > 1903.98 && $salario <= 2826.65)
      {
            $irrf=(($salario * 0.075 )-142.80);
            $faixairrf=("Faixa B do  IR é de 7.5% \n");
            $deducao = 142.80;
       
      }
      elseif ($salario > 2826.65 && $salario <= 3751.05) 
      {
            $irrf=(($salario * 0.15)-354.80);
            $faixairrf=("Faixa C do  IR é de 15% \n");
            $deducao = 354.80;
      }
		  elseif ($salario > 3751.05 && $salario <= 4664.68) 
      {
            $irrf=(($salario * 0.225)-636.13);
            $faixairrf=("Faixa D do  IR é de 22.5% \n");
            $deducao = 636.13;
      }
      elseif ($salario > 4664.68) 
      {
           $irrf=(($salario * 0.275)-869.36);
           $faixairrf=("Faixa E do  IR é de 27.5% \n");
           $deducao = 869.36;
      }
      
      
     
 
      $salario_liquido=$salario_bruto - $inss - $irrf;



  echo "<table border=1 width=50%>\n";  

  $salario_bruto=number_format($salario_bruto,2,",",".");
  echo "<tr><td colspan=2>Salário Bruto: </td> <td><p align=right>$salario_bruto<br></p></tr>\n";

  $irrf=number_format($irrf,2,",",".");
  echo "<tr><td colspan=2>$faixairrf </td> <td><p align=right>$irrf<br></p></tr>\n";

      $inss=number_format($inss,2,",",".");
  echo "<tr><td colspan=2>$faixainss </td> <td><p align=right>$inss<br></p></tr>\n";

  $salario_liquido=number_format($salario_liquido,2,",",".");
  echo "<tr><td colspan=2>Salário Bruto:</td> <td><p align=right>$salario_liquido<br></p></tr>\n";

      
  ?>

	
</body>
</html>