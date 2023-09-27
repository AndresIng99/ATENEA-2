const myApi = 'https://jsonplaceholder.typicode.com';

const xhr = new XMLHttpRequest();

function onRequestHandler(){
    if (this.readyState === 4 && this.status === 200) {
        /*Estado 0 = no se llamado el OPEN - UNSET
        Estado 1 = llamada a un open - OPENED
        Estado 2 = Llamando el metodo send() HEADERS_RECEIVED
        Estado 3 = Recibiendo la respuesta LOADING
        Estado 4 = Operación fue completada DONE*/

        const data = JSON.parse(this.response);
        console.log(data);

        /*El id para visualizar los datos es traer_datos*/
        const HTMLResponse = document.querySelector('#traer_datos');
        const template = data.map(user => '<tr><td>'+user.username+'</td><td>'+user.name+'</td><td>'+user.email+'</td></tr>');

        HTMLResponse.innerHTML = '<table class="table table-striped table-dark">'+template+'</table>';
    }
}

xhr.addEventListener('load', onRequestHandler);
xhr.open('GET', myApi+'/users/');
xhr.send();
