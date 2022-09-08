<?php

# Declaramos la URL de autenticación y el objeto usuario
$url = "https://navisq.puertoangamos.cl/APIWsPortAngTatc/Auth/authenticate";
$user = [
  "username" => "username",
  "password" => "password"
];

# Creamos el contexto con los parametros de la petición
$context = stream_context_create([
  "http" => [
    "method" => "POST",
    "header" => "Content-Type: application/json",
    "content" => json_encode($user)
  ]
]);

# Enviamos la petición
$response = file_get_contents($url, FALSE, $context);

# Limpiamos la respuesta para poder obtener el token de autorización
$token = substr($response, 48);
$token = str_replace("\"", "", $token, $count);
$token = str_replace("}", "", $token, $count);

# Reutilizamos la variable URL e inicializamos con el endpoint EnviarTATC
$url = "https://navisq.puertoangamos.cl/APIWsPortAngTatc/PortAngTatc/EnviarTatc";

# Reutilizamos el objeto para llenar con datos del TATC
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

# Creamos el contexto con los parametros de la petición
$context = stream_context_create([
  "http" => [
    "method" => "POST",
    "header" => "Content-Type: application/json,\r\n"."Authorization: Bearer ".$token,
    "content" => json_encode($obj)
  ]
]);

# Enviamos nuevamente la petición mediante el método POST a la nueva URL e imprimimos la respuesta por consola
$response = file_get_contents($url, FALSE, $context);
print($response."\n");

# Reutilizamos la variable URL e inicializamos con el endpoint AnularTATC
$url = "https://navisq.puertoangamos.cl/APIWsPortAngTatc/PortAngTatc/AnularTatc";
$obj = [
  "dcNumeroTatc"            => "100001127",
  "dcOperadorTatc"          => "C20"
];

# Creamos el contexto con los parametros de la petición
$context = stream_context_create([
  "http" => [
    "method" => "POST",
    "header" => "Content-Type: application/json,\r\n"."Authorization: Bearer ".$token,
    "content" => json_encode($obj)
  ]
]);

# Enviamos nuevamente la petición mediante el método POST a la nueva URL e imprimimos la respuesta por consola
$response = file_get_contents($url, FALSE, $context);
print($response."\n");
