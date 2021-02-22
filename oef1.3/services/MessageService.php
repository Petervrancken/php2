<?php

class MessageService
{
    private $errors;
    private $input_errors;
    private $infos;

    public function __construct()
    {
        $this->errors = $_SESSION['errors'];
        $_SESSION['errors'] = [];
        $this->input_errors = $_SESSION['input_errors'];
        $_SESSION['input_errors'] = [];
        $this->infos = $_SESSION['infos'];
        $_SESSION['infos'] = [];
    }

    /**
     * @return int
     */
    public function CountErrors(){
        return count($this->errors);
    }

    /**
     * @return int
     */
    public function CountInputErrors(){
        return count($this->input_errors);
    }

    /**
     * @return int
     */
    public function CountInfos(){
        return count($this->infos);
    }

    /**
     * @return int
     */
    public function CountNewErrors(){
        return count($_SESSION['errors']);
    }

    /**
     * @return int
     */
    public function CountNewInputErrors(){
        return count($_SESSION['input_errors']);
    }

    /**
     * @return int
     */
    public function CountNewInfos(){
        return count($_SESSION['infos']);
    }

    /**
     * @return mixed
     */
    public function getInputErrors()
    {
        if ($this->CountInputErrors()){
            return $this->input_errors;
        } else {
            return null;
        }
    }

    /*public function AddMessage( $type, $msg, $key = null ) //... nog over nadenken
    {
        $this->errors = $type;
        $this->infos = $msg;
        $this->input_errors = $key;
    }*/

    public function ShowErrors()
    {
        echo "<p style='color:red'>$this->errors</p>";
    }

    public function ShowInfos()
    {
        if($this->infos){
            echo "<div class='msgs'>$this->infos</div>";
        }
    }


}