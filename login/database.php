<?php

$link = mysqli_connect('localhost','root','zoutaoyu319','xiyuchat'); 
if (!$link) {
    exit(mysqli_connect_error());
}


#echo "connect to database successfully\r\n";

return $link;

?>