<?php 
    require 'admin/dbcon.php';
    $query = $conn->query("SELECT * from voters where voters_id ='$_SESSION[voters_id]'")or die (mysqli_errno ());
    $row = $query->fetch_array();
?>
<nav>
   <ul class="nav-links">
       <li class="nav-item brand">HAMRO VOTE</li>
       <li class="nav-item welcome">WELCOME <span><?php echo $row['firstname']." ".$row['lastname'];?></span></li>
       <li class="nav-item photo"> <img src="register/<?php echo $row['photo']; ?>" alt=""></li>
       <li class="nav-item logout"><a href="logout.php">Logout</a> </li>
   </ul>

</nav>