<?php 
    class Task{
        private $title;
        private $description;

        public function __construct($title, $description){
            $this->setTitle($title);
            $this->setDescription($description);
        }

        public function getTitle(): String{
            return $this->title;
        }
        
        public function getDescription(): String{
            return $this->description;
        }
        
        public function setTitle($title): void{
            $this->title = $title;
        }
        
        public function setDescription($description): void{
            $this->description = $description;
        }

    }
?>