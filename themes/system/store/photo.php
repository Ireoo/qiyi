<?php

if(isset($_GET['l'])) {
    $l = $_GET['l'];
}else{
    $l = 1;
}
$member = 20;
$photo = $basic->photo_show('sid = ' . $_GET['id'], ($l-1)*$member, $member);
//print_r($photo);
$zong = $basic->photo_count('sid = ' . $_GET['id']);
//$zong = $basic->new_count();
//print_r($zong);
?>

<div class="mian">

        <div class="sort">

        </div>

        <div class="photo">
            <ul class="photo">
                <?php foreach($photo as $key => $value) { ?>
                <li>
                    <img src="<?php echo $value['url']; ?>" />
                    <span><?php echo $value['title']; ?></span>
                </li>
                <?php } ?>
                <br class="clear" />
            </ul>

            <div class="ye">
                <?php $basic->turn_page($l, $member, $zong, $_GET['id'] . '-photo'); ?>
            </div>

        </div>

        <br class="clear" />
    </div>