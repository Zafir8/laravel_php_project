<x-app-layout>
    <div class="relative h-screen">
        <div id="map" class="absolute inset-0 z-0"></div>

        <div class="absolute top-0 left-0 right-0 z-10 p-4">
            <div class="flex justify-center items-center space-x-4">
                <input type="text" id="autocomplete" class="p-2 w-1/2 bg-white bg-opacity-75 rounded-md shadow-sm" placeholder="Enter a location" required>
                <input type="hidden" id="location" name="location">
            </div>
        </div>

        <div class="absolute bottom-0 left-0 right-0 z-10 p-4">
            <div class="flex justify-center items-center space-x-4 mb-4">
                @foreach($vehicleCategories as $category)
                    <div class="cursor-pointer vehicle-card flex-1 p-2 border border-gray-300 rounded-lg shadow-sm text-center bg-white bg-opacity-75 hover:bg-gray-100" data-id="{{ $category->id }}" data-price="{{ $category->id == 1 ? 1000 : 800 }}">
                        <i class="fas {{ $category->id == 1 ? 'fa-bus' : 'fa-shuttle-van' }} mx-auto mb-2 h-8 w-8 text-indigo-600"></i>
                        <p class="text-xs font-semibold">{{ $category->name }}</p>
                    </div>
                @endforeach
                <input type="hidden" id="vehicle_category_id" name="vehicle_category_id" required>
            </div>
            <div class="text-center mb-4">
                <div id="price" class="text-lg font-bold text-indigo-600"></div>
            </div>
            <div class="flex justify-center items-center space-x-4 mb-4">
                <input type="text" id="pickup_location" class="p-2 w-1/2 bg-white bg-opacity-75 rounded-md shadow-sm" placeholder="Enter pick-up location" required>
                <button id="currentLocationBtn" class="p-2 w-1/2 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-md">Use Current Location</button>
                <input type="datetime-local" id="pickup_time" class="p-2 w-1/2 bg-white bg-opacity-75 rounded-md shadow-sm" required>
            </div>
            <div class="flex justify-center items-center">
                <button id="bookRide" class="bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded-full focus:outline-none focus:shadow-outline">
                    Book Ride
                </button>
            </div>
        </div>
    </div>

    <form id="rideForm" method="POST" action="{{ route('book.ride.submit') }}" class="hidden">
        @csrf
        <input type="hidden" id="locationHidden" name="location">
        <input type="hidden" id="vehicleHidden" name="vehicle_category_id">
        <input type="hidden" id="pickupLocationHidden" name="pickup_location">
        <input type="hidden" id="pickupTimeHidden" name="pickup_time">
    </form>

    <!-- FontAwesome CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/J+dsR3f3B5d5KZ5pO8sk6tpFHRFmk3tEmD1pT3h8/pEnVnDFx7nlYH1od/QUFIoXZ57/AQyig==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <script src="https://maps.googleapis.com/maps/api/js?key={{ config('services.google_maps.api_key') }}&libraries=places&callback=initMap" async defer></script>
    <script>
        let map;
        let marker;
        let autocomplete;
        let pickupAutocomplete;

        function initMap() {
            const colombo = { lat: 6.9271, lng: 79.8612 };

            map = new google.maps.Map(document.getElementById('map'), {
                center: colombo,
                zoom: 13,
                styles: [ // Custom map styles for a cleaner look
                    {
                        "elementType": "geometry",
                        "stylers": [{"color": "#f5f5f5"}]
                    },
                    {
                        "elementType": "labels.icon",
                        "stylers": [{"visibility": "off"}]
                    },
                    {
                        "elementType": "labels.text.fill",
                        "stylers": [{"color": "#616161"}]
                    },
                    {
                        "elementType": "labels.text.stroke",
                        "stylers": [{"color": "#f5f5f5"}]
                    },
                    {
                        "featureType": "administrative.land_parcel",
                        "elementType": "labels.text.fill",
                        "stylers": [{"color": "#bdbdbd"}]
                    },
                    {
                        "featureType": "poi",
                        "elementType": "geometry",
                        "stylers": [{"color": "#eeeeee"}]
                    },
                    {
                        "featureType": "poi",
                        "elementType": "labels.text.fill",
                        "stylers": [{"color": "#757575"}]
                    },
                    {
                        "featureType": "poi.park",
                        "elementType": "geometry",
                        "stylers": [{"color": "#e5e5e5"}]
                    },
                    {
                        "featureType": "poi.park",
                        "elementType": "labels.text.fill",
                        "stylers": [{"color": "#9e9e9e"}]
                    },
                    {
                        "featureType": "road",
                        "elementType": "geometry",
                        "stylers": [{"color": "#ffffff"}]
                    },
                    {
                        "featureType": "road.arterial",
                        "elementType": "labels.text.fill",
                        "stylers": [{"color": "#757575"}]
                    },
                    {
                        "featureType": "road.highway",
                        "elementType": "geometry",
                        "stylers": [{"color": "#dadada"}]
                    },
                    {
                        "featureType": "road.highway",
                        "elementType": "labels.text.fill",
                        "stylers": [{"color": "#616161"}]
                    },
                    {
                        "featureType": "road.local",
                        "elementType": "labels.text.fill",
                        "stylers": [{"color": "#9e9e9e"}]
                    },
                    {
                        "featureType": "transit.line",
                        "elementType": "geometry",
                        "stylers": [{"color": "#e5e5e5"}]
                    },
                    {
                        "featureType": "transit.station",
                        "elementType": "geometry",
                        "stylers": [{"color": "#eeeeee"}]
                    },
                    {
                        "featureType": "water",
                        "elementType": "geometry",
                        "stylers": [{"color": "#c9c9c9"}]
                    },
                    {
                        "featureType": "water",
                        "elementType": "labels.text.fill",
                        "stylers": [{"color": "#9e9e9e"}]
                    }
                ]
            });

            marker = new google.maps.Marker({
                map: map,
                draggable: true,
            });

            autocomplete = new google.maps.places.Autocomplete(document.getElementById("autocomplete"));
            autocomplete.bindTo('bounds', map);
            autocomplete.addListener('place_changed', onPlaceChanged);

            pickupAutocomplete = new google.maps.places.Autocomplete(document.getElementById("pickup_location"));
            pickupAutocomplete.bindTo('bounds', map);
            pickupAutocomplete.addListener('place_changed', onPickupPlaceChanged);

            google.maps.event.addListener(marker, 'dragend', function(event) {
                updateLocation(event.latLng);
            });

            google.maps.event.addListener(map, 'click', function(event) {
                placeMarker(event.latLng);
                updateLocation(event.latLng);
            });
        }

        function onPlaceChanged() {
            const place = autocomplete.getPlace();

            if (!place.geometry) {
                document.getElementById("autocomplete").placeholder = "Enter a place";
            } else {
                map.panTo(place.geometry.location);
                map.setZoom(15);
                placeMarker(place.geometry.location);
                updateLocation(place.geometry.location, place.formatted_address);
            }
        }

        function onPickupPlaceChanged() {
            const place = pickupAutocomplete.getPlace();

            if (!place.geometry) {
                document.getElementById("pickup_location").placeholder = "Enter a pick-up location";
            } else {
                updatePickupLocation(place.geometry.location, place.formatted_address);
            }
        }

        function placeMarker(location) {
            if (marker) {
                marker.setPosition(location);
            } else {
                marker = new google.maps.Marker({
                    position: location,
                    map: map,
                    draggable: true
                });
            }
            map.setCenter(location);
        }

        function updateLocation(location, address = null) {
            if (!address) {
                const geocoder = new google.maps.Geocoder();
                geocoder.geocode({ location: location }, (results, status) => {
                    if (status === "OK") {
                        if (results[0]) {
                            document.getElementById('location').value = results[0].formatted_address;
                            document.getElementById('autocomplete').value = results[0].formatted_address;
                        } else {
                            document.getElementById('location').value = location.lat() + ', ' + location.lng();
                            document.getElementById('autocomplete').value = location.lat() + ', ' + location.lng();
                        }
                    } else {
                        document.getElementById('location').value = location.lat() + ', ' + location.lng();
                        document.getElementById('autocomplete').value = location.lat() + ', ' + location.lng();
                    }
                });
            } else {
                document.getElementById('location').value = address;
                document.getElementById('autocomplete').value = address;
            }
        }

        function updatePickupLocation(location, address = null) {
            if (address) {
                document.getElementById('pickup_location').value = address;
                document.getElementById('pickupLocationHidden').value = address;
            } else {
                const geocoder = new google.maps.Geocoder();
                geocoder.geocode({ location: location }, (results, status) => {
                    if (status === "OK") {
                        if (results[0]) {
                            document.getElementById('pickup_location').value = results[0].formatted_address;
                            document.getElementById('pickupLocationHidden').value = results[0].formatted_address;
                        } else {
                            document.getElementById('pickup_location').value = location.lat() + ', ' + location.lng();
                            document.getElementById('pickupLocationHidden').value = location.lat() + ', ' + location.lng();
                        }
                    } else {
                        document.getElementById('pickup_location').value = location.lat() + ', ' + location.lng();
                        document.getElementById('pickupLocationHidden').value = location.lat() + ', ' + location.lng();
                    }
                });
            }
        }

        document.getElementById('currentLocationBtn').addEventListener('click', function() {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(function(position) {
                    const pos = {
                        lat: position.coords.latitude,
                        lng: position.coords.longitude
                    };
                    const geocoder = new google.maps.Geocoder();
                    geocoder.geocode({ location: pos }, (results, status) => {
                        if (status === "OK") {
                            if (results[0]) {
                                document.getElementById('pickup_location').value = results[0].formatted_address;
                                document.getElementById('pickupLocationHidden').value = results[0].formatted_address;
                            } else {
                                document.getElementById('pickup_location').value = pos.lat + ', ' + pos.lng;
                                document.getElementById('pickupLocationHidden').value = pos.lat + ', ' + pos.lng;
                            }
                        } else {
                            document.getElementById('pickup_location').value = pos.lat + ', ' + pos.lng;
                            document.getElementById('pickupLocationHidden').value = pos.lat + ', ' + pos.lng;
                        }
                    });
                }, function() {
                    alert('Geolocation failed or is not supported by your browser.');
                });
            } else {
                alert('Geolocation is not supported by your browser.');
            }
        });

        document.querySelectorAll('.vehicle-card').forEach(card => {
            card.addEventListener('click', function() {
                document.querySelectorAll('.vehicle-card').forEach(c => c.classList.remove('bg-gray-200', 'border-indigo-600'));
                this.classList.add('bg-gray-200', 'border-indigo-600');

                const vehicleId = this.getAttribute('data-id');
                const price = this.getAttribute('data-price');

                document.getElementById('vehicle_category_id').value = vehicleId;
                document.getElementById('price').innerText = 'Price: ' + price + ' LKR';
            });
        });

        document.getElementById('bookRide').addEventListener('click', function() {
            document.getElementById('locationHidden').value = document.getElementById('location').value;
            document.getElementById('vehicleHidden').value = document.getElementById('vehicle_category_id').value;
            document.getElementById('pickupLocationHidden').value = document.getElementById('pickup_location').value;
            document.getElementById('pickupTimeHidden').value = document.getElementById('pickup_time').value;
            document.getElementById('rideForm').submit();
        });

        window.addEventListener('pageshow', function(event) {
            if (event.persisted || (window.performance && window.performance.navigation.type === 2)) {
                initMap();
            }
        });
    </script>
</x-app-layout>
