<?php
$db = new mysqli('localhost','root','','aras');

$sql    = $db->QUERY ("DELETE FROM `tb_alternatif` WHERE kode = 'A0' ");
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
  <title>Edit Alternatif</title>
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
          <a class="nav-link active" aria-current="page" href="index.php">Perhitungan</a>
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
    <h1>Edit Alternatif</h1>
    <hr>
    <h2> Data Alternatif</h2>

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
          <th class="text-center">Aksi</th>
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
            <td class="text-center "><?= $tampil['k9']; ?></td>
            <td class="text-center"><?= $tampil['k10']; ?></td>
            <td class="text-center">	
			<a href="alternatif-add.php?id=<?php echo $tampil['id'];?>"><button type="button" class="btn btn-primary">Ubah</button></a>
			</td>			
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