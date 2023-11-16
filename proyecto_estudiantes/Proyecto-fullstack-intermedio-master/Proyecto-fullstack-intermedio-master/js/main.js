var imagenes=['./images/sabor_chocolate.png','./images/sabor_fresa.png','./images/sabor_limon.png','./images/sabor_maracuya.png','./images/sabor_naranja.png','./images/sabor_vainilla.png'];
cont=0;

function galeria(contenedor){
    contenedor.addEventListener('click',e=> {
    let atras=contenedor.querySelector('.atras'),
        adelante=contenedor.querySelector('.adelante'),
        img=contenedor.querySelector('img'),
        tgt=e.target;
    if(tgt==atras){
        if(cont>0){
            img.src=imagenes[cont-1];
            cont--;
        }else{
            img.src=imagenes[imagenes.length-1];
            cont=imagenes.length-1;
        }

    }else if(tgt==adelante){
        if(cont<imagenes.length-1){
            img.src=imagenes[cont+1];
            cont++;
        }else{
            img.src=imagenes[imagenes.length-1];
            cont=imagenes.length-1;
        }
    } 

    
    });

}

document.addEventListener("DOMContentLoaded",() =>{
    let contenedor=document.querySelector('.contenedor');
    galeria(contenedor);
});