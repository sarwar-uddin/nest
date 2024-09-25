<?php require_once('../src/view-message.php'); ?>

<!DOCTYPE html>
<html>
<head>
    <title>View Message</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>
<body>
<?php require_once('../src/inc/navbar.php'); ?>
<div class="container" style="margin-top: 0px;">
    <h1 style="text-align: center;">View Message</h1>
    <div class="message-details">
        <div class="card">
            <div class="card-header">
                <strong>Subject:</strong> <?php echo $message['subject']; ?><br>
                <strong>From:</strong> <a href="profile.php?username=<?php echo $message['sender']; ?>" style="text-decoration: none;"><?php echo $message['sender']; ?></a><br>
                <strong>To:</strong> <a href="profile.php?username=<?php echo $message['receiver']; ?>" style="text-decoration: none;"><?php echo $message['receiver']; ?></a><br>

                <strong>Time:</strong> <?php echo $message['timestamp']; ?><br>
            </div>
            <div class="card-body">
                <p class="card-text"><?php echo nl2br($message['message_text']); ?></p>

                <a href="send-message.php" class="btn btn-primary">Reply</a>
            </div>
                
        </div>
    </div>
</div>
</body>
</html>
