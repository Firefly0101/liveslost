<?php
/**
 * Template Name: App Page
 *
 * @package   Blocksy
 * @author    Firefly https://fi.net.au
 * @copyright Copyright (C) Firefly Interactive, PTY LTD
 * @license   GNU/GPLv2 and later
 *
 * http://www.gnu.org/licenses/gpl-2.0.html
 */

get_header();


//get_template_part('template-parts/app');
?>


<section class="container">
    <?php the_content(); ?>

    <div id="filter-wrapper" class="row text-normal flex-wrap">
        <div class="tab-group w-100 mb-1">
            <button class="tab-bar-item btn active"  data-target="tab-state">View by State</button>
            <button class="tab-bar-item btn"  data-target="tab-age">View by Age</button>
        </div>
        <div id="tab-state" class="tab tab-active mb-1">
            <div id="btn-wrapper" class="btn-wrapper d-none mb-1">
                <button class="btn active" data-target="ALL">All</button>
                <button class="btn" data-target="NSW">NSW</button>
                <button class="btn" data-target="QLD">QLD</button> 
                <button class="btn" data-target="VIC">VIC</button> 
                <button class="btn" data-target="SA">SA</button> 
                <button class="btn" data-target="TAS">TAS</button> 
                <button class="btn" data-target="WA">WA</button> 
                <button class="btn" data-target="NT">NT</button> 
                <button class="btn" data-target="ACT">ACT</button> 
            </div>
        </div>
        <div id="tab-age" class="tab d-none mb-1">
            <div class="btn-wrapper col mb-1">
                <button class="btn" data-target="ALL">All</button> 
                <button class="btn" data-target="100s">100s</button> 
                <button class="btn" data-target="90s">90s</button> 
                <button class="btn" data-target="80s">80s</button> 
                <button class="btn" data-target="70s">70s</button> 
                <button class="btn" data-target="60s">60s</button> 
                <button class="btn" data-target="50s">50s</button> 
                <button class="btn" data-target="40s">40s</button> 
                <button class="btn" data-target="30s">30s</button> 
                <button class="btn" data-target="20s">20s</button> 
                <button class="btn" data-target="10s">10s</button> 
                <button class="btn" data-target="0-9">0-9</button> 
                <button class="btn" data-target="Unknown">Unknown</button> 

            </div>
        </div>
    </div>

    <div id="ajax-posts">
    <?php
        
        $postsPerPage = 1500;
        //$postsPerPage = -1;
        $args = array(
                'post_type'         => 'post',
                'posts_per_page'    => $postsPerPage,
                //'orderby'           => 'ID',
                'orderby'           => 'date',
                'order'             => 'DESC',
                
        );
        $loop = new WP_Query($args);

        $_year_mon_day = '';   // previous year-month-day value
        $_has_grp = false; // TRUE if a group was opened
        $count = 0; 

        echo '<p class="total-count">Total deaths: <span>' . $loop->post_count . '</span></p>'; 

        while ($loop->have_posts()) : $loop->the_post();
            //setup_postdata( $post );

            $day = carbon_get_the_post_meta( 'ff_date' );

            $classes = '';
            $classes .= carbon_get_the_post_meta( 'ff_state' );

            // get age
            $age = carbon_get_the_post_meta( 'ff_age_bracket' );
            if (empty($age)) {
                $age = 'Unknown';
            }
            $classes .= ' ' . $age;

            // get gender
            if (carbon_get_the_post_meta( 'ff_gender' )) {
                $classes .= ' ' . carbon_get_the_post_meta( 'ff_gender' );
            }

            //get date
            if (carbon_get_the_post_meta( 'ff_date' )) {
                $classes .= ' ' . carbon_get_the_post_meta( 'ff_age_bracket' );
            } else {
                $classes .= ' ' . 'Unknown';
            }

            $time = strtotime( $post->post_date );
            $year = date( 'Y', $time );
            $mon = date( 'M', $time );
            $day = date( 'd', $time );
            $year_mon_day = "$year-$mon-$day";
            $day_mon = "$day $mon $year";


            // Open a new group.
            if ( $year_mon_day !== $_year_mon_day ) {
                // Close previous group, if any.
                if ( $_has_grp ) {
                    echo '<span class="text-sm icon-count">' . $count . '</span>'; 
                    $count = 0; 
                    echo '</div><!-- .row -->';
                    echo '</div><!-- .day -->';
                    
                    
                }
                $_has_grp = true;
                
                echo '<div class="row">';
                echo '<div class="col col-date text-sm">' . $day_mon . '</div>'; 
                echo '<div class="col col-items">';
                
            }

    ?>
        
            <div class="item-life <?php echo $classes ?>">
                <a href="<?php echo the_permalink(); ?>" title="<?php echo $classes ?>"><i class="fas fa-heart"></i></a>
            </div>

        <?php

            $_year_mon_day = $year_mon_day;
            $count ++; 
        endwhile;

        // Close the last group, if any.
        if ( $_has_grp ) {
            echo '<span class="text-sm icon-count">' . $count . '</span>'; 
            echo '</div><!-- .row -->';
            echo '</div><!-- .day -->';
        }
        

        // show load button if more pages
        if (  $loop->max_num_pages > 1 ){
            //echo '<div class="mt-1"><a href="#" id="more_posts" class="btn">Load More</a> Total pages: ' . $loop->max_num_pages .'</div>';
        } 

        wp_reset_postdata();
        ?>

    </div><!-- end #ajax-posts -->
</section> 

<?php

get_footer();


 