<?php 
use Doctrine\ORM\Mapping as ORM;
/**
 * @ORM\Entity
 * @ORM\Table(name="users")
 */
    class User {
        /** 
         * @ORM\Id
         * @ORM\Column(type="integer")
         * @ORM\GeneratedValue
         */
        protected $user_id;
        /** 
         * @ORM\Column(type="string") 
         */
        protected $username;
        /** 
         * @ORM\Column(type="string") 
         */
        protected $userpassword;
        public function getUsername() {
            return $this->username;
        }
        public function getPassword() {
            return $this->userpassword;
        }
    }
?>