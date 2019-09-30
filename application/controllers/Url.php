<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Url extends CI_Controller
{

    function __construct()
    {

        parent::__construct();
    }

    public function index()
    {
        $this->load->model('Url_Model');
        $urls = $this->Url_Model->getUrls();

        foreach ($urls as $dados) {
            $url = $dados->url;


            $ch = curl_init($url);
            curl_setopt($ch, CURLOPT_NOBODY, false);     
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_TIMEOUT, 10);
            $output = curl_exec($ch);
            $httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
            curl_close($ch);

            $requisicao = array(
                'requisicaostatus'  => 1,
                'conteudo'  => $output,
                'statuscode' => $httpcode
            );

            $idrequisicao = $dados->idrequisicao;

            $this->Url_Model->atualizaRequisicao($idrequisicao, $requisicao);
        }
    }
}
