/*
 viewportmap.js

 Liest die Viewportdimensionen aus und setzt die H�he der Container-ID auf die H�he des Viewportes - 150 f�r Footer und �berschriften. Experimentell bestimmt.

 Code entnommen aus: https://andylangton.co.uk/blog/development/get-viewportwindow-size-width-and-height-javascript
 und http://www.knothemedia.de/iframe-responsive-gestalten.html


 Nachteil: Seite muss neu geladen werden, keine Skalierung des Fensters dynamisch m�glich

 Eingebaut: 01.06.2017

 */


var viewportwidth;
var viewportheight;

// the more standards compliant browsers (mozilla/netscape/opera/IE7) use window.innerWidth and window.innerHeight

if (typeof window.innerWidth != 'undefined') {
    viewportwidth = window.innerWidth,
        viewportheight = window.innerHeight
}

// IE6 in standards compliant mode (i.e. with a valid doctype as the first line in the document)

else if (typeof document.documentElement != 'undefined'
    && typeof document.documentElement.clientWidth !=
    'undefined' && document.documentElement.clientWidth != 0) {
    viewportwidth = document.documentElement.clientWidth,
        viewportheight = document.documentElement.clientHeight
}

// older versions of IE

else {
    viewportwidth = document.getElementsByTagName('body')[0].clientWidth,
        viewportheight = document.getElementsByTagName('body')[0].clientHeight
}


//DEBUG: document.write('<p>Your viewport width is '+viewportwidth+'x'+viewportheight+'</p>');


function iframeLoaded() {
    var iFrameID = document.getElementById('idIframe');
    if (iFrameID) {

        iFrameID.height = "";
        // iFrameID.height = iFrameID.contentWindow.document.body.scrollHeight + "px";
        // iFrameID.height = Screen.height;
        // iFrameID.height = "innerHeight" in window
        // ? window.innerHeight
        // : document.documentElement.offsetHeight;

        iFrameID.height = viewportheight - 150;
        ;

        /*
         var debugtitle = iFrameID.height;
         debugtitle += " - ";
         debugtitle += 150;
         debugtitle += iFrameID.height;


         document.title=debugtitle;
         */
    }
}