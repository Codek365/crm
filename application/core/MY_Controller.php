<?php (defined('BASEPATH')) OR exit('No direct script access allowed');

// Load the MX_Controller class
require APPPATH . 'third_party/MX/Controller.php';

class MY_Controller extends MX_Controller {

    private $_ci;

    public function __construct()
    {
        parent::__construct();

        $this->_ci =& get_instance();
    }

    /**
     * Load Javascript inside the page's body
     * @access  public
     * @param   string  $script
     */
    public function _load_script($script)
    {
        if (isset($this->_ci->template) && is_object($this->_ci->template))
        {
            // Queue up the script to be executed after the page is completely rendered
            echo <<< JS
<script>
    var CIS = CIS || { Script: { queue: [] } };
    CIS.Script.queue.push(function() { $script });
</script>
JS;
        }
        else
        {
            echo '<script>' . $script . '</script>';
        }
    }
}

class Ajax_Controller extends MY_Controller {

    public function __construct()
    {
        parent::__construct();

        $this->load->library('response');
    }
}
class AdminController extends MY_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->helper("url");
        $this->load->library("pagination");
        $this->load->library("Session");
        if(!$this->session->userdata('user_id'))
        {
            redirect(base_url()."login");
        }
        if($this->session->userdata('permission')) {
            $permission = json_decode($this->session->userdata('permission'),true);
            foreach ($permission as $key => $value) {
                if($key == $this->uri->segment(1)){
                    if(!isset($value['chkReady'])){
                        redirect(base_url()."error");
                    }
                    if(!isset($value['chkCreate']) && strpos($this->uri->segment(2),"create") === 0){
                        redirect(base_url()."error");
                    }
                    if(!isset($value['chkDelete']) && strpos($this->uri->segment(2),"delete") === 0){
                        redirect(base_url()."error");
                    }
                    if(!isset($value['chkEdit']) && strpos($this->uri->segment(2),"edit") === 0){
                        redirect(base_url()."error");
                    }
                }
            }
        }
    }
}
/* End of file MY_Controller.php */
/* Location: ./application/core/MY_Controller.php */