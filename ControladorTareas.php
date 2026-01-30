<?php
require_once __DIR__ . '/../Modelos/Tareas.php';
require_once __DIR__ . '/../Modelos/RepositorioTareas.php';
require_once __DIR__ . '/../Vistas/Layout.php';

class ControladorTareas {
    private $repo;
    public function __construct() {
        $this->repo = new RepositorioTareas();
    }
    
    public function listar() {
        $tareas = $this->repo->obtenerTodas();
        require_once __DIR__ . '/../Vistas/tareas/listar.php';
    }
    
    public function crear() {
        $error = $_SESSION['error'] ?? '';
        unset($_SESSION['error']);
        require_once __DIR__ . '/../Vistas/tareas/crear.php';
    }
    
    public function guardar() {
        try {
            $titulo = trim($_POST['titulo'] ?? '');
            
            if (empty($titulo)) {
                throw new Exception('El título es obligatorio');
            }
            if (strlen($titulo) < 3) {
                throw new Exception('El título debe tener al menos 3 caracteres');
            }
            if (strlen($titulo) > 60) {
                throw new Exception('El título no puede tener más de 60 caracteres');
            }
            $this->repo->guardar($titulo);
            header('Location: index.php?accion=listar');
            exit;
        } catch (Exception $e) {
            error_log("ERROR: " . $e->getMessage() . "\n", 3, __DIR__ . '/../../../storage/errores.log');
            $_SESSION['error'] = $e->getMessage();
            header('Location: index.php?accion=crear');
            exit;
        }
    }
    
    public function borrar() {
        $id = $_GET['id'] ?? null;
        if ($id) {
            $this->repo->borrar($id);
        }
        header('Location: index.php?accion=listar');
        exit;
    }
}
