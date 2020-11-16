$(function () {
    /* j'ai récupéré tous les liens de la navbar et les ai écrit dans la sidebar body*/
    $('#toggle-button').fadeIn("slow");
    $('.contenu-bouton-responsive').fadeOut("fast");
    $(".Header-nav-item").clone().appendTo("#hamburger-sidebar-body");
    $('#toggle-button').click(function () {
        $('.contenu-bouton-responsive').fadeIn("slow");
    });

    $('#hamburger-overlay' || '.Header-nav-item').click(function () {
        $('.contenu-bouton-responsive').fadeOut("fast");
    });
    $('a.Header-nav-item').click(function () {
        $('#hamburger-sidebar-body').fadeOut("fast");
    });
    return;
});