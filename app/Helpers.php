<?php
use App\Models\Group;
use App\Models\Doctor;
use App\Models\Patient;
use App\Models\Setting;
use Twilio\Rest\Client;
use App\Mail\PatientCode;
use App\Mail\TestsNotification;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
//use PDF;

function generate_pdf($data, $type = 1)
{
    // reports settings
    $reports_settings = setting('reports');
    // info setting
    $info_settings = setting('info');
    $citcha = $data;
    // pdf file name
    $pdf_name = time() . '.pdf';

   //dd($data);

    $pdf = PDF::loadView('pdf.csr', compact('data', 'reports_settings', 'info_settings', 'type'));
    // $pdf = PDF::loadView('pdf.csr', array_merge($data, [
    //     'reports_settings' => $reports_settings,
    //     'info_settings' => $info_settings,
    //     'type' => $type,
    // ]));


    $pdf->save('uploads/pdf/' . $pdf_name);


     return url('uploads/pdf/' . $pdf_name);
}
//get system currency
if (!function_exists('get_currency'))
{
   function get_currency()
   {
        if(cache()->has('currency'))
        {
            $currency=cache('currency');
        }
        else{
            $setting=setting('info');
            $currency=$setting['currency'];
            cache()->put('currency',$currency);
        }
        return $currency;
   }

}

//get formated price of things
if (!function_exists('formated_price'))
{
   function formated_price($price)
   {
        if(cache()->has('currency'))
        {
            return $price.' '.cache()->get('currency');
        }
        else{

            $setting=\App\Models\Setting::where('key','info')->first()['value'];
            $setting=json_decode($setting,true);
            $currency=$setting['currency'];
            cache()->put('currency',$currency);
        }

        return $currency;
   }

}

//send sms
if (!function_exists('send_sms'))
{
   function send_sms($to,$message)
   {
        $sms_setting=setting('sms');

        if(!empty($sms_setting['sid'])&&!empty($sms_setting['token'])&&!empty($sms_setting['from']))
        {
            // Your Account SID and Auth Token from twilio.com/console
            $sid = $sms_setting['sid'];
            $token = $sms_setting['token'];
            $client = new Client($sid, $token);

            // Use the client to do fun stuff like send text messages!
            try{
                $client->messages->create(
                    // the number you'd like to send the message to
                    $to,
                    [
                        // A Twilio phone number you purchased at twilio.com/console
                        'from' => $sms_setting['from'],
                        // the body of the text message you'd like to send
                        'body' => $message
                    ]
                );
            }
            catch(\Exception $e){
               //error
            }
        }

    }
}




//get json setting as array
if (!function_exists('setting'))
{
    function setting($key)
    {
        $setting=Setting::where('key',$key)->first();
        $setting=json_decode($setting['value'],true);

        return $setting;
    }
}











?>
