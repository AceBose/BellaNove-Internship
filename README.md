# BellaNove
## Plugins
### [WooCommerce Products Filter (WOOF)](https://www.woocommerce-filter.com)
Project: Product filter for browse closet, etc.
Description: filter by size, placed at the top of the product category pages
Settings (which can be found by going to Woocommerce -> Settings -> Products Filter:
-Structure
 -Checkbox, exclude 164 (XXL demo), check Product Size box
 -Additional Options
  -Show title label: yes
  -Show toggle button: no
  -Not toggled terms count: leave empty
  -Taxonomy custom label: leave empty
  -Max height of the block: leave empty
  -Display items in a row: yes
-Options
 -Set everything to no
-Design
 -Radio and checkboxes skin: pink
 -Overlay skins: Loading spin - SVG
 -Use chosen: no
 -Use beauty scroll: no
 -Auto filter close/open image: none
 -Auto filter close/open text: Filter ▾
 -Leave everything else blank or on default
-Advanced
 -Custom CSS code
  -Refer to `WOOFcss.css`
 
### [WC Password Strength Settings](https://wordpress.org/plugins/wc-password-strength-settings/#reviews)
Project: Password strength
Description: Weaken the password strength requirement
This plugin allows you to choose between four password levels, as well as remove the password hint.
### [WooCommerce Photo Reviews](https://wordpress.org/plugins/woo-photo-reviews/)
Project: Adding pictures to user reviews
Description: Allow users to upload images and add them to their reviews
This plugin allows customers to post reviews that include photos. The settings to this plugins include: reviews must include photos, photo review style, photo options (max photo size), filter reviews, etc.
## Code
### Customizer
Description: adjust CSS to make the site more aesthetically pleasing, correct styling issues, etc.
Code is stored in `customizer.css`
### Project: Checkout with images
Description: insert product images in product tables during checkout
Solution: modify the `review-order.php` file (but don't change the original file in the woocommerce plugin) and update the new version into `theme/woocommerce/checkout` <br />
Place this code:
```php
<?php $thumbnail = apply_filters( 'woocommerce_in_cart_product_thumbnail', $_product->get_image(), $values, $cart_item_key ); echo $thumbnail; ?>
```
before the following line of code in `review-order.php`
```php
<?php echo apply_filters( 'woocommerce_cart_item_name', $_product->get_name(), $cart_item, $cart_item_key ) . '&nbsp;'; ?>
```
### Project: Order confirmation email with images
Description: insert product images in email order confirmation
Solution: modify the `email-order-details.php` located in `plugins/woocommerce/templates/emails` (but don't change the original file in the woocommerce plugin) and insert the new version into `theme/woocommerce/emails` <br />
Change this code:
```php
'show_image' => false
```
to
```php
'show_image' => true
```
The whole code snippet:
```php
<tbody>
    <?php echo wc_get_email_order_items( $order, array( // WPCS: XSS ok.
        'show_sku'      => $sent_to_admin,
        'show_image'    => true,
        'image_size'    => array( 32, 32 ),
        'plain_text'    => $plain_text,
        'sent_to_admin' => $sent_to_admin,
    ) );
    ?>
</tbody>
```
### Project: Adding product images to order history
### Project: Delete profile field in BuddyPress profile form
### Project: Change color of checkout button
