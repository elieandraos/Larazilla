var app = function() {

    var init = function() {

        handleRemoteForms();
        initAddRules();
        initAddConversions();
        initjsonView();
        initDropzone();
    };

    //handle remote form submission
    var handleRemoteForms = function()
    {
        $("body").on('click', 'a.submit-btn', function(){
            $(this).closest('form[data-remote]').submit();
            return false;
        })

        $('body').on('submit', 'form[data-remote]', function(e){
            e.preventDefault();
            var form = $(this);
            var method = form.find('input[name="_method"]').val() || "POST";
            var url = form.prop('action');
            var callback = form.data('callback');

            $.ajax({
                method: method,
                url: url,
                data: form.serialize(),
                success: function(response){
                    if(callback)
                        window[callback](response, form);
                }
            })
        })
    };

    //add/remove rules for post types
    var initAddRules = function()
    {
        $("#add-rule").click(function(){
            $("#rule-skeleton").clone().removeClass('hidden').attr('id', '').appendTo('#rules');
        })

        $("body").on('click', '.delete-rule', function(){
            $(this).closest('.row').remove();
        })
    }

    //add/remove converions for post types
    var initAddConversions = function()
    {
        $("#add-conversion").click(function(){
            $("#conversion-skeleton").clone().removeClass('hidden').attr('id', '').appendTo('#conversions');
        })

        $("body").on('click', '.delete-conversion', function(){
            $(this).closest('.row').remove();
        })
    }

    var initjsonView = function() 
    {
        $(".json-info").each(function(){
            json = $(this).find('code').text();
            $(this).JSONView(json);    
        })
            
    }

    var initDropzone = function()
    {

        if(!$(".post-uploads").length)
            return;
        
        updateDzOrder();
        var dropzones = new Array();

        $(".post-uploads").each(function(){
            id = $(this).attr('id');
            dropzones[id] = new Dropzone ("#" + id,{ 
                url: "/admin/dropzone/upload",
                autoProcessQueue: true, //uploads will be processed on drop 
                acceptedFiles: 'image/*',
                addRemoveLinks: true,
                maxFilesize: 4, //in MB
                previewTemplate: document.querySelector('#preview-'+id).innerHTML,
                dictDefaultMessage: '',
                dictRemoveFile: 'Delete',
                dictCancelUpload: 'Uploading...',
                thumbnailWidth: 80,
                thumbnailHeight: 80
            });

            dropzones[id].on("sending", function(file, xhr, formData) {
                var csrftoken = $("body").find('input[name="_token"]').val();
                formData.append('_token', csrftoken);
            });

            dropzones[id].on("success", function(file, response) {
                filePreview = file.previewElement;
                $(filePreview).find('.dz-file').val( response.filename);
                updateDzOrder();
            });
        })
    }

    //return functions
    return {
        init: init
    };
}();

$(document).ready(function() {
    app.init();
});



/*****************************************
 * Custom function outside the app scope *
 *****************************************/


function submitRemoteForm(elem){
    $(elem).closest("form.remote-form").submit();
};

function removeTableRow(response, form)
{
    $(form).closest('tr').fadeOut(750);
}

function updateDzOrder()
{
    if( $(".post-uploads").length )
    {
        $(".post-uploads").each(function(){
            id = $(this).attr('id');
            $("#" + id + " .dz-preview").each(function(index){
                $(this).find('.dz-order').val(index);
            });
        });
    }
}


