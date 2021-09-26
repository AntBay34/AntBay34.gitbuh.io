<?php

namespace App\Entity;

use App\Repository\BieresRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=BieresRepository::class)
 * @ORM\Table(name="bieres", indexes={@ORM\Index(columns={"couleur_biere"}, flags={"fulltext"})})
 */ 

class Bieres
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
    private $libelle_Biere;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $marque_Biere;

    /**
     * @ORM\Column(type="float")
     */
    private $titreAlcool_Biere;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $contenance_Biere;

    /**
     * @ORM\Column(type="float")
     */
    private $prixAchat_Biere;

    /**
     * @ORM\Column(type="float")
     */
    private $prixVente_Biere;

    /**
     * @ORM\Column(type="float")
     */
    private $prixTTC_Biere;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $type1_Biere;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $type2_Biere;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $type3_Biere;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $profil_Biere;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $couleur_Biere;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $fabricant_Biere;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $conditionnement;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $origine_Biere;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $description_Biere;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $ingredients_Biere;

    /**
     * @ORM\Column(type="boolean")
     */
    private $consigne_Biere;

    /**
     * @ORM\Column(type="boolean")
     */
    private $Bio_Biere;

    /**
     * @ORM\Column(type="boolean")
     */
    private $promo_Biere;

    /**
     * @ORM\Column(type="boolean")
     */
    private $sansAlc_Biere;

    /**
     * @ORM\Column(type="boolean")
     */
    private $SGluten_Biere;

    /**
     * @ORM\Column(type="boolean")
     */
    private $actif;

    /**
     * @ORM\ManyToOne(targetEntity=Users::class, inversedBy="bieres")
     * @ORM\JoinColumn(nullable=false)
     */
    private $users;

    /**
     * @ORM\OneToMany(targetEntity=Images::class, mappedBy="bieres", orphanRemoval=true, cascade={"persist"})
     */
    private $images;

    /**
     * @ORM\ManyToMany(targetEntity=Users::class, inversedBy="favoris")
     */
    private $favoris;

    public function __construct()
    {
        $this->images = new ArrayCollection();
        $this->favoris = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLibelleBiere(): ?string
    {
        return $this->libelle_Biere;
    }

    public function setLibelleBiere(string $libelle_Biere): self
    {
        $this->libelle_Biere = $libelle_Biere;

        return $this;
    }

    public function getMarqueBiere(): ?string
    {
        return $this->marque_Biere;
    }

    public function setMarqueBiere(string $marque_Biere): self
    {
        $this->marque_Biere = $marque_Biere;

        return $this;
    }

    public function getTitreAlcoolBiere(): ?float
    {
        return $this->titreAlcool_Biere;
    }

    public function setTitreAlcoolBiere(float $titreAlcool_Biere): self
    {
        $this->titreAlcool_Biere = $titreAlcool_Biere;

        return $this;
    }

    public function getContenanceBiere(): ?string
    {
        return $this->contenance_Biere;
    }

    public function setContenanceBiere(?string $contenance_Biere): self
    {
        $this->contenance_Biere = $contenance_Biere;

        return $this;
    }

    public function getPrixAchatBiere(): ?float
    {
        return $this->prixAchat_Biere;
    }

    public function setPrixAchatBiere(float $prixAchat_Biere): self
    {
        $this->prixAchat_Biere = $prixAchat_Biere;

        return $this;
    }

    public function getPrixVenteBiere(): ?float
    {
        return $this->prixVente_Biere;
    }

    public function setPrixVenteBiere(float $prixVente_Biere): self
    {
        $this->prixVente_Biere = $prixVente_Biere;

        return $this;
    }

    public function getPrixTTCBiere(): ?float
    {
        return $this->prixTTC_Biere;
    }

    public function setPrixTTCBiere(float $prixTTC_Biere): self
    {
        $this->prixTTC_Biere = $prixTTC_Biere;

        return $this;
    }

    public function getType1Biere(): ?string
    {
        return $this->type1_Biere;
    }

    public function setType1Biere(string $type1_Biere): self
    {
        $this->type1_Biere = $type1_Biere;

        return $this;
    }

    public function getType2Biere(): ?string
    {
        return $this->type2_Biere;
    }

    public function setType2Biere(?string $type2_Biere): self
    {
        $this->type2_Biere = $type2_Biere;

        return $this;
    }

    public function getType3Biere(): ?string
    {
        return $this->type3_Biere;
    }

    public function setType3Biere(?string $type3_Biere): self
    {
        $this->type3_Biere = $type3_Biere;

        return $this;
    }

    public function getProfilBiere(): ?string
    {
        return $this->profil_Biere;
    }

    public function setProfilBiere(?string $profil_Biere): self
    {
        $this->profil_Biere = $profil_Biere;

        return $this;
    }

    public function getCouleurBiere(): ?string
    {
        return $this->couleur_Biere;
    }

    public function setCouleurBiere(?string $couleur_Biere): self
    {
        $this->couleur_Biere = $couleur_Biere;

        return $this;
    }

    public function getFabricantBiere(): ?string
    {
        return $this->fabricant_Biere;
    }

    public function setFabricantBiere(?string $fabricant_Biere): self
    {
        $this->fabricant_Biere = $fabricant_Biere;

        return $this;
    }

    public function getConditionnement(): ?string
    {
        return $this->conditionnement;
    }

    public function setConditionnement(string $conditionnement): self
    {
        $this->conditionnement = $conditionnement;

        return $this;
    }

    public function getOrigineBiere(): ?string
    {
        return $this->origine_Biere;
    }

    public function setOrigineBiere(string $origine_Biere): self
    {
        $this->origine_Biere = $origine_Biere;

        return $this;
    }

    public function getDescriptionBiere(): ?string
    {
        return $this->description_Biere;
    }

    public function setDescriptionBiere(?string $description_Biere): self
    {
        $this->description_Biere = $description_Biere;

        return $this;
    }

    public function getIngredientsBiere(): ?string
    {
        return $this->ingredients_Biere;
    }

    public function setIngredientsBiere(?string $ingredients_Biere): self
    {
        $this->ingredients_Biere = $ingredients_Biere;

        return $this;
    }

    public function getConsigneBiere(): ?bool
    {
        return $this->consigne_Biere;
    }

    public function setConsigneBiere(bool $consigne_Biere): self
    {
        $this->consigne_Biere = $consigne_Biere;

        return $this;
    }

    public function getBioBiere(): ?bool
    {
        return $this->Bio_Biere;
    }

    public function setBioBiere(bool $Bio_Biere): self
    {
        $this->Bio_Biere = $Bio_Biere;

        return $this;
    }

    public function getPromoBiere(): ?bool
    {
        return $this->promo_Biere;
    }

    public function setPromoBiere(bool $promo_Biere): self
    {
        $this->promo_Biere = $promo_Biere;

        return $this;
    }

    public function getSansAlcBiere(): ?bool
    {
        return $this->sansAlc_Biere;
    }

    public function setSansAlcBiere(bool $sansAlc_Biere): self
    {
        $this->sansAlc_Biere = $sansAlc_Biere;

        return $this;
    }

    public function getSGlutenBiere(): ?bool
    {
        return $this->SGluten_Biere;
    }

    public function setSGlutenBiere(bool $SGluten_Biere): self
    {
        $this->SGluten_Biere = $SGluten_Biere;

        return $this;
    }

    public function getActif(): ?bool
    {
        return $this->actif;
    }

    public function setActif(bool $actif): self
    {
        $this->actif = $actif;

        return $this;
    }

    public function getUsers(): ?Users
    {
        return $this->users;
    }

    public function setUsers(?Users $users): self
    {
        $this->users = $users;

        return $this;
    }

    /**
     * @return Collection|Images[]
     */
    public function getImages(): Collection
    {
        return $this->images;
    }

    public function addImage(Images $image): self
    {
        if (!$this->images->contains($image)) {
            $this->images[] = $image;
            $image->setBieres($this);
        }

        return $this;
    }

    public function removeImage(Images $image): self
    {
        if ($this->images->removeElement($image)) {
            // set the owning side to null (unless already changed)
            if ($image->getBieres() === $this) {
                $image->setBieres(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Users[]
     */
    public function getFavoris(): Collection
    {
        return $this->favoris;
    }

    public function addFavori(Users $favori): self
    {
        if (!$this->favoris->contains($favori)) {
            $this->favoris[] = $favori;
        }

        return $this;
    }

    public function removeFavori(Users $favori): self
    {
        $this->favoris->removeElement($favori);

        return $this;
    }
}
