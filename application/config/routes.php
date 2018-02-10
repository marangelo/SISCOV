<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    $route['default_controller'] = 'Login';
    $route['404_override'] = '';
    $route['translate_uri_dashes'] = FALSE;

    $route['Acreditar'] = 'Login/Acreditar';
    $route['Salir'] = 'Login/Salir';
    //$route['XLS'] = 'reportes/ExcelArticulos';


    /*************LINK DE USUARIOS***********/
    $route['Usuarios'] = 'Usuarios';
    $route['GuardarUsuario/(:any)/(:any)/(:any)/(:any)'] = 'Usuarios/Guardar/$1/$2/$3/$4';
    $route['EliminarUsuario/(:any)/(:any)']= "Usuarios/Eliminar/$1/$2";
    $route['ClaveUsuario/(:any)/(:any)']= "Usuarios/Clave/$1/$2";


    /*************LINK DEL MENU***********/
    $route['dashboard'] = 'Menu';

       
    /*************LINLK DE TRABAJADORES***********/
    $route['Trabajadores'] = 'Trabajadores';
    $route['GuardarTrabajador/(:any)/(:any)/(:any)'] = 'Trabajadores/Guardar/$1/$2/$3';
    $route['EliminarTrabajador/(:any)/(:any)'] = "Trabajadores/Eliminar/$1/$2";
    $route['Calendario/(:any)'] = 'Trabajadores/Calendario/$1';
    $route['GCalendario/(:any)/(:any)/(:any)'] = 'Trabajadores/GCalendario/$1/$2/$3';
    $route['UCalendario/(:any)/(:any)/(:any)/(:any)'] = 'Trabajadores/UCalendario/$1/$2/$3/$4';
    $route['FEvento/(:any)/(:any)'] = 'Trabajadores/FEvento/$1/$2';


     /*************LINK DE REPORTES***********/
     //$route['Reportes'] = 'Reports';
     $route['CalSemana'] = 'Reportes/CalSemana';
     $route['GuardarReporte/(:any)/(:any)/(:any)'] = 'Reportes/Guardar/$1/$2/$3';


    /*************RUTAS EXCEL***********/
    //$route['ExcelConsumo'] = 'reportes/ExecelConsumo';


    /*************RUTAS PDF***********/
    //$route['pdf_detalles'] = 'reportes/pdfdetalle';
    //$route['pdf_analisisConsumo'] = 'reportes/pdfanalisisconsumo';