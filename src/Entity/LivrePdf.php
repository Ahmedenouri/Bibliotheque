<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use App\Repository\LivrePdfRepository;

#[ORM\Entity(repositoryClass: LivrePdfRepository::class)]
class LivrePdf
{
    #[ORM\Id, ORM\GeneratedValue, ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private string $fichier;

    #[ORM\OneToOne(inversedBy: 'pdf', targetEntity: Livre::class)]
    #[ORM\JoinColumn(nullable: false)]
    private ?Livre $livre = null;

    #[Gedmo\Timestampable(on: 'create')]
    #[ORM\Column(type: 'datetime')]
    private ?\DateTimeInterface $createdAt = null;

    #[Gedmo\Timestampable(on: 'update')]
    #[ORM\Column(type: 'datetime')]
    private ?\DateTimeInterface $updatedAt = null;
}
