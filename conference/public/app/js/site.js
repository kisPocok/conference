(function() {
    'use strict';

    if ($('#cid').length > 0) {
        $('#cid').change(function(e) {
            $('#filterForm').submit();
        });
    }

}());
