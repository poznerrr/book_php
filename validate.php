<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Validate</title>
    <style>
        .signup {
            border: 1px solid #999999;
            font: normal 14px helvectica;
            color: #444444;
        }
    </style>
    <script>
        function validate(form) {
            let fail = validateForename(form.forename.value);
            fail += validateSurname(form.surname.value);
            fail += validateUsername(form.username.value);
            fail += validatePassword(form.password.value);
            fail += validateAge(form.age.value);
            fail += validateEmail(form.email.value);

            if (fail == "") return true;
            else {
                alert(fail);
                return false;
            }
        }

        function validateForename(field) {
            return (field == "") ? "Не введено имя. \n" : ""
        }

        function validateSurname(field) {
            return (field == "") ? "Не введена фамилия. \n" : ""
        }

        function validateUsername(field) {
            if (field == "") return "Не введено имя пользователя. \n"
            else if (field.length < 5)
                return "В имени пользователя дожно быть не менее 5 символов. \n"
            else if (/[^a-zA-Z0-9_-]]/.test(field))
                return "В имени пользователя разрешены только a-z, A-Z, 0-9, - и _ . \n"
            return "";
        }

        function validatePassword(field) {
            if (field == "") return "Не введен пароль. \n"
            else if (field.length < 6)
                return "В имени пользователя дожно быть не менее 6 символов. \n"
            else if (!/[a-z]]/.test(field) || !/[A-Z]]/.test(field) || !/[0-9]]/.test(field))
                return "Пароль требует 1 символа из каждого набора a-z, A-Z и 0-9. \n"
            return "";
        }

        function validateAge(field) {
            if (field == "" || isNaN(field)) return "Не введен возраст. \n"
            else if (field < 18 || field > 110)
                return "Возраст должен быть между 18 и 110. \n"
            return "";
        }

        function validateEmail(field) {
            if (field == "") return "Не введен адрес электронной почты .\n"
            else if (!((field.indexOf(".") > 0) &&
                    (field.indexOf("@") > 0)) ||
                /[^a-zA-Z0-9.@_-]/.test(field))
                return "Электронный адрес имеет неверный формат. \n"
            return ""
        }
    </script>
</head>
<body>
<table class="signup" border="0" cellpadding="2" cellspacing="5" bgcolor="#eeeeee">
    <th colspan="2" align="center">Регистрационная форма</th>
    <form method="post" action="adduser" onsubmit="return validate(this)">
        <tr>
            <td>Имя</td>
            <td><input type="text" maxlength="32" name="forename"></td>
        </tr>
        <tr>
            <td>Фамилия</td>
            <td><input type="text" maxlength="32" name="surname"></td>
        </tr>
        <tr>
            <td>Пользовательское имя</td>
            <td><input type="text" maxlength="16" name="username"></td>
        </tr>
        <tr>
            <td>Пароль</td>
            <td><input type="text" maxlength="12" name="password"></td>
        </tr>
        <tr>
            <td>Возраст</td>
            <td><input type="text" maxlength="3" name="age"></td>
        </tr>
        <tr>
            <td>Электронный адрес</td>
            <td><input type="text" maxlength="64" name="email"></td>
        </tr>
        <tr>
            <td colspan="2" align="center"><input type="submit" value="Зарегестрироваться"></td>
        </tr>
    </form>
</table>
</body>
</html>