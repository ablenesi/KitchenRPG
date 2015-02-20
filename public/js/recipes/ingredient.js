$( document ).ready( function( $ ) {
    $( '#form-add-ingredient' ).on( 'submit', function() {

        // setting btn disabled
        var addIngBtn = $( '#btn-add-ingredient' );
        addIngBtn.addClass("disabled");
        // create request
        $.post(
            $( this ).prop( 'action' ),
            {
                "_method": $( this ).find( 'input[name=_method]' ).val(),
                "_token": $( this ).find( 'input[name=_token]' ).val(),
                "id": $( this ).find( 'input[name=id]' ).val(),
                "ajax": 1,                
                "name": $( '#name' ).val(),
                "quantity": $( '#quantity' ).val(),
                "unit": $( '#unit' ).val()
            },
            function( data ) {
                if (data.status === "success"){
                    successIngredient(data);                    
                }else{
                    errorIngredient(data);
                }                
            },
            'json'
        );
        return false;
    } );
 
} );

function successIngredient (data) {
    // change Submit button
    var addIngBtn = $( '#btn-add-ingredient' );
    addIngBtn.removeClass("disabled");
    addIngBtn.addClass("btn-success");
    // generate input row
    var ingredientRow = $('<div class="list-group-item">');
    var ingredientItem = $('<h4 class="list-group-item-heading">');
    var ingredientCheck = $('<span class= " printable mdi-toggle-check-box-outline-blank">');
    var ingredientQuant = $('<span class="ingredient_nr"> ');
    var ingredientText =$('<span>');
    ingredientQuant.text(data.quantity);
    ingredientText.text(" "+data.unit+" "+data.name);
    ingredientItem.html(ingredientCheck);
    ingredientItem.append(ingredientQuant);    
    ingredientItem.append(ingredientText);
    ingredientRow.append(ingredientItem);
    $("#list-group").append(ingredientRow);
    //clean form
    var addIngBtn = $( '#btn-add-ingredient' );
    addIngBtn.removeClass("disabled");
    addIngBtn.removeClass("btn-danger");
    // remove errors
    var error = $('#errorMsgName');
    error.remove();
    error = $('#errorMsgQuantity');
    error.remove(); 
    error = $('#errorMsgUnit');
    error.remove(); 
}


function errorIngredient (data) {
    // change Submit button
    var addIngBtn = $( '#btn-add-ingredient' );
    addIngBtn.removeClass("disabled");
    addIngBtn.removeClass("btn-success");
    addIngBtn.addClass("btn-danger");
    
    // check Name properity for error
    var input = $('#name');
    var error = $('#errorMsgName');
    error.remove();
    if(data.errorMsgName != ""){
        error = $('<p id="errorMsgName">');
        error.addClass("text-danger");
        error.append(data.errorMsgName);
        input.parent().parent().after(error);
        input.parent().parent().addClass("has-error");    
    }else{
        input.parent().parent().removeClass("has-error");
    }
    
    // check Quantity properity for error
    var input = $('#quantity');
    var error = $('#errorMsgQuantity');
    error.remove();
    if(data.errorMsgQuantity != ""){
        error = $('<p id="errorMsgQuantity">');
        error.addClass("text-danger");
        error.append(data.errorMsgQuantity);

        input.parent().parent().after(error);
        input.parent().parent().addClass("has-error");    
    }else{
        input.parent().parent().removeClass("has-error");
    }

    // check Unit properity for error
    var input = $('#unit');
    var error = $('#errorMsgUnit');
    error.remove();
    if(data.errorMsgUnit != ""){
        error = $('<p id="errorMsgUnit">');
        error.addClass("text-danger");
        error.append(data.errorMsgUnit);
        
        input.parent().parent().after(error);
        input.parent().parent().addClass("has-error");    
    }else{
        input.parent().parent().removeClass("has-error");
    }
}
