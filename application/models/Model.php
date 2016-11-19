<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model extends CI_Model{

	function list_data($tabel){
		$data=$this->db->query("select * from $tabel");
		return $data->result();
   	}

   	function input_data($data, $tabel){
   		$simpan=$this->db->insert($tabel,$data);
		return true;
   	}

   	function hapus_data($tb_id, $param_id, $tabel){
   		$this->db->where($tb_id,$param_id);
		$hapus=$this->db->delete($tabel);
		if($hapus){
			return true;
		}
		else{
			return false;
		}	
   	}

   	function edit_data($tb_id, $param_id, $tabel, $data){
   		$this->db->where($tb_id,$param_id);
		$this->db->update($tabel,$data);
		return true;
   	}

   	function ambil($tb_id,$param_id, $tabel){
		return $this->db->get_where($tabel,array($tb_id=>$param_id));
	}

	function cek_data($tb_id, $param_id, $tabel){
		return $this->db->get_where($tabel,array($tb_id=>$param_id));
	}
		
	function cek_login($tabel, $data){
		return $this->db->get_where($tabel,$data);
	}
  
  	function cek_user($data, $tabel){
  		return $this->db->get_where($tabel,$data);
  	}
}