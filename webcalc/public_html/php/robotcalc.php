<?php
echo "robot";
$webservices = new simplexml_load_file("ejemplo.xml");
echo webservices->webservice->url;
//foreach ($webservices->webservice as $webservice) {
//   echo $webservice->url, PHP_EOL;
//} 
        
?>