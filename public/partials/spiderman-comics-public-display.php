
<div class="spiderman-comics-container">
<?php
if (isset($this->spiderman_comics_data) && !empty($this->spiderman_comics_data['data']['results'])) {
    $comics = $this->spiderman_comics_data['data']['results'];
    ?>
    <div class="spiderman-comics-list">
    <?php
        foreach ($comics as $comic) {
            $comic_title = esc_html($comic['title']);
            $comic_thumbnail = esc_html($comic['thumbnail']['path']).'.'.esc_html($comic['thumbnail']['extension']);
    ?>
        <div class="spiderman-comics-item"> 
            <img class="spiderman-comics-item-img" src="<?php echo $comic_thumbnail; ?>" alt="<?php echo $comic_title; ?>">
            <span class="spiderman-comics-item-title"><?php echo $comic_title; ?> </span>
        </div>
    <?php
    }
    ?>
    </div>
<?php
}else{
    echo '<span class="spiderman-comics-no-result">No Comics Found.</span>';
}
?>
</div>
