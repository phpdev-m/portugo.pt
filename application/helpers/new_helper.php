<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('get_center_details'))
{
    function get_center_details($center_id)
    {   
	    $ci=& get_instance();
        $ci->load->database(); 

        $ci->db->select("*");
		$ci->db->from('center');
		$ci->db->where('id', $center_id);
		$query = $ci->db->get(); 
		return $query->row_array();
    }   
}