<?php
    namespace MicroFrame\Config;

    class Config
    {
        private $aryConfig;

        public static function getRootPath()
        {
            return '';
        }// getRootPath

        public function init()
        {
        }// init

        public function getConfig() {
            if(!isset($this->aryConfig))
            {
                $this->aryConfig = array(
                    'db' => array(
                        'name'  => '',
                        'user'  => '',
                        'pass'  => ''
                    )
                );
            }
            return $this->aryConfig;
        }// getConfig

        public function getTableName()
        {
            return '';
        }// getTableName


        public function getName()
        {
            return '';
        }// getName


        public function getUsername()
        {
            return '';
        }// getUsername


        public function getPassword()
        {
            return '';
        }// getPassword


    }// Config