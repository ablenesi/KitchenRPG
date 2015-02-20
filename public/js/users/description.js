$( document ).ready( function( $ ) {
    $( '#form-add-description' ).on( 'submit', function() {
        
        // setting btn disabled
        var addDescBtn = $( '#btn-add-description' );
        addDescBtn.addClass("disabled");
        $.post(
            $( this ).prop( 'action' ),
            {
                "_method": $( this ).find( 'input[name=_method]' ).val(),
                "_token": $( this ).find( 'input[name=_token]' ).val(),
                "ajax": 1,              
                "description": $( '#description' ).val()
            },
            function( data ) {
                if (data.status === "success"){
                    var description = $('<p >');
                    description.text(data.msg);
                    $( '#form-add-description' ).replaceWith(description);
                }else{
                    // managing error
                    var input = $('#description');
                    var error = $('#error_msg');

                    error.remove();
                    error = $('<p id="error_msg">');
                    error.addClass("text-danger");
                    error.append(data.msg);

                    addDescBtn.removeClass("disabled");
                    addDescBtn.removeClass("btn-success");
                    addDescBtn.addClass("btn-danger");
                    
                    input.parent().parent().after(error);
                    input.parent().parent().addClass("has-error");
                }                
            },
            'json'
        );
        return false;
    } );
 
} );