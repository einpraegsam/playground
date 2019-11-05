<?php
namespace BBAW\Cildb\Domain\Model;

class Photo
{
    /**
     * @var string
     */
    protected $fileName = '';

    /**
     * @var string
     */
    protected $author = '';

    /**
     * @var string
     */
    protected $location = '';

    /**
     * @var int
     */
    protected $year = 0;

    /**
     * @var string
     */
    protected $descrpition = '';

    /**
     * @return string
     */
    public function getFileName(): string
    {
        return $this->fileName;
    }

    /**
     * @param string $fileName
     * @return Photo
     */
    public function setFileName(string $fileName)
    {
        $this->fileName = $fileName;
        return $this;
    }

    /**
     * @return string
     */
    public function getAuthor(): string
    {
        return $this->author;
    }

    /**
     * @param string $author
     * @return Photo
     */
    public function setAuthor(string $author)
    {
        $this->author = $author;
        return $this;
    }

    /**
     * @return string
     */
    public function getLocation(): string
    {
        return $this->location;
    }

    /**
     * @param string $location
     * @return Photo
     */
    public function setLocation(string $location)
    {
        $this->location = $location;
        return $this;
    }

    /**
     * @return int
     */
    public function getYear(): int
    {
        return $this->year;
    }

    /**
     * @param int $year
     * @return Photo
     */
    public function setYear(int $year)
    {
        $this->year = $year;
        return $this;
    }

    /**
     * @return string
     */
    public function getDescrpition(): string
    {
        return $this->descrpition;
    }

    /**
     * @param string $descrpition
     * @return Photo
     */
    public function setDescrpition(string $descrpition)
    {
        $this->descrpition = $descrpition;
        return $this;
    }

    /**
     * @return string
     */
    public function getUrl(): string
    {
        return 'https://digilib.bbaw.de/digitallibrary/servlet/Scaler?fn=/silo10/CIL/' . $this->getDescrpition();
    }
}
