<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Schedule extends AdminController{    
    public function index() {
        $this->load->model('m_schedule');
            $data['options'] = array();
            foreach ($data as $option) { 
                if (isset($option['type']) ) {                   
                    if ($option['type'] == 'select' || $option['type'] == 'radio' || $option['type'] == 'checkbox' || $option['type'] == 'image') { 
                        $option_value_data = array();
                        foreach ($option['option_value'] as $option_value) {
                            if (!$option_value['subtract'] || ($option_value['quantity'] > 0)) {
                                
                                $option_value_data[] = array(
                                    'product_option_value_id' => $option_value['product_option_value_id'],
                                    'option_value_id'         => $option_value['option_value_id'],
                                    'name'                    => $option_value['name'],
                                    'tag'                     => $option['name']   
                                );
                                
                            }
                        }
                        $data['options'][] = array(
                            'product_option_id' => $option['product_option_id'],
                            'option_id'         => $option['option_id'],
                            'name'              => $option['name'],
                            'type'              => $option['type'],
                            'category'          => $option['category'],
                            'class'             => $option['class'],
                            'option_value'      => $option_value_data,
                            'required'          => $option['required']
                        );                
                    } 
                }
            }
       	$data['holiday'] = $this->m_schedule->getHoliday(date('Y-m-d'));
        $this->template->load_view('schedule/index',$data);
    }
    public function process(){
        $this->load->model('m_schedule');
        $data = $this->input->post();
        print_r($data);exit;
        $data['user_init'] = $this->session->userdata('user_id');
        $data['process'] = '';
        $data['status'] = '1';
        $data['init'] = date('Y-m-d H:i:s');
        $this->m_schedule->insertOrder($data);
        $this->session->set_flashdata('success','Đặt lịch thành công !');
        redirect('schedule');

    }
    public function edit(){
        date_default_timezone_set('UTC');
        $id = $this->uri->segment(3);
        $this->load->model('m_schedule');
        $adults = 0;
        $childs = 0;
        $singlerooms = 0;
        $foreigns = 0;
        $tickets = 0;
        $age12 = 0;
        $age2to12age = 0;
        $age2 = 0;
        $birth_date = $this->input->post('txtBornYear').'-'.$this->input->post('txtBornMonth').'-'.$this->input->post('txtBornDay');
        $alert_time = mktime($this->input->post('txtAHour'),$this->input->post('txtAMinute'),0,$this->input->post('txtAMonth'),$this->input->post('txtADay'),$this->input->post('txtAYear'));
        if($this->input->post('txtslAdult') != null){
            $adults = $this->input->post('txtslAdult');
        }
        if($this->input->post('txtslChd') != null){
            $childs = $this->input->post('txtslChd');
        }
        if($this->input->post('txtslSingleRoom') != null){
            $singlerooms = $this->input->post('txtslSingleRoom');
        }
        if($this->input->post('txtslForeign') != null){
            $foreigns = $this->input->post('txtslForeign');
        }
        if($this->input->post('txtslTicket') != null){
            $tickets = $this->input->post('txtslTicket');
        }
        if($this->input->post('txt12age') != null){
            $age12 = $this->input->post('txt12age');
        }
        if($this->input->post('txt2to12') != null){
            $age2to12age = $this->input->post('txt2to12');
        }
        if($this->input->post('txt2age') != null){
            $age2 = $this->input->post('txt2age');
        }
        if($this->input->post('btnEdit') == '1'){
            $data_update = array(
                "option_choose" =>$this->input->post('txtOptionChoose'),
                "option_flight" =>$this->input->post('txtOptionFlight'),
                "start_date"    =>date('Y-m-d',strtotime($this->input->post('txtDateStart'))),
                "aduls"         =>$adults,
                "childs"        =>$childs,
                "singlerooms"   =>$singlerooms,
                "foreigns"      =>$foreigns,
                "tickets"       =>$tickets,
                "12age"         =>$age12,
                "2to12"         =>$age2to12age,
                "2age"          =>$age2,
                "total"         =>$this->input->post('txtSumall'),
                "payment"       =>$this->input->post('txtPayment'),
                "fullname"      =>$this->input->post('txtName'),
                "phone"         =>$this->input->post('txtPhone'),
                "email"         =>$this->input->post('txtEmail'),
                "home_address"  =>$this->input->post('txtAddress'),
                "birth_date"    =>date('Y-m-d',strtotime($birth_date)),
                "require_work"  =>$this->input->post('Note'),
                "call_time"     =>$alert_time,
                "date_edit"     =>date('Y-m-d H:i'),
                "user_edit"     =>$this->session->userdata('user_id'),
                "status"        =>$this->input->post('txtStatus'),
            );
            $schedule_id = $this->m_schedule->UpdateSchedule($id,$data_update);
        }
        $data['holiday'] = $this->m_schedule->getHoliday(date('Y-m-d'));
        $data['Schedule'] = $this->m_schedule->getSchedule($id)[0];
        $this->template->load_view('schedule/edit',$data);
    }
    public function addScheduleTest(){
        date_default_timezone_set('UTC');
        $this->load->model('m_schedule');
        $adults = 0;
        $childs = 0;
        $singlerooms = 0;
        $foreigns = 0;
        $tickets = 0;
        $age12 = 0;
        $age2to12age = 0;
        $age2 = 0;
        $birth_date = $this->input->post('txtBornYear').'-'.$this->input->post('txtBornMonth').'-'.$this->input->post('txtBornDay');
        $alert_time = mktime($this->input->post('txtAHour'),$this->input->post('txtAMinute'),0,$this->input->post('txtAMonth'),$this->input->post('txtADay'),$this->input->post('txtAYear'));
        if($this->input->post('txtslAdult') != null){
            $adults = $this->input->post('txtslAdult');
        }
        if($this->input->post('txtslChd') != null){
            $childs = $this->input->post('txtslChd');
        }
        if($this->input->post('txtslSingleRoom') != null){
            $singlerooms = $this->input->post('txtslSingleRoom');
        }
        if($this->input->post('txtslForeign') != null){
            $foreigns = $this->input->post('txtslForeign');
        }
        if($this->input->post('txtslTicket') != null){
            $tickets = $this->input->post('txtslTicket');
        }
        if($this->input->post('txt12age') != null){
            $age12 = $this->input->post('txt12age');
        }
        if($this->input->post('txt2to12') != null){
            $age2to12age = $this->input->post('txt2to12');
        }
        if($this->input->post('txt2age') != null){
            $age2 = $this->input->post('txt2age');
        }
        $data_insert = array(
            "tour_id"       =>$this->input->post('txtTourID'),
            "option_choose" =>$this->input->post('txtOptionChoose'),
            "option_flight" =>$this->input->post('txtOptionFlight'), 
            "full_name_tour"=>$this->input->post('txtFullNameTour'),
            "start_date"    =>date('Y-m-d',strtotime($this->input->post('txtDateStart'))),
            "aduls"         =>$adults,
            "childs"        =>$childs,
            "singlerooms"   =>$singlerooms,
            "foreigns"      =>$foreigns,
            "tickets"       =>$tickets,
            "12age"         =>$age12,
            "2to12"         =>$age2to12age,
            "2age"          =>$age2,
            "total"         =>$this->input->post('txtSumall'),
            "payment"       =>$this->input->post('txtPayment'),
            "fullname"      =>$this->input->post('txtName'),
            "phone"         =>$this->input->post('txtPhone'),
            "email"         =>$this->input->post('txtEmail'),
            "home_address"  =>$this->input->post('txtAddress'),
            "birth_date"    =>date('Y-m-d',strtotime($birth_date)),
            "require_work"  =>$this->input->post('Note'),
            "call_time"     =>$alert_time,
            "date_add"      =>date('Y-m-d H:i'),
            "user_add"      =>$this->session->userdata('user_id'),
            "status"        =>"0",
        );
        $schedule_id = $this->m_schedule->InsertSchedule($data_insert);
        $date_time_line_insert = array(
                "schedule_id"   => $schedule_id,
                "call_time"     => date('Y-m-d H:i',$alert_time),
            );
        $this->m_schedule->InsertTimeLine($date_time_line_insert);
        redirect('schedule');
    }
    public function getTourOptionGroupAjax()
    {
        $product_id = $this->input->get('product_id');
        $this->load->model('m_schedule');
        $data = $this->m_schedule->getProductOptions($product_id);
        $data['options'] = array();
        foreach ($data as $option) {
            if (isset($option['type'])) {
                if ( $option['type'] == 'checkbox') {
                    $option_value_data = array();
                    foreach ($option['option_value'] as $option_value) {
                        if (!$option_value['subtract'] || ($option_value['quantity'] > 0)) {
                            $option_value_data[] = array(
                            'product_option_value_id' => $option_value['product_option_value_id'],
                            'option_value_id'         => $option_value['option_value_id'],
                            'name'                    => $option_value['name'],
                            'price'                   => $option_value['price'],
                            'option_id'               => $option['option_id'],
                            'tag'                     => $option['name']
                            );
                        }
                    }
                    $data['options'][] = array(
                    'product_option_id' => $option['product_option_id'],
                    'option_id'         => $option['option_id'],
                    'name'              => $option['name'],
                    'type'              => $option['type'],
                    'category'          => $option['category'],
                    'option_class'      => $option['option_class'],
                    'option_value'      => $option_value_data,
                    'required'          => $option['required']
                    );
                }
            }
        }
        echo json_encode($data['options']);
    }    
    public function getTourCode(){
        $this->load->helper('string_schedule');
        $this->load->model('m_schedule');
        $data = $this->m_schedule->getTourCode();
        $arr = array();
        $i = 0;
        foreach($data as $key => $value){
            $arr[$i]['shortname'] = shortname($value->name_tour);
            $arr[$i]['id'] = $value->tour_id;
            $arr[$i]['tour_name'] = $value->model.' '.$value->name_tour;
            $i++;
        }
        echo $json_response = json_encode($arr);
    }
    public function getSchedule(){
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $time = date("H:i");
        $this->load->model('m_schedule');
        /*$data = $this->m_schedule->getSchedule($time);*/
        $date_time = new DateTime(date("H:i"));
        $date_time->add(new DateInterval('PT10M'));
        $data['time'] = $date_time->format('H:i');

        $json_data = json_encode($data);
        echo $json_data;
    }
    public function getDescription()
    {
        $this->load->model('m_schedule');
        $product_id = $_GET['product_id'];
        $data = $this->m_schedule->getTourDescription($product_id);
        echo json_encode($data);
    }
    public function description(){
        $this->load->model('m_schedule');
        $id = $this->uri->segment(3);
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $data = $this->input->post();
            $data['user_process'] = $this->session->userdata('user_id');
            date_default_timezone_set('Asia/Ho_Chi_Minh');
            $data['process_time'] = date('Y-m-d H:i:s');
            $data['status'] = 0;
            $this->m_schedule->UpdateSchedule($id,$data);
            redirect('schedule/description/'.$id);
        }
        $query = $data['description'] = $this->m_schedule->getDescriptionChedule($id);
        $data['user'] = $this->m_schedule->getDescriptionUser($query->user_init);
        $this->template->load_view('schedule/description',$data);
    }    
    
}
?>