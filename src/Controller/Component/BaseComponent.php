<?php
namespace App\Controller\Component;

use Cake\Controller\Component;
use Cake\Utility\Text;

class BaseComponent extends Component
{
    
    //Optimize Image 
    public function resmush($file)
    {
        //$file = '/path/to/myfile.jpg';
        $mime = mime_content_type($file);
        $info = pathinfo($file);
        $name = $info['basename'];
        $output = new \CURLFile($file, $mime, $name);
        $data = array(
            "files" => $output,
        );
    
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'http://api.resmush.it/?qlty=90');
        curl_setopt($ch, CURLOPT_POST,1);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        $result = curl_exec($ch);
        if (curl_errno($ch)) {
           $result = curl_error($ch);
        }
        curl_close ($ch);
        
        return  json_decode($result);
    }

    //Check air quality in Yogyakarta
    public function airVisual()
    {
        $curl = curl_init();
        
        curl_setopt_array($curl, array(
          CURLOPT_URL => "api.airvisual.com/v2/city?city=Yogyakarta&state=Yogyakarta&country=Indonesia&key=ce058ff0-9d9b-495b-a6e1-081abe9420b2",
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => "",
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 0,
          CURLOPT_FOLLOWLOCATION => false,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => "GET",
        ));
        
        $response = curl_exec($curl);
        $err = curl_error($curl);
        
        curl_close($curl);
        
        if ($err) {
          echo "cURL Error #:" . $err;
        } else {
          return  json_decode($response);
        } 
    }


}