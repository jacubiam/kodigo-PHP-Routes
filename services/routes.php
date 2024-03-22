<?php

class Routes
{
    private $id;
    private $route_name;
    private $origin;
    private $destination;
    private $distance;
    private $price;

    public function __construct($id, $route_name, $origin, $destination, $distance, $price)
    {
        $this->id = $id;
        $this->route_name = $route_name;
        $this->origin = $origin;
        $this->destination = $destination;
        $this->distance = $distance;
        $this->price = $price;
    }

    public static function get_all()
    {
        $url = "https://sheetdb.io/api/v1/jmvqm3p07m9cj";
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

        $res = curl_exec($ch);
        curl_close($ch);

        return $res;
        /* print_r(json_decode($res, true)); */

    }

    public static function get_route($route) {
        $url = "https://sheetdb.io/api/v1/jmvqm3p07m9cj";
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

        $res = curl_exec($ch);
        curl_close($ch);
        $fetched_route = [];
        foreach (json_decode($res, true) as $key => $value) {
            if($value['route_name'] == $route){
                $fetched_route = $value;
            }
        }
        
        return $fetched_route;
    }

    public function set_route()
    {
        $url = "https://sheetdb.io/api/v1/jmvqm3p07m9cj";

        $put_data = [
            "id" => $this->id,
            'route_name' => $this->route_name,
            'origin' => $this->origin,
            'destination' => $this->destination,
            'distance' => $this->distance,
            'price' => $this->price,
        ];

        $ch = curl_init($url);

        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($put_data));
        curl_setopt($ch, CURLOPT_HTTPHEADER, array("Content-Type: application/json"));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $res = curl_exec($ch);

        curl_close($ch);

        if ($res == '{"created":1}') {
            echo "<br/><apan>Created!</span>";
        }else echo "<br/><apan>Somethis is wrong</span>";

    }
    
}
