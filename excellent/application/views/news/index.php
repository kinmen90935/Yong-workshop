<div class="col span_3_of_12"></div>
<div class="col span_6_of_12">
<?php foreach ($news as $news_item): ?>

    <h2><?php echo $news_item['title']; ?></h2>
    <div id="main">
        <?php echo $news_item['content']; ?>
    </div>
    <p><a href="news/<?php echo $news_item['n_id']; ?>">View article</a></p>

<?php endforeach ?>
</div>