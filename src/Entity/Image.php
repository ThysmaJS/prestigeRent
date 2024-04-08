<?php

namespace App\Entity;

use App\Repository\ImageRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ImageRepository::class)]
class Image
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: "integer")]
    private ?int $id;

    #[ORM\Column(length: 255)]
    private ?string $imagePath;

    #[ORM\Column(length: 255)]
    private ?string $imageTitle;

    #[ORM\ManyToOne(targetEntity: Car::class, inversedBy: "images")]
    private ?Car $car;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getImagePath(): ?string
    {
        return $this->imagePath;
    }

    public function setImagePath(string $imagePath): self
    {
        $this->imagePath = $imagePath;

        return $this;
    }

    public function getImageTitle(): ?string
    {
        return $this->imageTitle;
    }

    public function setImageTitle(string $imageTitle): self
    {
        $this->imageTitle = $imageTitle;

        return $this;
    }

    public function getCar(): ?Car
    {
        return $this->car;
    }

    public function setCar(?Car $car): self
    {
        $this->car = $car;

        return $this;
    }
}
