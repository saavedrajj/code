<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=0;"/>
<title></title>
</head>
<body>
<form action="https://www.paypal.com/cgi-bin/webscr" method="post" id="form1" class="panel">
  <input type="hidden" name="cmd" value="_xclick">
  <input type="hidden" name="business" value="paypal@mysite.com">
  <input type="hidden" name="currency_code" value="GBP">
  <input type="hidden" name="notify_url" value="http://www.mysite.com/paypal_ipn">
  <input type="hidden" name="return" value="http://www.mysite.com/success">
  <input type="hidden" name="cancel_return" value="http://www.mysite.com/">
  <input type="hidden" name="custom" value="1708|288|18|app">
  <input type="hidden" name="item_name" value="Sticker">
  <input type="hidden" name="item_number" value="STICKER">
  <input type="hidden" name="option_index" value="0">
  <input type="hidden" name="shipping" id="mc_shipping" value="0">
  <input type="hidden" name="discount_amount" id="discount_amount" value="2">
  <fieldset>
    <label>Sticker Size:</label>
      <input id='on0' type='hidden' name='on0' value='Size'>
      <select name='os0' id='print_item'>
        <option value='42cm'>42cm - £27.99</option>
      </select>
      <input type="hidden" id="option_tube0" value="small" />
      <input type="hidden" id="option_select0" name="option_select0" value="42cm" />
      <input type="hidden" item-price="27.99" id="option_amount0" name="option_amount0" value="27.99" />
      <br />
      <label>Quantity: </label>
      <select name="quantity" id="quantity">
        <option value="1">1</option>
      </select>
  </fieldset>
  <input type="image" src="https://www.paypalobjects.com/en_US/GB/i/btn/btn_buynowCC_LG.gif" border="0" name="submit" alt="" id="buy_now">
</form>
</div>
</body>
</html>