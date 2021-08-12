<?php if(isset($_SESSION['mensaje'])){?>
<div class="alert alert-<?php print $_SESSION['color']; ?> alert-dismissible fade show" role="alert">
    <?php echo $_SESSION['mensaje']; ?>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<?php
}
?>