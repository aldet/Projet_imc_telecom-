$(document).ready(function () {
    $('#open_search_panel').click(function(){
        var searchPanel = $("#search_panel");
        if (searchPanel.is(":visible")) {
            searchPanel.hide();
        }
        else{
            searchPanel.show();
            $.ajax({
               url: "/recherche",
               success: function(response) {
                   searchPanel.html(response);
                   searchPanel.find('select').selectpicker();
               }
           })
        }


    });
});

