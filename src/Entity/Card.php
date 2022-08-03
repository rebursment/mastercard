<?php

namespace App\Entity;

use App\Repository\CardRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

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
     * @Assert\NotBlank(
     *     message="Le titulaire ne peut pas être vide"
     * )
     *
     * @ORM\Column(type="string", length=255)
     */
    private $titulaire;

    /**
     * @ORM\Column(type="float")
     * @Assert\NotBlank(
     *     message="Le montant ne peut pas être vide"
     * )
     */
    private $montant;

    /**
     * @ORM\Column(type="string", length=50)
     * @Assert\NotBlank(
     *     message="Le numero de carte ne peut pas être vide"
     * )
     * @Assert\Length(
     *      min = 16,
     *      max = 16,
     *      exactMessage="Le numero doit être exactement {{ limit }} charactères",
     * )
     * @Assert\Type(
     *     type="integer",
     *     message="Le numero doit être {{ value }} n'est pas un numero valide"
     * )
     */
    private $numero;

    /**
     * @Assert\NotBlank(
     *     message="La date d'expiration ne peut pas être vide"
     * )
     * @ORM\Column(type="string")
     */
    private $expiration;

    /**
     * @Assert\NotBlank(
     *     message="Le titulaire ne peut pas être vide"
     * )
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

    public function getExpiration(): ?string
    {
        return $this->expiration;
    }

    public function setExpiration(string $expiration): self
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
