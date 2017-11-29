<?php
class Competidor
{
    private $pdo;
    
    public $idcompetidor;
    public $cnombre;
    public $cdesc;
     
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

            $stm = $this->pdo->prepare("SELECT * FROM competidor");
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
                      ->prepare("SELECT * FROM competidor WHERE idcompetidor = ?");
                      

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
                        ->prepare("DELETE FROM competidor WHERE idcompetidor = ?");                    

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
            $sql = "UPDATE competidor SET 
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
        $sql = "INSERT INTO competidor (cnombre,cdesc,ruc) 
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