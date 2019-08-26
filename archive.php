<?php
    get_header();
?>
  <div class="container">

    <div class="row">

      <!-- Blog Entries Column -->
      <div class="col-md-12">

        <h2>
          <?php
            if ( is_category() ) {
              echo single_cat_title('Category Archive: ');
            }elseif(is_tag()){
              echo single_tag_title('Tag Archive: ');
            }elseif(is_author()){
              echo 'Author Archive: '.get_the_author();
            }else{
              _e('Archive', 't_theme');
            }
          ?>
          
        </h2>

        <?php
 
            if ( have_posts() ) :



                while ( have_posts() ) : the_post(); ?>

                    <div class="mb-4">
                        <?php the_post_thumbnail('',array(
                          'class' => 'mb-4 img-fluid'
                        ))?>
                        
                        </div>
                        <div class="">
                            <h1><?php the_title(); ?></h1>

                            <div class="text-muted mb-10 post-meta">
                            <?php _e('Posted on ', 't_theme'); echo get_the_date(); _e(' by ', 't_theme');?>
                            <a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) ); ?>"><?php the_author(); ?></a>
                               Categories: <?php
                                  $categories = get_the_category();
                                  $comma      = ', ';
                                  $output     = '';
                                  
                                  if ( $categories ) {
                                    foreach ( $categories as $category ) {
                                      $output .= '<a href="' . get_category_link( $category->term_id ) . '">' . $category->cat_name . '</a>' . $comma;
                                    }
                                    echo trim( $output, $comma );
                                  } ?>

                            <p class="card-text"><?php the_excerpt() ?></p>
                            <button onclick="window.location='<?php esc_url(the_permalink()) ?>';"> Read More</button> <br><br>
                            <hr>
                        </div>
                        
                    </div>

                <?php endwhile;
            
            else :
                echo '<p>There are no posts!</p>';
            
            endif;
            
        ?>
      
      </div>


    </div>
    <!-- /.row -->

  </div>
  <!-- /.container -->

  <!-- Footer -->
<?php
    get_footer();
?>