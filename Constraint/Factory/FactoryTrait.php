<?php

namespace JBen87\ParsleyBundle\Constraint\Factory;

use Symfony\Contracts\Translation\TranslatorInterface;

trait FactoryTrait
{
    /**
     * @var TranslatorInterface
     */
    private $translator;

    /**
     * @param TranslatorInterface $translator
     *
     * @required
     */
    public function setTranslator(TranslatorInterface $translator): void
    {
        $this->translator = $translator;
    }

    /**
     * @param string $id
     * @param array $parameters
     * @param string $domain
     * @param string|null $locale
     *
     * @return string
     */
    private function trans(
        string $id,
        array $parameters = [],
        string $domain = 'validators',
        string $locale = null
    ): string {
        return $this->translator->trans($id, $parameters, $domain, $locale);
    }

    /**
     * @param string $id
     * @param int $number
     * @param array $parameters
     * @param string $domain
     * @param string|null $locale
     *
     * @return string
     */
    private function transChoice(
        string $id,
        int $number,
        array $parameters = [],
        string $domain = 'validators',
        string $locale = null
    ): string {
        $parameters['%count%'] = $number;

        return $this->translator->trans($id, $parameters, $domain, $locale);
    }
}
