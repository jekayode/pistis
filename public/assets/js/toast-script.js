(function(i) {
            "use strict";
            i(function() {

                i(".toast").toast({
                    autohide: false
                }).toast("show");
                i(".tooltip-test").tooltip();
            })
        }

    )(jQuery);