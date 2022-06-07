<?php

    use Scrapper\Scrapper;
    require(__DIR__.'/vendor/autoload.php');

    $scrapper   = new Scrapper();
    $xof        = $scrapper->getXOF('dollar');
    echo $xof;
?>