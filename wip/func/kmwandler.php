<?php

/* Das hier entstand durch Niklas mit viel liebe */

//LOL, das Deutsch hier ist echt kacke. Ist mir aber egal!

function bignum($karl)
{
    $lol = (int)$karl;                                                            //Zahl wird hier nochmal als integer deklariert,sodass es schön ist
    $lol = $lol - 100000000;                                                        //-100000000 weil das einfach nicht passt
    $lol = (string)$lol;                                                          //Zahl wird wieder als String deklariert um andere Dinge zu tun
    $lol = chunk_split($lol, 1, ".");                                              //Zahlenstring wird nach jeder Ziffer mit einem Punkt getrennt
    $lol = explode(".", $lol);                                                    //String wird an den Punkten zerrissen und in array geschrieben
    $neuezahl = $lol[0] . $lol[1] . $lol[2] . "," . $lol[3] . " + " . $lol[6] . $lol[7];        //neue Zahl wird aus Array gebildet
    //$neuezahl = $lol[0] . $lol[1] . $lol[2] . "." . $lol[3] . $lol[6] . $lol[7];        //neue Zahl wird aus Array gebildet
    //echo $neuezahl;
    return $neuezahl;
}

function smallnum($jens)
{
    $jens = 1000001 - $jens;
}


function numtransfer($inputzahl)
{                           //inputzahl=Parameter mit dem gearbeitet wird
    if ($inputzahl == 1000000) {

        $rueckgabe = 0;
        return $rueckgabe;                                  //wenn input=10000000, dann ist der kilometer gleich null

    } elseif ($inputzahl > 1000000) {

        $rueckgabe = bignum($inputzahl);                      //wenn input größer als 1 Mio., dann wird Funktion zum großen sortieren gemacht
        return $rueckgabe;

    } else {
        $rueckgabe = smallnum($inputzahl);                    //wenn input kleiner als 1 Mio. dann wird andere funktion gemacht
        return $rueckgabe;
    }

}

?>