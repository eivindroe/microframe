<?php
    namespace MicroFrame\Form;

    interface iElement
    {
        public function getName();
        public function getType();
        public function getHtml();
    }// iElement