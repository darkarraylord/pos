<?php
// Passe para este script o arquivo da NFe
// Ex. printDANFE.php?nfe=35100258716523000119550000000033453539003003-nfe.xml

require_once('../nfephp/libs/DanfeNFePHP.class.php');

$arq = $_GET['xml'];

$nome_arq = substr($arq,0,44);


if ( is_file($arq) ){
    $docxml = file_get_contents($arq);
    $danfe = new DanfeNFePHP($docxml, 'P', 'A4','../images/logo.jpg','I','');
    $id = $danfe->montaDANFE();
    $teste = $danfe->printDANFE($id.'.pdf','I');
    

    
    
    //salvar pdf no caminho
    $docPDF = (string) $danfe->printDANFE($nomePDF,'S');
    file_put_contents("$nome_arq".".pdf",$docPDF);
    

    
    
}
?>
