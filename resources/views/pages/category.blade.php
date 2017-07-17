@extends('master')
    @section('categoryContent')
        <h4>Categories</h4>
                <ul class="templatemo_list">
                    <?php
                    foreach ($category_name as $v_category_name) {
                    ?>
                    <li><a href="index.html"><?php echo $v_category_name ; ?></a></li>
                    <?php }?>
                </ul>
    @endsection

