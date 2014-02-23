$ = require('jquery')
require('sticky-kit')

module.exports = ->
    $(document).ready ->
        if matchMedia(Foundation.media_queries['large'].matches)
            $('.js-sticky').stick_in_parent
                offset_top: 100
