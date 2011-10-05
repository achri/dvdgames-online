<?php if ( ! defined('BASEPATH')) exit($this->lang->line('basepath'));

class Tbl_dvd extends CI_Model
{
  function __construct()
  {
    parent::__construct();
  }
  
  function get_data_dvds()
  {
    return $this->db->get('master_dvd');
  }
  
  function get_peritem_dvds($kat_id,$dvd_nama='',$page,$limit=true)
  {
    if ($kat_id)
      $this->db->where('kat_id',$kat_id);
    if ($dvd_nama)
      $this->db->like('dvd_nama',$dvd_nama,'after');
    if ($limit)
      $this->db->limit($this->config->item('dvd_limit'),$page);
    $this->db->order_by('dvd_nama');
    
    return $this->db->get('master_dvd');
  }
}