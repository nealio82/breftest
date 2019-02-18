<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Ramsey\Uuid\Uuid;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * Class Kitty
 * @Vich\Uploadable
 */
class Kitty
{
    private $id;

    private $name;

    private $image;

    private $quotes;

    /**
     * @Vich\UploadableField(mapping="kitty_images", fileNameProperty="image")
     */
    private $imageFile;

    private $updatedAt;

    public function __construct()
    {
        $this->id = Uuid::uuid4()->toString();
        $this->quotes = new ArrayCollection();
    }

    public function __toString()
    {
        return $this->getName();
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setImage(string $imagePath = null)
    {
        $this->image = $imagePath;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImageFile(File $image = null)
    {
        $this->imageFile = $image;

        // VERY IMPORTANT:
        // It is required that at least one field changes if you are using Doctrine,
        // otherwise the event listeners won't be called and the file is lost
        if ($image) {
            // if 'updatedAt' is not defined in your entity, use another property
            $this->updatedAt = new \DateTime('now');
        }
    }

    public function getImageFile()
    {
        return $this->imageFile;
    }

    public function getUpdatedAt(): ?\DateTime
    {
        return $this->updatedAt;
    }
}