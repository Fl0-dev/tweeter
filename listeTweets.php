<main class="section">

    <div class="container mt-2">
        <h2 class="title is-4">Derniers tweets</h2>

        <?php
        foreach ($results as $result) {

            ?>
            <div class="card">
                <div class="card-content">
                    <p class="title">
                        “<?=$result['message']?>”
                    </p>
                    <a href="detailProfil.php?user_id=<?=$result['author_id']?>">
                        <p class="subtitle"><?=$result['username']?></p>
                    </a>
                </div>
                <div class="columns">
                    <span class="column">
                        <?=$result['date_created']?>
                     </span>
                    <nav class=" column level is-mobile">
                        <div class="level-left">

                            <a class="level-item">
                                <span class="icon is-small"><i class="fas fa-reply"></i></span>
                            </a>
                            <a class="level-item">
                                <span class="icon is-small"><i class="fas fa-retweet"></i></span>
                            </a>
                            <a class="level-item" href="add_like.php?tweet_id=<?=$result['id']?>">
                                <span class="icon is-small has-text-danger"><i class="fas fa-heart "></i></span>
                                <span><?=$result['likes_quantity']?></span>
                            </a>
                        </div>
                    </nav>
                </div>
            </div>
            <?php
        }
        ?>

    </div>
</main>

