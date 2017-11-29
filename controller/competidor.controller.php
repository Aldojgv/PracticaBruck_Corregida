<?php
require_once 'model/competidor.php';

class CompetidorController{
    
    private $model;
    
    public function __CONSTRUCT(){
        $this->model = new Competidor();
    }
    
    public function Index(){
        require_once 'view/header.php';
        require_once 'view/competidor/competidor.php';
        require_once 'view/footer.php';
    }
    
    public function Crud(){
        $alm = new Competidor();
        
        if(isset($_REQUEST['idCompetidor'])){
            $alm = $this->model->Obtener($_REQUEST['idCompetidor']);
        }
        
        require_once 'view/header.php';
        require_once 'view/competidor/competidor-editar.php';
        require_once 'view/footer.php';
    }
    
    public function Guardar(){
        $alm = new Competidor();
        
        $alm->id = $_REQUEST['idCompetidor'];
        $alm->Nombre = $_REQUEST['cnombre'];
        $alm->Apellido = $_REQUEST['cdesc'];
               $alm->idCompetidor > 0 
            ? $this->model->Actualizar($alm)
            : $this->model->Registrar($alm);
        
        header('Location: index.php');
    }
    
    public function Eliminar(){
        $this->model->Eliminar($_REQUEST['idCompetidor']);
        header('Location: index.php');
    }
}