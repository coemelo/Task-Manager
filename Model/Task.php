<?php 
    class Task{
        private $title;
        private $description;
        private $percentage;

        public function __construct($title, $description, $percentage){
            $this->setTitle($title);
            $this->setDescription($description);
            $this->setPercentage($percentage);
        }

        public function getTitle(): String{
            return $this->title;
        }
        
        public function getDescription(): String{
            return $this->description;
        }
        
        public function getPercentage(): int{
            return $this->percentage;
        }

        public function setTitle($title): void{
            $this->title = $title;
        }
        
        public function setDescription($description): void{
            $this->description = $description;
        }
        
        public function setPercentage($percentage): void{
            $this->percentage = $percentage;
        }

    }
?>