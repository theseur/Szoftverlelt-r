<?php
require_once './../includes/config.php';

$options = [
    "location" => SOAP_SERVER_URL,
    "uri" => SOAP_SERVER_URL,
    'keep_alive' => false
];
try {
    $kliens = new SoapClient(null, $options);

    szoftverek($kliens);
    felhasznalok($kliens);
    gepek($kliens);
    $gep = $kliens->Gepek()[0];
    $szoftver = $kliens->Szoftverek()[0];
    TelepitettSzoftver($kliens, $szoftver);
    GepreTelepitettSzoftverek($kliens, $gep);
} catch (SoapFault $ex) {
    var_dump($ex);
}


function szoftverek($kliens)
{
    echo "<br>";
    echo "=================== szoftverek ==========================";
    echo "<br>";

    foreach ($kliens->Szoftverek() as $elem) {
        echo "Szoftver [ id= " . $elem->id . ", nev= "
            . $elem->nev . ", kategoria= " . $elem->kategoria . ", active = "
            . (($elem->deactivate === null || $elem->deactivate === 0) ? "igen" : "nem")
            . "]<br>";
    }

    echo "<br>";
}


function felhasznalok($kliens)
{
    echo "<br>";
    echo "=================== Felhasználók ==========================";
    echo "<br>";

    foreach ($kliens->felhasznalok() as $elem) {
        echo "Felhasznalo [ id= " . $elem->id . ", nev= "
            . $elem->csaladi_nev . "" . $elem->utonev . ", jogosultsag= " . $elem->jogosultsag
            . ", active = " . (($elem->deactivate === null || $elem->deactivate === 0) ? "igen" : "nem")
            . "]<br>";
    }

    echo "<br>";
}


function gepek($kliens)
{
    echo "<br>";
    echo "=================== Gépek ==========================";
    echo "<br>";

    foreach ($kliens->Gepek() as $elem) {
        echo "Szoftver [ id= " . $elem->id . ", hely= "
            . $elem->hely . ", típus= " . $elem->tipus
            . ", ipcim= " . $elem->ipcim . ", active = "
            . (($elem->deactivate === null || $elem->deactivate === 0) ? "igen" : "nem")
            . "]<br>";
    }

    echo "<br>";
}

function TelepitettSzoftver($kliens, $szoftver)
{
    echo "<br>";
    echo "=================== A " . $szoftver->nev . " a következő gépeken érhető el ==========================";
    echo "<br>";

    $szoftverId = $szoftver->id;
    foreach ($kliens->TelepitettSzoftver($szoftverId) as $elem) {
        echo  "hely= " . $elem->hely . ", típus= " . $elem->tipus
            . ", ipcim= " . $elem->ipcim . ", verzio = "
            . $elem->verzio . ", datum = " . $elem->datum
            . "<br>";
    }

    echo "<br>";
}


function GepreTelepitettSzoftverek($kliens, $gep)
{
    echo "<br>";
    echo "=================== A következő gépen [hely = " . $gep->hely . ", ip = " . $gep->ipcim . "] a következő szoftverek érhetők el ==========================";
    echo "<br>";
    $gepId = $gep->id;
    foreach ($kliens->GepreTelepitettSzoftverek($gepId) as $elem) {
        echo "szoftverName = " . $elem->szoftverName . ", szoftverKategoria= "
            . $elem->szoftverKategoria . ", verzio= " . $elem->verzio
            . ", datum= " . $elem->datum . "<br>";
    }

    echo "<br>";
}
