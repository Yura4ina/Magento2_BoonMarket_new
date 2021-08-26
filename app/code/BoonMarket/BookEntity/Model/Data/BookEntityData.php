<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace BoonMarket\BookEntity\Model\Data;

use BoonMarket\BookEntity\Api\Data\BookEntityInterface;
use Magento\Framework\DataObject;

class BookEntityData extends DataObject implements BookEntityInterface
{
    /**
     * @inheritDoc
     */
    public function getBookEntityId(): ?int
    {
        return $this->getData(self::BOOK_ENTITY_ID) === null ? null
            : (int)$this->getData(self::BOOK_ENTITY_ID);
    }

    /**
     * @inheritDoc
     */
    public function setBookEntityId(?int $bookEntityId): void
    {
        $this->setData(self::BOOK_ENTITY_ID, $bookEntityId);
    }

    /**
     * @inheritDoc
     */
    public function getTitle(): ?string
    {
        return $this->getData(self::TITLE);
    }

    /**
     * @inheritDoc
     */
    public function setTitle(?string $title): void
    {
        $this->setData(self::TITLE, $title);
    }

    /**
     * @inheritDoc
     */
    public function getDescription(): ?string
    {
        return $this->getData(self::DESCRIPTION);
    }

    /**
     * @inheritDoc
     */
    public function setDescription(?string $description): void
    {
        $this->setData(self::DESCRIPTION, $description);
    }

    /**
     * @inheritDoc
     */
    public function getAuthor(): ?string
    {
        return $this->getData(self::AUTHOR);
    }

    /**
     * @inheritDoc
     */
    public function setAuthor(?string $author): void
    {
        $this->setData(self::AUTHOR, $author);
    }

    /**
     * @inheritDoc
     */
    public function getBanner(): ?string
    {
        return $this->getData(self::BANNER);
    }

    /**
     * @inheritDoc
     */
    public function setBanner(?string $banner): void
    {
        $this->setData(self::BANNER, $banner);
    }

    /**
     * @inheritDoc
     */
    public function getPrice(): ?float
    {
        return $this->getData(self::PRICE) === null ? null
            : (float)$this->getData(self::PRICE);
    }

    /**
     * @inheritDoc
     */
    public function setPrice(?float $price): void
    {
        $this->setData(self::PRICE, $price);
    }

    /**
     * @inheritDoc
     */
    public function getPublishDate(): ?string
    {
        return $this->getData(self::PUBLISH_DATE);
    }

    /**
     * @inheritDoc
     */
    public function setPublishDate(?string $publishDate): void
    {
        $this->setData(self::PUBLISH_DATE, $publishDate);
    }
}
