<?php

//LOL, das Deutsch hier ist echt kacke. Ist mir aber egal!

function bignum($karl){
    $lol=(int)$karl;                                                            
    $lol=$lol-100000000;
    
    $lol=(string)$lol;                                                         
    $lol= chunk_split($lol,1,".");                                             
    $lol= explode(".",$lol);
    
    $zaehler=count($lol);
 
    switch($zaehler){
    	ccase '2':
            $neuezahl="0,00".$lol[0];
            break;
            case '3':
            $neuezahl="0,0".$lol[0].$lol[1];
            break;
               case '6':
            $neuezahl="0,".$lol[0].$lol[3].$lol[4];
            break;
            case '7':
            $neuezahl=$lol[0].",".$lol[1].$lol[4].$lol[5];
            break;
            case "8":
            $neuezahl=$lol[0].$lol[1].",".$lol[2].$lol[5].$lol[6];
            break;
            case "9":
            $neuezahl=$lol[0].$lol[1].$lol[2].",".$lol[3].$lol[6].$lol[7];
            break;
            default:
            $neuezahl="Fehlercode_101_beer_not_found";
    }

    return $neuezahl;
}

function smallnum($jens){
    $lol=(int)$jens;                                                            
    $lol=$lol-99999999;
    
    $lol=(string)$lol;                                                         
    $lol= chunk_split($lol,1,".");                                             
    $lol= explode(".",$lol);
    $zaehler=count($lol); 
    switch($zaehler){
    	case '3':
            $neuezahl=$lol[0]."0,00".$lol[1];
            break;
            case '4':
            $neuezahl=$lol[0]."0,0".$lol[1].$lol[2];
            break;
            case '7':
            $neuezahl=$lol[0]."0,".$lol[1].$lol[4].$lol[5];
            break;
            case "8":
            $neuezahl=$lol[0].$lol[1].",".$lol[2].$lol[5].$lol[6];
            break;
            case "9":
            $neuezahl=$lol[0].$lol[1].$lol[2].",".$lol[3].$lol[6].$lol[7];
            break;
            default:
            $neuezahl="Fehlercode_101_beer_not_found";
    }
    return $neuezahl;
}

function numtransfer($inputzahl){                           //inputzahl=Parameter mit dem gearbeitet wird
    if($inputzahl==100000000){

        $rueckgabe=0;
        return $rueckgabe;                                  //wenn input=10000000, dann ist der kilometer gleich null

    }elseif($inputzahl>100000000){

        $rueckgabe=bignum($inputzahl);                      //wenn input größer als 1 Mio., dann wird Funktion zum großen sortieren gemacht
        return $rueckgabe;

    }else {
        $rueckgabe=smallnum($inputzahl);                    //wenn input kleiner als 1 Mio. dann wird andere funktion gemacht
        return $rueckgabe;
    }

}