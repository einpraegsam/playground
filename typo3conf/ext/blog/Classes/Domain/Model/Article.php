<?php
namespace In2code\Blog\Domain\Model;

/***
 *
 * This file is part of the "blog" Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 *  (c) 2018 Alex Kellner <alexander.kellner@in2code.de>, In2code GmbH
 *
 ***/

/**
 * Article
 */
class Article extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
{
    /**
     * title
     *
     * @var string
     * @validate NotEmpty
     */
    protected $title = '';

    /**
     * text
     *
     * @var string
     * @validate NotEmpty
     */
    protected $text = '';

    /**
     * author
     *
     * @var string
     */
    protected $author = '';

    /**
     * publicationDate
     *
     * @var \DateTime
     */
    protected $publicationDate = null;

    /**
     * published
     *
     * @var bool
     */
    protected $published = false;

    /**
     * Returns the title
     *
     * @return string $title
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Sets the title
     *
     * @param string $title
     * @return void
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * Returns the text
     *
     * @return string $text
     */
    public function getText()
    {
        return $this->text;
    }

    /**
     * Sets the text
     *
     * @param string $text
     * @return void
     */
    public function setText($text)
    {
        $this->text = $text;
    }

    /**
     * Returns the author
     *
     * @return string $author
     */
    public function getAuthor()
    {
        return $this->author;
    }

    /**
     * Sets the author
     *
     * @param string $author
     * @return void
     */
    public function setAuthor($author)
    {
        $this->author = $author;
    }

    /**
     * Returns the publicationDate
     *
     * @return \DateTime $publicationDate
     */
    public function getPublicationDate()
    {
        return $this->publicationDate;
    }

    /**
     * Sets the publicationDate
     *
     * @param \DateTime $publicationDate
     * @return void
     */
    public function setPublicationDate(\DateTime $publicationDate)
    {
        $this->publicationDate = $publicationDate;
    }

    /**
     * Returns the published
     *
     * @return bool $published
     */
    public function getPublished()
    {
        return $this->published;
    }

    /**
     * Sets the published
     *
     * @param bool $published
     * @return void
     */
    public function setPublished($published)
    {
        $this->published = $published;
    }

    /**
     * Returns the boolean state of published
     *
     * @return bool
     */
    public function isPublished()
    {
        return $this->published;
    }
}
