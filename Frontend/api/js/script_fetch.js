const myApi = 'https://jsonplaceholder.typicode.com';
const HTMLResponse = document.querySelector('#traer_datos');
const ul = document.createElement('ol');

fetch(myApi+'/users')
    .then((response) => response.json())
    .then((usuarios) => {
        usuarios.forEach((usuario) => {
            let elem = document.createElement('li');
            elem.appendChild(
                document.createTextNode(usuario.name)
            );
            ul.appendChild(elem);
        });
        HTMLResponse.appendChild(ul);
    });