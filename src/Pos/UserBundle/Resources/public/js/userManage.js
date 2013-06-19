/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

$(document).ready(function() {


    function userSetActive(url){
        $.ajax({
            type: 'GET', // Le type de ma requete
            url: url, // L'url vers laquelle la requete sera envoyee
            success: function(data, textStatus, jqXHR) {
                alert(data);
            },
            error: function(jqXHR, textStatus, errorThrown) {
                alert(jqXHR);
            }
        });
    }

})