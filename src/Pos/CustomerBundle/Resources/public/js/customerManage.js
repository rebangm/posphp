/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */


function addTagFormDeleteLink($tagFormLi) {
    var $removeFormA = $('<a href="#" class="btn btn-danger">Supprimer ce tag</a>');
    $tagFormLi.append($removeFormA);

    $removeFormA.on('click', function(e) {
        // empêche le lien de créer un « # » dans l'URL
        e.preventDefault();

        // supprime l'élément li pour le formulaire de tag
        $tagFormLi.remove();
    });
}

function addChildForm(collectionHolder, $newLinkLi) {
    // Récupère l'élément ayant l'attribut data-prototype comme expliqué plus tôt
    var prototype = collectionHolder.attr('data-prototype');
    console.log(prototype);
    // Remplace '__name__' dans le HTML du prototype par un nombre basé sur
    // la longueur de la collection courante
    console.log(collectionHolder.children().length);
    var newForm = prototype.replace(/__name__/g, collectionHolder.children().length);
    // Affiche le formulaire dans la page dans un li, avant le lien "ajouter un tag"
    var $newFormLi = $('<li></li>').append(newForm);
    $newLinkLi.before($newFormLi);
    addTagFormDeleteLink($newFormLi);
}


$(document).ready(function() {
    console.log( "ready!" );


    // Récupère le div qui contient la collection de tags
    var collectionHolder = $('ul.children');

    // ajoute un lien « add a tag »
    var $addTagLink = $('<a href="#" class="add_children_link btn btn-inverse">Ajouter un enfant</a>');
    var $newLinkLi = $('<li></li>').append($addTagLink);

   // $(document).ready(function() {
        // ajoute l'ancre « ajouter un tag » et li à la balise ul
        collectionHolder.append($newLinkLi);

        $addTagLink.on('click', function(e) {
            // empêche le lien de créer un « # » dans l'URL
            e.preventDefault();

            // ajoute un nouveau formulaire tag (voir le prochain bloc de code)
            addChildForm(collectionHolder, $newLinkLi);
        });
        /*
        collectionHolder.find('li').each(function() {
            addTagFormDeleteLink($(this));
        });
*/
   // });
});