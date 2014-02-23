$ = require('jquery')
require('sticky-kit')

module.exports = ->
    $(document).ready ->
        $('.js-sticky').stick_in_parent
            offset_top: 100
