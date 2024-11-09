<?php
if (isset($_SESSION['message']) && isset($_SESSION['message_type'])) {
?>
    <div class="alert alert-<?php echo $_SESSION['message_type']; ?>" role="alert">
        <?php echo $_SESSION['message']; ?>
    </div>
<?php
    unset($_SESSION['message']);
    unset($_SESSION['message_type']);
}
?>