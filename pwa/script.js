if('serviceWorker' in navigator){
    navigator.serviceWorker.register('./sw.js')
    .then(reg => console.log('Registro exitoso', reg))
    .catch(err => console.warn('Error de registro', err))
}