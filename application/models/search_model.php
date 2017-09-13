<?php 
class search_model extends CI_Model{
	
	 function __construct()
    {
        // Call the Model constructor
        parent::__construct();
				$this->load->database();
    }
	
	
	
	/*function get_restaurant_address($search_data)
		{
		
           $query ="SELECT * FROM `restaurant` WHERE full_address like('%$search_data%') and full_address!=''";
		   
		   
		   $query = $this->db->query($query);
		    return $query->result_array();
		}*/
		
		
		function get_restaurant($postcode)
		{
            $this -> db -> select('restaurant.*');
				$this -> db -> from('restaurant');
				$this->db->join('delivery_postcode','delivery_postcode.restaurant_id=restaurant.id');
				$this -> db -> where('delivery_postcode.deliver_postcode_search',str_replace('-','',$postcode));
				$this -> db -> where('restaurant.approval_status','1');
				$query = $this -> db -> get();
				return $query->result_array();
		}

         //carrega todos restaurantes para pesquisa em findme e localizar restaurante  via teclado google
        function get_all_gps()
		{
            $this -> db -> select('*');
				$this -> db -> from('gps_restaurant');
				$query = $this -> db -> get();
				return $query->result_array();
		}


       //coordenadas para pesquisa de disatncia
       function get_all_restaurant()
		{
            $this -> db -> select('*');
				$this -> db -> from('restaurant');
				$query = $this -> db -> get();
				return $query->result_array();
		}



    public function removegps()
    {
         $this->db->empty_table('gps_restaurant');     //-- delete all rows efficientlygps_restaurant
    }


    function insert_coord_restaurant($id,$lat,$lng,$code,$name,$cuisine,$logo)
     {
	
	$this->id=$id;
	$this->lat=$lat;
	$this->lng=$lng;
	$this->code=$code;	
	$this->name=$name;
	$this->cuisine=$cuisine;
	$this->logo=$logo;
	$this->db->insert('gps_restaurant',$this);
		
		}
		
		
		function load_restaurant($postcode,$data)
		{
		        $this -> db -> select('restaurant.*');
				$this -> db -> from('restaurant');
				$this->db->join('delivery_postcode','delivery_postcode.restaurant_id=restaurant.id');
				$this -> db -> where('delivery_postcode.deliver_postcode_search',str_replace('-','',$postcode));
				$this -> db -> where('restaurant.approval_status','1');
				if($data['cuisine_id']!='')
				{
				$this->db->where("FIND_IN_SET('".$data['cuisine_id']."',restaurant.cuisine_types) !=", 0);
				}
				if($data['rating']!='')
				{
				$this -> db -> where('restaurant.avg_rating',$data['rating']);
				}
				if($data['sort_by']!='' && $data['sort_by']=='min_order')
				{
				
				$this -> db -> order_by('restaurant.min_order','ASC');
				}
				if($data['sort_by']!='' && $data['sort_by']=='popular')
				{
				$this -> db -> order_by('restaurant.total_order','DESC');
				}
				$query = $this -> db -> get();
				return $query->result_array();
		}
		
		
		function get_restaurant_review($id)
		{
		$this -> db -> select('*');
		$this -> db -> from('review');
		$this -> db -> where('restaurant_id', $id);
		$query = $this -> db -> get();
		return $query->result_array();
		}
		
		function get_number_restaurentbycuisine($cuisine_id,$postcode)
	{
	              $this -> db -> select('*');
				$this -> db -> from('restaurant');
				$this -> db -> where('postcode_search',str_replace('-','',$postcode));
				$this->db->where("FIND_IN_SET('".$cuisine_id."',cuisine_types) !=", 0);
				$query = $this -> db -> get();
				return $query->num_rows();
	}
		
		function get_addons($menu_id)
	{
	            $this -> db -> select('*');
				$this -> db -> from('menu_extra_items');
				$this -> db -> where('item_id',$menu_id);
				$this -> db -> where('status','1');
				$query = $this -> db -> get();
				return $query->result_array();
	}
	
	function get_menu_detail($menu_id)
	{
	          $this->db->select('*');
		$this->db->from('category_items');
		$this->db->where('id',$menu_id);
		$query=$this->db->get(); 
		return $query->row_array();
	}
	function get_addonsby_id($addon_id)
		{
		$this -> db -> select('*');
		$this -> db -> from('menu_extra_items');
		$this -> db -> where_in('id',$addon_id);
		$query = $this -> db -> get();
		return $query->result_array();
		}
		function delete_other_resitem($rest_id,$ip_address)
		{
		$this->db->where('restaurant_id !=',$rest_id);
		$this->db->where('ip_address',$ip_address);
		$this->db->delete('cart',$this);
		}
		
		function insert_order_detail($order_id,$menu_id,$addons,$quantity,$item_cost,$addon_cost)
		{
	
	$this->order_id=$order_id;
	$this->menu_id=$menu_id;
	$this->menu_price=$item_cost;
	$this->quantity=$quantity;
	$this->adddons=$addons;
	$this->addon_amount=$addon_cost;
	
	$this->db->insert('order_detail',$this);
		
		}
		
		
	
}



?>
