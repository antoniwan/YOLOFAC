$ = require('jquery')
require('foundation')
require('foundation.topbar')
require('foundation.reveal')
require('jquery.ui.widget')
require('blueimp.fileupload')
require('foundation.reveal')

###
 Class Dare
###
class Dare

    init: ->
        @submitEvents()

    getEmbeddedData: (media_url) ->

        embedded = null

        if(media_url.indexOf('vine.co') != -1)
            embedded = '<iframe class="vine-embed" src="' + media_url + '/embed/simple" width="480" height="480" frameborder="0"></iframe><script async src="//platform.vine.co/static/scripts/embed.js" charset="utf-8"></script>';
        else if(media_url.indexOf('instagram.com') != -1)
            $.ajax 'http://local.yolofac.com/dare/getInstagram',
                type: 'POST'
                dataType: 'json'
                data:
                    media_url: media_url
                success : (data) ->
                    $('.media-submission-fieldset').hide()
                    $('.media-submission-upload').show().html('<img src="' + data.url + '">')

        # return embedded

    submitEvents: ->

        $('.js-donation-quantity, .js-donation-amount').bind('paste keyup', () ->

            total = parseInt($('.js-donation-quantity').val()) * parseInt($('.js-donation-amount').val())

            $('.js-donation-total').val(total)
        )

        $('#dare-media').fileupload(
            dataType: 'json',
            add: (e, data) ->
                uploadErrors = []
                acceptFileTypes = /^image\/(gif|jpe?g|png)$/i

                if not acceptFileTypes.test(data.originalFiles[0]['type'])
                    uploadErrors.push('Not an accepted file type.')

                # if data.originalFiles[0]['size'] > 5000000
                #   uploadErrors.push('Filesize is too big.')

                if uploadErrors.length <= 0
                    $('.create-date-form__media-submit').hide()
                    $('.media-submission-upload').show()
                    data.submit()
                else
                    $('.create-date-form__media-submit').show()
                    $('.media-submission-upload').hide()

            progress: (e, data) ->
                progress = parseInt(data.loaded / data.total * 100, 10)
                $('.media-submission-upload .meter').css(
                    width : progress + '%'
                )

            fail: (e, data) ->
                $('.create-date-form__media-submit').show()
                $('.media-submission-upload').hide()


            done: (e, data) ->
                $('.create-date-form__media-submit').hide()
                $('.flag__img img').attr('src', data.result.files[0].thumbnailUrl)
                $('.media-submission-upload').hide()
                $('.create-dare-form__media-preview').show()
                console.log(data.result.files[0])
                $('.js-media-picture-url').val(data.result.files[0].url)
        )

        $('.js-embed-media').on('click', (e) =>
            e.preventDefault()

            $media_url = $('.js-media-url').val()

            if($media_url != '')
                embedded = @getEmbeddedData($media_url)
                $('.media-submission-fieldset').hide()
                $('.media-submission-upload').show().html(embedded)

        )
### End Dare Class ###


class Challenge
    init: ->
        @modalEvents()
    modalEvents: ->
        console.log 'modal events loaded'
        $('#challenge-text a.button').on('click', (e)=>
            console.log 'click on the twilio share'
            console.log $('#challenge-text input')

            # empty the cta
            $('#challenge-text input').fadeOut()
            $('#challenge-text a.button').empty().html('<img src="//local.yolofac.com/img/challenge/ajax-loader-darkbg.gif" alt="">')
            # send the SMS text
            $.ajax 'http://local.yolofac.com/dare/sendSMS',
                type: 'POST'
                dataType: 'json'
                data:
                    number: $('#challenge-text input')[0].value
                success : (data) ->
                    console.log data

                    if(data.error)
                        console.log data.error
                        # reset the CTA and input field
                        $('#challenge-text input').fadeIn()
                        $('#challenge-text a.button').empty().html('Send')

                    if(data.sid)
                        $('#challenge-text a.button').empty().html('SMS Sent Successfuly!')

                error: (e) ->
                    console.log e
                    $('#challenge-text input').fadeIn()
                    $('#challenge-text a.button').empty().html('Send')

        )



$(document).ready ->
    $(document).foundation()

    dare = new Dare()
    challenge = new Challenge()
    dare.init()
    challenge.init()
