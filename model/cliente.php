<?php
class Cliente
{
    private $pdo;
    
    public $idCliente;
    public $cnombre;
    public $cdesc;
    public $ruc;
 
    public function __CONSTRUCT()
    {
        try
        {
            $this->pdo = Database::StartUp();     
        }
        catch(Exception $e)
        {
            die($e->getMessage());
        }
    }

    public function Listar()
    {
        try
        {
            $result = array();

            $stm = $this->pdo->prepare("SELECT * FROM tbl_cliente");
            $stm->execute();

            return $stm->fetchAll(PDO::FETCH_OBJ);
        }
        catch(Exception $e)
        {
            die($e->getMessage());
        }
    }

    public function Obtener($id)
    {
        try 
        {
            $stm = $this->pdo
                      ->prepare("SELECT * FROM tbl_cliente WHERE idCliente = ?");
                      

            $stm->execute(array($id));
            return $stm->fetch(PDO::FETCH_OBJ);
        } catch (Exception $e) 
        {
            die($e->getMessage());
        }
    }

    public function Eliminar($id)
    {
        try 
        {
            $stm = $this->pdo
                        ->prepare("DELETE FROM tbl_cliente WHERE idCliente = ?");                    

            $stm->execute(array($id));
        } catch (Exception $e) 
        {
            die($e->getMessage());
        }
    }

    public function Actualizar($data)
    {
        try 
        {
            $sql = "UPDATE tbl_cliente SET 
                        cnombre          = ?, 
                        cdesc        = ?,
                        RUC        = ?
                    WHERE id = ?";

            $this->pdo->prepare($sql)
                 ->execute(
                    array(
                        $data->cnombre, 
                        $data->cdesc,
                        $data->RUC)
                );
        } catch (Exception $e) 
        {
            die($e->getMessage());
        }
    }

    public function Registrar(Cliente $data)
    {
        try 
        {
        $sql = "INSERT INTO tbl_cliente (cnombre,cdesc,ruc) 
                VALUES (?, ?, ?)";

        $this->pdo->prepare($sql)
             ->execute(
                array(
                    $data->cnombre,
                    $data->cdesc, 
                    $data->RUC                                   )
            );
        } catch (Exception $e) 
        {
            die($e->getMessage());
        }
    }
}