<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAitVzBJxgwJI7BaE30G4pb5lPFC30uqZw"
    type="text/javascript"></script>
    <title>Zip Code get address</title>
</head>
<body>

    <form><strong> Enter Zip:</strong> <input type="text" name="zip" value="55068"> <a href="javascript:void(0)" class="btn" onclick="getLocation()">Get US Address Data From Zip Code -></a></form>

    <div id="city">City: <span>________</span></div>
    <div id="state">State: <span>________</span></div>

    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>

    <script type="text/javascript">
    
    function getLocation(){
        getAddressInfoByZip(document.forms[0].zip.value); //grab zip value from input field
    }

    function response(obj){
        console.log(obj); //for debug purposes - you can view array object in debug console
    }

    function getAddressInfoByZip(zip) {
        
        if(zip.length >= 5 && typeof google != 'undefined') {

            var addr = {};
            var geocoder = new google.maps.Geocoder();

            geocoder.geocode({ 'address': zip }, function(results, status){

                if (status == google.maps.GeocoderStatus.OK){
                    if (results.length >= 0) {

                        for (var ii = 0; ii < results[0].address_components.length; ii++){
                            var street_number = route = street = city = state = zipcode = country = formatted_address = '';
                            var types = results[0].address_components[ii].types.join(",");
                            if (types == "street_address"){
                                street = results[0].address_components[ii].long_name;}
                            if (types == "route" || types == "point_of_interest,establishment"){
                                addr.route = results[0].address_components[ii].long_name;}
                            if (types == "sublocality,political" || types == "locality,political" || types == "neighborhood,political" || types == "administrative_area_level_3,political"){
                                addr.city = (city == '' || types == "locality,political") ? results[0].address_components[ii].long_name : city;}
                            if (types == "administrative_area_level_1,political"){
                                addr.state = results[0].address_components[ii].short_name;}
                        }

                        addr.success = true;
                        jQuery('#city span').text( addr.city );
                        jQuery('#state span').text( addr.state );

                    } else {
                        addr.success = false;
                    }
                } else {
                    addr.success = false;
                }
            });
        } else {
            addr.success = false;
        }
    }
    </script>
</body>
</html>
