<?php
declare(strict_types = 1);

namespace TechDivision\Card\Shuffle\Eel;

use Neos\ContentRepository\Domain\Model\NodeInterface;
use Neos\Flow\Annotations as Flow;
use Neos\Eel\ProtectedContextAwareInterface;

/*
* This file is part of the TechDivision.Card.Shuffle package.
*
* TechDivision - neos@techdivision.com
*
* This package is Open Source Software. For the full copyright and license
* information, please view the LICENSE file which was distributed with this
* source code.
*/

class CardHelper implements ProtectedContextAwareInterface {

    /**
     * Filter cards depending from $requestArguments
     * Returned cards will be displayed in frontend
     * Filter logic is as follows:
     *  - OR within a group (if any filter matches, it will be shown if no other group denies)
     *  - AND between groups (if any card is denied by a group, it will not be re-added by another)
     *
     * @param $cards - available cards
     * @param $requestArguments - selected tags sorted by groups
     * @param $removeCardsWithNoTaxonomyReferences - remove cards if they have no taxonomyReferences
     * @return array - filtered cards
     */
    public function getFilteredCards($cards, $requestArguments, $removeCardsWithNoTaxonomyReferences = false): array
    {
        if ($requestArguments === null || $cards === null) {
            return $cards;
        }

        $visibleCards = $cards;
        $i = 0;

        /** @var NodeInterface $card */
        foreach ($cards as $card) {
            $taxonomyReferences = $card->getProperty('taxonomyReferences');
            if ($taxonomyReferences !== null) {
                $taxonomyReferenceIdentifiers = [];

                foreach ($taxonomyReferences as $taxonomyReference) {
                    $taxonomyReferenceIdentifiers[] = $taxonomyReference->getIdentifier();
                }

                foreach ($requestArguments as $requestArgumentGroup) {
                    $keepCard = false;

                    foreach ($requestArgumentGroup as $requestArgument) {
                        if (in_array($requestArgument, $taxonomyReferenceIdentifiers)) {
                            $keepCard = true;
                        }
                    }

                    if ($keepCard === false) {
                        unset($visibleCards[$i]);
                    }
                }
            } else {
                if ($removeCardsWithNoTaxonomyReferences === true) {
                    unset($visibleCards[$i]);
                }
            }
            $i++;
        }

        return $visibleCards;

    }

    /**
     * @param string $methodName
     *
     * @return boolean
     */
    public function allowsCallOfMethod($methodName): bool
    {
        return true;
    }
}
