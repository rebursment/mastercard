<?php

namespace App\Entity;

use App\Repository\CardRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CardRepository::class)
 */
class Card
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $titulaire;

    /**
     * @ORM\Column(type="float")
     */
    private $montant;

    /**
     * @ORM\Column(type="integer")
     */
    private $numero;

    /**
     * @ORM\Column(type="date")
     */
    private $expiration;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Cryptogramme;

    /**
     * @ORM\ManyToOne(targetEntity=Identitee::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $idUser;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitulaire(): ?string
    {
        return $this->titulaire;
    }

    public function setTitulaire(string $titulaire): self
    {
        $this->titulaire = $titulaire;

        return $this;
    }

    public function getMontant(): ?float
    {
        return $this->montant;
    }

    public function setMontant(float $montant): self
    {
        $this->montant = $montant;

        return $this;
    }

    public function getNumero(): ?int
    {
        return $this->numero;
    }

    public function setNumero(int $numero): self
    {
        $this->numero = $numero;

        return $this;
    }

    public function getExpiration(): ?\DateTimeInterface
    {
        return $this->expiration;
    }

    public function setExpiration(\DateTimeInterface $expiration): self
    {
        $this->expiration = $expiration;

        return $this;
    }

    public function getCryptogramme(): ?string
    {
        return $this->Cryptogramme;
    }

    public function setCryptogramme(string $Cryptogramme): self
    {
        $this->Cryptogramme = $Cryptogramme;

        return $this;
    }

    public function getIdUser(): ?Identitee
    {
        return $this->idUser;
    }

    public function setIdUser(?Identitee $idUser): self
    {
        $this->idUser = $idUser;

        return $this;
    }
}
