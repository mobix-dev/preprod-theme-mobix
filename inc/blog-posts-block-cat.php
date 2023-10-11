<?php
    // Articles de la même catégorie

    // Langue
    $lang = apply_filters( 'wpml_current_language', null );

    $nbNews = 3;
    if (isset($nbNewsOverride) && $nbNewsOverride > 0) {
        $nbNews = $nbNewsOverride;
    }

    $theCategory = get_blog_post_category(get_the_ID());


    $frPosts = array();
    $enPosts = array();

    if (!isset($theBlogPosts) || count($theBlogPosts) < $nbNews) {
        $arguments = [
            "numberposts" => -1,
            "offset" => 0,
            "category" => $theCategory->term_id,
            "orderby" => "rand",
            "include" => "",
            "exclude" => [get_the_ID()],
            "meta_key" => "",
            "meta_value" => "",
            "post_type" => "post",
            "post_status" => "publish",
            "suppress_filters" => true,
        ];
        $allBlogPosts = wp_get_recent_posts($arguments, ARRAY_A);

        foreach ($allBlogPosts as $aAllBlogPosts) {
            $my_post_language_details = apply_filters( 'wpml_post_language_details', NULL, $aAllBlogPosts['ID'] ) ;
            if ($my_post_language_details['language_code'] == 'fr') {
                array_push($frPosts, $aAllBlogPosts);
            } elseif ($my_post_language_details['language_code'] == 'en') {
                array_push($enPosts, $aAllBlogPosts);
            }
        }

        $frPosts = array_slice($frPosts, -$nbNews);
        $enPosts = array_slice($enPosts, -$nbNews);

        if ($lang == 'fr') {
            $theBlogPosts = array_reverse($frPosts);
        } elseif ($lang == 'en'){
            $theBlogPosts = array_reverse($enPosts);
        }
    }
?>

<div class="slider-blog-last-posts" id="slider-blog-last-posts">
    <?php foreach ($theBlogPosts as $aBlogPost): ?>
        <?php
            $featuredImageUrl = get_the_post_thumbnail_url($aBlogPost['ID'], "large");

            $theCategory = get_blog_post_category($aBlogPost['ID']);

            $excerpt = shortify_text(strip_tags($aBlogPost['post_excerpt']), 175, '');
            if (!isset($excerpt) || trim($excerpt) === '') {
                $excerpt = shortify_text(strip_tags($aBlogPost['post_content']), 175, '');
            }
        ?>
        <div class="slider-blog-last-posts-slide">
            <article class="blog-post-list" itemscope itemtype="https://schema.org/BlogPosting">
                <a href="<?php echo get_permalink($aBlogPost['ID']); ?>" class="blog-post-list-image">
                    <img src="<?php echo $featuredImageUrl; ?>" alt="" loading="lazy" />
                </a>

                <div class="blog-post-list-content">
                    <header>
                        <div class="blog-post-list-head">
                            <span class="blog-post-list-category"><?php echo $theCategory->name; ?></span>
                            <span class="blog-post-list-head-separator">-</span>
                            <span class="blog-post-list-read-time"><?php echo get_read_time_duration($aBlogPost['post_content']); ?> <?php _e("min", 'themede'); ?></span>
                            <meta content="<?php echo get_the_time('Y-m-d', $aBlogPost['ID']); ?>" itemprop="datePublished" />
                        </div>

                        <h3 class="blog-post-list-title"><?php echo $aBlogPost['post_title']; ?></h3>
                    </header>

                    <p class="blog-post-list-post-content">
                        <?php echo $excerpt; ?>
                    </p>

                    <footer class="blog-post-read-more">
                        <a href="<?php echo get_permalink($aBlogPost['ID']); ?>"><?php _e("Lire l'article", 'themede'); ?></a>
                    </footer>
                </div>
            </article>
        </div>
    <?php endforeach; ?>
</div>