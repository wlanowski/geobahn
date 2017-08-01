<h2>Bitte überprüfen Sie Ihre Daten!</h2>
<form class="form-horizontal form-label-left" id="form-fin" action="./func/submitproject.php" method="post">

    <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="id-fin-name">Projektname
            <span class="required">*</span>
        </label>
        <div class="col-md-6 col-sm-6 col-xs-12">
            <input type="text" id="id-fin-name" name="fin-name"
                   class="form-control col-md-7 col-xs-12" readonly>
        </div>
    </div>

    <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="id-fin-ansprechpartner">Ansprechpartner
            <span class="required">*</span>
        </label>
        <div class="col-md-6 col-sm-6 col-xs-12">
            <input type="text" id="id-fin-ansprechpartner" name="fin-ansprechpartner"
                   class="form-control col-md-7 col-xs-12" readonly>
        </div>
    </div>

    <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="id-fin-projektleiter">Projektleiter
        </label>
        <div class="col-md-6 col-sm-6 col-xs-12">
            <input type="text" id="id-fin-projektleiter" name="fin-projektleiter"
                   class="form-control col-md-7 col-xs-12" readonly>
        </div>
    </div>

    <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="id-fin-start">Startdatum
            <span class="required">*</span>
        </label>
        <div class="col-md-6 col-sm-6 col-xs-12">
            <input type="text" id="id-fin-start" name="fin-start" readonly
                   class="form-control col-md-7 col-xs-12">
        </div>
    </div>

    <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="id-fin-ende">Enddatum
        </label>
        <div class="col-md-6 col-sm-6 col-xs-12">
            <input type="text" id="id-fin-ende" name="fin-ende"
                   class="form-control col-md-7 col-xs-12" readonly>
        </div>
    </div>


    <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="id-fin-status">Status
            <span class="required">*</span>
        </label>
        <div class="col-md-6 col-sm-6 col-xs-12">
            <input type="text" id="id-fin-status" name="fin-status"
                   class="form-control col-md-7 col-xs-12" readonly>
        </div>
    </div>

    <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="id-fin-benutzer">Benutzer
        </label>
        <div class="col-md-6 col-sm-6 col-xs-12">
            <input type="text" id="id-fin-benutzer" name="fin-benutzer"
                   class="form-control col-md-7 col-xs-12" readonly>
        </div>
    </div>

    <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="id-fin-zusatz">Zusatzinformationen
        </label>
        <div class="col-md-6 col-sm-6 col-xs-12">
            <TEXTAREA form="form-fin" id="id-fin-zusatz" name="fin-zusatz" class="form-control col-md-7 col-xs-12"
                      rows="20" readonly></TEXTAREA>
        </div>
    </div>


    <h3>Maschinelle Informationen zur Weiterverarbeitung</h3>

    <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="id-fin-statusnr">Statusnr
        </label>
        <div class="col-md-6 col-sm-6 col-xs-12">
            <input type="text" id="id-fin-statusnr" name="fin-statusnr"
                   class="form-control col-md-7 col-xs-12" readonly>
        </div>
    </div>

    <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="id-fin-benutzerids">Benutzer-IDS
        </label>
        <div class="col-md-6 col-sm-6 col-xs-12">
            <input type="text" id="id-fin-benutzerids" name="fin-benutzerids"
                   class="form-control col-md-7 col-xs-12" readonly>
        </div>
    </div>

    <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="id-fin-orte">Orte
            <span class="required">*</span>
        </label>
        <div class="col-md-6 col-sm-6 col-xs-12">
            <input type="text" id="id-fin-orte" name="fin-orte"
                   class="form-control col-md-7 col-xs-12" readonly>
        </div>
    </div>

    <br/>
    <br/>

    <button id="submitbutton" class="btn btn-success col-lg-12 col-md-12 col-xs-12" type="submit"
            disabled="disabled">Projekt erstellen
    </button>

</form>

<script>


    function zeigeunvollständig(elementid) {
        document.getElementById(elementid).style.backgroundColor = "#a94442";
        document.getElementById(elementid).style.color = "white";
        document.getElementById(elementid).value = "Dieses Feld muss ausgefüllt sein!"
        finish = false;
    }

    function resetstyle(elementid) {
        document.getElementById(elementid).style.backgroundColor = "";
        document.getElementById(elementid).style.color = "";
    }

    function aktuallisierefin() {

        var finish = true;


        document.getElementById('id-fin-projektleiter').value = document.getElementById('project_projektleiter').value;
        document.getElementById('id-fin-ende').value = document.getElementById('project_ende').value;

        document.getElementById('id-fin-statusnr').value = $('input[name="project_status"]:checked').val()

        document.getElementById('id-fin-benutzer').value = arraybenutzernamen;
        document.getElementById('id-fin-benutzerids').value = JSON.stringify(arraybenutzerids);

        document.getElementById('id-fin-zusatz').value = document.getElementById('project_zusatz').value;


        if (document.getElementById('project_name').value == "") {
            zeigeunvollständig('id-fin-name');
        }
        else {
            document.getElementById('id-fin-name').value = document.getElementById('project_name').value;
            resetstyle('id-fin-name');
        }

        if (document.getElementById('project_ansprechpartner').value == "") {
            zeigeunvollständig('id-fin-ansprechpartner');
        }
        else {
            document.getElementById('id-fin-ansprechpartner').value = document.getElementById('project_ansprechpartner').value;
            resetstyle('id-fin-ansprechpartner');
        }

        if (document.getElementById('project_start').value == "") {
            zeigeunvollständig('id-fin-start');
        }
        else {
            document.getElementById('id-fin-start').value = document.getElementById('project_start').value;
            resetstyle('id-fin-start');
        }

        if (arrayorte == "") {
            zeigeunvollständig('id-fin-orte');
            document.getElementById('id-fin-orte').value = "Sie müssen mindestens einen Ort angeben!";
            finish = false;
        }
        else {
            //document.getElementById('id-fin-orte').value = arrayorte;
            document.getElementById('id-fin-orte').value = JSON.stringify(arrayorte);
            resetstyle('id-fin-orte');
        }

        switch ($('input[name="project_status"]:checked').val()) {
            case '0':
                document.getElementById('id-fin-status').value = "In Bearbeitung";
                break;
            case '1':
                document.getElementById('id-fin-status').value = "abgeschlossen";
                break;
            case '2':
                document.getElementById('id-fin-status').value = "verzögert";
                break;
            case '3':
                document.getElementById('id-fin-status').value = "Es gibt Probleme";
                break;
            default:
                document.getElementById('id-fin-status').value = "?";
        }


        $('input[name="project_status"]:checked').val();

        //console.log(finish);

        if (finish) {
            document.getElementById("submitbutton").disabled = false;
        } else
        {
            document.getElementById("submitbutton").disabled = true;
        }


    }
</script>