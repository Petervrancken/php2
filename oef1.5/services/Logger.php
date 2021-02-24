<?php


class Logger
{
    private $fp;        //filepointer
    private $logfile;


    public function __contruct($logfile){
        global $app_root;
        $this->fp = fopen($this->logfile, 'r');
        $this->logfile = $_SERVER['DOCUMENT_ROOT'] . $app_root . "/log/log.txt";;
    }

    public function Log($msg){
        fwrite($this->fp,date("Y/m/d h:i:sa"), $msg . ' \r\n');
    }

    public function ShowLog(){
        file_get_contents($this->logfile);
    }


}
