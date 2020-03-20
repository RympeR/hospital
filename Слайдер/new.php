<?php
    $curr = "110005,MARSHALL MEDICAL CENTER SOUTH,2505 U S HIGHWAY 431 NORTH,BOAZ,AL,35957,MARSHALL,2565938310,Acute Care Hospitals,Government - Hospital District or Authority,TRUE,TRUE,3,,Below the national average,,Same as the national average,,Above the national average,,Same as the national average,,Same as the national average,,Above the national average,,Below the national average,,'2505 U S HIGHWAY 431 NORTH";
    $curr = preg_replace('/, /i', ':::', $curr);
    
    $curr = preg_replace('/(([,]{2})|([,]{1}))/i', '::', $curr);
    // $curr = preg_replace('/:::/i', ', ', $curr);
    echo"<br>";
    echo $curr;
?>
