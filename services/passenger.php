<?php
    class Passengers
    {
        private $id;
        private $user_name;
        private $route_name;
        private $email;
        private $quantity;
        private $total_pay;
    
        public function __construct($id, $user_name, $route_name, $email, $quantity, $total_pay)
        {
            $this->id = $id;
            $this->user_name = $user_name;
            $this->route_name = $route_name;
            $this->email = $email;
            $this->quantity = $quantity;
            $this->total_pay = $total_pay;
        }
    
        public static function get_all()
        {
            $url = "https://sheetdb.io/api/v1/jmvqm3p07m9cj?sheet=passengers";
            $ch = curl_init($url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    
            $res = curl_exec($ch);
            curl_close($ch);
    
            return $res;
    
            /* print_r(json_decode($res, true)); */
    
        }
    
        public function set_passenger()
        {
            $url = "https://sheetdb.io/api/v1/jmvqm3p07m9cj?sheet=passengers";
    
            $put_data = [
                "id" => $this->id,
                'user_name' => $this->user_name,
                'route_name' => $this->route_name,
                'email' => $this->email,
                'quantity' => $this->quantity,
                'total_pay' => $this->total_pay,
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
                echo "<br/><br/><apan>Created!</span>";
            }else echo "<br/><apan>Somethis is wrong</span>";
    
        }
    }
?>