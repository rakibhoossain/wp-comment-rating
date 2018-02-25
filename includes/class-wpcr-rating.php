<?php

/**
 * Rating Classs
 *
 * @link       http://rakibhossain.cf
 * @since      1.0.0
 * @package    wpcr
 * @subpackage wpcr/includes
 * @author     Rakib Hossain <serakib@gmail.com>
 */

class WPCR_Rating {

    /**
     * Add custom meta (ratings) fields to the default comment form.
     */
    public function rating_field($fields) {
                
        $field = '';
        for( $i=5; $i >= 1; $i-- )
        $field .= '<i class="fa fa-star-o" title="'. $i .'" data-value="'. $i .'"></i>';
        
        $fields[ 'rating' ] = '<p class="comment-form-rating" data-rating="0">'.$field.
                '<input type="hidden" name="comment_rating" id="comment_rating" value="0"/></p>';

        return $fields;
    }


    /**
     * Save the comment meta data along with comment.
     */
    public function save_comment_meta_data( $comment_id ) {

        if ( ( isset( $_POST['comment_rating'] ) ) && ( $_POST['comment_rating'] != '') )
        $comment_rating = wp_filter_nohtml_kses($_POST['comment_rating']);
        add_comment_meta( $comment_id, 'comment_rating', $comment_rating );
    }


    /**
     * Add the filter to check if the comment meta data has been filled or not.
     * you may chech for default value
     */
    public function verify_comment_meta_data( $commentdata ) { 
        if ( ! isset( $_POST['comment_rating'] ) )
        wp_die( __( 'Error: You did not add your rating. Hit the BACK button of your Web browser and resubmit your comment with rating.','comment-rating' ) );
        return $commentdata;
    }


    /**
     * Add meta box in comment edit screen.
     */
    public function add_comment_meta_box() {
        add_meta_box( 'rating', __( 'Rating','comment-rating' ), array($this, 'add_comment_meta_field_rating'), 'comment', 'normal', 'high' );
    }

    /**
     * Add meta box filds for add_comment_meta_box().
     */ 
    public function add_comment_meta_field_rating ( $comment ) {

        $comment_rating = get_comment_meta( $comment->comment_ID, 'comment_rating', true );
        wp_nonce_field( 'extend_comment_update', 'extend_comment_update', false );
        
        $field = '';
        for( $i=5; $i >= 1; $i-- )
        $field .= '<i class="fa fa-star-o" title="'. $i .'" data-value="'. $i .'"></i>';
        ?>
        
        <p class="comment-form-rating admin-rating" data-rating="<?php echo $comment_rating; ?>">
            <?php echo $field; ?> 
        </p>
        <span id='rating_zero'><i class="fa fa-remove" title="Clear"></i></span>
        <input type="hidden" name="comment_rating" id="comment_rating" value="<?php echo $comment_rating; ?>"/>
            
        
        <?php
    }


    /**
     * Update comment meta data from comment edit screen .
     */
    public function extend_comment_edit_metafields( $comment_id ) {
        if( ! isset( $_POST['extend_comment_update'] ) || ! wp_verify_nonce( $_POST['extend_comment_update'], 'extend_comment_update' ) ) return;

        if ( ( isset( $_POST['comment_rating'] ) ) && ( $_POST['comment_rating'] != '') ):
        $comment_rating = wp_filter_nohtml_kses($_POST['comment_rating']);
        update_comment_meta( $comment_id, 'comment_rating', $comment_rating );
        else :
        delete_comment_meta( $comment_id, 'comment_rating');
        endif;
        
    }
  

    /**
     * Add the comment meta (saved earlier) to the comment text.
     *You can also output the comment meta values directly in comments template.
     */
    public function modify_comment( $text ){

        if( $commentrating = get_comment_meta( get_comment_ID(), 'comment_rating', true ) ) {       
            $rating = '<div class="reviews-i-rating" title="Rating: '.$commentrating.'">';
            for( $i=1; $i <= $commentrating; $i++ )
                $rating .='<i class="fa fa-star"></i>';
            $rating .= '</div>';
            $text .= $text . $rating;
            return $text;       
        } else {
            return $text;       
        }    
    }

}