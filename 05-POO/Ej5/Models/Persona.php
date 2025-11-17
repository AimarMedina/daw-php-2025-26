<?php

namespace Models;

class Persona{
    public static $personasEnElMundo = 0;

    function __construct()
    {
        self:: $personasEnElMundo ++;
    }
}
