// Installing service worker
const CACHE_NAME = "pwa-inven-kantor";

/* Add relative URL of all the static content you want to store in
 * cache storage (this will help us use our app offline)*/
let resourcesToCache = [
    "/css/style.css",
    "/icons/icon-32.png",
    "/icons/icon-192.png",
    "/icons/icon-256.png",
    "/icons/icon-512.png",
    "/icons/icon.png",
    "/img/drajat.png",
];

self.addEventListener("install", (e) => {
    e.waitUntil(
        caches
            .open(CACHE_NAME)
            .then((cache) => {
                return cache.addAll(resourcesToCache);
            })
            .then(self.skipWaiting())
    );
});

// Cache and return requests
self.addEventListener("fetch", function (event) {
    event.respondWith(
        fetch(event.request).catch(() => {
            return caches.open(CACHE_NAME).then((cache) => {
                return cache.match(event.request);
            });
        })
    );
});

// Update a service worker
const cacheWhitelist = [CACHE_NAME];
self.addEventListener("activate", (event) => {
    event.waitUntil(
        caches
            .keys()
            .then((cacheNames) => {
                return Promise.all(
                    cacheNames.map((cacheName) => {
                        if (cacheWhitelist.indexOf(cacheName) === -1) {
                            return caches.delete(cacheName);
                        }
                    })
                );
            })
            .then(() => self.clients.claim())
    );
});
