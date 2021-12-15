<?php

class ControllerProduto{
    private $_method;
    private $_modelProduto;
    private $_idProduto;
    
    public function __construct($model){
        $this->_modelProduto = $model;
        $this->_method = $_SERVER["REQUEST_METHOD"];

        $json = file_get_contents("php://input");
        $dadosProduto = json_decode($json);

        $this->_idProduto = $dadosProduto->idProduto ?? null;
    }

           
    public function router(){
        switch ($this->_method) {
            //case GET
            case 'GET':
                if ($this->_idProduto) {
                    return $this->_modelProduto->findById();
                    break;
                }

                return $this->_modelProduto->findAll();
                break;

            //case POST
            case 'POST':
                if (isset($_POST["idProduto"])) {
                    return $this->_modelProduto->update();
                    break;
                }
                    return $this->_modelProduto->create();
                    break;
            
            //case DELETE
            case 'DELETE':
                return $this->_modelProduto->delete();
                break;

            //case PUT
            case 'PUT':
                return $this->_modelProduto->update();
                break;

            default:
                # code...
                break;
        }
    }
}            
?>