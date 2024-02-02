<?php

    class Pc extends conexionToDb{

    private $objdb;
    private $name_component;
    private $type_component;
    private $brand_component;
    private $price;

    public function __constructor(){
        ##instancia de la conexion
        $this->objdb = (new ConexionToDb())->Conex();
    }
     // Métodos getters y setters
    // public function get_nombreComponente()
    // {
    //     return $this->name_component;
    // }

    // public function set_nombreComponente($name_component)
    // {
    //     $this->name_component = $name_component;
    // }

    // public function get_tipoComponente()
    // {
    //     return $this->type_component;
    // }

    // public function set_tipoComponente($type_component)
    // {
    //     $this->type_component = $type_component;
    // }

    // public function get_marcaComponente()
    // {
    //     return $this->brand_component;
    // }

    // public function set_marcaComponente($brand_component)
    // {
    //     $this->brand_component = $brand_component;
    // }

    // public function get_precioComponente()
    // {
    //     return $this->price;
    // }

    // public function set_precioComponente($price)
    // {
    //     $this->price = $price;
    // }

    public function __get($property)
    {
        if (property_exists($this, $property)) {
            return $this->$property;
        }
    }

    public function __set($property, $value)
    {
        if (property_exists($this, $property)) {
            $this->$property = $value;
        }

        return $this;
    }


    public function incluir()
    {
        $registro = "INSERT INTO componentes (nombre_componente, tipo_componente, marca_componente, precio) 
                    VALUES (:name_component, :type_component, :brand_component, :price)";

        $preparado = $this->objdb->prepare($registro);
        $preparado->bindParam(':name_component', $this->name_component);
        $preparado->bindParam(':type_component', $this->type_component);
        $preparado->bindParam(':brand_component', $this->brand_component);
        $preparado->bindParam(':price', $this->price);

        $resul = $preparado->execute();

        return $resul ? 1 : 0;
    }

    public function buscar()
    {
        $registro = "SELECT * FROM componentes WHERE nombre_componente=:name_component";
        $preparado = $this->objdb->prepare($registro);
        $preparado->bindParam(':name_component', $this->name_component);

        $resul = $preparado->execute();
        $datos = $preparado->fetch(PDO::FETCH_ASSOC);

        if ($datos) {
            $encontro = 1;
            $this->name_component = $datos['nombre_componente'];
            $this->type_component = $datos['tipo_componente'];
            $this->brand_component = $datos['marca_componente'];
            $this->price = $datos['precio'];
        } else {
            $encontro = 0;
        }

        return $encontro;
    }

    public function modificar()
    {
        $registro = "UPDATE componentes 
                    SET tipo_componente=:type_component, marca_componente=:brand_component, precio=:price 
                    WHERE nombre_componente=:name_component";

        $preparado = $this->objdb->prepare($registro);
        $preparado->bindParam(':type_component', $this->type_component);
        $preparado->bindParam(':brand_component', $this->brand_component);
        $preparado->bindParam(':price', $this->price);
        $preparado->bindParam(':name_component', $this->name_component);

        $result = $preparado->execute();

        return $result;
    }

    public function eliminar()
    {
        $registro = "DELETE FROM componentes WHERE nombre_componente=:name_component";
        $preparado = $this->objdb->prepare($registro);
        $preparado->bindParam(':name_component', $this->name_component);

        $result = $preparado->execute();

        return $result;
    }
}