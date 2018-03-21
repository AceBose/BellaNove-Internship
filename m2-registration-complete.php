<script>
window['friendbuy'] = window['friendbuy'] || [];
window['friendbuy'].push(['track', 'order',
{
id: '<?php echo $invoice->get_invoice_number(); ?>', //INPUT ORDER ID
amount: '<?php echo $invoice->total; ?>', //INPUT ORDER AMOUNT
// coupon_code: '', //OPTIONAL, coupon code if used for order
// new_customer: '', //OPTIONAL, true if this is the customer's first purchase
email: '<?php echo $member->email; ?>' //INPUT EMAIL
}
]);
</script>