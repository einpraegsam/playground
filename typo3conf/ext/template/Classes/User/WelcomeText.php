<?php
namespace In2code\Template\User;

/**
 * Class WelcomeText
 */
class WelcomeText
{

    /**
     * @param string $content
     * @param array $configuration
     * @return string
     */
    public function getText(string $content, array $configuration): string
    {
        $now = new \DateTime();
        $hour = $now->format('H');
        if ($hour < 12) {
            return $configuration['text.']['morning'];
        } else {
            return $configuration['text.']['evening'];
        }
    }
}
