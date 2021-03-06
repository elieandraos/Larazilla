var app = function() 
{ 

    var init = function() {

        handleRemoteForms();
        initAddRules();
        initAddConversions();
        initjsonView();
        initDropzone();
        initNestedCategories();
        initDateDefaultValue();
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
    };

    //add/remove converions for post types
    var initAddConversions = function()
    {
        $("#add-conversion").click(function(){
            $("#conversion-skeleton").clone().removeClass('hidden').attr('id', '').appendTo('#conversions');
        })

        $("body").on('click', '.delete-conversion', function(){
            $(this).closest('.row').remove();
        })
    };

    var initjsonView = function() 
    {
        $(".json-info").each(function(){
            json = $(this).find('code').text();
            $(this).JSONView(json);    
        })
            
    };

    var initDropzone = function()
    {

        if(!$(".post-uploads").length)
            return;
        
        updateDzOrder();
        var dropzones = new Array();

        $(".post-uploads").each(function(){
            id = $(this).attr('id');
            dom_id = $("#" + id);

            dropzones[id] = new Dropzone ("#" + id, { 
                url: "/admin/dropzone/upload",
                autoProcessQueue: true, //uploads will be processed on drop 
                acceptedFiles: 'image/*',
                addRemoveLinks: true,
                maxFilesize: 4, //in MB
                previewTemplate: document.querySelector('#preview-'+id).innerHTML,
                dictDefaultMessage: '',
                dictRemoveFile: '', //overrided in complete event
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

            dropzones[id].on("complete", function(file) {
                filePreview = file.previewElement;
                $(filePreview).find('.dz-remove').html('<i class="fa fa-trash-o" aria-hidden="true"></i>');
            });

            $(dom_id).sortable({
                items:'.dz-preview',
                cursor: 'move',
                opacity: 0.5,
                containment: dom_id,
                distance: 20,
                tolerance: 'pointer',
                update: function (event, ui) {
                   updateDzOrder();
                }
            });

        })


        $(".media-remove").click(function(){
            media_id = $(this).data('media-id');
            csrftoken = $("body").find('input[name="_token"]').val();
            elem = $(this);

            $.ajax({
                method: 'POST',
                url: "/admin/dropzone/delete",
                data: {id: media_id, _token: csrftoken } ,
                success: function(response){
                    if(response.success == true)
                        elem.closest('.dz-file-preview').remove();
                    else
                        alert(response.error);
                }
            })
            return false;
        })
    };


    var initNestedCategories = function()
    {
        if($("#nestable").length)
        {
            var updateCategoriesJsonOutput = function(e)
            {
                var list   = e.length ? e : $(e.target),
                    output = list.data('output');
                if (window.JSON) {
                    output.val(window.JSON.stringify(list.nestable('serialize')));
                } else {
                    output.val('JSON browser support required.');
                }
            };

            $('#nestable').nestable({ group: 1 }).on('change', updateCategoriesJsonOutput);
            updateCategoriesJsonOutput($('#nestable').data('output', $('#nestable-output')));

            $("#categories-save-order").click(function(e){
                var csrftoken = $("body").find('input[name="_token"]').val();
                var str = $('#nestable-output').val();
                
                $.ajax({
                    url: '/admin/categories/sort',
                    type: "POST",
                    data: { "json_string" : str,  _token: csrftoken },
                    success: function(data){
                        Materialize.toast("Category order Updated.", 3000);
                    }
                })

            });
        }
    };   

    var initDateDefaultValue = function()
    {
        $(".datepicker").each(function(){
            
            if( !$(this).val())
            {
                var today = new Date();
                var day = today.getDate();
                var month = today.toLocaleString("en-us", { month: "long" });
                var year = today.getFullYear();

                if(day<10) { day ='0'+ day } 
                today = day +' ' + month + ', '+ year;

                $(this).val(today);
            }
        });
    };

    

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

function removeListRow(response, form)
{
    $(form).closest('li').fadeOut(750);
}

function updateDzOrder()
{
    if( $(".post-uploads").length )
    {
        $(".post-uploads").each(function(){
            id = $(this).attr('id');
            $("#" + id + " .dz-preview").each(function(index){
                $(this).find('.dz-order').val( (index+1));
            });
        });
    }
}

