/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

$(document).ready(function() {
    $("#userTable button").on('click',function(event){
        userSetActive($(this));
    });
});


function userSetActive(button){
        $.ajax({
            type: 'GET', // Le type de ma requete
            url: button.attr("data-url"), // L'url vers laquelle la requete sera envoyee
            success: function(data, textStatus, jqXHR) {
                console.log($("i",button));
				
                if (data.message.active == 1){ 
                    button.addClass("btn-success").removeClass("btn-danger");
					$("i",button).addClass("icon-ok").removeClass("icon-remove");
				}
                else if(data.message.active == 0){
                    button.addClass("btn-danger").removeClass("btn-success");
					$("i",button).addClass("icon-remove").removeClass("icon-ok");
				}
                button.attr("data-url", data.message.url);
            },
            error: function(jqXHR, textStatus, errorThrown) {
                alert(jqXHR);
            }
        });
}




