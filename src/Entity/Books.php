<?php

namespace App\Entity;

use App\Repository\BooksRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: BooksRepository::class)]
#[ORM\Table(name: "BOOKS")]
class Books
{
    #[ORM\Id]
    #[ORM\Column(name: "book_id", type: "integer", options: ["unsigned" => true])]
    private ?int $id = null;

    #[ORM\Column(name: "book_name", length: 200)]
    private ?string $bookName = null;

    #[ORM\Column(name: "isbn13", length: 13)]
    private ?string $isbn13 = null;

    #[ORM\Column(name: "publication_date", type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $publicationDate = null;

    #[ORM\Column(name: "url_file", length: 26)]
    private ?string $urlFile = null;

    #[ORM\Column(name: "cover_image", length: 26)]
    private ?string $coverImage = null;

    #[ORM\Column(name: "summary", type: Types::TEXT)]
    private ?string $summary = null;

    // ===== GETTERS =====

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getBookName(): ?string
    {
        return $this->bookName;
    }

    public function getIsbn13(): ?string
    {
        return $this->isbn13;
    }

    public function getPublicationDate(): ?\DateTimeInterface
    {
        return $this->publicationDate;
    }

    public function getUrlFile(): ?string
    {
        return $this->urlFile;
    }

    public function getCoverImage(): ?string
    {
        return $this->coverImage;
    }

    public function getSummary(): ?string
    {
        return $this->summary;
    }

    public function setBookName(string $bookName): static
    {
        $this->bookName = $bookName;
        return $this;
    }

    public function setIsbn13(string $isbn13): static
    {
        $this->isbn13 = $isbn13;
        return $this;
    }

    public function setPublicationDate(\DateTimeInterface $publicationDate): static
    {
        $this->publicationDate = $publicationDate;
        return $this;
    }

    public function setUrlFile(string $urlFile): static
    {
        $this->urlFile = $urlFile;
        return $this;
    }

    public function setCoverImage(string $coverImage): static
    {
        $this->coverImage = $coverImage;
        return $this;
    }

    public function setSummary(string $summary): static
    {
        $this->summary = $summary;
        return $this;
    }

}