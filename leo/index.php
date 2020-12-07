<?php

session_start();
if(!isset($_COOKIE['panier'])){
    $panier = array();
    setcookie('panier', serialize($panier), time()+360000);
}
if(!isset($_SESSION['prix'])){
    $_SESSION['prix']=0;
}

$DS = DIRECTORY_SEPARATOR;
$ROOT_FOLDER = __DIR__;
require_once $ROOT_FOLDER . $DS . join($DS, array('lib', 'Session.php'));
require_once "$ROOT_FOLDER" . "$DS" . "lib" . "$DS" . "File.php";
require File::build_path(["controller", "routeur.php"]);
/*
     * sftp://ftpinfo.iutmontp.univ-montp2.fr
     * To change this license header, choose License Headers in Project Properties.
     * To change this template file, choose Tools | Templates
     * and open the template in the editor.
     */

    