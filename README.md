# Coupon List GraphQl

**Coupon List GraphQl is a part of MageINIC Coupon List extension that adds GraphQL features.** This extension extends Coupon List definitions.

## 1. How to install

Run the following command in Magento 2 root folder:

```
composer require mageinic/coupon-list-graphql

php bin/magento maintenance:enable
php bin/magento setup:upgrade
php bin/magento setup:di:compile
php bin/magento setup:static-content:deploy
php bin/magento maintenance:disable
php bin/magento cache:flush
```

**Note:**
Magento 2 Coupon List GraphQL requires installing [MageINIC Coupon List](https://github.com/mageinic/coupon-list) in your Magento installation.

**Or Install via composer [Recommend]**
```
composer require mageinic/coupon-list
```

## 2. How to use

- To view the queries that the **MageINIC Coupon List GraphQl** extension supports, you can check `Coupon List GraphQl User Guide.pdf` Or run `CouponListGraphQL.postman_collection.json` in Postman.

## 3. Get Support

- Feel free to [contact us](https://www.mageinic.com/contact.html) if you have any further questions.
- Like this project, Give us a **Star**
