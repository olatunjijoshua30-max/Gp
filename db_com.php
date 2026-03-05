<?php
     $conn = new mysqli ("localhost", "wetinde3_jcodeus", "@jcode2026", "wetinde3_jcodedb");
 
 if (mysqli_connect_errno()){
    printf ("connect failed: %s\n", mysqli_connect_error());
    exit ();
 }
?>