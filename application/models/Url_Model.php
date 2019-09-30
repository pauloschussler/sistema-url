<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Url_Model extends CI_Model
{

    function __construct()
    {
        parent::__construct();
    }

    public function getUrls()
    {
        $this->db->select('*');
        $this->db->from('url');
        $this->db->join('requisicao', 'url.idurl = requisicao.url_idurl');
        $this->db->where('requisicaostatus', 0);

        $query = $this->db->get()->result();
        return $query;
    }

    public function atualizaRequisicao($idrequisicao, $data)
    {
        $this->db->where('idrequisicao', $idrequisicao);
        $this->db->update('requisicao', $data);
    }
}
