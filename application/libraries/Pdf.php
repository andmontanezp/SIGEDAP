<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
require_once dirname(__FILE__) . '/MPDF/mpdf.php';
 
class Pdf extends MPDF
{
    function __construct()
    {
        parent::__construct();
    }
}
/* application/libraries/Pdf.php */
