<?php
namespace Dompdf;
require 'dompdf/autoload.inc.php';
    $dompdf = new Dompdf();
    $dompdf->loadHtml('
<h1>Kathir</h1>
');
    $dompdf->setPaper('A4', 'landscape');
    $dompdf->render();
    $dompdf->stream("",array("Attachment" => false));
    exit(0);
    //href= "pdf.php?id='.$strValue.'"
?>