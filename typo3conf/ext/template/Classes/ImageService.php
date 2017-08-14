<?php
namespace In2code\Template;

use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Frontend\ContentObject\ContentObjectRenderer;

/**
 * Class ImageService
 */
class ImageService
{

    /**
     * @var array
     */
    protected $properties = [
        'uid' => 123,
        'title' => 'Mein Content',
        'bodytext' => 'test...'
    ];

    /**
     * @param string $content
     * @param array $configuration
     * @return string
     */
    public function renderImage(string $content = '', array $configuration = []): string
    {
        $contentObject = GeneralUtility::makeInstance(ContentObjectRenderer::class);
        $contentObject->start($this->properties);
        return $contentObject->cObjGetSingle($configuration['image'], $configuration['image.']);
    }
}
