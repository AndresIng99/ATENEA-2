;
//Asignar nombre a la cache de mi sitio

const CACHE_NAME = 'cache_curso',
    urlToCache= [
        './css/style.css',
        './index.html',
        './libreria.js',
        './img/logo.png'
    ]

//

self.addEventListener('install', e => {
    e.waitUntil(
        caches.open(CACHE_NAME)
        .then(cache => {
            return cache.addAll(urlToCache)
            .then(() => self.skipWaiting())
        })
        .catch(err => console.log('Fallo en el registro de cache', err))
    )
})

//sin conexión

self.addEventListener('activate', e => {
    const cacheWhitelist = [CACHE_NAME]

    e.waitUntil(
        caches.keys()
        .then(cacheNames => {
            return Promise.all(
                cacheNames.map(cacheName =>{
                    if(cacheWhitelist.indexOf(cacheName) === -1){
                        return caches.delete(cacheName)
                    }
                })
            )
        })
        // activar cache actual
        .then(() => self.clients.claim())
    )
})

//cuando se recuperela conexión

self.addEventListener('fetch', e => {
    e.respondWith(
        caches.match(e.request)
        .then(res => {
            if(res){
                return res
            }
            return fetch(e.request)
        })
    )
})