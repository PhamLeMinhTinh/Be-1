<!-- Hiển thị nút trước -->
<?php if($page != 1):?>
    <li><a href="?page=<?= $page - 1 ?>"><i class="fa fa-angle-left"></i></a></li>
<?php endif;?>
<!-- /Hiển thị nút trước -->

<?php for($i = 1; $i <= $totalPages; $i++): ?>

    <!-- Hiển thị page -->
    <?php if($i != $page): ?>
        <?php if($i > $page - 2 && $i < $page + 2): ?>
        <li><a href="?page=<?php echo $i ?>"><?php echo $i ?></a></li>
        <?php endif;?>
    <?php else:?>
        <li class="active"><a style="color: #fff;" href="?page=<?php echo $i ?>"><?php echo $i ?></a></li>
    <?php endif;?>
    <!-- /Hiển thị page -->
    
<?php endfor;?>

<!-- Hiển thị nút tiếp -->
<?php if($page != $totalPages):?>
    <li><a href="?page=<?= $page + 1 ?>"><i class="fa fa-angle-right"></i></a></li>
<?php endif;?>
<!-- /Hiển thị nút tiếp -->

