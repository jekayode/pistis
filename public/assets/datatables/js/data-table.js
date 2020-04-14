jQuery(document).ready(function($) {
    'use strict';

    if ($("table.first").length) {

        $(document).ready(function() {
            $('table.first').DataTable({
                "bLengthChange": false,
                "bFilter": false
            });
        });
    }
if ($("table.second").length) {

        $(document).ready(function() {
            $('table.second').DataTable({
                "bLengthChange": false,
                "bFilter": false
            });
        });
    }







});