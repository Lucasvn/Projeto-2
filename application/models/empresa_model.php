<?php
class Empresa_model extends MY_Model {
    function __construct() {
        parent::__construct();
        $this->table = 'empresa';
    }

    function GetEmpresaById($id) {
      if(is_null($id))
        return false;
      $this->db->where('id_empresa', $id);
      $query = $this->db->get($this->table);
      if ($query->num_rows() > 0) {
        return $query->row_array();
      } else {
        return null;
      }
    }

    function Atualizar_empresa($id, $data) {
      if(is_null($id) || !isset($data))
        return false;
      //$this->db->where('id_empresa', $id);
      return $this->db->update('empresa', $data, array('id_empresa'=>$id));
    }

    function Excluir_empresa($id) {
      if(is_null($id))
        return false;
      //$this->db->where('id_empresa', $id);
      return $this->db->delete($this->table, array('id_empresa'=>$id));
    }
}
