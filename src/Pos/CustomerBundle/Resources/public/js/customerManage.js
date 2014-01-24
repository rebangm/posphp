/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */


function addTagFormDeleteLink($tagFormLi) {
    var $removeFormA = $('<button class="btn-xs btn-danger right"><i class="glyphicon glyphicon-remove"></i></button>');
    $tagFormLi.prepend($removeFormA);

    $removeFormA.on('click', function(e) {
        e.preventDefault();
        $tagFormLi.remove();
        return false;
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