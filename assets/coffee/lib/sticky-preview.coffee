$ = require('jquery')
require('sticky-kit')

module.exports = ->
    $(document).ready ->
        console.log(Foundation.media_queries)
        if matchMedia(Foundation.media_queries['large'].matches)
            $('.js-sticky').stick_in_parent
                offset_top: 100
