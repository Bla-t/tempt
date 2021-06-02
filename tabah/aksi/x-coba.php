<?php
//Date add from : http://www.w3schools.com/php/func_date_date_add.asp
$date=date_create("2013-03-15");
$dat = date_add($date,date_interval_create_from_date_string("40 days"));
echo date_format($dat,"Y-m-d");
?>