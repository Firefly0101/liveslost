/**
 * Custom scripts here
 */
import axios from "axios";

// Verifies if the document is ready
window.onload=()=>{

    console.log('Ready');
    
    // setup filter buttons
    setupFilterButtons();

    setupTabButtons();


}

/**
 * Add events to tab buttons
 */
 function setupTabButtons(){
    // remove display class 
    //jQuery('.tab').removeClass('d-none');
    
    jQuery( ".tab-group .btn" ).click(function() {
        // apply class
        jQuery(".tab-group .btn").removeClass('active');
        jQuery(this).addClass('active');

        // set data vars
        var target = jQuery(this).data("target"); 

        jQuery(".tab").hide();
        jQuery('#' + target).show();
    });
}

/**
 * Add events to filter buttons
 */
function setupFilterButtons(){
    jQuery('.btn-wrapper').removeClass('d-none');
    
    jQuery( ".btn-wrapper .btn" ).click(function() {
        // apply class
        jQuery(".btn-wrapper .btn").removeClass('active');
        jQuery(this).addClass('active');

        // set data vars
        var target = jQuery(this).data("target"); 
        //var btn = jQuery(".row").not('.' + target).hide();

        //console.log('Found' + btn);
        
        doFilterItems(target);
    });
}

/**
 * Filters items with matching value
 */
function doFilterItems(i){
    console.log(i);
    // reset 
    jQuery( ".item-life").removeClass("fade");
    
    // add class to matching items
    if (i != 'ALL') {
        jQuery( ".item-life").not('.' + i).addClass("fade");

        var numItems = jQuery('.item-life').not('.fade').length;

        jQuery('.total-count span').html(numItems);
        console.log(numItems);

        jQuery( "#ajax-posts .row").addClass("hide");
        jQuery( "#ajax-posts .row").has('.' + i).addClass("show").removeClass("hide");

    } else {
        jQuery( "#ajax-posts .row").removeClass("hide");
    }
}


function initApp() {

    const HelloVueApp = {
        el: '#app',
        data () {
          return {
            info: null
          }
        },
        mounted () {
          axios
            .get('https://liveslost.fireflydigital.dev/wp-json/wp/v2/posts?per_page=100')
            .then(response => (this.info = response.data))
        }
    }
    
    Vue.createApp(HelloVueApp).mount('#app')
}