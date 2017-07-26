<h2>Bitte überprüfen Sie Ihre Daten!</h2>
<form class="form-horizontal form-label-left" id="form-fin" action="func/submitproject.php" method = "post">

    <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="fin-name">Projektname
            <span class="required">*</span>
        </label>
        <div class="col-md-6 col-sm-6 col-xs-12">
            <input type="text" id="fin-name" name="fin-name"
                   class="form-control col-md-7 col-xs-12" disabled>
        </div>
    </div>

    <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="fin-ansprechpartner">Ansprechpartner
            <span class="required">*</span>
        </label>
        <div class="col-md-6 col-sm-6 col-xs-12">
            <input type="text" id="fin-ansprechpartner" name="fin-ansprechpartner"
                   class="form-control col-md-7 col-xs-12" disabled>
        </div>
    </div>

    <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="fin-projektleiter">Projektleiter
        </label>
        <div class="col-md-6 col-sm-6 col-xs-12">
            <input type="text" id="fin-projektleiter" name="fin-projektleiter"
                   class="form-control col-md-7 col-xs-12" disabled>
        </div>
    </div>

    <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="fin-start">Startdatum
            <span class="required">*</span>
        </label>
        <div class="col-md-6 col-sm-6 col-xs-12">
            <input type="text" id="fin-start" id="fin-name"
                   class="form-control col-md-7 col-xs-12" disabled>
        </div>
    </div>

    <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="fin-ende">Enddatum
            <span class="required">*</span>
        </label>
        <div class="col-md-6 col-sm-6 col-xs-12">
            <input type="text" id="fin-ende" name="fin-ende"
                   class="form-control col-md-7 col-xs-12" disabled>
        </div>
    </div>


    <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="fin-status">Status
            <span class="required">*</span>
        </label>
        <div class="col-md-6 col-sm-6 col-xs-12">
            <input type="text" id="fin-status"  name="fin-status"
                   class="form-control col-md-7 col-xs-12" disabled>
        </div>
    </div>

    <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="fin-benutzer">Benutzer
        </label>
        <div class="col-md-6 col-sm-6 col-xs-12">
            <input type="text" id="fin-benutzer" name="fin-benutzer"
                   class="form-control col-md-7 col-xs-12" disabled>
        </div>
    </div>

    <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="fin-zusatz">Zusatzinformationen
        </label>
        <div class="col-md-6 col-sm-6 col-xs-12">
            <TEXTAREA form="form-fin" id="fin-zusatz" name="fin-zusatz" class="form-control col-md-7 col-xs-12" rows="20" disabled></TEXTAREA>
        </div>
    </div>


    <h3>Maschinelle Informationen zur Weiterverarbeitung</h3>

    <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="fin-statusnr">Statusnr
        </label>
        <div class="col-md-6 col-sm-6 col-xs-12">
            <input type="text" id="fin-statusnr"  name="fin-statusnr"
                   class="form-control col-md-7 col-xs-12" disabled>
        </div>
    </div>

    <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="fin-benutzerids">Benutzer-IDS
        </label>
        <div class="col-md-6 col-sm-6 col-xs-12">
            <input type="text" id="fin-benutzerids" name="fin-benutzerids"
                   class="form-control col-md-7 col-xs-12" disabled>
        </div>
    </div>

    <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="fin-orte">Orte
            <span class="required">*</span>
        </label>
        <div class="col-md-6 col-sm-6 col-xs-12">
            <input type="text" id="fin-orte" name="fin-orte"
                   class="form-control col-md-7 col-xs-12" disabled>
        </div>
    </div>

    <br/>
    <br/>

    <button class="btn btn-success col-lg-12 col-md-12 col-xs-12" type="submit" name="projekterstellen"
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


        document.getElementById('fin-projektleiter').value = document.getElementById('project_projektleiter').value;
        document.getElementById('fin-ende').value = document.getElementById('project_ende').value;

        document.getElementById('fin-statusnr').value = $('input[name="project_status"]:checked').val()

        document.getElementById('fin-benutzer').value = arraybenutzernamen;
        document.getElementById('fin-benutzerids').value = arraybenutzerids;

        document.getElementById('fin-zusatz').value = document.getElementById('project_zusatz').value;


        if (document.getElementById('project_name').value == "") {
            zeigeunvollständig('fin-name');
        }
        else {
            document.getElementById('fin-name').value = document.getElementById('project_name').value;
            resetstyle('fin-name');
        }

        if (document.getElementById('project_ansprechpartner').value == "") {
            zeigeunvollständig('fin-ansprechpartner');
        }
        else {
            document.getElementById('fin-ansprechpartner').value = document.getElementById('project_ansprechpartner').value;
            resetstyle('fin-ansprechpartner');
        }

        if (document.getElementById('project_start').value == "") {
            zeigeunvollständig('fin-start');
        }
        else {
            document.getElementById('fin-start').value = document.getElementById('project_start').value;
            resetstyle('fin-start');
        }

        if (arrayorte == "") {
            zeigeunvollständig('fin-orte');
            document.getElementById('fin-orte').value = "Sie müssen mindestens einen Ort angeben!";
            finish = false;
        }
        else {
            document.getElementById('fin-orte').value = arrayorte;
            resetstyle('fin-orte');
        }

        switch ($('input[name="project_status"]:checked').val()) {
            case '0':
                document.getElementById('fin-status').value = "In Bearbeitung";
                break;
            case '1':
                document.getElementById('fin-status').value = "abgeschlossen";
                break;
            case '2':
                document.getElementById('fin-status').value = "verzögert";
                break;
            case '3':
                document.getElementById('fin-status').value = "Es gibt Probleme";
                break;
            default:
                document.getElementById('fin-status').value = "?";
        }


        $('input[name="project_status"]:checked').val();

        //console.log(finish);

        if (!finish) {

        }


    }
</script>