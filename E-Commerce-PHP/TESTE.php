
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Payment form</title>
  <link rel="stylesheet" href="static/css/form.css">

  <script type="text/javascript" src="static/js/jquery-3.1.1.min.js"></script>
  <script type="text/javascript" src="static/js/main.js"></script>
</head>
<body>
  <div class="wrapper">
    <div class="form-wrapper">
      <form action="#">
        <div class="payment_flex payment_transfer">
          <label>Назначение перевода</label>
          <span><input type="text" name="payment_transfer" /></span>
        </div>
        <div class="payment_flex payment_sum">
          <label>Сумма</label>
          <span><input type="text" name="payment_sum" placeholder="0" /> руб.<i>✕</i></span>

        </div>
        <div class="payment_flex payment_method">
          <label>Способ оплаты</label>
          <ul>
            <li class="payment_yandex active"></li>
            <li class="payment_cards"></li>
            <li class="payment_mobiles"></li>
          </ul>
          <input type="hidden" name="payment_method" value="1" />
        </div>
        <div class="payment_flex payment_button">
          <label></label>
          <span><input type="submit" value="Подарить"></span>
        </div>
      </form>
    </div>
  </div>

</body>
</html>
