<h2><?php echo $title; ?></h2>

<?php foreach ($news as $news_item): ?>

        <h3><?php echo $news_item['title']; ?></h3>
        <div class="main">
                <?php echo $news_item['text']; ?>
        </div>
        <p><a href="<?php echo site_url('news/'.$news_item['slug']); ?>">View article</a></p>

<?php endforeach; ?>

<a href="<?php echo base_url('news/create') ?>"><button>Create</button></a><br><br>

<a href="<?php echo base_url() ?>"><button>Go to main site</button></a>