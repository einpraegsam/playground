<?php
/**
 * Created by PhpStorm.
 * User: che
 * Date: 23.04.2019
 * Time: 10:46
 */

namespace BBAW\Cildb\ViewHelpers;


class FotoLightboxViewHelper extends \TYPO3\CMS\Fluid\Core\ViewHelper\AbstractViewHelper
{

    public function initializeArguments()
    {
        //bsp fotodata
        //         fotograf|5555|Rokeby Hall, Yorkshire (GB)|Frontaufnahme|qualitaet|PH0014790.jpg|0#
        //fotograf|5555|Rokeby Hall, Yorkshire (GB)|schräge Aufnahme|qualitaet|PH0014791.jpg|0
        $this->registerArgument('fotodata', 'string', 'foto metadaten', FALSE);

        //bsp belegname
        //          VIII 18042 Aa-10-Leitbeleg-0#VIII 2532 Aa-10-=-0
        $this->registerArgument('belegname', 'string', 'Belegname', False);

    }

    /*
     *  ACHTUNG hier handelt es sich um Lightbox für Fotos
     *  Einsetzung <<Show.html>> zeile 9
     */

    public function render()
    {
        $fotodaten = $this->arguments['fotodata'];
        //fotodata anhand "#" zeichen splitten, das Resultat werden in Variable $fotos gespeichert
        $fotos = explode('#', $fotodaten);

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
        //index für die Fotos, die angezeigt werden muss
        $i = 0;
        //die einzelne foto Strings wird ausgegeben => hier entsteht einzele Carosel-Item in html code
        foreach ($fotos as $foto) {
            //foto String anhand "|" zeichen splitten, das Resultat bzw. die Attribut werden zugeordnet
            list($fotograf, $aufnahmejahr, $aufbewahrung, $bemerkung, $qualitaet, $dateinname, $internet) = explode('|', $foto);

            // wenn der Attribut $internet 1 ist dann soll diese Foto angezeigt werden
            if ($internet != 0) {
                $carousel_item_array[$i] =
                    "<div class = \"container\">\n
                         <div class=\"row pt-5 pb-5\">\n";

                // wenn ein dateinname da steht, das soll es in image Tag angepasst werden
                if ($dateinname != "link") {
                    $carousel_item_array[$i] .=
                        "<div class=\"col cildb_lightbox_img_content\">\n" .
                        "<img src=\"http://digilib.bbaw.de/digitallibrary/servlet/Scaler?fn=/silo10/CIL/" . $dateinname . "&dh=400\"/>\n
                        <div class=\"link_zurdigilib\">
                          <a target=\"_blank\" class =\"cildb_lightbox_h2 row link_zurdigilib\" rel=\"noopener noreferrer\" href=\"https://digilib.bbaw.de/digitallibrary/digilib.html?fn=/silo10/CIL/".$dateinname."\">
                              zur Bilddetails
                          </a>
                            </div>\n
                            </div>";
                }
                if($fotograf !="fotograf" ||$aufnahmejahr != "5555"||$aufbewahrung != "aufbewahrung"||$bemerkung != "bemerkung"||$qualitaet != "qualitaet"){
                    $carousel_item_array[$i] .=
                        "<div class=\"col\">\n
                             <h2 class =\"cildb_lightbox_h2\">
                                 " . $inschrift .
                            "</h2>";


                    if ($fotograf != "fotograf") {
                        $carousel_item_array[$i] .=
                            "            <div class=\"row\">\n
                                             <div class=\"col\"><strong>Aufnahme:</strong></div>\n
                                             <div class=\"col\">" . $fotograf . "</div>\n
                                         </div>\n";
                    }
                    if ($aufnahmejahr != "5555") {
                        $carousel_item_array[$i] .=
                            "<div class=\"row\">
                                             <div class=\"col\"><strong>Aufnahmejahr:</strong></div>
                                             <div class=\"col\">" . $aufnahmejahr . "</div>
                                        </div>";
                    }
                    if ($aufbewahrung != "aufbewahrung") {
                        $carousel_item_array[$i] .=
                            "<div class=\"row\">
                                          <div class=\"col\"><strong>Ort der Aufnahme:</strong></div>
                                          <div class=\"col\">" . $aufbewahrung . "</div>
                                        </div>";
                    }
                    if ($bemerkung != "bemerkung") {
                        $carousel_item_array[$i] .=
                            "<div class=\"row\">
                                          <div class=\"col\"><strong>Bemerkung:</strong></div>
                                          <div class=\"col\">" . $bemerkung . "</div>
                                        </div>";
                    }
                    if ($qualitaet != "qualitaet") {
                        $carousel_item_array[$i] .=
                            "<div class=\"row\">
                                          <div class=\"col\"><strong>Qualität:</strong></div>
                                          <div class=\"col\">" . $qualitaet . "</div>
                                        </div>";
                    }
                    $carousel_item_array[$i] .="</div>";
                }
                $carousel_item_array[$i] .="
                         </div>
                     </div>
                    ";

                //Carousel-Item-Array Index erhöht sich nur wenn ein Foto angezeigt werden muss
                $i++;
            }
        }

        foreach ($fotos as $foto) {

            if ($foto =="fotograf|aufnahmejahr|aufbewahrung|bemerkung|qualitaet|link|internet") {
                continue;
            }else{
                // html code werden ab hier generiert
                $genarate_html =
                    "<div id=\"fotos\" class=\"carouselContainer\" >\n
            <div id=\"searchResultCarousel\" class=\"carousel slide\" data-interval=\"false\">\n";

                // ein Navigationslink für das erste Foto und setzt es "aktiv"
                $genarate_html .= "<ol class=\"carousel-indicators\">\n
                                <li data-target=\"#searchResultCarousel\" data-slide-to=\"0\" class=\"active\">1</li>\n";
                // für jede weitere Fotos, die anzeigent werden, wird jeweils  ein Navigationslink erstellt
                for ($i = 1; $i < count($carousel_item_array); $i++) {
                    $genarate_html .= "<li data-target=\"#searchResultCarousel\" data-slide-to=\"" . $i . "\">" . (string)($i + 1) . "</li>\n";
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
               <i class=\"far fa-window-close close-search-result-carousel\" onClick=\"closeCarousel('fotos');\"></i>
               <a class=\"carousel-control-prev\" href=\"#searchResultCarousel\" role=\"button\" data-slide=\"prev\">\n
                <span class=\"carousel-control-prev-icon\" aria-hidden=\"true\"></span>\n
                <span class=\"sr-only\">Previous</span>\n
              </a>\n
              <a class=\"carousel-control-next\" href=\"#searchResultCarousel\" role=\"button\" data-slide=\"next\">\n
                <span class=\"carousel-control-next-icon\" aria-hidden=\"true\"></span>\n
                <span class=\"sr-only\">Next</span>\n
              </a>\n
          </div>\n
         </div>\n
";

                // generierte html Code werden zurückgegeben
                return $genarate_html;

            }
            // wenn aber kein fotos vorhanden ist, dann soll null zurückgegeben werden
            return "";
        }
    }
}
