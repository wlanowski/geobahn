<?php
class tools{
    public $seitentitel;
    public $bodyclass;
    
    public function getHeader($t, $b){
        // Werte zuweisen
        $this->seitentitel = $t;
        $this->bodyclass = $b;
        
        // Einbinden des Headers
        require_once("header.php");
    }
    
    public function getFooter(){
        // Einbinden des Footers
        require_once("footer.php");
    }
}
?>