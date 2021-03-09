<?php 
/*Openweather.php

*/

class Openweather
{
    private $_data;

    public function getforcast($city)
    {
        $curl = curl_init('https://api.openweathermap.org/data/2.5/forecast?q='.$city.'&APPID=3732a02ff8cb9808cf1c9724fb704348&units=metric&lang=fr');
         curl_setopt($curl, CURLOPT_RETURNTRANSFER , true );
         $this->_data = curl_exec($curl);
         if ($this->_data == false ) {
            var_dump(curl_error($curl));
        }else{
            $this->_data  = json_decode($this->_data, true);
        }
        curl_close($curl);
        $result =[];
/* foreach ($this->_data['list'] as $day):
    $result = [
        'temp'=> $day['main']['temp'],
    ];
endforeach;
return $result;
*/

    }
    public function print()
    {
       return $this->_data;
}
}

/*

                            [temp] => 8.02
                            [feels_like] => 4.78
                            [temp_min] => 8.02
                            [temp_max] => 8.02
                            [pressure] => 1015
                            [sea_level] => 1015
                            [grnd_level] => 933
                            [humidity] => 75
                            [temp_kf] => 0

*/