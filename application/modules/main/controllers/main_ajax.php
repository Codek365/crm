<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main_ajax extends Ajax_Controller {

    function main_ajaxify()
    {
        $title = $this->input->get_post('title');
        $body = $this->input->get_post('body');
        if ($this->response->confirm($title, $body))
        {
            //script thực hiện việc chạy khi nhấn button ok
            $this->response->script('$(this).data("caller").after("<div>Confirmed!</div>");');
        }
        $this->response->send();
    }
}

/* End of file skeleton_ajax.php */
/* Location: ./application/modules/skeleton/controllers/skeleton_ajax.php */