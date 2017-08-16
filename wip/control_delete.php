<?php

require_once(__DIR__ . '/globalconfig.php');
require_once(__DIR__ . '/auth.php');


if ($_SESSION['user']['role'] != 1) {
    header('Location: index.php?nb');
}

if (isset($_GET['userid']) && isset($_GET['projectid'])) {
    //Unklare Eingabe! Sie können nur ein Objekt pro Instanz löschen.
    header('location:404.php');
} else {
    if (isset($_GET['userid'])) {
        loescheobjekt('user', $_GET['userid']);

    } elseif (isset($_GET['projectid'])) {
        loescheobjekt('project', $_GET['projectid']);
    } else {
        // Keine Übergabe
        header('location:404.php');
    }

}
function loescheobjekt($objektart, $objektid)
{
    require(__DIR__ . '/globalconfig.php');
    $seitentitel = "Objekt löschen";
    require_once(__DIR__ . '/inc/header.php');
    require_once(__DIR__ . '/inc/layout.php');
    ?>


    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3><?php
                        echo $seitentitel; ?></h3><br/>
                </div>
            </div>
        </div>
        <div>
            <div class="x_panel">
                <div class="x_title">
                    <h2>Sicherheitsabfrage</h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    Sie sind im Inbegriff das Objekt <br/><br/>
                    <h3><?php

                        switch ($objektart) {
                            case 'user':
                                echo "Benutzer: ";
                                break;
                            case 'project':
                                echo "Projekt: ";
                                break;
                        }

                        echo $objektid;


                        ?></h3>
                    <br/>
                    zu löschen. Bitte bestätigen Sie diesen Befehl durch das Eingeben ihres eigenen persönlichen
                    Passwortes!<br/><br/>
                    <div class="clearfix"></div>
                    <form class="form-horizontal form-label-left" id="form-fin" action="func/control_deletetask.php"
                          method="post">


                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="id-delete-passwort">Hier
                                Passwort eingeben
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="password" id="id-delete-passwort" name="delete-passwort"
                                       class="form-control col-md-7 col-xs-12" placeholder="Passwort eingeben.">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="id-delete-objektart">
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="id-delete-objektart" name="delete-objektart"
                                       class="form-control col-md-7 col-xs-12" value="<?php echo $objektart; ?>"
                                       readonly>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="id-delete-objektid">
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="number" id="id-delete-objektid" name="delete-objektid"
                                       class="form-control col-md-7 col-xs-12" value="<?php echo $objektid; ?>"
                                       readonly>
                            </div>
                        </div>


                        <button id="submitbutton" class="btn btn-danger col-md-12 col-xs-12" type="submit">
                            Objekt unwideruflich löschen!
                        </button>


                    </form>
                </div>
            </div>
        </div>


    </div>
    </div>
    </div>
    <?php
    require_once(__DIR__ . '/inc/footer.content.php');
    require_once(__DIR__ . '/inc/footer.php');
    ?>

    <?php

}

?>