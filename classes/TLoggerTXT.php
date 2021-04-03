<?php


class TLoggerTXT extends TLogger
{

    function write($msg)
    {
        date_default_timezone_set('America/Sao_Paulo');
        $time = date("Y-m-d H:i:s");

        $text = "$time :: $msg\n";

        $handler = fopen($this->filename,'a');
        fwrite($handler,$text);
        fclose($handler);
    }
}