<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;

class trackingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('frontend.track');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function track($order_id)
    {
        //
        $trackData = json_decode(file_get_contents('http://backend.ozfoodz.com.au/api/track-order/'.$order_id), true);
        $order = json_decode(file_get_contents('http://backend.ozfoodz.com.au/api/get-order/'.$order_id), true);

            $driverLat = $trackData['trackData']['vendorLat'];
            $driverLang = $trackData['trackData']['vendorLang'];

            $userLat = $trackData['trackData']['userLat'];
            $userLang = $trackData['trackData']['userLang'];

            $geocode = "https://maps.googleapis.com/maps/api/geocode/json?latlng=$userLat,$userLang&sensor=false&key=AIzaSyBqh1mQPnqMSiOUlr-1_3p11XyOsPWRYHI";

            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $geocode);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_PROXYPORT, 3128);
            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
            $response = curl_exec($ch);
            curl_close($ch);
            $output = json_decode($response);
            $dataarray = get_object_vars($output);
            if ($dataarray['status'] != 'ZERO_RESULTS' && $dataarray['status'] != 'INVALID_REQUEST') {
                if (isset($dataarray['results'][0]->formatted_address)) {

                    $useraddress = $dataarray['results'][0]->formatted_address;

                } else {
                    $useraddress = 'Not Found';

                }
            }
            $geocode = "https://maps.googleapis.com/maps/api/geocode/json?latlng=$driverLat,$driverLang&sensor=false&key=AIzaSyBqh1mQPnqMSiOUlr-1_3p11XyOsPWRYHI";
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $geocode);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_PROXYPORT, 3128);
            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
            $response = curl_exec($ch);
            curl_close($ch);
            $output = json_decode($response);
            $dataarray = get_object_vars($output);
            if ($dataarray['status'] != 'ZERO_RESULTS' && $dataarray['status'] != 'INVALID_REQUEST') {
                if (isset($dataarray['results'][0]->formatted_address)) {

                    $driveraddress = $dataarray['results'][0]->formatted_address;

                } else {
                    $driveraddress = 'Not Found';

                }
            }


            // firebase configuration





            $order_id = $order_id;

        return view('frontend.track',compact('trackData','order','useraddress','driveraddress','order_id'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
