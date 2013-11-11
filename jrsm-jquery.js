jQuery(document).ready(function() {
    
    // Add jquery class to body for jquery dependent CSS
    jQuery('body').addClass('jquery');

    // Menu containers array
    var menuContainers = php_params.containers.replace(/, /g,',').split(',');

    // Only proceed if some menuContainer is specified
    if ( '' == menuContainers )
        return false;
    
    // 1. Loop through menu containers
    jQuery.each(menuContainers, function( index, container ) {

        // Find first <ul> in container
        var ul = jQuery(container).find('ul').first();

        // Add dropdown <select>
        jQuery('<select />', {
            'class': 'jquery-responsive-select-menu',
            'name': 'jrsm-' + index
        }).insertAfter(ul);

        if ( !php_params.firstItem )
            var label = 'Navigation';
        
        // Add <label> for select
        jQuery('<label />', {
            'text': label,
            'class': 'jrsm-label',
            'for': 'jrsm-' + index
        }).insertAfter(ul);

        // Get jQuery object of <select> to append to
        select = jQuery(container).find('.jquery-responsive-select-menu');

        // Create first, default <option>
        if ( php_params.firstItem ) {
            var firstOption = jQuery('<option />', {
                'class': 'first-option',
                'value'   : '',
                'text'    : php_params.firstItem
            }).appendTo(select);
        }

        // Loop through menu item <li>'s in container
        get_child_menu_items( ul, 1 );

        // Choose <option> to be selected
        if ( 1 == php_params.showCurrentPage )
            select.find('.current-page').attr('selected',true);
        else
            select.find('option').first().attr('selected',true);

    }); // End 1. Main loop through menu containers

    // Select functionality
    jQuery('.jquery-responsive-select-menu').change(function() {
        window.location = jQuery(this).find('option:selected').val();
    });

});

function get_child_menu_items( ul, depth ) {

    // 2. Loop through menu item <li>'s
    jQuery.each( ul.children('li'), function( index, li ) {
        
        // Get jQuery object of <li>
        var li = jQuery(li);

        // Get depth prefix
        var prefix = php_params.indent;
        prefix = Array(depth).join(prefix);

        // Get <li> value & text
        var value = li.children('a').attr('href'); 
        var text = li.children('a').text();

        // Ouput <option>
        var option = jQuery('<option />', {
            'value'   : value,
            'text'    : prefix + ' ' + text
        }).appendTo(select);

        // Add current class to current page item
        if ( li.hasClass('current_page_item') ) {
            option.addClass('current-page');
        }

        // Only do something if this <li> contains a child <ul>
        var ul = li.children('ul');

        // Repeat this loop for child <ul>'s
        if ( ul.length > 0 ) {
            get_child_menu_items( ul, depth + 1 );
        }

    }); // End 2. Loop through menu item <li>'s

}