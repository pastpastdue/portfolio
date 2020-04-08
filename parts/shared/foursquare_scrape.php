<?php

/*
 * Foursquare-php Foursquare checkins fetcher php class
 */

class fourSquare {

    private $token = "";
    private $rawData = "";  ///\! FourSquare raw data as a php object
    //private $url = "http://api.foursquare.com/v1/user.json"; //foursquare api call
    private $url = "https://api.foursquare.com/v2/users/self/checkins?v=20130514&oauth_token=";
    public $date = "";
    public $venueName = "";
    public $venueCat = "";
    public $venueType = "";
    public $venueIcon = "http://foursquare.com/img/categories/question.png";
    public $comment = "";
    public $venueAddress = "";
    public $venueCity = "";
    public $venueState = "";
    public $venueCountry = "";
    public $geolong = "";
    public $geolat = "";


    /*
     * Parse Foursquare data to extract the data of a given checking
     * @param $number the checking number in reverse order (0 last checking, 1 previous checking, 2 (prev prev checking)...
     */

    function getCheckin($position = 0) {


        //parsing
        try {
            //$this->date
            $root = $this->rawData->{"response"}->{"checkins"}->{"items"}{$position};
            //print_r($this->rawData);
            //print_r($root);

            $timestamp = $root->{"createdAt"};
            $timezone = $root->{"timeZone"};
            date_default_timezone_set($timezone);
            $this->date = date("F j, Y, g:i a", $timestamp);

            $this->venueName = $root->{"venue"}->{"name"};
            //print_r($root->{"venue"}->{"categories"}[0]);
            if (isset($root->{"venue"}->{"categories"}[0])) {
                $this->venueCat = $root->{"venue"}->{"categories"}[0]->{"name"};
                $this->venueIcon = $root->{"venue"}->{"categories"}[0]->{"icon"};
                if (isset($root->{"venue"}->{"categories"}[0]->{"parents"}[0]))
                    $this->venueType = $root->{"venue"}->{"categories"}[0]->{"parents"}[0];
            }

          

            if (isset($root->{"venue"}->{"location"})) {
                if (isset($root->{"venue"}->{"location"}->{"address"}))
                    $this->venueAddress = $root->{"venue"}->{"location"}->{"address"};
                if (isset($root->{"venue"}->{"location"}->{"city"}))
                    $this->venueCity = $root->{"venue"}->{"location"}->{"city"};
                if (isset($root->{"venue"}->{"location"}->{"state"}))
                    $this->venueState = $root->{"venue"}->{"location"}->{"state"};
                if (isset($root->{"venue"}->{"location"}->{"country"}))
                    $this->venueCountry = $root->{"venue"}->{"location"}->{"country"};
                $this->geolat = $root->{"venue"}->{"location"}->{"lat"};
                $this->geolong = $root->{"venue"}->{"location"}->{"lng"};
            }
        } catch (Exception $e) {
            
        }
    }

    /*
     * Get the foursquare location and convert the fist checkin as fq object
     */

    function __construct($token, $safe = false) {

        $req = $this->url . $token;
        //fetching data
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $req);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
        curl_setopt($ch, CURLOPT_USERAGENT, "fetcher " . time()); //prevent rate limit
        curl_setopt($ch, CURLOPT_SSLVERSION, 3);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, $safe);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);
        $data = curl_exec($ch);
        curl_close($ch);

        //echo "$data";
        //decoding data
        $this->rawData = json_decode($data);

        if ($this->rawData->{"meta"}->{"code"} != 200) {
            die("Foursquare widget API: Error getting checking. Is the App still authorized?");
        }

		

        #parse the last checking data ($number == 0)
        $this->getCheckin(0);
    }

    
}

?>