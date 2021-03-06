<?php

/*
 * This file is part of the Sylius package.
 *
 * (c) Paweł Jędrzejewski
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Sylius\Bundle\PromotionsBundle\Checker;

use Sylius\Bundle\PromotionsBundle\Model\PromotionSubjectInterface;

/**
 * Checks if subject’s total exeeds (or at least equal) to the configured amount.
 *
 * @author Saša Stamenković <umpirsky@gmail.com>
 */
class ItemTotalRuleChecker implements RuleCheckerInterface
{
    public function isEligible(PromotionSubjectInterface $subject, array $configuration)
    {
        if ($configuration['equal']) {
            return $subject->getPromotionSubjectItemTotal() >= $configuration['amount'];
        }

        return $subject->getPromotionSubjectItemTotal() > $configuration['amount'];
    }

    public function getConfigurationFormType()
    {
        return 'sylius_promotion_rule_item_total_configuration';
    }
}
