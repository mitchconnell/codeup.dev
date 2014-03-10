<?php

class Filestore {
   
    public $filename = '';

    private $is_csv = FALSE;

    public function __construct($filename = '') { 
    
        $this->filename = $filename;

        if(substr($filename, -3) == 'csv') {
            $this->is_csv = TRUE;
        }
    }
    public function read() {
        if($this->is_csv == TRUE) { 
           return $this->read_csv();
        } else {
            return $this->read_lines();
        }        
    }
    public function write($array) {
        if($this->is_csv == TRUE) {
           $this->write_csv($array);
        } else {
            return $this->write_lines($array);
        }
    }
    public function read_lines() {
        $filesize = filesize($this->filename);
        
        if ($filesize > 0) {           
            $handle = fopen($this->filename, "r");
            $contents = fread($handle, $filesize);        
            fclose($handle);
            return explode("\n", $contents);
        } else {
            return $contents = [];
        }
    } 
    function write_lines($array) {
    
        $itemStr = implode("\n", $array);
        $handle = fopen($this->filename, "w");
        fwrite($handle, $itemStr);
        fclose($handle);
    } 
    function read_csv() {    
        $address_book = [];
        if(empty($this->filename)) {
            $address_book = [];
        } else {
            $handle = fopen($this->filename, "r");
            while(($data = fgetcsv($handle)) !== FALSE) {
                $address_book[] = $data;
            }   
            fclose($handle);
        }
        return $address_book;
    }    
    function write_csv($array) {    
        $handle = fopen($this->filename, "w");
        foreach ($array as $row) {
            fputcsv($handle, $row);
        }
            fclose($handle);
    }
}





