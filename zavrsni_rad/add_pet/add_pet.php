<?php 

require_once("../inc/config.php");
$species=intval($_GET['species']);
$con = mysql_connect(DB_HOST, DB_USER, DB_PASS); 
if (!$con) {
    die('Could not connect: ' . mysql_error());
}
mysql_select_db(DB_NAME);
$query="SELECT species_id,age FROM age WHERE species_id='$species'";
$result=mysql_query($query);

?>
<select name="age">
	<option>Odaberi dob</option>
	<?php while ($row=mysql_fetch_array($result)) { ?>
	<option value="<?php echo $row['age'];?>"><?php echo $row['age']?></option>
	<?php } ?>
</select>



