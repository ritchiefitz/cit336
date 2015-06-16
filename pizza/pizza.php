<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Pizza</title>
    <style>
      label, input{
          display: block;
      }
      label[for*=topping],
      input[name*=topping]{
          display: inline;
      }
    </style>
  </head>
  <body>
    <header>
      <h1>Pizza Place</h1>
    </header>
    <main>
      <h2><?php echo (isset($confirm_order)) ? 'Confirm Order' : 'Pizza Order Form'; ?></h2>
      <form action="." method="post">
        <fieldset>
        <label for="size">Size</label>
        <input type="text" name="size" id="size" value="x-large" readonly>
        <label for="meat">Meat</label>
        <input type="text" name="meat" id="meat" value="Canadian Bacon" readonly>
        <h3>Toppings - choose as many as you want</h3>
        <label for="cheesetopping">Extra Cheese</label>
        <input type="checkbox" name="topping[]" id="cheesetopping" value="x-cheese" 
        <?php 
            $isChecked = '';

            if (isset($confirm_order) && in_array('x-cheese', $toppings)) {
              $isChecked = 'checked';
            }
            else {
              $isChecked = '';
            }

            echo $isChecked;
        ?>>
        <label for="mushroomtopping">Mushrooms</label>
        <input type="checkbox" name="topping[]" id="mushroomtopping" value="Mushrooms" <?php echo (isset($confirm_order) && in_array('Mushrooms', $toppings)) ? 'checked' : ''; ?>>
        <label for="pineappletopping">Pineapple</label>
        <input type="checkbox" name="topping[]" value="Pineapple" <?php echo (isset($confirm_order) && in_array('Pineapple', $toppings)) ? 'checked' : ''; ?>>
        <label for="olivetopping">Olives</label>
        <input type="checkbox" name="topping[]" id="olivetopping" value="Olives" <?php echo (isset($confirm_order) && in_array('Olives', $toppings)) ? 'checked' : ''; ?>>
        <label for="tomatotopping">Tomato</label>
        <input type="checkbox" name="topping[]" id="tomatotopping" value="Tomatos" <?php echo (isset($confirm_order) && in_array('Tomatos', $toppings)) ? 'checked' : ''; ?>>
        <label for="oniontopping">Onions</label>
        <input type="checkbox" name="topping[]" id="oniontopping" value="Onions" <?php echo (isset($confirm_order) && in_array('Onions', $toppings)) ? 'checked' : ''; ?>>
        <label for="belltopping">Bell Pepper</label>
        <input type="checkbox" name="topping[]" id="belltopping" value="Bell" <?php echo (isset($confirm_order) && in_array('Bell', $toppings)) ? 'checked' : ''; ?>>
        <label for="jalapenotopping">Jalapeno Peppers</label>
        <input type="checkbox" name="topping[]" id="jalapenotopping" value="Jalapeno" <?php echo (isset($confirm_order) && in_array('Jalapeno', $toppings)) ? 'checked' : ''; ?>>
        <label>&nbsp;</label>
        <input type="submit" name="action" id="submitbutton" value="Order">
        </fieldset>
      </form>
    </main>
  </body>
</html>