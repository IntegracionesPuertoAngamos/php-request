<?php
#Declara las url para el "Aut" y el "usuario"
$url = "https://navisq.puertoangamos.cl/APIWsPortAngTatc/Auth/authenticate";
$user = [
  "username" => "username",
  "password" => "password"
];
#Crea el contexto para el request
$context = stream_context_create([
  "http" => [
    "method" => "POST",
    "header" => "Content-Type: application/json",
    "content" => json_encode($user)
  ]
]);
#Envia la url 
$response = file_get_contents($url, FALSE, $context);
#Hace el substring para que lea desde la pocision establecida
$token = substr($response, 48);
#Hace el quite de comillas dobles y corchetes
$token = str_replace("\"", "", $token, $count);
$token = str_replace("}", "", $token, $count);
#Se declara el metodo "EnviarTatc" y de da un objeto como json
$url = "https://navisq.puertoangamos.cl/APIWsPortAngTatc/PortAngTatc/EnviarTatc";
$obj = [
  "dcNumeroTatc"            => "100001127",
  "dcOperadorTatc"          => "C20",
  "dgOperadorTatc"          => "Operador Prueba",
  "dcCodigoAduana"          => "ADU01",
  "dgCodigoAduana"          => "Nombre Prueba Aduana",
  "dcIdCtr"                 => "MRKU000000-1",
  "dcPuerto"                => "CLPAG",
  "dcIsocode"               => "2210",
  "dcNumeroBl"              => "SH1KJ6480400",
  "dcRutOperadorContenedor" => "96653890-2",
  "dgOperadorContenedor"    => "HLC",
  "dcRutDeposito"           => "96789280-7",
  "dgNombreDeposito"        => "Deposito PANG",
  "dcNumeroLloyd"           => "9198575",
  "dgViaje"                 => "138E",
  "dgNave"                  => "NAVE TEST",
  "dcRutAgenteAduana"       => "15679146-6",
  "dgNombreAgenteAduana"    => "Agencia Aduana Prueba",
  "dcRutCliente"            => "15679146-6",
  "dgNombreCliente"         => "Cliente Prueba",
  "dgobservacion"           => "Datos de Prueba",
  "dgEmisorBl"              => "Navis",
  "dfLiberacion"            => "2022-02-01 08:00:00"
];
#Crea el contexto, manda la autorizacion con el post y traduce el json
$context = stream_context_create([
  "http" => [
    "method" => "POST",
    "header" => "Content-Type: application/json,\r\n"."Authorization: Bearer ".$token,
    "content" => json_encode($obj)
  ]
]);
#Recibe el metodo e imprime la peticion
$response = file_get_contents($url, FALSE, $context);
print($response);
