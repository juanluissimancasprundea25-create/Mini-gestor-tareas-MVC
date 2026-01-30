<?php
class Tarea {
    private $id;
    private $titulo;
    private $estado;
    private $fechaCreacion;
    
    public function __construct($id = null, $titulo = '', $estado = 'pendiente', $fecha = null) {
        $this->id = $id;
        $this->titulo = $titulo;
        $this->estado = $estado;
        $this->fechaCreacion = $fecha ?? date('Y-m-d H:i:s');
    }
    
    public function getId() { return $this->id; }
    public function setId($id) { $this->id = $id; }
    public function getTitulo() { return $this->titulo; }
    public function setTitulo($titulo) { $this->titulo = $titulo; }
    public function getEstado() { return $this->estado; }
    public function setEstado($estado) { $this->estado = $estado; }
    public function getFechaCreacion() { return $this->fechaCreacion; }
    public function setFechaCreacion($fecha) { $this->fechaCreacion = $fecha; }
}
