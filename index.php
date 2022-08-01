<?php
require __DIR__ . '/db/ORM/instance.php';

$name = $username = $usernameErr = $password = $contact = $email = '';

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $contact = $_POST['contact'];
    $email = $_POST['email'];

    echo $contact, $email, $username, $password, $name, $_POST['submit'];

    $sql = "
        INSERT INTO `userdetails`(
            `name`,
            `username`,
            `password`,
            `contact`,
            `email`
        )
        VALUES(
            \"$name\",
            \"$username\",
            \"$password\",
            \"$contact\",
            \"$email\"
        )
    ";

    try {
        R::exec($sql) ? header('Location: success.php') : $usernameErr = 'username is in use';
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <script src="https://code.jquery.com/jquery-3.6.0.slim.min.js" integrity="sha256-u7e5khyithlIdTpu22PHhENmPcRdFiHRjhAuHcs05RI=" crossorigin="anonymous"></script>
</head>

<body>
    <form class="container mt-5 pt-5 w-50" method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <h3>Registration Form</h3>

        <div class="row g-2 row-cols-2 mt-3">
            <div class="col">
                <label for="name" class="form-label">Name:</label>
            </div>
            <div class="col">
                <input type="text" class="form-control" name="name" value="<?php echo $name; ?>" id="name" required>
                <span class="invalid-feedback"></span>
            </div>
            <div class="col">
                <label for="username" class="form-label">Username:</label>
            </div>
            <div class="col">
                <input type="text" class="form-control" name="username" value="<?php echo $username ?>" id="username" required>
                <span class="invalid-feedback"><?php echo $usernameErr; ?></span>
            </div>
            <div class="col">
                <label for="password" class="form-label">Password:</label>
            </div>
            <div class="col">
                <input type="password" class="form-control" name="password" value="<?php echo $password; ?>" id="password" required>
                <span class="invalid-feedback"></span>
            </div>
            <div class="col">
                <label for="re-password" class="form-label">Re-type password:</label>
            </div>
            <div class="col">
                <input type="password" class="form-control" id="re-password" value="<?php echo $password; ?>" oninput="(() => {
                        if($('#re-password').val() != $('#password').val()) {
                            $('#re-password').addClass('is-invalid')
                        } else $('#re-password').removeClass('is-invalid')
                    })()" required>
                <span class="invalid-feedback">passwords do not match</span>
            </div>
            <div class="col">
                <label for="gender" class="form-label">Gender:</label>
            </div>
            <div class="col">
                <div id="gender">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="male" value="male">
                        <label class="form-check-label" for="male">Male</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="female" value="female">
                        <label class="form-check-label" for="female">Female</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="other" value="other">
                        <label class="form-check-label" for="other">Other</label>
                    </div>
                </div>
                <span class="invalid-feedback"></span>
            </div>
            <div class="col">
                <label for="contact" class="form-label">Contact no:</label>
            </div>
            <div class="col">
                <input type="tel" class="form-control" name="contact" value="<?php echo $contact; ?>" id="contact" required>
                <span class="invalid-feedback"></span>
            </div>
            <div class="col">
                <label for="email" class="form-label">Email:</label>
            </div>
            <div class="col">
                <input type="email" class="form-control" name="email" value="<?php echo $email; ?>" id="email" required>
                <span class="invalid-feedback"></span>
            </div>
        </div>
        <button type="submit" name="submit" value="submit" class="btn btn-primary">Submit</button>
        <button type="reset" class="btn btn-danger">Cancel</button>
    </form>
</body>

</html>