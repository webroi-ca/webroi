/* Main js */

/* youtube */
var youtube = document.querySelectorAll( ".youtube" );
for (var i = 0; i < youtube.length; i++) {
    /*thumbnail image source.*/
    /*Medium Quality- /mqdefault.jpg*/
    /*High Quality - /hqdefault.jpg*/
    /*Standard Definition (SD) - sddefault.jpg*/
    /*Maximum Resolution - maxresdefault.jpg*/
    var source = "https://img.youtube.com/vi/"+ youtube[i].dataset.embed +"/sddefault.jpg"; 
    /*Load the image asynchronously*/
    var image = new Image();
        image.src = source;
        image.addEventListener( "load", function() {
            youtube[ i ].appendChild( image );
        }( i ) );
     /*On click envents - create an iframe*/
     youtube[i].addEventListener( "click", function() {
 
        var iframe = document.createElement( "iframe" );
 
            iframe.setAttribute( "frameborder", "0" );
            iframe.setAttribute( "allowfullscreen", "" );
            iframe.setAttribute( "src", "https://www.youtube.com/embed/"+ this.dataset.embed +"?rel=0&showinfo=0&autoplay=1" );
 
            this.innerHTML = "";
            this.appendChild( iframe );
    } );

}


