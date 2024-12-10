<?php

namespace App\Entity;

use Symfony\Component\Validator\Constraints as Assert;



/**
 * Description of Contact
 *
 * @author Lenovo
 */
class Contact {
    
    #[Assert\NoBlank()]
    #[Assert\Length(min:2,max:100)]
    private ?string $nom;
    
    #[Assert\NoBlank()]
    #[Assert\Email()]
    private ?string $email;
    
    #[Assert\NoBlank()]
    private ?string $message;
    
    public function getNom(): ?string {
        return $this->nom;
    }

    public function getEmail(): ?string {
        return $this->email;
    }

    public function getMessage(): ?string {
        return $this->message;
    }

    public function setNom($nom): self {
        $this->nom = $nom;
        return $this;
    }

    function setEmail($email): self {
        $this->email = $email;
        return $this;
    }

    public function setMessage($message): self {
        $this->message = $message;
        return $this;
    }




}
