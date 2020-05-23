<?php 

if(empty($_SESSION['uname'])){
   	die("<script>
 	location.href = '../index.php?error=2'; 
		</script>");
}

?>