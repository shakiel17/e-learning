<?php
    header('Content-type: application/pdf');
    header('Content-Disposition: inline; filename=document.pdf');
    header('Content-Transfer-Encoding: binary');
    header('Accept-Ranges: bytes');     
    $doc=$document['document'];
    echo $doc;    
?>

