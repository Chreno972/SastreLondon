    const parallax1 = document.querySelector('.imonehome');
    const parallax2 = document.querySelector('.imonehome2');
    const parallax3 = document.querySelector('.imonehome3');
    const parallettre = document.querySelector('.serv-h2-home');
    /* cette fonction permet de capturer la position y de la fenêtre lors du scroll 
    window.addEventListener('scroll', () => {
        console.log(window.scrollY);
    })*/
    
    if (window.matchMedia("screen and (min-width: 1570px)").matches) 
    {
        /* La largeur minimum de l'affichage est 600 px inclus */
        window.addEventListener('scroll', () =>
        {
            parallax1.style.backgroundPositionY = -window.scrollY / 3 + "px";
            parallax2.style.backgroundPositionY = -window.scrollY / 3.8 + "px";
            parallax3.style.backgroundPositionY = -window.scrollY / 4 + "px";
            return;
        });
    }
    if (window.matchMedia("screen and (min-width: 1279px)").matches) 
    {
        /* La largeur minimum de l'affichage est 600 px inclus */
        window.addEventListener('scroll', () =>
        {
            parallax1.style.backgroundPositionY = -window.scrollY / 5 + "px";
            parallax2.style.backgroundPositionY = -window.scrollY / 7 + "px";
            parallax3.style.backgroundPositionY = -window.scrollY / 8 + "px";
            return;
        });
    }
    else if (window.matchMedia("screen and (min-width: 801px)").matches) 
    {
        /* La largeur minimum de l'affichage est 600 px inclus */
        window.addEventListener('scroll', () =>
        {
            parallax1.style.backgroundPositionY = -window.scrollY / 2 + "px";
            parallax2.style.backgroundPositionY = -window.scrollY / 2 + "px";
            parallax3.style.backgroundPositionY = -window.scrollY / 8 + "px";
            return;
        });
    }
    else if (window.matchMedia("screen and (min-width: 768px)").matches) 
    {
        /* La largeur minimum de l'affichage est 600 px inclus */
        window.addEventListener('scroll', () =>
        {
            parallax1.style.backgroundPositionY = -window.scrollY / 6 + "px";
            parallax2.style.backgroundPositionY = -window.scrollY / 12 + "px";
            parallax3.style.backgroundPositionY = -window.scrollY / 8 + "px";
            return;
        });
    }
    else if (window.matchMedia("screen and (max-width: 767px)").matches) 
    {
        /* La largeur minimum de l'affichage est 600 px inclus */
        window.addEventListener('scroll', () =>
        {
            parallax1.style.backgroundPositionY = -window.scrollY / 6 + "px";
            parallax2.style.backgroundPositionY = -window.scrollY / 12 + "px";
            parallax3.style.backgroundPositionY = -window.scrollY / 8 + "px";
            return;
        });
    }
    else 
    {
        /* L'affichage est inférieur à 600px de large */
        parallax1.style.backgroundPositionY = 2 + "px";
        parallax2.style.backgroundPositionY = 4 + "px";
        parallax3.style.backgroundPositionY = 4 + "px";
    }
