/*
 * Welcome to your app's main JavaScript file!
 *
 * We recommend including the built version of this JavaScript file
 * (and its CSS file) in your base layout (base.html.twig).
 */

// any CSS you import will output into a single css file (app.css in this case)
import './styles/app.css';

// start the Stimulus application
import './bootstrap';
import '../node_modules/bootstrap/dist/css/bootstrap.min.css';
import Places from 'places.js';
import L from 'leaflet';
import 'leaflet/dist/leaflet.css';

//Map
let map = document.querySelector('#map');
if(map !== null){

    let icon = L.icon({
        iconUrl: "/images/gites/img/marker-icon.png",
        
    });

    let center = [map.dataset.lat, map.dataset.lng];
    map = L.map('map').setView(center, 13)
    let token = 'pk.eyJ1IjoiaW5jb25udXBhc2Nvbm51IiwiYSI6ImNrcWtwZWcwZzA1cGMyb3BkZnFsNXgwaHkifQ.cPo05Y2XWVdUYdKeeyQEcw';
    L.tileLayer(`https://api.mapbox.com/v4/mapbox.satellite/{z}/{x}/{y}.png?access_token=${token}`, {
        maxZoom: 18,
        minZoom: 10,
    }).addTo(map)
     L.marker(center,{icon: icon}).addTo(map);
}



//Places
let inputAdress = document.querySelector('#gite_address');
if(inputAdress !== null){
    let place = Places({
        container: inputAdress

})
    
    place.on('change', function(e){
       document.querySelector('#gite_lat').value = e.suggestion.latlng.lat
       document.querySelector('#gite_lng').value = e.suggestion.latlng.lng
    })
}



//Formulaire de contact
let btnContact = document.getElementById('contact');
let formContact = document.getElementById('contactForm');


btnContact.addEventListener('click', e =>{
    e.preventDefault;
    //console.log('test');
    formContact.style.display = "block";
});



