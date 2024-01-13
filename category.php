<?php get_header(); ?>
<!-- Home -->

    <div class="home">
      <div class="breadcrumbs_container">
        <div class="image_header">
          <div class="header_info">
            <?php
            $cat = get_the_category(); //categoryの取得
            $catslug = $cat[0]->slug;  
            $catname = $cat[0]->cat_name;
            ?>

            <div><?php echo $catslug; ?></div>
            <div><?php echo $catname; ?></div>
          </div>
        </div>
      </div>
    </div>

    <!-- Course -->

    <div class="course">
      <div class="row content-body">
        <!-- Course -->
        <div class="col-lg-8">
          <!-- Course Tabs -->
          <div class="course_tabs_container">
            <div class="tab_panels">
              <!-- Description -->
              <div class="tab_panel">
                <div class="tab_panel_title"><?php echo $catname; ?></div>
                <div class="tab_panel_content">
                  <div class="tab_panel_text">
                    <?php if(have_posts()) : ?>  <!--投稿の有無チェック  投稿がある間投稿-->
                      <?php while(have_posts()) : the_post(); ?>
                    <div class="news_posts_small">
                      <div class="row">
                        <div class="col-lg-2 col-md-2 col-sx-12">
                          <div class="calendar_news_border">
                            <div class="calendar_news_border_1">
                              <div class="calendar_month">
                                <?php 
                                if(is_category('event') ){  //category名の取得＋カテゴリーがイベントなら
                                  echo post_custom('month');
                                } else{
                                  echo get_post_time('F');
                                 } //--Fの形式で月を表示
                                 ?>                            
                              </div>
                              <div class="calendar_day">
                                <span>
                                <?php 
                                if(is_category('event') ){
                                  echo post_custom('day');
                                } else{
                                  echo get_post_time('d');
                                 } //--dの形式で日を表示
                                 ?>                            

                                </span>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="col-lg-10 col-md-10 col-sx-12">
                          <div class="news_post_small_title">
                            <a href="<?php the_permalink(); ?>">
                              <?php the_title(); ?>
                            </a>
                          </div>
                          <div class="news_post_meta">
                            <ul>
                              <li>
                                <?php echo wp_trim_words( get_the_content(), 100, '...'); ?>
                              </li>
                            </ul>
                          </div>
                          <div class="read_continue">
                            <button onclick="location.href='news_detail.html'">詳細を見る</button>
                          </div>
                        </div>
                      </div>
                      <hr />
                    </div>
                    <?php endwhile; ?>
                    <?php endif; ?>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Course Sidebar -->
        <div class="col-lg-4" style="background-color: #2b7b8e33">
        <?php get_sidebar(); ?>
        </div>
      </div>
    </div>

<?php get_footer(); ?>