<?php

const APP_NAME = 'Szoftverleltár';
const CREATORS = 'Farkas Tibor & Balogh Norbert';

const HOME_PAGE = 'http://localhost/Szoftverlelt-r/';

const DB_HOST = 'localhost';
const DB_NAME = 'szoftverleltar';
const DB_USER = 'root';
const DB_PASS = ''; //TODO: szerintem ezt majd a tárhhelyen le kell cserélni

const MNB_URL = 'http://www.mnb.hu/arfolyamok.asmx?WSDL';

const SOAP_SERVER_URL = 'http://localhost/Szoftverlelt-r/Server/soap_server.php';

const LEFT = 0;
const RIGHT = 1;

const PUBLIC_MENU = [
    ['route' => 'index.php', 'text' => 'Főoldal', 'loginRequired' => true, 'align' => LEFT],
    ['route' => 'index.php?page=gepek', 'text' => 'Gépek', 'loginRequired' => true, 'align' => LEFT],
    ['route' => 'index.php?page=szoftverc', 'text' => 'Szoftverek', 'loginRequired' => true, 'align' => LEFT],
    ['route' => 'index.php?page=hirekc', 'text' => 'Hírek, vélemények', 'loginRequired' => true, 'align' => LEFT],
    ['route' => 'index.php?page=mnb', 'text' => 'MNB Árfolyam', 'loginRequired' => true, 'align' => LEFT],
    ['route' => 'Kliens/soap_client.php', 'text' => 'SOAP Kliens (teszt)', 'loginRequired' => true, 'align' => LEFT],


    ['route' => 'index.php?page=loginc', 'text' => 'Belépés', 'loginRequired' => false, 'align' => RIGHT],
    ['route' => 'index.php?page=regisztracioc', 'text' => 'Regisztráció', 'loginRequired' => false, 'align' => RIGHT],
    ['route' => 'index.php?page=logoutc', 'text' => 'Kijelentkezés', 'loginRequired' => true, 'align' => RIGHT]
];
