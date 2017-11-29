<?php
require_once 'model/solicitante.php';

class solicitanteController{
    
    private $model;
    
    public function __CONSTRUCT(){
        $this->model = new solicitante();
    }
    
    public function Index(){
        require_once 'view/header.php';
        require_once 'view/solicitante/solicitante.php';
        require_once 'view/footer.php';
    }
    
    public function Crud(){
        $alm = new solicitante();
        
        if(isset($_REQUEST['id'])){
            $alm = $this->model->Obtener($_REQUEST['id']);
        }
        
        require_once 'view/header.php';
        require_once 'view/solicitante/solicitante-editar.php';
        require_once 'view/footer.php';
    }
    
    public function Guardar(){
        $alm = new solicitante();
        
        $alm->id = $_REQUEST['id'];
        $alm->Nombre = $_REQUEST['Nombre'];
        $alm->Apellido = $_REQUEST['Apellido'];
        $alm->Correo = $_REQUEST['Correo'];
        $alm->Sexo = $_REQUEST['Sexo'];
        $alm->FechaNacimiento = $_REQUEST['FechaNacimiento'];

        $alm->id > 0 
            ? $this->model->Actualizar($alm)
            : $this->model->Registrar($alm);
        
        header('Location: index.php');
    }
    
    public function Eliminar(){
        $this->model->Eliminar($_REQUEST['id']);
        header('Location: index.php');
    }
}