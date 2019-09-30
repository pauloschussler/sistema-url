<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Dados extends CI_Controller
{

    function __construct()
    {

        parent::__construct();
    }


    // FUNÇÃO PARA GERAR UM JSON ALETÓRIO  
    public function index()
    {
        // VERIFICA SE FOI PASSADO ALGUM VALOR NA URL(GET)
        if ((isset($_GET['valor'])) && (is_numeric($_GET['valor']))) {
            $valor = $_GET['valor'];
        } else {
            $valor = rand(1, 100);
        }

        // GERAR UM ARRAY COM VALORES ALEATÓRIOS
        $dados = array();
        for ($i = 0; $i < 10; $i++) {
            $numero = ($valor * rand(1, 100) / rand(1, 10));
            $random_string = chr(rand(65, 90)) . chr(rand(65, 90)) . chr(rand(65, 90)) . chr(rand(65, 90)) . chr(rand(65, 90));
            $data = array($random_string => $numero);
            array_push($dados, $data);
        }
        echo json_encode($dados);
    }
}
