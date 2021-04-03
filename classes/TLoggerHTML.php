<?php


class TLoggerHTML extends TLogger
{

    function write($msg)
    {
        date_default_timezone_set('America/Sao_Paulo');
        $time = date("Y-m-d H:i:s");

        $text = "<p>\n";
        $text .= " <b>$time</b> : \n";
        $text .= " <i>$msg</i>\n";
        $text .="</p>\n";

        $handler = fopen($this->filename,'a');
        fwrite($handler,$text);
        fclose($handler);
    }
}