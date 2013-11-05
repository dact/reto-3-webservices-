<?php

//echo "robot";

if (!empty($_POST['robotcalc'])) {

    if ($_FILES["archivo"]["error"] > 0) {
        echo "Error: " . $_FILES["archivo"]["error"] . "<br>";
    } else {
            
            /*echo "Upload: " . $_FILES["archivo"]["name"] . "<br>";
            echo "Type: " . $_FILES["archivo"]["type"] . "<br>";
            echo "Size: " . ($_FILES["archivo"]["size"] / 1024) . " kB<br>";
            echo "Stored in: " . $_FILES["archivo"]["tmp_name"];
            */
            //conseguir el contenido del archivo subido, en la variable str
            $xmlstr = file_get_contents($_FILES["archivo"]["tmp_name"]);
            
            //$filee = "ejemplo.xml";
            //$xmlwebservice = simplexml_load_file($filee);
            $xmlwebservice = simplexml_load_string($xmlstr);

            for ($i = 0; $i < count($xmlwebservice); $i++) {
                /* echo "<p>";
                  print_r($xml->webservice[$i]);
                  echo "<br>";
                  echo "url".$xml->webservice[$i]->url."<br>";
                  echo "method".$xml->webservice[$i]->method."<br>";
                  echo "params<br>";
                  echo "p1".$xml->webservice[$i]->params->p1."<br>";
                  echo "p2".$xml->webservice[$i]->params->p2."<br>";
                  echo "resultado".$xml->webservice[$i]->result."<br>";
                  echo "</p>"; */

                $a = $xmlwebservice->webservice[$i]->params->p1;
                $b = $xmlwebservice->webservice[$i]->params->p2;
                $response = "";

                //echo $xmlwebservice->webservice[$i]->method;

                switch ($xmlwebservice->webservice[$i]->method) {
                    case "sumar":
                        $response = file_get_contents($xmlwebservice->webservice[$i]->url . "op=+&p1=$a&p2=$b");
                        break;
                    case "multiplicar":
                        $response = file_get_contents($xmlwebservice->webservice[$i]->url . "op=*&p1=$a&p2=$b");
                        break;
                    case "restar":
                        $response = file_get_contents($xmlwebservice->webservice[$i]->url. "op=-&p1=$a&p2=$b");
                        break;
                    case "dividir":
                        $response = file_get_contents($xmlwebservice->webservice[$i]->url . "op=/&p1=$a&p2=$b");
                        break;
                    default:
                        break;
                }

                $resultado = json_decode($response, true);
                $xmlwebservice->webservice[$i]->result = $resultado["res"];
                //$xmlwebservice->webservice[$i]->result=;
            }
            //$file = "tata.xml";
            //fwrite($file, $xml->asXML());

            /*
             * $fp = fopen('data.txt', 'w');
              fwrite($fp, '1');
              fwrite($fp, '23');
              fclose($fp);
             */

            /* header('Content-Type: text/xml');
              header("Content-Disposition: attachment; filename=\"$file\"");
              readfile($file); */
            $filename=$_FILES["archivo"]["name"];
            header("Content-Disposition: attachment; filename=\"$filename\""); 
            header("Content-Type:text/xml");
            echo $xmlwebservice->asXML();
    }
}
?>