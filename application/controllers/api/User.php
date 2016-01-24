<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';

//require_once ../libraries/Format;

class User extends REST_Controller
{
	function user_get()
    {
        $data = array('returned: '. $this->get('id'));
        $this->response($data, 200);
    }
     
    function user_post()
    {       
        $data = array('returned: '. $this->post('id'));
        $this->response($data);
    }
 
    function user_put()
    {       
        $data = array('returned: '. $this->put('id'));
        $this->response($data);
    }
 
    function user_delete()
    {
        $data = array('returned: '. $this->delete('id'));
        $this->response($data);
    }
}
