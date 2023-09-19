<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Http;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Storage;
class Controller extends BaseController{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public  function storeImage($folderName,$file){
        try{
            return Storage::disk('website')->put($folderName, $file);
        }catch(\Exception $e){
        	return '';
        }//end trycatch.
	}//end storeImage function.
    public  function storeImageToStorageFolder($folderName,$file){
        try{
            return Storage::disk('storage')->put($folderName, $file);
        }catch(\Exception $e){
        	return '';
        }//end trycatch.
	}//end storeImageToStorageFolder function.
    public function deleteImage($file){
        try{
            return Storage::disk('website')->delete($file);
        }catch(\Exception $e){
        	return '';
        }//end trycatch.
	}//end storeImage function.

    public function uploadToDropBox($folderPath,$file,$fileName,$token,$is_invoice=null){

        try{
            $endpoint = env('DROPBOX_API_END_POINT');
            $accessToken = $token;
            $headers = [
                'Authorization: Bearer ' . $accessToken,
                'Content-Type: application/octet-stream',
                'Dropbox-API-Arg: {"path": "/LCM/'.$folderPath.'/'. $fileName . '","mode": "add"}',
            ];
            if ($is_invoice==null){
                $fileContents = file_get_contents($file->getPathname());
                $ch = curl_init();
                curl_setopt($ch, CURLOPT_URL, $endpoint);
                curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
                curl_setopt($ch, CURLOPT_POST, true);
                curl_setopt($ch, CURLOPT_POSTFIELDS, $fileContents);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                $response = curl_exec($ch);
                curl_close($ch);
            }else{
                $ch = curl_init();
                curl_setopt($ch, CURLOPT_URL, $endpoint);
                curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
                curl_setopt($ch, CURLOPT_POST, true);
                curl_setopt($ch, CURLOPT_POSTFIELDS, $file);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                $response = curl_exec($ch);
                curl_close($ch);
            }

            return $response;
        }catch (\Exception $e){
            return 0;
            return $e->getMessage();
        }
    }//end function.



    public function genrateToken(){
        $response = Http::asForm()->post('https://api.dropbox.com/oauth2/token', [
            'refresh_token' => env('DROPBOX_REFRESH_TOKEN'),
            'grant_type' => 'refresh_token',
            'client_id' => 'e2msce0nbcipv89',
            'client_secret' => '32rov02843t6txi',
        ]);

        if($response->successful())
        {
            $responseData = $response->json();

            if (!isset($responseData['access_token'])) {
                // Access token is not present in the response
                echo 'Access token not found in the response.';
                return;
            }

            $this->accessToken = $responseData['access_token'];
        }
        else
        {
            if ($response->clientError()) {
                // Handle API error
                echo 'API error: ' . $response['error_description'];
                return;
            }

            if ($response->serverError()) {
                // Handle curl error
                echo 'Curl error: ' . $response->body();
                return;
            }
        }
    }

}//end class.
