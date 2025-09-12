<?php
    $agenda = [
        [
            "nombre" => "Amaia",
            "apellidos" => "Gorbea Jainaga",
            "telefono" => "945111111",
            "email" => "agorbea@php.net"
        ],
        [
            "nombre" => "Ane",
            "apellidos" => "Gorbea Jainaga",
            "telefono" => "945222222",
            "email" => "agorbea@php.net"
        ],
        [
            "nombre" => "Iker",
            "apellidos" => "Gorbea Jainaga",
            "telefono" => "945333333",
            "email" => "agorbea@php.net"
        ]
    ];

    function generarTabla($agenda){
        $tabla = "<table>";
        $tabla .= "<tr><th>Nombre</th><th>Apellidos</th><th>Teléfono</th><th>Email</th></tr>";
        foreach($agenda as $contacto){
            $tabla.= "<tr>";
            $tabla.= "<td>".$contacto['nombre']."</td>";
            $tabla.= "<td>".$contacto['apellidos']."</td>";
            $tabla.= "<td>".$contacto['telefono']."</td>";
            $tabla.= "<td>".$contacto['email']."</td>";
            $tabla.= "</tr>";
        }
        $tabla.= "</table>";
        return $tabla;
    }
include "index.view.php";
