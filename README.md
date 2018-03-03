# BellaNove
## Plugins
### [WC Password Strength Settings](https://wordpress.org/plugins/wc-password-strength-settings/#reviews)
Project: Password strength
Description: Weaken the password strength requirement
This plugin allows you to choose between four password levels, as well as remove the password hint.
### [WooCommerce Photo Reviews](https://wordpress.org/plugins/woo-photo-reviews/)
Project: Adding pictures to user reviews
Description: Allow users to upload images and add them to their reviews
This plugin allows customers to post reviews that include photos. The settings to this plugins include: reviews must include photos, photo review style, photo options (max photo size), filter reviews, etc.
## Code
### Project: Checkout with images
Description: insert images in product tables during checkout
Solution: modify the 'review-order.php' template located in 'plugins/woocommerce/templates/checkout' and insert the new version into 'theme/woocommerce/checkout'
Place this code:
'''php
<?php $thumbnail = apply_filters( 'woocommerce_in_cart_product_thumbnail', $_product->get_image(), $values, $cart_item_key ); echo $thumbnail; ?>
'''
before the following line of code in 'review-order.php'
'''php
<?php echo apply_filters( 'woocommerce_cart_item_name', $_product->get_name(), $cart_item, $cart_item_key ) . '&nbsp;'; ?>
'''

