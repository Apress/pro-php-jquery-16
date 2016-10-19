"use strict";

(function($){

    // A plugin that enlarges the text of an element when moused
    // over, then returns it to its original size on mouse out
    $.fn.dateZoom = function(options)
    {
        // Only overwrites values that were explicitly passed by 
        // the user in options
        var opts = $.extend($.fn.dateZoom.defaults, options);

        // Loops through each matched element and returns the
        // modified jQuery object to maintain chainability
        return this.each(function(){
            // Stores the original font size of the element
            var originalsize = $(this).css("font-size");

            // Binds functions to the hover event. The first is
            // triggered when the user hovers over the element, and
            // the second when the user stops hovering
            $(this).hover(function(){
                    $.fn.dateZoom.zoom(this, opts.fontsize, opts);
                },
                function(){
                    $.fn.dateZoom.zoom(this, originalsize, opts);
                });
        });
    };

    // Defines default values for the plugin
    $.fn.dateZoom.defaults = {
            "fontsize" : "110%",
            "easing" : "swing",
            "duration" : "600",
            "callback" : null
        };

    // Defines a utility function that is available outside of the
    // plugin if a user is so inclined to use it
    $.fn.dateZoom.zoom = function(element, size, opts)
    {
        $(element).animate({
                    "font-size" : size
                },{
                    "duration" : opts.duration,
                    "easing" : opts.easing,
                    "complete" : opts.callback
                })
            .dequeue() // Prevents jumpy animation
            .clearQueue(); // Ensures only one animation occurs
    };

})(jQuery);
