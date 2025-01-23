<?php

namespace Core;

class Container
{
    protected $bindings = [];

    public function bind($key, $resolver) //Add service to container
    {
        $this->bindings[$key] = $resolver;
    }

    public function resolve($key) //Get service from container
    {
        if (!array_key_exists($key, $this->bindings)) {
            throw new \Exception("Container error: No matching binding for {$key} ");
        }

        //$resolver = $this->bindings[$key];
        //return call_user_func($resolver);

        //Opcion 2
        return $this->bindings[$key](); //Se ejecuta la funcion que se encuentra en el array de bindings, tambien funciona ésta opción, reemplaza las dos lineas anteriores
        
    }
}
