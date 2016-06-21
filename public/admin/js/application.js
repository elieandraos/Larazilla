var app = function() {

    var init = function() {

        handleRemoteForms();
        initAddRules();
        initAddConversions();
        initjsonView();
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

    //return functions
    return {
        init: init
    };
}();

//Load global functions
$(document).ready(function() {
    app.init();
});



/*****************************************
 * Custom function outside the app scope *
 *****************************************/

//init click button to submit remote forms
function submitRemoteForm(elem){
    $(elem).closest("form.remote-form").submit();
};

function removeTableRow(response, form)
{
    $(form).closest('tr').fadeOut(750);
}



/*******************************
 * Nested Categories Functions *
 *******************************/

function removeCategory(response, form)
{
    $(form).closest('li').fadeOut(750);
}

function sortCategories(e)
{
   var str = window.JSON.stringify($('#nestable').nestable('serialize'));
   var request_url = $("#sort-url").val();
 
   $.ajax({
        url: request_url,
        type: "POST",
        data: { "json_string" : str},
        success: function(data){
            // ...
        }
    })
}
