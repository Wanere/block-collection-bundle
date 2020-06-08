<?php

namespace Umanit\BlockCollectionBundle\Entity\Block;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Umanit\BlockBundle\Entity\Block;

/**
 * @ORM\Entity()
 * @ORM\Table(name="umanit_block_collection_quote")
 */
class Quote extends Block
{
    /**
     * @ORM\Column(type="text")
     * @Assert\NotBlank()
     */
    private $quote;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $author;

    public function getQuote(): ?string
    {
        return $this->quote;
    }

    public function setQuote(string $quote): void
    {
        $this->quote = $quote;
    }

    public function getAuthor(): ?string
    {
        return $this->author;
    }

    public function setAuthor(?string $author): void
    {
        $this->author = $author;
    }

    public function __toString()
    {
        return $this->getQuote() ? mb_substr(strip_tags($this->getQuote()), 0, 75) : 'New quote';
    }
}
