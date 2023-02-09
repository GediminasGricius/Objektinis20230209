<?php
require_once "Trupmena.php";
require_once "Darbuotojas.php";


$t1=new Trupmena(2, 1, 4);
$t2=new Trupmena(0, 1, 3);


//$t1->pridetiSv(1);
//$t1->pridetiSD(3, 8);
$t1->pridetiTrupmena($t2);


echo $t1;
echo " = ";
echo $t1->toDouble();
echo "<hr>";
echo $t2;


$jonas=new Darbuotojas();
$jonas->vardas="Jonas";
$petras=new Darbuotojas();
echo $jonas->vardas;










