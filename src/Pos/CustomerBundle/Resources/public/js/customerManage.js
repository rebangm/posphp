/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */


function addTagFormDeleteLink($tagFormLi) {
    var $removeFormA = $('<a href="#" class="btn btn-danger">Supprimer ce tag</a>');
    $tagFormLi.append($removeFormA);

    $removeFormA.on('click', function(e) {
        e.preventDefault();
        $tagFormLi.remove();
    });
}

function addChildForm(collectionHolder) {
    var prototype = collectionHolder.attr('data-prototype');
    var newForm = prototype.replace(/__name__/g, collectionHolder.children().length);
    var $ChildForm = $('<li></li>').append(newForm);
    collectionHolder.append($ChildForm);
    addTagFormDeleteLink($ChildForm);
}


$(document).ready(function() {
    var collectionHolder = $('ul.children');
    $('#add_children_link').on('click', function(e) {
            e.preventDefault();
            addChildForm(collectionHolder);
            return false;
        });
        collectionHolder.find('li').each(function() {
            addTagFormDeleteLink($(this));
        });

   // });
});