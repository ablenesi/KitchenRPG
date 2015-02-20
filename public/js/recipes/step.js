$( document ).ready( function( $ ) {
   	$( '#form-add-step' ).on( 'submit', function() {
        
        // setting btn disabled
        var addDescBtn = $( '#btn-add-step' );
        addDescBtn.addClass("disabled");
        $.post(
            $( this ).prop( 'action' ),
            {
                "_method": $( this ).find( 'input[name=_method]' ).val(),
                "_token": $( this ).find( 'input[name=_token]' ).val(),
                "nr": $( this ).find( 'input[name=nr]' ).val(),
                "id": $( this ).find( 'input[name=id]' ).val(),
                "description": $( '#description' ).val(),
                "ajax": 1                
            },
            function( data ) {
                if (data.status === "success"){
                	successStep(data);
                }else{
                	errorStep(data);
                }                
            },
            'json'
        );
        return false;
    } );
 
} );

function successStep(data){	
	var addDescBtn = $( '#btn-add-step' );
	addDescBtn.removeClass("disabled");
    addDescBtn.removeClass("btn-danger");                    
	addDescBtn.addClass("btn-success");       
	$('#error_msg').remove();
	$('#description').val('');

	// managing success
    var listItem = $('<div class="list-group-item">');
    var media = $('<div class="media">');
    var mediaBody = $('<div class="media-body">');
    var mediaHeading = $('<h4 class="media-heading">');
    mediaHeading.text(data.nr);
    var listGroupItem = $('<p class="list-group-item-text">');
    listGroupItem.text(data.msg);
    mediaBody.append(mediaHeading);
    mediaBody.append(listGroupItem);
    media.append(mediaBody);
    listItem.append(media);
    var separator =$('<div class="list-group-separator">');
    $('#list-steps').append(listItem);
    $('#list-steps').append(separator);    
}

function errorStep(data){
	// managing error
	var addDescBtn = $( '#btn-add-step' );
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