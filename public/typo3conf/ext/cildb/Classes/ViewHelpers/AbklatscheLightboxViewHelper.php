<?php
/**
 * Created by PhpStorm.
 * User: che
 * Date: 20.06.2019
 * Time: 12:02
 */

namespace BBAW\Cildb\ViewHelpers;


class AbklatscheLightboxViewHelper extends \TYPO3\CMS\Fluid\Core\ViewHelper\AbstractViewHelper
{

    public function initializeArguments()
    {

        $this->registerArgument('abklatschedata', 'string', 'abklatsche metadaten', FALSE);

        $this->registerArgument('belegname', 'string', 'Belegname', False);

    }



    public function render()
    {
        $abklatschedaten = $this->arguments['abklatschedata'];
        //fotodata anhand "#" zeichen splitten, das Resultat werden in Variable $fotos gespeichert
        $abklatche = explode('#', $abklatschedaten);

        //+++++++++++++++++++++++++++++++++++++++++++++++++++++++++BelegeTransformation+++++++++++++++++++++++++++++++++++++
        $belege = ($this->arguments['belegname']);
        $beleg = explode('#', $belege);

        $inschrift = "";
        $br_level = 0;

        foreach ($beleg as &$cell) {


            $subcell = explode('|', $cell);


            if ($subcell[2] > $br_level) {
                $br_level++;
                $inschrift .= " (";
            } else if ($subcell[2] < $br_level) {
                $br_level--;
                $inschrift .= ")";
            }

            //$inschrift.='-'.$subcell[0];
            if (($subcell[2] != "Leitbeleg")
                && ($subcell[2] != "status")) {
                $inschrift .= " " . $subcell[2] . " ";
            }

            //echo "Sammlung: ".$subcell[1]."<br />";

            if ($subcell[1] == "10") {
                $inschrift.=str_replace("I2","I<sup>2</sup>",$subcell[0]);
            } else if ($subcell[1] == "149") {
                $inschrift.=str_replace("IKöln2","IKöln<sup>2</sup>",$subcell[0]);
            } else {
                $inschrift .= $subcell[0];
            }


        }


        if ($br_level != 0) {
            $inschrift .= ")";

        }


        $inschrift = trim($inschrift);
        //+++++++++++++++++++++++++++++++++++++++++++++++++++++++++BelegeTranksformation+++++++++++++++++++++++++++++++++++++

        //ein Array/Platzhalter für carosel item, die angeziegt werden ($internet=1)
        $carousel_item_array = array();
        //index für die Abklatsch, die angezeigt werden muss
        $i = 0;
        //die einzelne foto Strings wird ausgegeben => hier entsteht einzele Carosel-Item in html code
        foreach ($abklatche as $abklatsch) {
            //foto String anhand "|" zeichen splitten, das Resultat bzw. die Attribut werden zugeordnet
            list($signatur,$art,$bemerkung,$masse,$zustand,$fotos,$scans) = explode('|', $abklatsch);


            if ($signatur != "signatur") {
                $signaturcontent =
                    "            <div class=\"row\">\n
                                         <div class=\"col\"><strong>Signatur:</strong></div>\n
                                         <div class=\"col\">" . $signatur . "</div>\n
                                     </div>\n";
            }
            if ($art != "art") {
               $artcontent       =
                                    "<div class=\"row\">
                                         <div class=\"col\"><strong>Art:</strong></div>
                                         <div class=\"col\">" . $art . "</div>
                                    </div>";
            }
            if ($masse != "masse") {
                $massecontent      =
                                  "<div class=\"row\">
                                      <div class=\"col\"><strong>Masse:</strong></div>
                                      <div class=\"col\">" . $masse . "</div>
                                    </div>";
            }
            if ($bemerkung != "bemerkung") {
                $bemerkungcontent   =
                                   "<div class=\"row\">
                                      <div class=\"col\"><strong>Bemerkung:</strong></div>
                                      <div class=\"col\">" . $bemerkung . "</div>
                                    </div>";
            }
            if ($zustand != "zustand") {
                $zustandcontent     =
                                   "<div class=\"row\">
                                      <div class=\"col\"><strong>Zustand:</strong></div>
                                      <div class=\"col\">" . $zustand . "</div>
                                    </div>";
            }

            if ($fotos!="fotos") {
                if($signatur != "signatur"|| $art != "art"||$bemerkung != "bemerkung" ||$masse != "masse"||$zustand != "zustand"){
                    $carousel_item_array[$i] =
                        "<div class = \"container\">\n
                        <div class=\"row pt-5 pb-5\">\n
                            <div class=\"col cildb_lightbox_img_content\">\n 
                             <img class=\"zoom\" src=\"http://digilib.bbaw.de/digitallibrary/servlet/Scaler?fn=/silo10/CIL/". $fotos ."&dh=400\"></img>\n
                            </div>\n
                    
                           <div class=\"col\">\n
                                   <h2 class =\"cildb_lightbox_h2\">" . $inschrift . "</h2>"
                        .$signaturcontent
                        .$artcontent
                        .$massecontent
                        .$bemerkungcontent
                        .$zustandcontent
                        ."</div>
                         </div>
                     </div>";

                    $i++;

                }else{
                    $carousel_item_array[$i] =
                        "<div class = \"container\">\n
                        <div class=\"row pt-5 pb-5\">\n
                            <div class=\"col\">\n 
                                   <h2 class =\"cildb_lightbox_h2\">" . $inschrift . "</h2>
                             <img src=\"http://digilib.bbaw.de/digitallibrary/servlet/Scaler?fn=/silo10/CIL/". $fotos ."&dh=400\"></img>\n
                            </div>\n
                         </div>
                     </div>";

                    $i++;
                }
            }elseif ($signatur != "signatur"|| $art != "art"||$bemerkung != "bemerkung" ||$masse != "masse"||$zustand != "zustand"){
                $carousel_item_array[$i] =
                    "<div class = \"container\">\n
                        <div class=\"row pt-5 pb-5\">\n
                           <div class=\"col\">\n
                                   <h2 class =\"cildb_lightbox_h2\">" . $inschrift . "</h2>"
                    .$signaturcontent
                    .$artcontent
                    .$massecontent
                    .$bemerkungcontent
                    .$zustandcontent
                    ."</div>
                         </div>
                     </div>";

                $i++;


            }

        }

        foreach ($abklatche as $abklatsch) {

            if ($abklatsch =="signatur|art|bemerkung|masse|zustand|fotos|scans") {
                continue;
            }else{
                // html code werden ab hier generiert
                $genarate_html =
                    "<div id=\"abklatsche\" class=\"carouselContainer\" >\n
            <div id=\"searchResultCarouselabklatsche\" class=\"carousel slide\" data-interval=\"false\">\n";

                // ein Navigationslink für das erste Foto und setzt es "aktiv"
                $genarate_html .= "<ol class=\"carousel-indicators\">\n
                                <li data-target=\"#searchResultCarouselabklatsche\" data-slide-to=\"0\" class=\"active\">1</li>\n";
                // für jede weitere Fotos, die anzeigent werden, wird jeweils  ein Navigationslink erstellt
                for ($i = 1; $i < count($carousel_item_array); $i++) {
                    $genarate_html .= "<li data-target=\"#searchResultCarouselabklatsche\" data-slide-to=\"" . $i . "\">" . (string)($i + 1) . "</li>\n";
                }

                $genarate_html .= "</ol>\n
                <div class=\"carousel-inner\">\n";
                // erste Carousel-Item wird "aktiv" gesetzt
                if (count($carousel_item_array) > 0) {
                    $genarate_html .= " <div class=\"carousel-item active\">\n" .
                        $carousel_item_array[0]
                        . "</div>\n";
                    // für jede weitere Carousel-Item wird  keine "active" gesezt

                    for ($c_index = 1; $c_index < count($carousel_item_array); $c_index++) {
                        $genarate_html .= " <div class=\"carousel-item\">\n"
                            .
                            $carousel_item_array[$c_index]
                            .
                            "</div>\n";
                    }
                }

                $genarate_html .= "
                 </div>\n
                  <i class=\"far fa-window-close close-search-result-carousel\" onClick=\"closeCarousel('abklatsche');\"></i>
               <a class=\"carousel-control-prev\" href=\"#searchResultCarouselabklatsche\" role=\"button\" data-slide=\"prev\">\n
                <span class=\"carousel-control-prev-icon\" aria-hidden=\"true\"></span>\n
                <span class=\"sr-only\">Previous</span>\n
              </a>\n
              <a class=\"carousel-control-next\" href=\"#searchResultCarouselabklatsche\" role=\"button\" data-slide=\"next\">\n
                <span class=\"carousel-control-next-icon\" aria-hidden=\"true\"></span>\n
                <span class=\"sr-only\">Next</span>\n
              </a>\n
          </div>\n
         </div>\n
         
    
    <script>
        wheelzoom(document.querySelectorAll('img.zoom'));
	</script>


         ";

                // generierte html Code werden zurückgegeben
                return $genarate_html;

            }
            // wenn aber kein Inhalt vorhanden ist, dann soll null zurückgegeben werden
            return "";
        }
    }

}
