<?php
require_once 'model/cliente.php';

class ClienteController{
    
    private $model;
    
    public function __CONSTRUCT(){
        $this->model = new Cliente();
    }
    
    public function Index(){
        require_once 'view/header.php';
        require_once 'view/cliente/cliente.php';
        require_once 'view/footer.php';
    }
    
    public function Crud(){
        $alm = new Cliente();
        
        if(isset($_REQUEST['idCliente'])){
            $alm = $this->model->Obtener($_REQUEST['idCliente']);
        }
        
        require_once 'view/header.php';
        require_once 'view/cliente/Cliente-editar.php';
        require_once 'view/footer.php';
    }
    
    public function Guardar(){
        $alm = new Cliente();
        
        $alm->idCliente = $_REQUEST['idcliente'];
        $alm->cnombre = $_REQUEST['cnombre'];
        $alm->cdesc = $_REQUEST['cdesc'];
        $alm->RUC = $_REQUEST['RUC'];
        $alm->idcliente > 0 
            ? $this->model->Actualizar($alm)
            : $this->model->Registrar($alm);
        
        header('Location: index.php');
    }
    
    public function Eliminar(){
        $this->model->Eliminar($_REQUEST['idCliente']);
        header('Location: index.php');
    }
}