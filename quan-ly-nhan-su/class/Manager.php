<?php
namespace Controller;

class Manager
{
    public $pathFile;

        public function __construct($pathFile)
        {
            $this->pathFile = $pathFile;
        }
        public function readFile()
        {
            $dataJson = file_get_contents($this->pathFile);
            return json_decode($dataJson, true);
        }
        public function saveDataToFile($employee)  
        {
            try {
                $dataJson = json_encode($employee);
                file_put_contents($this->pathFile, $dataJson);
            } catch (\Exception $e) {
                echo $e->getMessage();
            }
        }
}