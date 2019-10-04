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

class CheckboxHelper implements ProtectedContextAwareInterface {

    /**
     * Checks if checkbox is selected or not
     *
     * @param string|null $filterIdentifier - selected checkbox
     * @param array|null $requestArguments - selected tags grouped by vocabulary
     *
     * @return bool - true if checkbox identifier is somewhere in $requestArguments
     */
    public function isActive($filterIdentifier, $requestArguments): bool
    {
        if($requestArguments === null) {
            return false;
        } else {
            foreach ($requestArguments as $argument) {
                if(in_array($filterIdentifier, $argument, false)) {
                    return true;
                }
            }
        }
        return false;
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
