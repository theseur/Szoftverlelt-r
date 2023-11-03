<?php
//ini_set("default_socket_timeout", 5000);
$options = array(
    // Kell location és uri is:
    "location" => "http://localhost/Szoftverlelt-r/Server/soap_server.php",
    "uri" => "http://localhost/Szoftverlelt-r/Server/soap_server.php",
    'keep_alive' => false,
    //'trace' =>true,
    //'connection_timeout' => 5000,
    //'cache_wsdl' => WSDL_CACHE_NONE,
);
try {
    $kliens = new SoapClient(null, $options);
    echo $kliens->szoveg() . "<br>";
    $eredm = $kliens->ketszeres(5);
    echo $eredm . "<br>";
    echo $kliens->ido() . "<br>";
    echo $kliens->get3X() . "<br>";
    $eredm = $kliens->adatok();
    var_dump($eredm);
    echo "<br>";
    foreach ($eredm as $elem)
        echo $elem . "<br>";

    echo "szoftverek:";

    print_r($kliens->Szoftverek());
} catch (SoapFault $e) {
    var_dump($e);
}
