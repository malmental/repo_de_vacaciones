<?php

class TipoSoporte {
    const AUDIOVISUAL = 'audiovisual';
    const DOCUMENTO = 'documento'; 
    const FOTOGRAFICO = 'fotografico';
}

class Archivo {
    private $nombre;
    private $data;
    private $soporte;
    private $tipoSoporte;
    private $fechaCreacion;

    public function __construct($nombre, $data, $soporte, $tipoSoporte) {
        $this->nombre = $nombre;
        $this->data = $data;
        $this->soporte = $soporte;
        $this->tipoSoporte = $tipoSoporte;
        $this->fechaCreacion = new DateTime();
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    public function getData() {
        return $this->data;
    }

    public function setData($data) {
        $this->data = $data;
    }

    public function getSoporte() {
        return $this->soporte;
    }

    public function setSoporte($soporte) {
        $this->soporte = $soporte;
    }

    public function getTipoSoporte() {
        return $this->tipoSoporte;
    }

    public function setTipoSoporte($tipoSoporte) {
        $this->tipoSoporte = $tipoSoporte;
    }

    public function getFechaCreacion() {
        return $this->fechaCreacion;
    }

    public function setFechaCreacion($fechaCreacion) {
        $this->fechaCreacion = $fechaCreacion;
    }

    public function getInformacion() {
        return "Archivo: " . $this->nombre . 
               ", Soporte: " . $this->soporte . 
               ", Tipo: " . $this->tipoSoporte . 
               ", Fecha: " . $this->fechaCreacion->format('Y-m-d H:i:s');
    }
}

?>