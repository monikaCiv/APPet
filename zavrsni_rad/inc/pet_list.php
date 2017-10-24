<li> 
	<a href="<?php echo BASE_URL . 'pets/' . $pet['pet_id'] . '/'; ?>" class="button no7 radius"><?php echo $pet['pet_name']; ?> </a>
	<a href="<?php echo BASE_URL . 'pets/delete_pet.php?id=' . $pet['pet_id']; ?>"  class="button no8 radius" onclick="javascript:return show_confirm();"><i class="fi-x"></i></a>
</li>

<script>
function show_confirm()
{
  var r = confirm("Jeste li sigurni da želite obrisati ovoga ljubimca iz vaših ljubimaca?");
  if(r == true)
  {
    //možda napisati da je uspješno obrisan
	return true;
  } else {
     
    return false;
  }
}
</script>