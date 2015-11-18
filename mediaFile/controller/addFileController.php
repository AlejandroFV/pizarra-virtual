<?php
include_once 'dbconfig.php';

if(isset($_POST['enviar-archivo'])){
	$file = $_FILES['file']['name'];
    $file_loc = $_FILES['file']['tmp_name'];
	$file_size = $_FILES['file']['size'];
	$file_type = pathinfo($file, PATHINFO_EXTENSION);

	$workgroup = $_POST['group'];

	$folder = "../assets/uploads/";
	
	// quita la extensión del archivo al guardarse
	$display_name = str_replace('.' . $file_type, '', $file);
	
	// el tamaño se muestra en kb
	$file_size_kb = $file_size/1024;
	
	if(move_uploaded_file($file_loc, $folder . $display_name . '.' . $file_type)){
		$sql = "INSERT INTO tbl_file_uploads(file, type, size, workgroup) VALUES ('$display_name','$file_type','$file_size_kb', '$workgroup')";
		mysql_query($sql);
		?>
		<script>
        window.location.href = '../view/indexFileView.php?exito';
        </script>
		<?php
	} else {
		?>
		<script>
        window.location.href = '../view/indexFileView.php?error';
        </script>
		<?php
	}
}

	



?>