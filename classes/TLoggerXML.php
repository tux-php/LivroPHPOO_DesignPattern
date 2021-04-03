<?php



class TLoggerXML extends TLogger
{

    function write($msg)
    {
        date_default_timezone_set('America/Sao_Paulo');
        $time = date("Y-m-d H:i:s");

        $text = "<log>\n";
        $text .= "<time>$time</time>\n";
        $text .= "<message>$msg</message>\n";
        $text .="</log>\n";
        $handler = fopen($this->filename,'a');
        fwrite($handler, $text);
        fclose($handler);


    }
}