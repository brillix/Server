<?php
/* 
4.5.2014 by baruch@brillix.co.il
PUT data comes in on the stdin stream  to File
To run 
curl  -X PUT --header "Content-Type: application/octet-stream" --data-binary "@1.txt" -v http://192.168.56.200/handler.php/a/b
*/


$putdata = fopen("php://input", "r");

/* Open a file for writing */
$fp = fopen("myputfile.ext", "w");

/* Read the data 1 KB at a time
   and write to the file */
while ($data = fread($putdata, 1024))
  fwrite($fp, $data);

/* Close the streams */
fclose($fp);
fclose($putdata);
?>
