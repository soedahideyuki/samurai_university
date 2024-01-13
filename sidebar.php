          <!-- sidebar-main に切り出す -->
          <div class="sidebar">
            <div class="category">
              <div class="section_title_container category_title">
                <h2>CATEGORY</h2>
                <div class="section_subtitle">カテゴリー</div>
              </div>
              <div class="sidebar_categories">
                <ul>
                  <?php
                  $args = array(  //質問
                    'hide_empty' => 1, //投稿記事があるカテゴリーのみ表示する
                    'title_li' => '',  //リストの外側に表示するタイトルと表示形式
                  );
                  wp_list_categories($args);  //リンク付きのカテゴリーリストの表示
                  ?>
                </ul>
              </div>
            </div>
            <div class="category">
              <div class="section_title_container category_title">
                <h2>Latest Post</h2>
                <div class="section_subtitle">最新記事</div>
              </div>
              <div class="sidebar_categories">
                <ul>
                  <?php
                  $args = array(
                    'posts_per_page' => 3,  //表示数
                  );
                  $posts = get_posts($args);  //postの取得
                  foreach($posts as $post):
                  setup_postdata($post);  
                  ?>
                  <li>
                    <a href="<?php the_permalink();?>"><? the_title(); ?></a>
                  </li>
                  <?php
                  endforeach;
                  wp_reset_postdata();
                  ?>
                </ul>
              </div>
            </div>
          </div>
          <!-- sidebar-main ここまで -->
