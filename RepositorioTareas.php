<?php
require_once __DIR__ . '/Tareas.php';

class RepositorioTareas {
    private $archivo;
    
    public function __construct() {
        $this->archivo = __DIR__ . '/../../storage/tareas.txt';
    }
    
    public function obtenerTodas() {
        $tareas = [];
        
        if (!file_exists($this->archivo)) {
            return $tareas;
        }
        
        $lineas = file($this->archivo, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        
        foreach ($lineas as $linea) {
            $datos = explode('|', $linea);
            if (count($datos) == 4) {
                $tareas[] = new Tarea($datos[0], $datos[1], $datos[2], $datos[3]);
            }
        }
        
        return $tareas;
    }
    
    public function guardar($titulo) {
        $tareas = $this->obtenerTodas();
        
        $nuevoId = 1;
        foreach ($tareas as $t) {
            if ($t->getId() >= $nuevoId) {
                $nuevoId = $t->getId() + 1;
            }
        }
        
        $tarea = new Tarea($nuevoId, $titulo);
        $tareas[] = $tarea;
        
        $this->guardarEnArchivo($tareas);
    }
    
    public function borrar($id) {
        $tareas = $this->obtenerTodas();
        $nuevasTareas = [];
        
        foreach ($tareas as $tarea) {
            if ($tarea->getId() != $id) {
                $nuevasTareas[] = $tarea;
            }
        }
        
        $this->guardarEnArchivo($nuevasTareas);
    }
    
    private function guardarEnArchivo($tareas) {
        $contenido = '';
        
        foreach ($tareas as $tarea) {
            $contenido .= $tarea->getId() . '|' . 
                          $tarea->getTitulo() . '|' . 
                          $tarea->getEstado() . '|' . 
                          $tarea->getFechaCreacion() . "\n";
        }
        
        if (file_put_contents($this->archivo, $contenido) === false) {
            throw new Exception('Error al guardar en el archivo');
        }
    }
}
