<?php
session_name('abdeleatifi');
session_start ();
session_unset ();
header ('location: index.php');
?>