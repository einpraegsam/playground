<?php

/*
 * Author: Nora
 * 08.04.2019
 */

namespace BBAW\Cildb\ViewHelpers;

class PictureViewHelper extends \TYPO3\CMS\Fluid\Core\ViewHelper\AbstractViewHelper
{
    public function initializeArguments() {

        $this->registerArgument('type', 'string', 'the type of metadata', FALSE);
        $this->registerArgument('content', 'string', 'the metadata', FALSE);


    }

    public function render() {

        $type = $this->arguments['type'];
        $meta_objects = explode('#',$this->arguments['content']);

        if ((count($meta_objects) == 1)
                && (($meta_objects[0] == "fotograf|aufnahmejahr|aufbewahrung|bemerkung|qualitaet|link|internet")
                        || ($meta_objects[0] == "signatur|art|bemerkung|masse|zustand|fotos|scans")
                        || ($meta_objects[0] == "schedenkasten|autor|bemerkung|scans"))) {
            return "";
        }

        $div = "<strong>$type</strong>\n"
               ."<ul class=\"list-unstyled clearfix\">\n";

        if ($type == "Fotos") {

            foreach ($meta_objects as &$meta_object) {

                $metadata = explode('|',$meta_object);

                if (($metadata[6] == 0) // Veroeffentlichung verhindern
                        || ($metadata[5] == "link")) { // kein Foto vorhanden
                    continue;
                } else {
                    $div .= "<li>\n"
                            ."<a href=\"#\" onClick=\"openCarousel('fotos')\">\n"
                            ."<img class=\"m-2 float-left\" src=\"http://digilib.bbaw.de/digitallibrary/servlet/Scaler?fn=/silo10/CIL/$metadata[5]&dh=300\"></img>\n"
                            ."</a>\n"
                            ."</li>\n";
                }

            }

            $div .= "</ul>\n";
            if ($div == "<strong>$type</strong>\n<ul class=\"list-unstyled clearfix\">\n</ul>\n") {
                return "";
            }

        } else if ($type == "Abklatsche") {

            $scan3d = array();

            foreach ($meta_objects as &$meta_object) {

                $metadata = explode('|',$meta_object);

                if ($metadata[6] != "scans") {
                    $scan3d[] = $metadata[6];
                }

                if ($metadata[5] == "fotos") {
                    $div .=  "<li>\n"
                            ."<div class=\"abklatsche_container\">"
                                ."<a href=\"#\" onClick=\"openCarousel('abklatsche')\">\n"
                                    ."<img class=\"m-2 float-left abklatsch_dummy_Bild\" src=\"http://digilib.bbaw.de/digitallibrary/servlet/Scaler?fn=/silo10/CIL/abklatsch.jpg&dh=300\"></img>\n"
                                ."</a>\n"
                            ."</div>"
                            ."</li>\n";
                } else {
                    $div .= "<li>\n"
                            ."<a href=\"#\" onClick=\"openCarousel('abklatsche')\">\n"
                            ."<img class=\"m-2 float-left\" src=\"http://digilib.bbaw.de/digitallibrary/servlet/Scaler?fn=/silo10/CIL/$metadata[5]&dh=300\"></img>\n"
                            ."</a>\n"
                            ."</li>\n";
                }

            }

            $div .= "</ul>\n";

            if ($div == "<strong>$type</strong>\n<ul class=\"list-unstyled clearfix\">\n</ul>\n") {
                $div = "";
            }

            if (!empty($scan3d)) {

                $div .= "<strong>3D-Abklatsche</strong><br />";

                foreach ($scan3d as &$scan) {
                    $div .= "<iframe src=\"$scan\" width=\"600px\" height=\"400px\" frameborder=\"0\" scrolling=\"no\"></iframe>\n";
                }

            }

        } else if ($type == "Scheden") {

            foreach ($meta_objects as &$meta_object) {

                $metadata = explode('|',$meta_object);

                if ($metadata[3] == "scans") { // kein Scan vorhanden
                    continue;
                } else {
                    $div .= "<li>\n"
                           ."<a href=\"#\" onClick=\"openCarousel('scheden')\">\n"
                           ."<img class=\"m-2 float-left\" src=\"http://digilib.bbaw.de/digitallibrary/servlet/Scaler?fn=/silo10/CIL/$metadata[3]&dh=300\"></img>\n"
                           ."</a>\n"
                           ."</li>\n";
                }

            }

            $div .= "</ul>\n";
            if ($div == "<strong>$type</strong>\n<ul class=\"list-unstyled clearfix\">\n</ul>\n") {
                return "";
            }

        } else {
            return "";
        }

        return $div;
        /*$list = "<ul class=\"list-unstyled clearfix\">";
        $a3d = array();

        foreach ($meta_objects as &$meta_object) {

            $metadata = explode('|',$meta_object);

            if ($type == 'Fotos' && $metadata[6] == 1) {
                //echo "Filename:".$metadata[5];
                $list .= "<li>\n"
                       ."<a href=\"#\" onClick=\"openCarousel('test')\">\n"
                       ."<img src=\"http://digilib.bbaw.de/digitallibrary/servlet/Scaler?fn=/silo10/CIL/$metadata[5]&dh=300\"></img>\n"
                       ."</a>\n"
                       ."</li>\n";
            } else if ($type == 'Abklatsche') {
                //echo "Filename: $metadata[5]";
                //echo "3d Filename: $metadata[6]";

                if ($metadata[5] == 'fotos') {
                    $list .= "<li>\n"
                         ."<a href=\"#\" onClick=\"openCarousel('test')\">\n"
                         ."<img src=\"http://digilib.bbaw.de/digitallibrary/servlet/Scaler?fn=/silo10/CIL/abklatsch.jpg&dh=300\"></img>\n"
                         ."</a>\n"
                         ."</li>\n";
                } else {
                    $list .= "<li>\n"
                         ."<a href=\"#\" onClick=\"openCarousel('test')\">"
                         ."<img src=\"http://digilib.bbaw.de/digitallibrary/servlet/Scaler?fn=/silo10/CIL/$metadata[5]&dh=300\"></img>\n"
                         ."</a>\n"
                         ."</li>\n";
                }

                if (!($metadata[6] == 'scans')) {
                    $a3d[] = $metadata[6];
                }

            }  else if ($type == 'Scheden') {
                //echo "Filename:".$metadata[3];
                $list .= "<li>\n"
                       ."<img src=\"http://digilib.bbaw.de/digitallibrary/servlet/Scaler?fn=/silo10/CIL/$metadata[3]&dh=300\"></img>\n"
                       ."</li>\n";
            }

            $list .= "</ul>";

            if ($list == "<ul class=\"list-unstyled clearfix\"></ul>") {
                return "";
            } else {
                $div .= $list;
            }
            //if ($div == "<strong>$type</strong>\n") {
              //  return "";
            //}

        }

        if (!empty($a3d)) {

            $div .= "<strong>3D-Abklatsche</strong>";

            foreach ($a3d as &$squeeze) {
                //echo "3D: $squeeze";
                $div .= "<div>\n"
                       ."<iframe src=\"$squeeze\" width=\"600px\" height=\"400px\" frameborder=\"0\" scrolling=\"no\"></iframe>"
                       ."</div>\n";
            }
        }

        return $div;*/

    }
}
