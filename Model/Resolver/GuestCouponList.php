<?php
declare(strict_types=1);
/**
 * MageINIC
 * Copyright (C) 2023 MageINIC <support@mageinic.com>
 *
 * NOTICE OF LICENSE
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program. If not, see https://opensource.org/licenses/gpl-3.0.html.
 *
 * Do not edit or add to this file if you wish to upgrade this extension to newer
 * version in the future.
 *
 * @category MageINIC
 * @package MageINIC_CouponListGraphQl
 * @copyright Copyright (c) 2023 MageINIC (https://www.mageinic.com/)
 * @license https://opensource.org/licenses/gpl-3.0.html GNU General Public License,version 3 (GPL-3.0)
 * @author MageINIC <support@mageinic.com>
 */

namespace MageINIC\CouponListGraphQl\Model\Resolver;

use Magento\Framework\GraphQl\Config\Element\Field;
use Magento\Framework\GraphQl\Exception\GraphQlInputException;
use Magento\Framework\GraphQl\Query\ResolverInterface;
use Magento\Framework\GraphQl\Schema\Type\ResolveInfo;
use MageINIC\CouponList\Model\GuestCart\GuestCouponList as GuestCouponListModel;

/**
 * Get coupon list for the guest customer
 */
class GuestCouponList implements ResolverInterface
{
    /**
     * @var GuestCouponListModel
     */
    private GuestCouponListModel $guestCouponList;

    /**
     * @param GuestCouponListModel $guestCouponList
     */
    public function __construct(
        GuestCouponListModel $guestCouponList
    ) {
        $this->guestCouponList = $guestCouponList;
    }

    /**
     * @inheritdoc
     */
    public function resolve(Field $field, $context, ResolveInfo $info, array $value = null, array $args = null)
    {
        if (empty($args['cart_id'])) {
            throw new GraphQlInputException(__('Required parameter "cart_id" is missing'));
        }
        try {
            $maskedCartId = $args['cart_id'];
            $cart = $this->guestCouponList->get($maskedCartId);
            $postData = ["items" => []];
            foreach ($cart as $custom) {
                $postData["items"][] = $custom;
            }
        } catch (\Exception $e) {
            $postData = [];
        }
        return $postData;
    }
}
