<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once(base_url()."notify_sms/autoload.php");

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

if ( ! function_exists('send_sms'))
{
    function send_sms()
    {   

        $api_instance = new NotifyLk\Api\SmsApi();
        $user_id = "26984"; // string | API User ID - Can be found in your settings page.
        $api_key = "PKKetWt76DJA3wMcHB50"; // string | API Key - Can be found in your settings page.
        $message = "Test Message"; // string | Text of the message. 320 chars max.
        $to = "94765870700"; // string | Number to send the SMS. Better to use 9471XXXXXXX format.
        $sender_id = "NotifyDEMO"; // string | This is the from name recipient will see as the sender of the SMS. Use \\\"NotifyDemo\\\" if you have not ordered your own sender ID yet.
        $contact_fname = ""; // string | Contact First Name - This will be used while saving the phone number in your Notify contacts (optional).
        $contact_lname = ""; // string | Contact Last Name - This will be used while saving the phone number in your Notify contacts (optional).
        $contact_email = ""; // string | Contact Email Address - This will be used while saving the phone number in your Notify contacts (optional).
        $contact_address = ""; // string | Contact Physical Address - This will be used while saving the phone number in your Notify contacts (optional).
        $contact_group = 0; // int | A group ID to associate the saving contact with (optional).
        $type = null; // string | Message type. Provide as unicode to support unicode (optional).
        
        try {
            $api_instance->sendSMS($user_id, $api_key, $message, $to, $sender_id, $contact_fname, $contact_lname, $contact_email, $contact_address, $contact_group, $type);
        } catch (Exception $e) {
            echo 'Exception when calling SmsApi->sendSMS: ', $e->getMessage(), PHP_EOL;
        }
    }
}
