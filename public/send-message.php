<?php require_once('../src/send-message.php'); ?>

<!DOCTYPE html>
<html>
<head>
    <title>Send Message</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>
<body>
<?php require_once('../src/inc/navbar.php'); ?>
<div class="container">
    <h1 style="margin-top: 00px;">Send Message</h1>

    <?php echo $messageStatus; // Display the message status  ?>

    <form method="POST">
        <div class="form-group">
            <label for="receiver_username">Receiver Username:</label>
            <input type="text" name="receiver_username" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="subject">Subject:</label>
            <input type="text" name="subject" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="message_text">Message:</label>
            <textarea name="message_text" class="form-control" rows="10" required></textarea>
        </div>

        <button type="submit" class="btn btn-primary" style="margin-top: 10px;">Send Message</button>
    </form>
</div>
</body>
</html>
