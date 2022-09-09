# Ejemplo de Consumo Servicios TATC
El archivo `request.php` hace uso de este servicio mediante el envío de peticiones HTTP y obtiene una respuesta basada en la información enviada.

### Ejecución
`php request.php`
> **Nota:** Debe cambiar las credenciales de usuario antes de ejecutar el código sino obtendrá un error, estas pueden ser encontradas en la Guía de Integración para Clientes.

## Documentación
Objeto CreacionTATC
```php
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
```

Objeto AnulacionTATC
```php
$obj = [
  "dcNumeroTatc"            => "100001127",
  "dcOperadorTatc"          => "C20"
];
```
