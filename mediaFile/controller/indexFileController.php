<?php

function getFiles(){
    $sql = "SELECT * FROM tbl_file_uploads";

    $query = mysql_query($sql);
    $files=""
    while($row = mysql_fetch_array($query)){
        ?>
        <tr>
        <td><?php echo $row['file'] ?></td>
        <td><?php echo $row['type'] ?></td>
        <td><?php echo $row['size'] ?> kb</td>
        <td><?php echo $row['workgroup'] ?></td>
        <td><a href="../assets/uploads/<?php echo $row['file'] . '.' . $row['type']?>" target="iframe_a">Visualizacion</a></td>
        <?php echo '<td><input type="submit" name="deleteItem" value="Delete('.$row['id'].')" /></td>"'; ?>
        </tr>
        <?php
    }
}
	
	?>