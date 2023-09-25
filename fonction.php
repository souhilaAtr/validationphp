<?php


function separation(){
    echo "<br><br><br>";
}

function valideDate($date, $format = 'Y-m-d')
{
    $d = DateTime::createFromFormat($format, $date);
    if ($d && ($d->format($format) == $date) ) {
        return true;
    } else {
        return false;
    }
}


function convertirstrtotime( $date){

    $date = strtotime($date);
    if($date){
        $date = date("Y-m-d",$date);return $date;
    }else{
        return false;
    }
    

}

