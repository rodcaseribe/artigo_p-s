<html>
        <head>
                <meta charset="utf-8">
                <link rel="stylesheet" href="stilo.css" media="screen" type="text/css" />
                <title>Calculo de Sub-Redes com PHP </title>  
        </head>
        <body>
                <h1 align=center>Cálculo de Sub Redes com PHP </h1>
                <div align="center"><h4 align=center style="color: white; width:140px;background-color: #3F51B5"> Subredes maior que CIDR 24</h4></div>
                <h5  align=center style="color: blue;">Quantidade de Hosts e Faixa de Ips = 256 / (2^(CIDR-24))-2</h5>
                <div align="center"><h4 align=center style="color: white; width:140px;background-color: red"> Máscara maior que CIDR 24</h4></div>
                <h5  align=center style="color: red;">Máscara = 256 - Hosts -2</h5>
                <hr noshade size="1" width="40%">
                <div align="center"><h4 style="color: white; width: 140px;background-color: #3F51B5"> Subredes menor que CIDR 24 e maior que 16 ou entre 8 e 16</h4></div>
                <h5 align=center  style="color: blue;">Quantidade de Hosts =256 * (2^(24-CIDR))-2</h5>
                <div align="center"><h4 align=center style="color: white; width:140px;background-color: red"> Máscara maior que CIDR 16 e menor que CIDR 24 </h4></div>
                <h5  align=center style="color: red;">Máscara = 256 - (2^24-CIDR)</h5>
		<div align="center"><h4 align=center style="color: white; width:140px;background-color: orange"> Faixa de Ips Validos CIDR maior que 16 e menor que 24:</h4></div>
                <h5  align=center style="color: orange;">Faixa de Ips: (Quantidade de Hosts+2/256)-1 </h5>
                <div align="center"><h4 align=center style="color: white; width:140px;background-color: red"> Máscara maior que CIDR 8 e menor que CIDR 16 </h4></div>
                <h5  align=center style="color: red;">Máscara = 256 - (2^16-CIDR)</h5>
                <div align="center"><h4 align=center style="color: white; width:140px;background-color: orange"> Faixa de Ips Validos CIDR maior que 8 e menor que 16:</h4></div>
                <h5  align=center style="color: orange;">Faixa de Ips: (2^(16-CIDR))-1 </h5>
		<!--<div align="center"><h4 align=center style="color: white; width:140px;background-color: red"> Máscara maior que CIDR 0 e menor que CIDR 8 </h4></div>
                <h5  align=center style="color: red;">Máscara = 256 - (2^8-CIDR)</h5>-->
                <form  align=center  method="post" onsubmit="return valida_form(this)">
                        <p>IP: <input class="rounded" type="text" id="ip" name="ip" placeholder="IP"><br>
                        &nbsp;&nbsp;<b>/</b>&nbsp;&nbsp;&nbsp;
                        <input class="rounded" type="number" id="barra" name="barra" placeholder="CIDR"></p>
                        <input type="submit" value="Calcular">
                </form>


<?php header('Content-Type: text/html; charset=utf-8');

		/*if(isset($_POST['ip']) && !empty($_POST['ip']) && isset($_POST['barra']) !empty($_POST['barra'])){*/
                if($_POST){
                $entrada1=$_POST['ip'];
                $entrada2=$_POST['barra'];
                $array=explode(".",$entrada1);
			/*f($entrada2=="" || $entrada1==""){
				echo "erro";
			}*/
                        if($entrada2==24){
                        	echo "Quantidade de IPs: 254 Hosts válidos."."<br>";
                        	echo "Máscara = 255.255.255.0";
                        }
                        if($entrada2==16){
                        	echo "Quantidade de IPs: 65534 Hosts válidos"."<br>";
                        	echo "Máscara = 255.255.0.0";
                        }
                        if($entrada2==8){
                        	echo "Quantidade de IPs: 16777216 Hosts válidoss"."<br>";
                        	echo "Máscara = 255.0.0.0";
                        }
                        if($entrada2<24 && $entrada2!=24 && $entrada2!=16 && $entrada2!=8){
                        	$a=24-$entrada2;
                        	$b=(256*pow(2,$a))-2;
                        	echo "Quantidade de IPs: ".$b." Hosts válidos"."<br>";
                        	if($entrada2>16){
                                	$c=24-$entrada2;
                                	$d=pow(2,$c);
                                	$e=256-$d;
                                	echo "Máscara = 255.255.".$e.".0"."<br>";
                                	$f = (($b+2)/256)-1;
                                	$g=$array[2]+$f;
                                	echo "Ips válidos: ".$array[0].".".$array[1].".".$array[2].".1 -".$array[0].".".$array[1].".".$g.".254"."<br>";
                                }
                                elseif($entrada2>8 && $entrada2<16){
                                	$c=16-$entrada2;
                                	$d=pow(2,$c);
                                	$e=256-$d;
                                	echo "Máscara = 255.".$e.".0.0"."<br>";
                                	$h=16-$entrada2;
                                	$i=pow(2,$h)-1;
                                	echo "Ips válidos: ".$array[0].".".$array[1].".".$array[2].".1 -".$array[0].".".$i.".255.254";
                           	}	
                                else{
                                	echo "CIDR Classe D e E utilizados para Multicast";
                            	}
                        }
                        if($entrada2>24){
                        	$a=$entrada2-24;
                        	$b=(256/pow(2,$a))-2;            
                        	$c=256-$b-2;                      
                        	echo "Quantidade de IPs: ".$b." Hosts válidos "."<br>";
                        	echo "Faixa de IP: ".$array[0].".".$array[1].".".$array[2].".".$array[3]." - ".$array[0].".".$array[1].".".$array[2].".".$b."<br>";
                        	echo "Máscara = 255.255.255.".$c;
                        }

                }

?>
<script src="erro.js"></script>
        </body>
</html>
