<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup</title>
</head>

<style>
    .con {
        width: 300px;
        margin: 100px auto;
        padding: 20px;
        background-color: #fff;
        border-radius: 5px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    form {
        display: block;
        margin-top: 0em;
        unicode-bidi: isolate;
    }

    label {
        display: block;
        margin-bottom: 5px;
    }

    input[type="text"],
    input[type="email"],
    input[type="password"] {
        width: 100%;
        padding: 8px;
        margin-bottom: 10px;
        border: 1px solid #ccc;
        border-radius: 4px;
    }

    input[type="submit"] {
        width: 100%;
        padding: 10px;
        background-color: #4CAF50;
        color: white;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }
</style>

<body>

    <div class="con">
        <form action="/includes/formhandler.php" method="post">
            <label for="username">Username:</label>
            <input type="text" name="username" placeholder="Username">

            <label for="password">Password:</label>
            <input type="password" name="password" placeholder="Password">

            <input type="submit" value="Sign Up">
        </form>
    </div>
</body>

</html>