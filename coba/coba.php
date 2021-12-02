<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>JavaScript form validation - checking email</title>
    <link rel='stylesheet' href='form-style.css' type='text/css' />
</head>

<body >
    <div class="mail">
        <h2>Input an email and Submit</h2>
        <form name="email" action="#">
            <ul>
                <li><input type='text' name='text' /></li>
                <li>&nbsp;</li>
                <li class="submit"><input type="submit" name="submit" value="Submit" onclick="ValidateEmail(document.email.text)" /></li>
                <li>&nbsp;</li>
            </ul>
        </form>
    </div>
    <script src="email-validation.js"></script>
</body>
<script>
    function ValidateEmail(inputText) {
        var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
        if (inputText.value.match(mailformat)) {
            alert("Valid email address!");
            return true;
        } else {
            alert("You have entered an invalid email address!");
            return false;
        }
    }
</script>

</html>