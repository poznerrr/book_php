<?php

echo <<<_END
<pre>
<form method="post" action="forms.php">
Имя:               <input type="text" name="name"> <!-- текстовое поле -->

Расскажите о себе: <textarea name="about" wrap="soft" placeholder="Напишите что-нибудь о себе"></textarea> <!-- текстовая область -->

Вы любите PHP?:    <input type="checkbox" name="laguages" checked="checked"> <!-- флажки -->

Какое мороженное любите?: Ванильное <input type="checkbox" name="ice[]" value="vanilla" checked="checked"> Шоколадное <input type="checkbox" name="ice[]" value="Choco" checked="checked">

Любимое время: <label>8:00 <input type="radio" name="time" value="8"></label>  <label>12:00 <input type="radio" name="time" value="12"></label> <label>20:00 <input type="radio" name="time" value="20"></label>  <!-- переключатели -->
<input type="hidden" name="submitted" value="yes"> <!-- Скрытое поле -->
Ваш пол: <select name="male" size="1"> <!-- Выпадающий список -->
<option selected disabled>Выберите пол</option>
<option value="Man">Мужчина</option>
<option value="Woman">Женщина</option>
<option value="Vegetables">Растение</option>
</select>

<input type="submit" value="отправить"
</form>
</pre>
_END;
