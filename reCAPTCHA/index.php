<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <form action="verify.php" method="post" id="demo-form">
        <input type="email" name="email" id=""> <br>
        <input type="password" name="password" id="password"> <br>
        <button type="submit"
        class="g-recaptcha" 
        data-sitekey="6LdfuvsoAAAAAFjm4X4Mh-3Zo5vYgp7bNT0uLrCL" 
        data-callback='onSubmit' 
        data-action='submit'>Submit</button>
        
    </form>

    <script>
        function onSubmit(token) {
            document.getElementById("demo-form").submit();
        }
    </script>
    <script src="https://www.google.com/recaptcha/api.js"></script>
</body>
</html>