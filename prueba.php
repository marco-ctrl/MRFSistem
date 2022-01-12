<?php

$zip_dir = "./import/";
$zip = zip_open($zip_dir."import.zip");
if ($zip) {
    while ($zip_entry = zip_read($zip)) {

        $file = basename(zip_entry_name($zip_entry));
        $fp = fopen($zip_dir.basename($file), "w+");
       
        if (zip_entry_open($zip, $zip_entry, "r")) {
            $buf = zip_entry_read($zip_entry, zip_entry_filesize($zip_entry));
            zip_entry_close($zip_entry);
        }
       
           fwrite($fp, $buf);
        fclose($fp);
       
        echo "The file ".$file." was extracted to dir ".$zip_dir."\n<br>";
    }
    zip_close($zip);
}
?>
