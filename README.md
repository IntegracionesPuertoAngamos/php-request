# - Descripción del código.
En esta introducción se llevara a cabo una breve explicación de cómo opera o trabaja el código 
que se mostrara más adelante con el lenguaje de programación **PHP**.

Como primer se establece los datos de autenticación en un objeto "ARRAY" junto con la respectiva url

- $url = "https://navisq.puertoangamos.cl/APIWsPortAngTatc/Auth/authenticate"

Ya con esto procederá a llamar al método **"POST"** para luego obtener el la petición de autorización. Luego manda el token para después hacer el quite de comillas y corchetes con el siguiente código:
```php
$token = str_replace("\"","",$token ,$count);
$token = str_replace('}',"",$token ,$count);
```
Para ir terminando se reutiliza el objeto para llenar los datos del TATC como se puede ver en 
el ejemplo de más abajo.

```php
$obj = array(
    "dcNumeroTatc"       =>      "100001127",
    "dcOperadorTatc"      =>     "C20",
    "dgOperadorTatc"     =>      "Operador Prueba",
    "dcCodigoAduana"   =>      "ADU01",
    "dgCodigoAduana"    =>       "Nombre Prueba Aduana",
    "dcIdCtr"          =>        "MRKU000000-1",
    "dcPuerto"         =>        "CLPAG",
    "dcIsocode"        =>        "2210",
    "dcNumeroBl"        =>       "SH1KJ6480400",
    "dcRutOperadorContenedor" => "96653890-2",
    "dgOperadorContenedor"   => "HLC",
    "dcRutDeposito"     =>     "96789280-7",
    "dgNombreDeposito"     =>    "Deposito PANG",
    "dcNumeroLloyd"       =>     "9198575",
    "dgViaje"             =>     "138E",
    "dgNave"             =>     "NAVE TEST",
    "dcRutAgenteAduana"     =>   "15679146-6",
    "dgNombreAgenteAduana"   =>  "Agencia Aduana Prueba",
    "dcRutCliente"        =>     "15679146-6",
    "dgNombreCliente"      =>    "Cliente Prueba",
    "dgobservacion"        =>   "Datos de Prueba",
    "dgEmisorBl"         =>      "Navis",
    "dfLiberacion"      =>      "2022-02-01 08:00:00"
);

```
Se crea una vez mas un contexto con el método **POST** sin embargo en este caso se hace la autorización con este codigo: "Authorization: Bearer ".$token, por último se hace un $response para dar la url y luego se imprime el $response.
