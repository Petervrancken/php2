<?php


class Logger
{
    private $fp;        //filepointer
    private $logfile;


    public function __contruct(){
        //global $app_root;
        $this->fp = fopen($this->logfile, 'a');
        //$this->logfile = $_SERVER['DOCUMENT_ROOT'] . $app_root . "/log/log.txt";
        $this->logfile = $_SERVER['DOCUMENT_ROOT'] . "/php2/oef1.5/log/log.txt";
        var_dump($this->logfile);
    }

    public function Log($msg){
        fwrite($this->fp,date("Y/m/d h:i:sa") ." " . $msg . '\r\n');
    }

    public function ShowLog(){
        $log = file_get_contents($this->logfile);
        return $log;
    }



}
