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

if ( ! function_exists('predict_student_stress_level'))
{
    function predict_student_stress_level($input_data)
    {   
        $api_url = "http://127.0.0.1:5000/predict/student"; // replace with the URL of your API

        // Encode input data as JSON
        // $data = json_encode(array("input_data" => $input_data));
    
        // create a new cURL resource
        $ch = curl_init();
        
        // set the URL and other cURL options
        curl_setopt($ch, CURLOPT_URL, $api_url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $input_data);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        
        // execute the cURL request
        $response = curl_exec($ch);
        
        // check for errors
        if(curl_errno($ch)) {
            echo 'Error: ' . curl_error($ch);
        }
        
        // close the cURL resource
        curl_close($ch);
        
        // process the response from the API
        return $response;
    }
}

if ( ! function_exists('predict_employee_stress_level'))
{
    function predict_employee_stress_level($input_data)
    {   
        $api_url = "http://127.0.0.1:5000/predict/employee"; // replace with the URL of your API

        // Encode input data as JSON
        // $data = json_encode(array("input_data" => $input_data));
    
        // create a new cURL resource
        $ch = curl_init();
        
        // set the URL and other cURL options
        curl_setopt($ch, CURLOPT_URL, $api_url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $input_data);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        
        // execute the cURL request
        $response = curl_exec($ch);
        
        // check for errors
        if(curl_errno($ch)) {
            echo 'Error: ' . curl_error($ch);
        }
        
        // close the cURL resource
        curl_close($ch);
        
        // process the response from the API
        return $response;
    }
}
