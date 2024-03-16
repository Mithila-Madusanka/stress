<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Converts D/C to Dr / Cr
 *
 * Covnerts the D/C received from database to corresponding
 * Dr/Cr value for display.
 *
 * @access  public
 * @param   string  'd' or 'c' from database table
 * @return  string
 */

if ( ! function_exists('is_logged_in'))
{
    function is_logged_in()
    {   
        $CI =& get_instance();
        if($CI->session->userdata('userid') != '')
            return true;
        else
            redirect("Admin/logOut");
    }
}
