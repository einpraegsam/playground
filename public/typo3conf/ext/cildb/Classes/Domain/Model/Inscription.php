<?php
namespace BBAW\Cildb\Domain\Model;

class Inscription
{
    /**
     * @var int
     */
    protected $inschriftId = 0;

    /**
     * @var string
     */
    protected $belege = '';

    /**
     * @var Photo[]
     */
    protected $photos = [];

    /**
     * @return int
     */
    public function getInschriftId(): int
    {
        return $this->inschriftId;
    }

    /**
     * @param int $inschriftId
     * @return Inscription
     */
    public function setInschriftId(int $inschriftId)
    {
        $this->inschriftId = $inschriftId;
        return $this;
    }

    /**
     * @return string
     */
    public function getBelege(): string
    {
        return $this->belege;
    }

    /**
     * @param string $belege
     * @return Inscription
     */
    public function setBelege(string $belege)
    {
        $this->belege = $belege;
        return $this;
    }

    /**
     * {inscription.belegeTransformed}
     *
     * @return string
     */
    public function getBelegeTransformed(): string
    {
        $belege = $this->getBelege();
        // split
        return $newString;
    }

    public function getAllSammlungen(): array
    {
        return [
            10 => [
                'short' => 'IL',
                'description' => 'Inscriptiones Latinae'
            ],
            11 => [
                'short' => 'IL',
                'description' => 'Inscriptiones Latinae'
            ]
        ];
    }

    /**
     * {inscription.photos}
     *
     * @return array
     */
    public function getPhotos(): array
    {
        // do magic
        $photos = [];
        foreach ($photos as $photo) {
            $this->photos[] = $photo;
        }
        return $this->photos;
    }
}
