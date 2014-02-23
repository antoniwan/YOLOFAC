$ = require('jquery')
require('foundation')
require('foundation.topbar')
require('jquery.ui.widget')
require('blueimp.fileupload')

$(document).ready ->
    $(document).foundation()

    console.log('here')

    $('#dare-media').fileupload(
    	dataType: 'json',
    	add: (e, data) ->
    		uploadErrors = []
    		acceptFileTypes = /^image\/(gif|jpe?g|png)$/i

    		if not acceptFileTypes.test(data.originalFiles[0]['type'])
    			uploadErrors.push('Not an accepted file type.')

    		# if data.originalFiles[0]['size'] > 5000000
    		# 	uploadErrors.push('Filesize is too big.')

    		if uploadErrors.length <= 0
    			$('.media-submission-fieldset').hide()
    			$('.media-submission-upload').show()
    			data.submit()
    		else
	    		$('.media-submission-fieldset').show()
	    		$('.media-submission-upload').hide()

    	progress: (e, data) ->
    		progress = parseInt(data.loaded / data.total * 100, 10)
    		$('.media-submission-upload .meter').css(
    			width : progress + '%'
    		)

    	fail: (e, data) ->
    		$('.media-submission-fieldset').show()
    		$('.media-submission-upload').hide()


    	done: (e, data) ->
    		console.log('WE GOT AN UPLOADED FILE')
    )

    $('.js-embed-media').on('click', (e) ->
    	e.preventDefault()

    	$media_url = ($('.js-media-url').val()

    	if($media_url != '')
    		console.log('lets embed this shit!')

    )
