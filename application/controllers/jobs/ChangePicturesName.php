<?php
/**
 * Created by PhpStorm.
 * User: suprapc
 * Date: 03/04/15
 * Time: 04:04 PM
 */

class ChangePicturesName extends CI_Controller {
    public function __construct(){
        $this->load->model("jobs/Model_Job");
        $this->output->enable_profiler(TRUE);
        $this->load->helper('file');
    }

}