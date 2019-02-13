<?php
class Colaborador_model extends MY_Model {
    function __construct() {
        parent::__construct();
        $this->table = 'colaborador';
    }
    /**
    * Formata as empresas para exibição dos dados na home
    *
    * @param array
    *
    * @return array
    */
    function GetColaboradorById($id) {
      if(is_null($id))
        return false;
      $this->db->where('id_colaborador', $id);
      $query = $this->db->get($this->table);
      if ($query->num_rows() > 0) {
        return $query->row_array();
      } else {
        return null;
      }
    }

    function GetColaboradorBySexo($sexo) {
      if(is_null($sexo))
        return false;
      $this->db->where('sexo', $sexo);
      $query = $this->db->get($this->table);
      if ($query->num_rows() > 0) {
        return $query->result_array();
      } else {
        return null;
      }
    }

    function Atualizar_colaborador($id, $data) {
      if(is_null($id) || !isset($data))
        return false;
      return $this->db->update('colaborador', $data, array('id_colaborador'=>$id));
    }

    function Excluir_colaborador($id) {
      if(is_null($id))
        return false;
      $this->db->where('id_colaborador', $id);
      return $this->db->delete($this->table);
    }
}
