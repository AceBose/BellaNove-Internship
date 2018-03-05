# BellaNove
## Plugins
### [WooCommerce Products Filter (WOOF)](https://www.woocommerce*filter.com)
#### **Project: Product filter for browse closet, etc.**
#### Description: filter by size, placed at the top of the product category pages
Settings (which can be found by going to Woocommerce -> Settings -> Products Filter:
* Structure
  * Checkbox, exclude 16, check Product Categories
    * Show title label: yes
    * Show toggle button: no
    * Not toggled terms count: leave empty
    * Taxonomy custom label: leave empty
    * Max height of the block: leave empty
    * Display items in a row: no
    * Checkbox, exclude 164 (XXL demo), check Product Size box
  * Additional Options
    * Show title label: yes
    * Show toggle button: no
    * Not toggled terms count: leave empty
    * Taxonomy custom label: leave empty
    * Max height of the block: leave empty
    * Display items in a row: yes
* Options
  * Set filter automatically (puts the product filter on the shop page without shortcode)
  * Set everything else to no
* Design
  * Radio and checkboxes skin: pink
  * Overlay skins: Loading spin * SVG
  * Use chosen: no
  * Use beauty scroll: no
  * Auto filter close/open image: none
  * Auto filter close/open text: Filter ▾
  * Leave everything else blank or on default
* Advanced
  * Custom CSS code
    * Refer to `WOOFcss.css`
Shortcodes:
Taxonomies: dresses(17), tops(33), bottoms(37), outerwear(35)
Dresses page
```
[woof_search_options]
[woof sid="auto_shortcode" autohide=1 tax_only ="pa_size" taxonomies=product_cat:17]
[woof_products per_page=200 columns=3 is_ajax=0 taxonomies=product_cat:17]
```
Shortcode settings found [here](https://www.woocommerce-filter.com/codex/)
### [WC Password Strength Settings](https://wordpress.org/plugins/wc*password*strength*settings/#reviews)
#### **Project: Password strength**
#### Description: Weaken the password strength requirement
This plugin allows you to choose between four password levels, as well as remove the password hint.
Settings
Go to `Woocommerce > Accounts`, and at the bottom of the page will be "User Password Strength Settings". The strength requirement is currently set at `Level 2 - Weak`, while the messages and the other settings have been left the same. 
### [WooCommerce Photo Reviews](https://wordpress.org/plugins/woo*photo*reviews/)
#### Project: Adding pictures to user reviews
Description: Allow users to upload images and add them to their reviews
This plugin allows customers to post reviews that include photos. The settings to this plugins include: reviews must include photos, photo review style, photo options (max photo size), filter reviews, etc.
### [Woocommerce Product Archive Customiser](https://wordpress.org/plugins/woocommerce-product-archive-customiser/)
#### **Issue: Browse Closet page displaying 4 columns instead of 3**
I used this plugin to set the number of columns displayed to 3 columns. This plugin inserts a `Products Archive` tab into `Appearance > Customize`.
Settings
* Product Columns: 3
* Products per page: 24
* Checked display product count, display add to cart buttons, display product image, and display stock
##### Possible conflicts:
According to the plugin website, it's only been tested up to Woocommerce version 4.7.9, and was last updated at least a year ago. I believe it is still compatible with the current version of WooCommerce and will continue to be compatible.
Another issue is that I want to download the YITH Infinite Scrolling plugin so that there's no limit on products per page. However, the Product Archive Customiser plugin sets the max number of products per page to 24, so I'm worried that they might conflict. Best case is that the YITH Infinite Scrolling plugin overrides the Product Archive Customiser plugin.
### [YITH Infinite Scrolling](https://wordpress.org/plugins/yith-infinite-scrolling/#reviews)
#### **Allows infinite scrolling in the Browse Closet page**
General Settings
* Enable infinite scrolling - on
* Navigation Selector: `.woocommerce-pagination`
* Next Selector: `.woocommerce-pagination a.next`
* Item Selector: `.div.product`
* Content Selector: `div.products-list`
### [WooCommerce Remove Product Sorting](https://www.skyverge.com/product/woocommerce-remove-product-sorting/)
#### **DEACTIVATED**
#### **Removes default Woocommerce AJAX sorting from product pages**
Able to select which sorting options to remove under `Appearance > Customize > WooCommerce > Product Catalog`
CSS in `Appearance > Customize` made plugin redundant
```
div.before-products-list.rounded-corners.clearfix
{
display: none;
}
```
## Code
### Customizer
#### Description: adjust CSS to make the site more aesthetically pleasing, correct styling issues, etc.
Code is stored in `customizer.css`
### Project: Checkout with images
#### Description: insert product images in product tables during checkout
#### Solution
Modify the `review-order.php` file (but don't change the original file in the woocommerce plugin) and update the new version into `theme/woocommerce/checkout` <br />
Place this code:
```php
<?php $thumbnail = apply_filters( 'woocommerce_in_cart_product_thumbnail', $_product->get_image(), $values, $cart_item_key ); echo $thumbnail; ?>
```
before the following line of code in `review-order.php`
```php
<?php echo apply_filters( 'woocommerce_cart_item_name', $_product->get_name(), $cart_item, $cart_item_key ) . '&nbsp;'; ?>
```
### Project: Order confirmation email with images
#### Description: insert product images in email order confirmation
#### Solution
Modify the `email*order*details.php` located in `plugins/woocommerce/templates/emails` (but don't change the original file in the woocommerce plugin) and insert the new version into `theme/woocommerce/emails` <br />
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
### Project: Fixing quick view
#### Description: photo and product summary overlapped in quick view
#### Solution:
CSS code (can also be found in `customizer.css`)
Resizes the image:
```css
img.attachment-shop_single.size-shop_single.wp-post-image
{
	width: 490px;
	height: 735px;
}
```
Resizes product summary width to 48% of the quick view pop-up
```css
div.xoo-qv-summary
{
	width: 48%;
}
```
Re-aligns quantity text and add to cart button
```css
table.variations
{
	margin-bottom: 0px;
}
form.cart .quantity
{
	margin-top: 25px;
}
```

### Project: Adjusting the Account page
#### Description: Put space between the "Change", "Edit", etc. text and section headers

#### Solution:
CSS code: insert padding to the left 
```css
.ms-edit-profile
{
	padding-left: 20px;
}
.ms-all-invoices
{
	padding-left: 20px;
}
.ms-all-activities
{
	padding-left: 20px;
}
```

### Project: Adding product images to order history
### Project: Delete profile field in BuddyPress profile form
### Project: Change color of checkout button
