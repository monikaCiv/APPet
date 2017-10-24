<?php 
require_once("../inc/config.php");
$species=intval($_GET['species']);
$con = mysql_connect(DB_HOST, DB_USER, DB_PASS); 
if (!$con) {
    die('Could not connect: ' . mysql_error());
}
mysql_select_db(DB_NAME);
$query="SELECT species_id,weight FROM weight WHERE species_id='$species'";
$result=mysql_query($query);

?>
<select name="weight">
	<option>Odaberi masu</option>
	<?php while ($row=mysql_fetch_array($result)) { ?>
	<option value="<?php echo $row['weight'];?>"><?php echo $row['weight']?></option>
	<?php } ?>
</select>
