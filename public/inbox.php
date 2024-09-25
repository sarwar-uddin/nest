<?php require_once('../src/inbox.php'); ?>

<!DOCTYPE html>
<html>
<head>
    <title>Inbox</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <style>
        tr.clickable {
            cursor: pointer;
        }
    </style>
</head>
<body>
<?php require_once('../src/inc/navbar.php'); ?>
<div class="container" style="margin-top: 10px;">
    <h2 style="text-align: left;">
        <span style="float: left;">Recieved Messages</span>
        <a href="send-message.php" class="btn btn-primary" style="float: right;">Send Message</a><br>
    </h2>
    <div class="messages-list">
        <table class="table table-hover">
            <thead>
            <tr>
                <th>From</th>
                <th>Subject</th>
                <th>Time</th>
                <th>Status</th>
            </tr>
            </thead>
            <tbody>
            <?php while ($message = $receivedMessages->fetch_assoc()): ?>
                <tr class="clickable" data-href="view-message.php?message_id=<?php echo $message['message_id']; ?>">
                    <td><?php echo $message['sender']; ?></td>
                    <td><?php echo $message['subject']; ?></td>
                    <td><?php echo $message['timestamp']; ?></td>
                    <td style="color: <?php echo $message['is_read'] ? 'gray' : 'red'; ?>; font-weight: bold;">
                        <?php echo $message['is_read'] ? 'Seen' : 'New'; ?>
                    </td>
                </tr>
            <?php endwhile; ?>
            </tbody>
        </table>
    </div>
    <div class="messages-list" style="margin-top: 50px;">
        <h2>Sent Messages</h2>
        <table class="table table-hover">
            <thead>
            <tr>
                <th>To</th>
                <th>Subject</th>
                <th>Time</th>
                <th>Status</th>
            </tr>
            </thead>
            <tbody>
            <?php while ($message = $sentMessages->fetch_assoc()): ?>
                <tr class="clickable" data-href="view-message.php?message_id=<?php echo $message['message_id']; ?>">
                    <td><?php echo $message['receiver']; ?></td>
                    <td><?php echo $message['subject']; ?></td>
                    <td><?php echo $message['timestamp']; ?></td>
                    <td style="color: <?php echo $message['is_read'] ? 'gray' : 'red'; ?>; font-weight: bold;">
                        <?php echo $message['is_read'] ? 'Seen' : 'Sent'; ?>
                    </td>
                </tr>
            <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</div>

<script>
    // Add click event to make the rows clickable
    document.addEventListener("DOMContentLoaded", function () {
        const rows = document.querySelectorAll("tr.clickable");
        rows.forEach(function (row) {
            row.addEventListener("click", function () {
                window.location = this.dataset.href;
            });
        });
    });
</script>
</body>
</html>
