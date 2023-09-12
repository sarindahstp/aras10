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
  <title>Edit Kriteria</title>
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
	<?php 
	if(isset($_POST['simpan'])){
		$id = $_POST['id'];
		$kriteria = $_POST['kriteria'];
		$bobot = $_POST['bobot'];
		$sql    = $db->QUERY ("UPDATE `tb_kriteria` SET `kriteria`='$kriteria',`bobot`='$bobot' WHERE id ='$id' ");	
		echo '<div class="alert alert-primary" role="alert"> Berhasil di simpan </div>';
	}
	$id = $_GET['id'];
		$sql    = $db->QUERY ("SELECT * FROM `tb_kriteria` WHERE id='$id'  ");
		$tampil = mysqli_fetch_array($sql);
	?>
    <h1>Edit Kriteria</h1>
    <hr>
    <h2> Data Kriteria</h2>
	<form action="" method="POST">
	<input type="hidden" class="form-control" id="inputPassword" name="id" value="<?php echo $id;?>">
  <div class="mb-3 row">
    <label for="inputPassword" class="col-sm-2 col-form-label">Kriteria</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="inputPassword" name="kriteria"  value="<?php echo $tampil['kriteria'];?>">
    </div>
  </div>
    <div class="mb-3 row">
    <label for="inputPassword" class="col-sm-2 col-form-label">Atribut</label>
    <div class="col-sm-10">
       <input type="text" class="form-control" id="inputPassword" name="atribut" value="<?php echo $tampil['atribut'];?>" readonly>
    </div>
  </div>
     <div class="mb-3 row">
    <label for="inputPassword" class="col-sm-2 col-form-label">Bobot</label>
    <div class="col-sm-10">
       <input type="text" class="form-control" id="inputPassword" name="bobot" value="<?php echo $tampil['bobot'];?>" >
    </div>
  </div> 
  
       <div class="mb-3 row">
    <label for="inputPassword" class="col-sm-2 col-form-label"></label>
    <div class="col-sm-10">
       <button type="submit"  name="simpan" value="simpan" class="btn btn-primary">Save</button>
    </div>
  </div>
  </form>

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