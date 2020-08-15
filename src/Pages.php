<?php 
use Doctrine\ORM\Mapping as ORM;
/**
 * @ORM\Entity
 * @ORM\Table(name="pages")
 */
    class Pages {
        /** 
         * @ORM\Id
         * @ORM\Column(type="integer")
         * @ORM\GeneratedValue
         */
        protected $page_id;
        /** 
         * @ORM\Column(type="string") 
         */
        protected $page_title;
        /** 
         * @ORM\Column(type="text") 
         */
        protected $page_content;
        public function getID() {
            return $this->page_id;
        }
        public function setTitle($title) {
            $this->page_title = $title;
        }
        public function getTitle() {
            return $this->page_title;
        }
        public function setContent($content) {
            $this->page_content = $content;
        }
        public function getContent() {
            return $this->page_content;
        }
    }
?>