<?php
$db = new mysqli('localhost','root','','aras');

//$sql    = $db->QUERY ("DELETE FROM `tb_alternatif` WHERE kode = 'A0' ");//
$sql    = $db->QUERY ("TRUNCATE `tb_normalisasi` ");
$sql    = $db->QUERY ("TRUNCATE `tb_normalisasi_bobot` ");
$sql    = $db->QUERY ("TRUNCATE `tb_rank`");

?>
<!doctype html>
<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <title>Metode Additive Ratio ASsessment (ARAS) </title>
</head>
<body>

  <div class="container">
<nav class="navbar navbar-expand-lg bg  ">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">ARAS</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php">Perhitungann</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="kriteria.php">Edit Kriteria</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="alternatif.php">Edit Alternatif</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
    <h1>Metode Additive Ratio Assessment (ARAS) </h1>
    <hr>
    <h2>1. Kriteria</h2>
    <table class="table">
      <thead class="table-primary">
        <tr>
          <th class="text-center">No</th>
          <th class="text-center">Kode</th>
          <th class="text-center">Kriteria</th>
          <th class="text-center">Atribut</th>
          <th class="text-center">Bobot</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $no = 1;
		$sql    = $db->QUERY ("SELECT * FROM `tb_kriteria` ORDER BY id ASC ");
		while   ($tampil = mysqli_fetch_array($sql)){
        ?>
          <tr>
            <th class="text-center"><?php echo $no++ ?>.</th>
            <td class="text-center"><?= $tampil['kode'] ;?></td>
            <td class="text-left"><?= $tampil['kriteria'] ;?></td>
            <td class="text-center"><?= $tampil['atribut']; ?></td>
            <td class="text-center"><?=  $tampil['bobot'] ;?></td>
          </tr>
        <?php
        }
        ?>
      </tbody>
    </table>
	
<?php 
		$a    = $db->QUERY ("SELECT MIN(k1) as k1, MAX(k2) as k2, MAX(k3) as k3, MAX(k4) as k4, MAX(k5) as k5, 
																 MAX(k6) as k6, MAX(k7) as k7, MAX(k8) as k8,MAX(k9) as k9, MAX(k10) as k10  
																 FROM tb_alternatif WHERE kode !='A0' ");
		$a1 = mysqli_fetch_array($a);
		$k1 = $a1['k1'];
		$k2 = $a1['k2'];
		$k3 = $a1['k3'];
		$k4 = $a1['k4'];
		$k5 = $a1['k5'];
		$k6 = $a1['k6'];
		$k7 = $a1['k7'];
		$k8 = $a1['k8'];
		$k9 = $a1['k9'];
		$k10 = $a1['k10'];
		$ca   = $db->QUERY ("SELECT *  FROM tb_alternatif WHERE kode='A0' ");
		$ca1 = mysqli_fetch_array($ca);	
		if(!$ca1){
		//echo 'A';
			$sql    = $db->QUERY ("INSERT INTO `tb_alternatif`(`kode`, `alternatif`, `k1`, `k2`, `k3`, `k4`, `k5`, `k6`, `k7`, `k8`, `k9`, `k10`) 
																						  VALUES ('A0','-','$k1','$k2','$k3','$k4','$k5','$k6','$k7','$k8','$k9','$k10') ");	
				//Normalisasi
			$iS    = $db->QUERY ("SELECT * FROM tb_alternatif  ");
			WHILE($iSS = mysqli_fetch_array($iS)){
			$kode1 = $iSS['kode'];
				//ambil A0
				$am    = $db->QUERY ("SELECT * FROM tb_alternatif  WHERE kode ='$kode1' ");
				$am1 = mysqli_fetch_array($am);
				$am11  = $am1['k1'];
				$am12  = $am1['k2'];
				$am13  = $am1['k3'];
				$am14  = $am1['k4'];
				$am15  = $am1['k5'];
				$am16  = $am1['k6'];
				$am17  = $am1['k7'];
				$am18  = $am1['k8'];
				//COST
				$am19  = round(1/$am1['k9'],3); 
				$am100  = round(1/$am1['k10'],3); 
				//SUM  kolom
				$aSUM    = $db->QUERY ("SELECT MIN(k1) as k1, MAX(k2) as k2, MAX(k3) as k3, MAX(k4) as k4, MAX(k5) as k5, 
																 MAX(k6) as k6, MAX(k7) as k7, MAX(k8) as k8,MAX(k9) as k9, MAX(k10) as k10  
																 FROM tb_alternatif ");
				$tSum = mysqli_fetch_array($aSUM);
				$n1 =  round($am11/$tSum['k1'],3); 
				$n2 = round( $am12/$tSum['k2'],3); 
				$n3 =  round($am13/$tSum['k3'],3); 
				$n4 =  round($am14/$tSum['k4'],3); 
				$n5 =  round($am15/$tSum['k5'],3); 
				$n6 =  round($am16/$tSum['k6'],3); 
				$n7 =  round($am17/$tSum['k7'],3); 
				$n8 =  round($am18/$tSum['k8'],3); 
        $n9 =  round($am18/$tSum['k9'],3); 
        $n10 =  round($am18/$tSum['k10'],3); 
					//hitung
					$kode = $iSS['kode'];
					$sql    = $db->QUERY ("INSERT INTO `tb_normalisasi`(`kode`, `k1`, `k2`, `k3`, `k4`, `k5`, `k6`, `k7`, `k8`, `k9`, `k10`) 
																						  VALUES ('$kode','$n1','$n2','$n3','$n4','$n5','$n6','$n7','$k8','$am19','$am100') ");	
				}
				//Update Cost k4 dan k5
				//SUM K4 dan K5
			$s    = $db->QUERY ("SELECT MIN(k1) as k1, MAX(k2) as k2, MAX(k3) as k3, MAX(k4) as k4, MAX(k5) as k5, 
																 MAX(k6) as k6, MAX(k7) as k7, MAX(k8) as k8,MAX(k9) as k9, MAX(k10) as k10  
																 FROM tb_normalisasi  ");
				$s1 = mysqli_fetch_array($s);		
				$sum9 = $s1['k9'];
				$sum10 = $s1['k10'];
				$c1    = $db->QUERY ("SELECT * FROM tb_normalisasi ");
				WHILE($c1s = mysqli_fetch_array($c1)){
				$kode = $c1s['kode'];
				$cik    = $db->QUERY ("SELECT * FROM tb_normalisasi WHERE kode ='$kode' ");
				$ciks = mysqli_fetch_array($cik);
				$c9 =  round($ciks['k9']/$sum9,3);
				$c10 =  round($ciks['k10']/$sum10,3);
				$sql    = $db->QUERY ("UPDATE `tb_normalisasi` SET `k9`='$c9',`k10`='$c10' WHERE kode ='$kode' ");						
				}
						//Normalisasi Bobot 
						$b   = $db->QUERY ("SELECT `kode`, `bobot` FROM `tb_kriteria`");
						WHILE($b1 = mysqli_fetch_array($b)){					
						if($b1['kode']=='K1'){ $kode1= str_replace("K","A",$b1['kode']);  $bb1 = $b1['bobot']; }
						if($b1['kode']=='K2'){ $kode2 = str_replace("K","A",$b1['kode']);  $bb2 = $b1['bobot'];  }
						if($b1['kode']=='K3'){ $kode3 = str_replace("K","A",$b1['kode']);  $bb3 = $b1['bobot']; } 	
						if($b1['kode']=='K4'){ $kode4 = str_replace("K","A",$b1['kode']);  $bb4 = $b1['bobot'];  }	
						if($b1['kode']=='K5'){ $kode5 = str_replace("K","A",$b1['kode']);  $bb5 = $b1['bobot'];  }						
						if($b1['kode']=='K6'){ $kode6 = str_replace("K","A",$b1['kode']);  $bb6 = $b1['bobot'];  }						
						if($b1['kode']=='K7'){ $kode7 = str_replace("K","A",$b1['kode']);  $bb7 = $b1['bobot'];  }						
						if($b1['kode']=='K8'){ $kode8 = str_replace("K","A",$b1['kode']);  $bb8 = $b1['bobot'];  }						
						if($b1['kode']=='K9'){ $kode9 = str_replace("K","A",$b1['kode']);  $bb9 = $b1['bobot'];  }						
						if($b1['kode']=='K10'){ $kode10 = str_replace("K","A",$b1['kode']);  $bb10 = $b1['bobot'];  }						
						}
						for($i = 1; $i <= 10; $i++) {
						$kode = ${"kode$i"};
						$n   = $db->QUERY ("SELECT * FROM tb_normalisasi WHERE kode ='$kode' ");
						WHILE($n1 = mysqli_fetch_array($n)){
						//echo 'BB-'.$bb1;
						//echo 'NN-'.$n1['k1'];
						$nn1 = round($bb1 * $n1['k1'],3);
						$nn2 = round($bb2 * $n1['k2'],3);
						$nn3 = round($bb3 * $n1['k3'],3);
						$nn4 = round($bb4 * $n1['k4'],3);
						$nn5 = round($bb5 * $n1['k5'],3);			
						$nn6 = round($bb6 * $n1['k6'],3);			
						$nn7 = round($bb7 * $n1['k7'],3);			
						$nn8 = round($bb8 * $n1['k8'],3);			
						$nn9 = round($bb9 * $n1['k9'],3);			
						$nn10 = round($bb10 * $n1['k10'],3);			
						$sql    = $db->QUERY ("INSERT INTO `tb_normalisasi_bobot`(`kode`, `k1`, `k2`, `k3`, `k4`, `k5`, `k6`, `k7`, `k8`, `k9`, `k10`) 
																														VALUES ('$kode','$nn1','$nn2','$nn3','$nn4','$nn5','$nn6','$nn7','$nn8','$nn9','$nn10') ");				
						} 
						}
						//A0
						$no   = $db->QUERY ("SELECT * FROM tb_normalisasi WHERE kode ='A0' ");
						$no1 = mysqli_fetch_array($no);
						//echo 'BB-'.$bb1;
						//echo 'NN-'.$n1['k1'];
						$mn1 = round($bb1 * $no1['k1'],3);
						$mn2 = round($bb2 * $no1['k2'],3);
						$mn3 = round($bb3 * $no1['k3'],3);
						$mn4 = round($bb4 * $no1['k4'],3);
						$mn5 = round($bb5 * $no1['k5'],3);			
						$mn6 = round($bb6 * $no1['k6'],3);			
						$mn7 = round($bb7 * $no1['k7'],3);			
						$mn8 = round($bb8 * $no1['k8'],3);			
						$mn9 = round($bb9 * $no1['k9'],3);			
						$mn10 = round($bb10 * $no1['k10'],3);			
							$sql    = $db->QUERY ("INSERT INTO `tb_normalisasi_bobot`(`kode`, `k1`, `k2`, `k3`, `k4`, `k5`, `k6`, `k7`, `k8`, `k9`, `k10`) 
																														VALUES ('A0','$mn1','$mn2','$mn3','$mn4','$mn5','$mn6','$mn7','$mn8','$mn9','$mn10') ");				
						//Hitung Rank
						$ra  = $db->QUERY ("SELECT *  FROM `tb_normalisasi_bobot`");
						WHILE($ra1 = mysqli_fetch_array($ra)){	
						$kode = $ra1['kode'];
							$k1 = round($ra1['k1'],3);
							$k2 =  round($ra1['k2'],3);
							$k3 =  round($ra1['k3'],3);
							$k4 =  round($ra1['k4'],3);
							$k5 =  round($ra1['k5'],3);
							$k6 =  round($ra1['k6'],3);
							$k7 =  round($ra1['k7'],3);
							$k8 =  round($ra1['k8'],3);
							$k9 =  round($ra1['k9'],3);
							$k10 =  round($ra1['k10'],3);
							//SUM mencari Si
							$su = $k1+$k2+$k3+$k4+$k5+$k6+$k7+$k8+$k9+$k10;
								$sql    = $db->QUERY ("INSERT INTO `tb_rank`(`id`, `kode`, `si`, `ki`, `rank`) VALUES ('','$kode','$su','0','0') ");
						} 	
						//UP KI
						$ra  = $db->QUERY ("SELECT *  FROM `tb_rank` WHERE kode ='A0' ");
						$rasi = mysqli_fetch_array($ra);
						$siSum = $rasi['si'];
							$ras  = $db->QUERY ("SELECT *  FROM `tb_rank` WHERE kode !='A0'");
							WHILE($sis1 = mysqli_fetch_array($ras)){	
							$kode1 = $sis1['kode'];
							$si1 = $sis1['si'];
								$tot = round($si1 / $siSum,3);
								$sql    = $db->QUERY ("UPDATE `tb_rank` SET `ki`='$tot' WHERE kode='$kode1' ");							
							}
						//Ranking 
						$result  = $db->QUERY ("SELECT *,FIND_IN_SET( ki, ( 
						SELECT GROUP_CONCAT( ki
						ORDER BY ki DESC )
						FROM tb_rank )
						) AS ranking FROM `tb_rank` ");
						while( $row = mysqli_fetch_array( $result ) ){
							$koder = $row['kode'];
							$ranking = $row['ranking'];
							$sql    = $db->QUERY ("UPDATE `tb_rank` SET `rank`='$ranking' WHERE kode='$koder' ");		
						}
						}						
        ?>

    <h2>2. Alternatif</h2>
    <table class="table table">
      <thead class="table-primary">
        <tr>
          <th class="text-center">No</th>
          <th class="text-center">Kode</th>
          <th class="text-center">Alternatif</th>
          <th class="text-center">K1</th>
          <th class="text-center">K2</th>
          <th class="text-center">K3</th>
          <th class="text-center">K4</th>
          <th class="text-center">K5</th>
          <th class="text-center">K6</th>
          <th class="text-center">K7</th>
          <th class="text-center">K8</th>
          <th class="text-center">K9</th>
          <th class="text-center">K10</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $no = 1;
		$sql    = $db->QUERY ("SELECT * FROM `tb_alternatif` ORDER BY id ASC ");
		while   ($tampil = mysqli_fetch_array($sql)){
		//echo $tampil['MAX(k1)'];
        ?>
          <tr>
            <th class="text-center"><?= $no++ ?>.</th>
            <td class="text-center"><?= $tampil['kode']; ?></td>
            <td class="text-center"><?= $tampil['alternatif']; ?></td>
            <td class="text-center table-danger"><?= $tampil['k1']; ?></td>
            <td class="text-center"><?= $tampil['k2']; ?></td>
            <td class="text-center"><?= $tampil['k3']; ?></td>
            <td class="text-center"><?= $tampil['k4']; ?></td>
            <td class="text-center"><?= $tampil['k5']; ?></td>
            <td class="text-center"><?= $tampil['k6']; ?></td>
            <td class="text-center"><?= $tampil['k7']; ?></td>
            <td class="text-center"><?= $tampil['k8']; ?></td>
            <td class="text-center"><?= $tampil['k9']; ?></td>
            <td class="text-center"><?= $tampil['k10']; ?></td>
          </tr>
		  
		<?php }?>
		        </tbody>
    </table>
	
<h2>3. Matriks Normalisasi(R) </h2>
    <table class="table table">
      <thead class="table-primary">
        <tr>
          <th class="text-center">No</th>
          <th class="text-center">Kode</th>
          <th class="text-center table-danger">K1</th>
          <th class="text-center">K2</th>
          <th class="text-center">K3</th>
          <th class="text-center">K4</th>
          <th class="text-center">K5</th>
          <th class="text-center">K6</th>
          <th class="text-center">K7</th>
          <th class="text-center">K8</th>
          <th class="text-center">K9</th>
          <th class="text-center">K10</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $no = 1;
		$sql    = $db->QUERY ("SELECT * FROM `tb_normalisasi` ");
		while   ($tampil = mysqli_fetch_array($sql)){
		//echo $tampil['MAX(k1)'];
        ?>
          <tr>
            <th class="text-center"><?= $no++ ?>.</th>
            <td class="text-center"><?= $tampil['kode']; ?></td>
            <td class="text-center  table-danger"><?= $tampil['k1']; ?></td>
            <td class="text-center"><?= $tampil['k2']; ?></td>
            <td class="text-center"><?= $tampil['k3']; ?></td>
            <td class="text-center"><?= $tampil['k4']; ?></td>
            <td class="text-center"><?= $tampil['k5']; ?></td>
            <td class="text-center"><?= $tampil['k6']; ?></td>
            <td class="text-center"><?= $tampil['k7']; ?></td>
            <td class="text-center"><?= $tampil['k8']; ?></td>
            <td class="text-center"><?= $tampil['k9']; ?></td>
            <td class="text-center"><?= $tampil['k10']; ?></td>
          </tr>
		  <?php }?>	
		        </tbody>
    </table>	

     <h2>Nilai Bobot(R)</h2>
    <table class="table table">
      <thead class="table-primary">
        <tr>
          <th class="text-center">No</th>
          <th class="text-center">K1</th>
          <th class="text-center">K2</th>
          <th class="text-center">K3</th>
          <th class="text-center">K4</th>
          <th class="text-center">K5</th>
          <th class="text-center">K6</th>
          <th class="text-center">K7</th>
          <th class="text-center">K8</th>
          <th class="text-center">K9</th>
          <th class="text-center">K10</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $no = 1;
		$b   = $db->QUERY ("SELECT `kode`, `bobot` FROM `tb_kriteria`");
		while   ($b1 = mysqli_fetch_array($b)){
		//echo $tampil['MAX(k1)'];
		if($b1['kode']=='K1'){ $kode1= str_replace("K","A",$b1['kode']);   $bb1 = $b1['bobot']; }
		if($b1['kode']=='K2'){ $kode1= str_replace("K","A",$b1['kode']);   $bb2 = $b1['bobot']; }
		if($b1['kode']=='K3'){ $kode1= str_replace("K","A",$b1['kode']);   $bb3 = $b1['bobot']; }
		if($b1['kode']=='K4'){ $kode1= str_replace("K","A",$b1['kode']);   $bb4 = $b1['bobot']; }
		if($b1['kode']=='K5'){ $kode1= str_replace("K","A",$b1['kode']);   $bb5 = $b1['bobot']; }
		if($b1['kode']=='K6'){ $kode1= str_replace("K","A",$b1['kode']);   $bb6 = $b1['bobot']; }
		if($b1['kode']=='K7'){ $kode1= str_replace("K","A",$b1['kode']);   $bb7 = $b1['bobot']; }
		if($b1['kode']=='K8'){ $kode1= str_replace("K","A",$b1['kode']);   $bb8 = $b1['bobot']; }
		if($b1['kode']=='K9'){ $kode1= str_replace("K","A",$b1['kode']);   $bb9 = $b1['bobot']; }
		if($b1['kode']=='K10'){ $kode1= str_replace("K","A",$b1['kode']);   $bb10 = $b1['bobot']; }
 }
        ?>
          <tr>
            <th class="text-center"><?= $no++ ?>.</th>
            <td class="text-center table-danger"><?php echo $bb1;?></td>
            <td class="text-center"><?php echo $bb2;?></td>
            <td class="text-center"><?php echo $bb3;?></td>
            <td class="text-center"><?php echo $bb4;?></td>
            <td class="text-center"><?php echo $bb5;?></td>
            <td class="text-center"><?php echo $bb6;?></td>
            <td class="text-center"><?php echo $bb7;?></td>
            <td class="text-center"><?php echo $bb8;?></td>
            <td class="text-center"><?php echo $bb9;?></td>
            <td class="text-center"><?php echo $bb10;?></td>

          </tr>
<?php ?>		  
		        </tbody>
    </table>
	
     <h2>4. Matriks Ternormalisasi Terbobot(D)</h2>
    <table class="table table">
      <thead class="table-primary">
        <tr>
          <th class="text-center">No</th>
          <th class="text-center">Kode</th>
          <th class="text-center table-danger">K1</th>
          <th class="text-center">K2</th>
          <th class="text-center">K3</th>
          <th class="text-center">K4</th>
          <th class="text-center">K5</th>
          <th class="text-center">K6</th>
          <th class="text-center">K7</th>
          <th class="text-center">K8</th>
          <th class="text-center">K9</th>
          <th class="text-center">K10</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $no = 1;
		$sql    = $db->QUERY ("SELECT * FROM `tb_normalisasi_bobot`  ");
		while   ($tampil = mysqli_fetch_array($sql)){
		//echo $tampil['MAX(k1)'];
        ?>
          <tr>
            <th class="text-center"><?= $no++ ?>.</th>
            <td class="text-center"><?= $tampil['kode']; ?></td>
            <td class="text-center table-danger"><?= $tampil['k1']; ?></td>
            <td class="text-center"><?= $tampil['k2']; ?></td>
            <td class="text-center"><?= $tampil['k3']; ?></td>
            <td class="text-center"><?= $tampil['k4']; ?></td>
            <td class="text-center"><?= $tampil['k5']; ?></td>
            <td class="text-center"><?= $tampil['k6']; ?></td>
            <td class="text-center"><?= $tampil['k7']; ?></td>
            <td class="text-center"><?= $tampil['k8']; ?></td>
            <td class="text-center"><?= $tampil['k9']; ?></td>
            <td class="text-center"><?= $tampil['k10']; ?></td>
          </tr>
		  <?php }?>	
		       </tbody>
    </table>		
	
     <h2>5. Peranking</h2>
    <table class="table table">
      <thead class="table-primary">
        <tr>
          <th class="text-center">No</th>
          <th class="text-center">Kode</th>
          <th class="text-center">Nilai Fungsi Optimum(Si)</th>
          <th class="text-center">Nilai Utilitas (K)</th>
          <th class="text-center">Ranking</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $no = 1;
		$sql    = $db->QUERY ("SELECT * FROM `tb_rank` WHERE kode !='A0' ");
		while   ($tampil = mysqli_fetch_array($sql)){
		//echo $tampil['MAX(k1)'];
        ?>
          <tr>
            <th class="text-center"><?= $no++ ?>.</th>
            <td class="text-center"><?= $tampil['kode']; ?></td>
            <td class="text-center"><?= $tampil['si']; ?></td>
            <td class="text-center"><?= $tampil['ki']; ?></td>
            <td class="text-center"><?= $tampil['rank']; ?></td>
          </tr>
<?php }?>		  
		        </tbody>
    </table>	
  </div>
  <!-- Optional JavaScript; choose one of the two! -->
  <!-- Option 1: Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>
  <!-- Optional JavaScript; choose one of the two! -->
  <!-- Option 1: Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>
