<?php
class M_Schedule extends CI_Model{
        public function __construct() {
            parent::__construct();
        }        
        public function getTestDB($data)
        {
            $this->db->select($data);
            $results = $this->db->get('product', 1, 0);
            return $results->result();
        }       
        public function testQuery($query)
        {
            $results = $this->db->query($query);
            return $results->result();
        }
        public function InsertSchedule($data){
            $this->db->insert('schedule_new',$data);
            return $this->db->insert_id();
        }
        public function InsertTimeLine($data){
            $this->db->insert('time_line_new',$data);
            return $this->db->insert_id();   
        }
        public function getSchedule($schedule_id){
            $this->db->where('id',$schedule_id);
            $result = $this->db->get('schedule_new');
            return $result->result_array();
        }
        public function UpdateSchedule($id,$data){
            $this->db->where('id',$id);
            $this->db->update('schedule_new',$data);
        }
        public function getTourDescription($product_id){
            $sql = "SELECT * FROM product p LEFT JOIN product_description pd ON p.product_id=pd.product_id WHERE p.product_id='".$product_id."'";
            $results = $this->db->query($sql);
            return $results->result();
        }
        public function getTourOptionGroup($product_id)
        {
            // $sql = "SELECT product_option_value.product_option_value_id,
            //            product_option_value.product_option_id, 
            //            product_option_value.product_id, 
            //            product_option_value.option_id,
            //            product_option_value.option_value_id, 
            //            product_option_value.price, 
            //            option_description.name,
            //            option.category,
            //            option_category.category
            //     FROM `product_option_value` 

            //     LEFT JOIN `option_description` 
            //     ON product_option_value.option_id=option_description.option_id 

            //     LEFT JOIN `option`
            //     ON product_option_value.option_id=option.option_id

            //     LEFT JOIN `option_category`
            //     ON option.category=option_category.option_category_id

            //     WHERE `product_id`=".$product_id." AND option.category=0 AND option_description.name NOT LIKE  'Phụ thu%' 
            //     GROUP BY option_description.name
            //     ORDER BY `product_option_value`.`product_option_value_id` ASC";
            $sql = "SELECT *  
                    FROM product_option po 
                    LEFT JOIN `option` o 
                    ON (po.option_id = o.option_id) 
                    LEFT JOIN option_description od 
                    ON (o.option_id = od.option_id) 
                    WHERE po.product_id = ".$product_id."
                    AND o.category=0 
                    AND o.class!=2
                    AND o.type='checkbox'
                    ORDER BY o.sort_order";
            $results = $this->db->query($sql);
            return $results->result();
        }
        public function getTourOptionGroupItem($product_id,$product_option_id)          
        {
            $sql = "SELECT * 
                    FROM product_option_value pov 
                    LEFT JOIN option_value ov 
                    ON (pov.option_value_id = ov.option_value_id) 
                    LEFT JOIN option_value_description ovd 
                    ON (ov.option_value_id = ovd.option_value_id) 
                    WHERE pov.product_id =".$product_id."
                    AND pov.product_option_id =".$product_option_id."
                    ORDER BY ov.sort_order";
            $results = $this->db->query($sql);
            return $results->result();

        }
        /* move from main site (opencart)*/
        public function getProductOptions($product_id) {
            $product_option_data = array();

            $product_option_query = $this->db->query("SELECT * 
                FROM product_option po 
                LEFT JOIN `option` o 
                ON (po.option_id = o.option_id) 
                LEFT JOIN option_description od 
                ON (o.option_id = od.option_id) 
                WHERE po.product_id = '" . (int)$product_id . "' 
                ORDER BY o.sort_order");

            foreach ($product_option_query->result() as $product_option) {
                if ($product_option->type == 'select' || $product_option->type == 'radio' || $product_option->type == 'checkbox' || $product_option->type == 'image') {
                    $product_option_value_data = array();

                    $product_option_value_query = $this->db->query("SELECT * 
                        FROM product_option_value pov 
                        LEFT JOIN option_value ov 
                        ON (pov.option_value_id = ov.option_value_id) 
                        LEFT JOIN option_value_description ovd 
                        ON (ov.option_value_id = ovd.option_value_id) 
                        WHERE pov.product_id = '" . (int)$product_id . "' AND pov.product_option_id = '" . (int)$product_option->product_option_id . "' ORDER BY ov.sort_order");

                    foreach ($product_option_value_query->result() as $product_option_value) {
                        $product_option_value_data[] = array(
                            'product_option_value_id' => $product_option_value->product_option_value_id,
                            'option_value_id'         => $product_option_value->option_value_id,
                            'name'                    => $product_option_value->name,
                            'image'                   => $product_option_value->image,
                            'quantity'                => $product_option_value->quantity,
                            'subtract'                => $product_option_value->subtract,
                            'price'                   => $product_option_value->price,
                            'price_prefix'            => $product_option_value->price_prefix,
                            'weight'                  => $product_option_value->weight,
                            'weight_prefix'           => $product_option_value->weight_prefix
                        );
                    }

                    $product_option_data[] = array(
                        'product_option_id' => $product_option->product_option_id,
                        'option_id'         => $product_option->option_id,
                        'name'              => $product_option->name,
                        'type'              => $product_option->type,
                        'category'              => $product_option->category,
                        'option_class'              => $product_option->class,
                        'option_value'      => $product_option_value_data,
                        'required'          => $product_option->required
                    );
                } else {
                    $product_option_data[] = array(
                        'product_option_id' => $product_option->product_option_id,
                        'option_id'         => $product_option->option_id,
                        'name'              => $product_option->name,
                        'type'              => $product_option->type,
                        'category'              => $product_option->category,
                        'option_class'              => $product_option->class,
                        'option_value'      => $product_option->option_value,
                        'required'          => $product_option->required
                    );              
                }
            }

            return $product_option_data;
        }    
        /* end */


        public function insertOrder($data){
            $this->db->insert('schedule',$data);
        }
        // public function getTourCode(){
        //     $this->db->select('tour.tour_id, tour.tour_code, tour.model, tour.name_tour');
        //     $this->db->where('tour.tour_code !=','');
        //     $this->db->where('status',1);
        //     $results = $this->db->get('tour');
        //     return $results->result();
        // }       
        public function getDescriptionTour($tour_id){           
            $sql = "SELECT product.product_id AS tour_id,
                           product.model AS model,  
                           product.sku AS tour_code,  
                           product_description.start_time AS start_time,  
                           product_description.description AS description,  
                           product_description.custom_title AS custom_title, 
                           product_description.meta_keyword AS meta_keyword,
                           product_description.name_tour AS name_tour,
                           product.duration AS duration,
                           product_description.departure AS departure,
                           product_description.start_time_holiday AS start_time_holiday,
                           product_description.location_from AS location_from,
                           product_description.location_to AS location_to,
                           product_description.shortdescription AS shortdescription,
                           product_description.included AS included,
                           product_description.notincluded AS notincluded,
                           product_description.info AS info,
                           product_description.meeting AS meeting,
                           product_description.terms AS terms,
                           product_description.suggest AS suggest,
                           product.status AS status 
                    FROM `product`
                    LEFT JOIN `product_description`
                    ON product.product_id=product_description.product_id
                    WHERE product.product_id=".$tour_id;
            $results = $this->db->query($sql);
            return $results->row();
        }
        /* khoa change table for old crm of nhut*/
        public function getTourCode(){
            /*$this->db->select('product.product_id AS tour_id, product.sku AS tour_code, product.model AS model, product_description.name AS name_tour');
            $this->db->join('product_description', 'product_description.product_id = product.product_id', 'left');
            $this->db->where('product.sku !=','');
            $this->db->where('status',1);
            $results = $this->db->get('product');
            return $results->result();*/
            $sql = "SELECT product.product_id AS tour_id, 
                    product.sku AS tour_code, 
                    product.model AS model, 
                    product_description.name AS name_tour
                    FROM `product` 
                    LEFT JOIN `product_description` 
                    ON product_description.product_id = product.product_id
                    WHERE product.sku !='' OR product.model !='' AND product.status=1";
            $results = $this->db->query($sql);
            return $results->result();
        }
        public function getHoliday($date){
            $sql = "SELECT * FROM option_category WHERE date_end >= '".$date."' AND status=1";
            $results = $this->db->query($sql);
            return $results->result();
        }
        /* khoa end*/
        public function getTourOption($tour_id){
            $this->db->select('*');
            $this->db->where('tour_id',$tour_id);
            $this->db->where('status','1');
            $results = $this->db->get('tour_option');
            return $results->result();
        }
        /* khoa change table for old crm of nhut*/
        public function getOption_value_description($option_id,$option_value_id)
        {
            $this->db->select('*');
            $this->db->where('option_id', $option_id);
            $this->db->where('option_value_id', $option_value_id);
            $results=$this->db->get('option_value_description');
            return $results->result();
        }
        public function getOption_description($option_id)
        {
            $this->db->distinct('name');
            $this->db->where('option_id', $option_id);

            $results=$this->db->get('option_description');
            return $results->result();
        }       
        /* khoa end*/
        public function getHolidayList(){
            $this->db->select('*');
            $this->db->where('status',1);
            $this->db->order_by('sort_oder','DASC');
            $results = $this->db->get('tour_attribute');
            return $results->result();
        }
        public function chargeSingleRoom($attribute_id,$tour_option_id){
            $this->db->select('*');
            $this->db->where('tour_option_id',$tour_option_id);
            $this->db->where('attribute_id',$attribute_id);
            $results = $this->db->get('tour_option_price');
            return $results->result();
        }
        public function getTourPrice($attribute_id,$tour_id){
            $this->db->select('*');
            $this->db->where('attribute_id',$attribute_id);
            $this->db->where('tour_id',$tour_id);
            $results = $this->db->get('tour_price');
            return $results->row();
        }
        public function getForeignerOption($tour_option_id,$attribute_id){
            $this->db->select('*');
            $this->db->where('tour_option_id',$tour_option_id);
            $this->db->where('attribute_id',$attribute_id);
            $results = $this->db->get('charge_foreigner');
            return $results->row();
        }
        public function getSingleRoom($tour_option_id,$attribute_id){
            $this->db->select('*');
            $this->db->where('tour_option_id',$tour_option_id);
            $this->db->where('attribute_id',$attribute_id);
            $results = $this->db->get('charge_single_room');
            return $results->row();
        }
        public function getCategoryTour($tour_option_id){
            $this->db->select('*');
            $this->db->where('id',$tour_option_id);
            $results = $this->db->get('tour_option');
            return $results->row();
        }
        public function getAirline($tour_id){
            $this->db->select('*');
            $this->db->where('tour_id',$tour_id);
            $results = $this->db->get('tickets_airline');
            return $results->result();
        }
        public function getDescriptionChedule($id){
            $this->db->select('*');
            $this->db->where('id',$id);
            $results = $this->db->get('schedule');
            return $results->row();
        }
        public function getDescriptionAirline($air_line){
            $this->db->select('*');
            $this->db->where('ticket_id',$air_line);
            $results = $this->db->get('tickets_price');
            return $results->result();
        }
        public function getDescriptionUser($id){
            $this->db->select('*');
            $this->db->where('id',$id);
            $results = $this->db->get('users');
            return $results->row();
        }
        public function getTicket($id){
            $this->db->select('*');
            $this->db->where('ticket_id',$id);
            $this->db->order_by('sort_order','DASC');
            $results = $this->db->get('tickets_price');
            return $results->result();
        }
}
?>