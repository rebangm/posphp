/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */


function addTagFormDeleteLink($tagFormLi) {
    var $removeFormA = $('<a href="#">Supprimer ce tag</a>');
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
    var newForm = prototype.replace(/__name__label__/g, collectionHolder.children().length).replace(/__name__/g, collectionHolder.children().length);


    // Affiche le formulaire dans la page dans un li, avant le lien "ajouter un tag"
    var $newFormLi = $('<div></div>').append(newForm);
    $newLinkLi.before($newFormLi);
    addTagFormDeleteLink($newFormLi);
}


$( document ).ready(function() {
    console.log( "ready!" );


    // Récupère le div qui contient la collection de tags
    var collectionHolder = $('div.children');

    // ajoute un lien « add a tag »
    var $addTagLink = $('<a href="#" class="add_children_link">Ajouter un enfant</a>');
    var $newLinkLi = $('<div></div>').append($addTagLink);

    $(document).ready(function() {
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
    });
});