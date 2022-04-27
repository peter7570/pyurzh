<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /*$url = 'http://localhost:5080/LiveApp/rest/v2/broadcasts/create';
        $json = '{"name" : "string", "description" : "string"}';
       // $json = "";
        $ret = $this->ccurl($url, $json, $http_status);
        var_dump($ret); */

        return view('welcome');

    }


    private function ccurl($url, $post_data, &$http_status, &$header = null)
        {

            $ch = curl_init();
            // user credencial
            curl_setopt($ch, CURLOPT_USERPWD, "username:passwd");
            curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);

            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_URL, $url);

            // post_data
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);

            if (!is_null($header)) {
                curl_setopt($ch, CURLOPT_HEADER, true);
            }
            curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
            curl_setopt($ch, CURLOPT_HTTPHEADER, array('Accept: application/json', 'Content-Type: application/json'));

            curl_setopt($ch, CURLOPT_VERBOSE, true);

            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

            $response = curl_exec($ch);

            $body = null;
            // error
            if (!$response) {
                $body = curl_error($ch);
                // HostNotFound, No route to Host, etc  Network related error
                $http_status = -1;
                Log::error("CURL Error: = " . $body);
            } else {
                //parsing http status code
                $http_status = curl_getinfo($ch, CURLINFO_HTTP_CODE);

                if (!is_null($header)) {
                    $header_size = curl_getinfo($ch, CURLINFO_HEADER_SIZE);

                    $header = substr($response, 0, $header_size);
                    $body = substr($response, $header_size);
                } else {
                    $body = $response;
                }
            }

            curl_close($ch);

            return $body;
        }



}
