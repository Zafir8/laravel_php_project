<x-app-layout>
    <div class="container mx-auto py-12 px-4 sm:px-6 lg:px-8">
        <h2 class="text-4xl font-bold mb-6 text-center text-indigo-600">Book a Ride</h2>

        @if (session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                <strong class="font-bold">Success!</strong>
                <span class="block sm:inline">{{ session('success') }}</span>
                <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                    <svg class="fill-current h-6 w-6 text-green-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                        <title>Close</title>
                        <path d="M14.348 14.849a1 1 0 11-1.414-1.414L10 8.586 7.066 11.12a1 1 0 11-1.414-1.414l3-3a1 1 0 011.414 0l3 3a 1 1 0 010 1.414l-3 3a1 1 0 01-1.414 0L7.12 10.86l2.535 2.536a1 1 0 001.414 0l3.278 3.278z"/>
                    </svg>
                </span>
            </div>
        @endif

        <div class="bg-white shadow-lg rounded-lg p-6">
            <form method="POST" action="{{ route('book.ride.submit') }}">
                @csrf

                <div class="mb-4">
                    <label for="autocomplete" class="block text-sm font-medium text-gray-700">Location</label>
                    <input type="text" id="autocomplete" class="mt-1 p-2 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" placeholder="Enter a location" required>
                    <input type="hidden" id="location" name="location">
                </div>

                <div class="mb-4">
                    <label for="vehicle" class="block text-sm font-medium text-gray-700">Vehicle Type</label>
                    <select id="vehicle" name="vehicle_category_id" class="mt-1 block w-full p-2 bg-white border border-gray-300 rounded-md shadow-sm sm:text-sm" required>
                        <option value="" disabled selected>Select a vehicle type</option>
                        @foreach($vehicleCategories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div id="price" class="mb-4 text-lg font-bold text-indigo-600"></div>

                <div id="map" class="w-full h-64 mb-4 rounded-lg shadow-md"></div>

                <button type="submit" class="bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded-full focus:outline-none focus:shadow-outline w-full">
                    Book Ride
                </button>
            </form>
        </div>
    </div>

    <script src="https://maps.googleapis.com/maps/api/js?key={{ config('services.google_maps.api_key') }}&libraries=places&callback=initMap" async defer></script>
    <script>
        let map;
        let marker;
        let autocomplete;

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

        document.getElementById('vehicle').addEventListener('change', function() {
            const selectedOption = this.options[this.selectedIndex].text;
            let price = 0;

            switch (selectedOption) {
                case 'Bus':
                    price = 1000;
                    break;
                case 'Van':
                    price = 800;
                    break;
                default:
                    price = 500;
                    break;
            }

            document.getElementById('price').innerText = 'Price: ' + price + ' LKR';
        });
    </script>
</x-app-layout>
