/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

$(document).ready(function() {
    $("#usertable button").on('click',function(event){
        userSetActive($(this).attr("data-url"));
    });
});


function userSetActive(url,success,error){
        $.ajax({
            type: 'GET', // Le type de ma requete
            url: url, // L'url vers laquelle la requete sera envoyee
            success: function(data, textStatus, jqXHR) {
                success();
                alert(data);
            },
            error: function(jqXHR, textStatus, errorThrown) {
                alert(jqXHR);
            }
        });
}

