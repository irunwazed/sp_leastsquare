<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LeastSquare {

	private static $CI;
    private $X, $Y;

    public function __construct()
    {
        self::$CI = & get_instance();

    }

    public function hitung($Y, $X){
        // $X = array(
        //     587, 496, 437, 570, 487, 406, 617, 597, 582, 549, 538, 513
        // );
        // $Y = array(
        //     291, 251, 177, 226, 223, 240, 351, 317, 296, 272, 270, 280
        // );

        $jumX = array_sum($X);
        $jumY = array_sum($Y);

        for($i = 0; $i < count($X); $i++){
            $XY[$i] = $X[$i]*$Y[$i];
            $X2[$i] = pow($X[$i],2);
            $Y2[$i] = pow($Y[$i],2);
        }

        $jumXY = array_sum($XY);
        $jumX2 = array_sum($X2);
        $jumY2 = array_sum($Y2);
        
        $r = ((12*$jumXY) - ($jumX*$jumY)) / (SQRT(((12*$jumX2)-(pow($jumX, 2)))*((12*$jumY2)-(pow($jumY, 2)))));

        return $r;
        
    }

}