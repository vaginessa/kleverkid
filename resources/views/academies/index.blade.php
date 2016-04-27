@extends('layouts.app')
@section('content')

    <div class="row">
        <h1>Academy Map</h1>
        <div class="col-lg-12">
            <div id="map" style="width: 100%; height: 500px;"></div>
        </div>
    </div>
   <script>
        function initialize() {
            var locations = [
                    @foreach($academies as $academy)
                ['{{$academy->name}}', {{$academy->latitude}}, {{$academy->longitude}}, {{$academy->id}}],
                    @endforeach
            ];

            window.map = new google.maps.Map(document.getElementById('map'), {
                mapTypeId: google.maps.MapTypeId.ROADMAP
            });

            var infowindow = new google.maps.InfoWindow();

            var bounds = new google.maps.LatLngBounds();

            for (i = 0; i < locations.length; i++) {
                marker = new google.maps.Marker({
                    position: new google.maps.LatLng(locations[i][1], locations[i][2]),
                    map: map
                });

                bounds.extend(marker.position);

                google.maps.event.addListener(marker, 'click', (function (marker, i) {
                    return function () {
                        window.location='/academy/details/'+locations[i][3];
                    }
                })(marker, i));
            }

            map.fitBounds(bounds);
        }

        function loadScript() {
            var script = document.createElement('script');
            script.type = 'text/javascript';
            script.src = 'https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false&' + 'callback=initialize';
            document.body.appendChild(script);
        }

       $(document).ready(function() {
          loadScript();
           setTimeout(function() {
               initialize();
           },1000);
       });
    </script>

@stop