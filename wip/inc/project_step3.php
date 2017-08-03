<form class="form-horizontal form-label-left" id="step3">

    <h2>Aktueller Status des Projektes<span class="required">*</span></h2>

    <div class="form-group col-centered">
        <div class="btn-group" data-toggle="buttons">
            <label class="btn btn-info">
                <input type="radio" id="status_0" name="project_status" value="0" checked="checked"> in Bearbeitung
            </label>
            <label class="btn btn-success">
                <input type="radio" id="status_1" name="project_status" value="1"> abgeschlossen
            </label>
            <label class="btn btn-warning">
                <input type="radio" id="status_2" name="project_status" value="2"> verzögert
            </label>
            <label class="btn btn-danger">
                <input type="radio" id="status_3" name="project_status" value="3"> Es gibt Probleme
            </label>
        </div>
    </div>

    <br/>
    <br/>

    <h2>Wer darf das Projekt bearbeiten?
        <small>Der Projektersteller das Projekt immer bearbeiten</small>
    </h2>

    <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bs-example-modal-lg-benutzer">
        Benutzer hinzufügen
    </button>

    <div id="tabellebenutzer" style="height: 10em">Bisher keine Benutzer ausgewählt</div>

</form>
Zusatzinformationen:
<TEXTAREA form="step3" id="project_zusatz" class="form-control col-md-7 col-xs-12" rows="20" wrap="hard" cols="20" value=""></TEXTAREA>
<div style="height: 10em"></div>
<div class="bs-example-popovers">
    <div class="alert alert-success"><s>Das Einfügen von Dateien ist nach dem Erstellen des Projektes möglich!</s>
        <B>Bisher nicht umgesetzt. Auf der ToDo-Liste!</B></div>
</div>


<!-- Large modal (Benutzer) -->
<div class="modal fade bs-example-modal-lg-benutzer" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">Nach Benutzer suchen</h4>
            </div>
            <div class="modal-body">
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="text" id="eingabe_benutzer" required="required"
                           class="form-control col-md-7 col-xs-12 "
                           placeholder="Bsp.: Max Muster">
                </div>


                <button id="button_benutzer" type="button" class="btn btn-primary" onclick="suchebenutzer()">Suchen
                </button>


                <div id="benutzerauswahl"></div>
                <!-- benutzerauswahl wird von JS aufgefüllt -->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Abschließen</button>

            </div>

        </div>
    </div>

    <script>
        //Fange Enter ab!

        document.getElementById("eingabe_benutzer")
            .addEventListener("keyup", function (event) {
                event.preventDefault();
                if (event.keyCode == 13) {
                    suchebenutzer();
                }
            });

    </script>

</div>
<!-- /Large modal (Benutzer) -->

<script>
    function suchebenutzer() {


        var abfragebenutzer = "./func/return_benutzersuche.php?s=";
        abfragebenutzer += document.getElementById('eingabe_benutzer').value;
        // var js_bkm = document.getElementById('eingabe_km').value;
        // js_bkm.replace(",",".");
        // abfragebenutzer += "&k=" + document.getElementById('eingabe_km').value.replace(",", ".");

        //console.log(abfrage);

        $.get(abfragebenutzer, function (data) {
            $('#benutzerauswahl').html(data);
        })
    }

    Array.prototype.contains = function (a) {
        for (var i = 0; i < this.length; i++) {
            if (a === this[i]) {
                return true
            }
        }
        return false
    }


    var arraybenutzerids = [];
    var arraybenutzernamen = [];

    function waehlebenutzer(benutzerid, benutzername) {
        if (arraybenutzerids.contains(benutzerid)) {
            zeigefehler("Sie haben diesen Benutzer bereits hinzugefügt!");
        }

        else {
            if (benutzerid ==<?php echo $_SESSION['user']['userid'];?>) {
                zeigefehler("Sie können sich nicht selbst hinzufügen!");
            }
            else {
                arraybenutzerids.push(benutzerid);
                arraybenutzernamen.push(benutzername);
                //console.log(arraybenutzerids);
                //console.log(arraybenutzernamen);
            }
        }
        zeichnebenutzer();
    }

    function zeichnebenutzer() {

        var qtb = "";

        //console.log("ich zeichne...");
        //console.log(arraybenutzernamen)
        //console.log("ich bin namen und "+arraybenutzernamen.length+" lang")
        //console.log("ich bin ids und "+arraybenutzerids.length+" lang")

        if (arraybenutzernamen.length == 0) {

            qtb = "Es wurden keine Benutzer ausgewählt.";

        } else {
            for (var j = 0; j < arraybenutzernamen.length; j++) {
                qtb += arraybenutzernamen[j];
                qtb += '<i><a href=\"javascript:entfernebenutzer(' + j + ')"> (entfernen)</a></i><br />';


            }
        }
        document.getElementById('tabellebenutzer').innerHTML = qtb;
        //console.log(qtb);
    }

    function entfernebenutzer(indexb) {
        arraybenutzerids = arraybenutzerids.slice(0, indexb).concat(arraybenutzerids.slice(indexb + 1));
        arraybenutzernamen = arraybenutzernamen.slice(0, indexb).concat(arraybenutzernamen.slice(indexb + 1));

        zeichnebenutzer();
    }

    function phpweitergabebenutzer(weitergabearray, weitergabestatus) {
        arraybenutzerids = weitergabearray;
        arraybenutzernamen = [];


        for (var i = 0; i < arraybenutzerids.length; i++) {
            $.ajax({
                url: "./func/return_benutzername.php?e=" + arraybenutzerids[i],
                success: function (result) {
                    arraybenutzernamen.push(result);
                },
                async: false  //Ansonsten kommt Ergebnis nachdem es eigentlich gebraucht wird
            });
        }
        zeichnebenutzer();

        // Wähle gewünschten Status an
        document.getElementById("status_" + weitergabestatus).checked = true;


    }

</script>

<?php

// HIER HAND ANLEGEN: SONDERZEICHENPROBLEM

if (isset($_GET['bearbeiten'])) {

    $ausgabe_zusatz = htmlspecialchars($abfrage['zusatz'], ENT_QUOTES, 'UTF-8');
    $ausgabe_zusatz = str_replace( array( "\n", "\r" ), array( "\\n", "\\r" ), $ausgabe_zusatz );
    echo "<script>

    document.onload = startenachladen();
    
    function startenachladen()
    {
        phpweitergabeorte(" . $abfrage['ortgeo'] . ");
        phpweitergabebenutzer(" . $abfrage['benutzer'] . "," . $abfrage['status'] . ");
        zeichnebenutzer();
        document.getElementById(\"project_zusatz\").value = \"" . $ausgabe_zusatz . "\";
    }
    
    </script>";

}

?>



























