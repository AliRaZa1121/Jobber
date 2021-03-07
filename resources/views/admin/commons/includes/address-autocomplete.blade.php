<script>
    function activatePlacesSearch(){
        
        var dubaiBounds = {
            north: 25.3585607,
            east: 55.5650393,
            south: 24.7921359,
            west: 54.8904543
        };
        var options = {
            bounds: dubaiBounds,
            types: ['establishment'],
            componentRestrictions: {
                country: 'AE'
            },
            strictBounds: true
        };
        var geocoder = new google.maps.Geocoder();
        var address =   document.getElementById('c_address');
        var autocomplete = new google.maps.places.Autocomplete(address,options);

        var personalAddress =   document.getElementById('personal-address');
        var autocomplete2 = new google.maps.places.Autocomplete(personalAddress,options);
    }
    $('#c_address').blur(function(){
        setTimeout(function() {
            // alert();
            var address =  document.getElementById('c_address').value;
            
            var geocoder = new google.maps.Geocoder();
            
            geocoder.geocode( { 'address': address}, function(results, status) {
                // alert(address);
                if (status === google.maps.GeocoderStatus.OK) {
                    var latitude = results[0].geometry.location.lat();
                    var longitude = results[0].geometry.location.lng();
                    document.getElementById('c_location').value = latitude+', '+longitude;
                    
                } 
            }); 
            
        }, 300);
    });

    $('#personal-address').blur(function(){
        setTimeout(function() {
            // alert();
            var address =  document.getElementById('personal-address').value;
            
            var geocoder = new google.maps.Geocoder();
            
            geocoder.geocode( { 'address': address}, function(results, status) {
                // alert(address);
                // if (status === google.maps.GeocoderStatus.OK) {
                //     var latitude = results[0].geometry.location.lat();
                //     var longitude = results[0].geometry.location.lng();
                //     document.getElementById('c_location').value = latitude+', '+longitude;
                    
                // } 
            }); 
            
        }, 300);
    });
</script>
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBzZXCW8mTxjaGhvqtrxoosKfutY0xY67A&libraries=places&callback=activatePlacesSearch">
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gmaps.js/0.4.25/gmaps.js"></script>



{{-- AIzaSyBzZXCW8mTxjaGhvqtrxoosKfutY0xY67A --}}