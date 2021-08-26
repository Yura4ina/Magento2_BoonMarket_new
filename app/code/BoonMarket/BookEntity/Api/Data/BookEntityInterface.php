<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace BoonMarket\BookEntity\Api\Data;

interface BookEntityInterface
{
    /**
     * String constants for property names
     */
    const BOOK_ENTITY_ID = "book_entity_id";
    const TITLE = "title";
    const DESCRIPTION = "description";
    const AUTHOR = "author";
    const BANNER = "banner";
    const PRICE = "price";
    const PUBLISH_DATE = "publish_date";
    const BASE_BANNER_PATH = "catalog/books";

    /**
     * Getter for BookEntityId.
     *
     * @return int|null
     */
    public function getBookEntityId(): ?int;

    /**
     * Setter for BookEntityId.
     *
     * @param int|null $bookEntityId
     *
     * @return void
     */
    public function setBookEntityId(?int $bookEntityId): void;

    /**
     * Getter for Title.
     *
     * @return string|null
     */
    public function getTitle(): ?string;

    /**
     * Setter for Title.
     *
     * @param string|null $title
     *
     * @return void
     */
    public function setTitle(?string $title): void;

    /**
     * Getter for Description.
     *
     * @return string|null
     */
    public function getDescription(): ?string;

    /**
     * Setter for Description.
     *
     * @param string|null $description
     *
     * @return void
     */
    public function setDescription(?string $description): void;

    /**
     * Getter for Author.
     *
     * @return string|null
     */
    public function getAuthor(): ?string;

    /**
     * Setter for Author.
     *
     * @param string|null $author
     *
     * @return void
     */
    public function setAuthor(?string $author): void;

    /**
     * Getter for Banner.
     *
     * @return string|null
     */
    public function getBanner(): ?string;

    /**
     * Setter for Banner.
     *
     * @param string|null $banner
     *
     * @return void
     */
    public function setBanner(?string $banner): void;

    /**
     * Getter for Price.
     *
     * @return float|null
     */
    public function getPrice(): ?float;

    /**
     * Setter for Price.
     *
     * @param float|null $price
     *
     * @return void
     */
    public function setPrice(?float $price): void;

    /**
     * Getter for PublishDate.
     *
     * @return string|null
     */
    public function getPublishDate(): ?string;

    /**
     * Setter for PublishDate.
     *
     * @param string|null $publishDate
     *
     * @return void
     */
    public function setPublishDate(?string $publishDate): void;
}
