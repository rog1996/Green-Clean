<?php
    class getFunction
    {
        private $conexion;

        public function __construct($conexion) {
            $this->conexion = $conexion;
        }

        public function getNombreUsuario($given_idUsuario)
        {
            $sql = "SELECT `nombre` FROM `usuario` WHERE `idUsuario` = $given_idUsuario";
            $register = $this->conexion->query($sql);

            $result = $register->fetch(PDO::FETCH_ASSOC);

            $nombreUsuario = $result["nombre"];

            return $nombreUsuario;
        }

        public function getNombreTipo($given_idTipo)
        {
            $sql = "SELECT `tipo` FROM `tipo` WHERE `idTipo` = $given_idTipo";
            $register = $this->conexion->query($sql);
            $result = $register->fetch(PDO::FETCH_ASSOC);
            $tipo= $result["tipo"];

            return $tipo;
        }
    }



?>
