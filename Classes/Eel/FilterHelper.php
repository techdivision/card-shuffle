<?php
declare(strict_types = 1);

namespace TechDivision\Card\Shuffle\Eel;

use Neos\Flow\Annotations as Flow;
use Neos\Eel\ProtectedContextAwareInterface;
use Neos\ContentRepository\Domain\Model\NodeInterface;

/*
* This file is part of the TechDivision.Card.Shuffle package.
*
* TechDivision - neos@techdivision.com
*
* This package is Open Source Software. For the full copyright and license
* information, please view the LICENSE file which was distributed with this
* source code.
*/

class FilterHelper implements ProtectedContextAwareInterface {

    /**
     * Checks which vocabulary and taxonomies are used
     * Used for rendering filter groups
     *
     * @param array $allTaxonomies - global taxonomies
     * @param array $taxonomyIdentifiersFromCardsInDeck - available taxonomies
     * @return array - used vocabulary and taxonomies
     */
    public function getAvailableFilters($allTaxonomies, $taxonomyIdentifiersFromCardsInDeck): array
    {
        $avaibaleTaxonomyIdentifiers = $this->getUniqueTaxonomyIdentifiers($taxonomyIdentifiersFromCardsInDeck);
        $availableFilters = $allTaxonomies;

        $i = 0;
        foreach ($allTaxonomies as $vocabulary) {
            $j= 0;

            foreach($vocabulary['taxonomies'] as $taxonomy){
                if (!in_array($taxonomy['identifier'], $avaibaleTaxonomyIdentifiers)) {
                    unset($availableFilters[$i]['taxonomies'][$j]);
                }
                $j++;
            }

            // remove group if all children have been unset
            if (count($availableFilters[$i]['taxonomies']) === 0) {
                unset($availableFilters[$i]);
            }

            $i++;
        }

        return $availableFilters;
    }

    /**
     * get a flat array of all taxonomy identifiers
     * @return array
     */
    protected function getUniqueTaxonomyIdentifiers($taxonomyIdentifiersFromCardsInDeck): array
    {
        $uniqueTaxonomyIdentifiers = [];
        foreach ($taxonomyIdentifiersFromCardsInDeck as $taxonomyIdentifierGroup) {
            foreach ($taxonomyIdentifierGroup as $taxonomyIdentifier) {
                if (!in_array($taxonomyIdentifier, $uniqueTaxonomyIdentifiers, false)) {
                    array_push($uniqueTaxonomyIdentifiers, $taxonomyIdentifier);
                }
            }
        }
        return $uniqueTaxonomyIdentifiers;
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
