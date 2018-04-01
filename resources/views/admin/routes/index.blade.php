@extends('layouts.main')
@section('content')
    <style>
        #map{
            height:400px;
            width:100%;
        }

        .directions li span.arrow {
            display:inline-block;
            min-width:28px;
            min-height:28px;
            background-position:0px;
            background-image: url("https://raw.githubusercontent.com/heremaps/jsfiddle-github/master/map-with-route-from-a-to-b/img/arrows.png");
            position:relative;
            top:8px;
        }
        .directions li span.depart  {
            background-position:-28px;
        }
        .directions li span.rightUTurn  {
            background-position:-56px;
        }
        .directions li span.leftUTurn  {
            background-position:-84px;
        }
        .directions li span.rightFork  {
            background-position:-112px;
        }
        .directions li span.leftFork  {
            background-position:-140px;
        }
        .directions li span.rightMerge  {
            background-position:-112px;
        }
        .directions li span.leftMerge  {
            background-position:-140px;
        }
        .directions li span.slightRightTurn  {
            background-position:-168px;
        }
        .directions li span.slightLeftTurn{
            background-position:-196px;
        }
        .directions li span.rightTurn  {
            background-position:-224px;
        }
        .directions li span.leftTurn{
            background-position:-252px;
        }
        .directions li span.sharpRightTurn  {
            background-position:-280px;
        }
        .directions li span.sharpLeftTurn{
            background-position:-308px;
        }
        .directions li span.rightRoundaboutExit1 {
            background-position:-616px;
        }
        .directions li span.rightRoundaboutExit2 {
            background-position:-644px;
        }

        .directions li span.rightRoundaboutExit3 {
            background-position:-672px;
        }

        .directions li span.rightRoundaboutExit4 {
            background-position:-700px;
        }

        .directions li span.rightRoundaboutPass {
            background-position:-700px;
        }

        .directions li span.rightRoundaboutExit5 {
            background-position:-728px;
        }
        .directions li span.rightRoundaboutExit6 {
            background-position:-756px;
        }
        .directions li span.rightRoundaboutExit7 {
            background-position:-784px;
        }
        .directions li span.rightRoundaboutExit8 {
            background-position:-812px;
        }
        .directions li span.rightRoundaboutExit9 {
            background-position:-840px;
        }
        .directions li span.rightRoundaboutExit10 {
            background-position:-868px;
        }
        .directions li span.rightRoundaboutExit11 {
            background-position:896px;
        }
        .directions li span.rightRoundaboutExit12 {
            background-position:924px;
        }
        .directions li span.leftRoundaboutExit1  {
            background-position:-952px;
        }
        .directions li span.leftRoundaboutExit2  {
            background-position:-980px;
        }
        .directions li span.leftRoundaboutExit3  {
            background-position:-1008px;
        }
        .directions li span.leftRoundaboutExit4  {
            background-position:-1036px;
        }
        .directions li span.leftRoundaboutPass {
            background-position:1036px;
        }
        .directions li span.leftRoundaboutExit5  {
            background-position:-1064px;
        }
        .directions li span.leftRoundaboutExit6  {
            background-position:-1092px;
        }
        .directions li span.leftRoundaboutExit7  {
            background-position:-1120px;
        }
        .directions li span.leftRoundaboutExit8  {
            background-position:-1148px;
        }
        .directions li span.leftRoundaboutExit9  {
            background-position:-1176px;
        }
        .directions li span.leftRoundaboutExit10  {
            background-position:-1204px;
        }
        .directions li span.leftRoundaboutExit11  {
            background-position:-1232px;
        }
        .directions li span.leftRoundaboutExit12  {
            background-position:-1260px;
        }
        .directions li span.arrive  {
            background-position:-1288px;
        }
        .directions li span.leftRamp  {
            background-position:-392px;
        }
        .directions li span.rightRamp  {
            background-position:-420px;
        }
        .directions li span.leftExit  {
            background-position:-448px;
        }
        .directions li span.rightExit  {
            background-position:-476px;
        }

        .directions li span.ferry  {
            background-position:-1316px;
        }

        code, h1, h2, h3{
            color: #124191;
            letter-spacing: -0.03em;
        }


    </style>
    <?php

    function rgba_($hex){
        list($r, $g, $b) = sscanf($hex, "#%02x%02x%02x");

        return  "0,$r,$g,$b";
    }
    ?>
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Liste des routes</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            @if(!Request::has('start'))

                <center><h1>Select Some Directions</h1></center>

            @else

                <hr/>
                <div id="map"></div>
            @endif
            <table id="example" class="display" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>Nom de la route</th>
                    <th>ligne</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($routes as $route)

                    <tr>
                        <td>{{ $route->route_name }}</td>
                        <td>{{ $route->ligne->ligne_name }}</td>
                        <td>
                            <a href="{{ route('routes.edit', $route->id) }}" class="btn btn-warning"><i class="glyphicon glyphicon-edit icon-white"></i>   Modifier</a>
                            <a href="{{ route('routes.delete', $route->id) }}" class="btn btn-danger"><i class="glyphicon glyphicon-trash icon-white"></i>   Supprimer</a>
                            <a href="{{ URL::current() }}?start={{$route->coordonne}}&route_color={{rgba_($route->route_color)}}" class="btn btn-primary"><i class="glyphicon glyphicon-zoom-in icon-white"></i>Afficher</a>
                        </td>
                    </tr>

                @endforeach

                </tbody>
                <tfoot>
                <tr>
                    <th>Nom de la route</th>
                    <th>ligne</th>
                </tr>
                </tfoot>
            </table>
        </div>
    </div>
@endsection
@section('js')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.css">

    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.js"></script>
    <script src="{{ asset('theme/bower_components/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('theme/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCICVFZg9PawAeVO5oH_BRdE7IEu93eG8E"></script>

    <script type="text/javascript" src="https://js.api.here.com/v3/3.0/mapsjs-core.js"></script>
    <script type="text/javascript" src="https://js.api.here.com/v3/3.0/mapsjs-service.js"></script>
    <script type="text/javascript" src="https://js.api.here.com/v3/3.0/mapsjs-ui.js"></script>
    <script type="text/javascript" src="https://js.api.here.com/v3/3.0/mapsjs-mapevents.js"></script>
    /**/
    <script >
        $(document).ready(function() {
            $('#example').DataTable( {
                initComplete: function () {
                    this.api().columns().every( function () {
                        var column = this;
                        var select = $('<select><option value=""></option></select>')
                            .appendTo( $(column.footer()).empty() )
                            .on( 'change', function () {
                                var val = $.fn.dataTable.util.escapeRegex(
                                    $(this).val()
                                );

                                column
                                    .search( val ? '^'+val+'$' : '', true, false )
                                    .draw();
                            } );

                        column.cells('', column[0]).render('display').sort().unique().each( function ( d, j ){
                            select.append( '<option value="'+d+'">'+d+'</option>' )
                        } );
                    } );
                }
            } );
        } );

    </script>
    /**/
    <script>
        $('#products-table').DataTable();
    </script>
    @if(Request::has('start'))
        <script>
            var directions = '{{Request::get("start")}}';

            var locations_driver = [];
            var alldirections = directions.split(';');
            var startlat = '';
            var startlng = '';
            var endlat = '';
            var endlng   = '';

            for(i=0; i < alldirections.length;i++)
            {


                if(alldirections[i] != null || alldirections[i] != '')
                {
                    if(i == 0)
                    {
                        startlat = Number(alldirections[0].split(',')[0]);
                        startlng = Number(alldirections[0].split(',')[1]);
                    }

                    if(Number(alldirections.length-1) == i)
                    {
                        endlat = Number(alldirections[i-1].split(',')[0]);
                        endlng = Number(alldirections[i-1].split(',')[1]);
                    }

                    if(Number(alldirections[i].split(',')[0]) != 0)
                    {
                        locations_driver.push([Number(alldirections[i].split(',')[0],Number(alldirections[i].split(',')[1])),'Some Title']);
                    }

                }


            }

            /**
             * Calculates and displays a car route from the Brandenburg Gate in the centre of Berlin
             * to Friedrichstraße Railway Station.
             *
             * A full list of available request parameters can be found in the Routing API documentation.
             * see:  http://developer.here.com/rest-apis/documentation/routing/topics/resource-calculate-route.html
             *
             * @param   {H.service.Platform} platform    A stub class to access HERE services
             */
            function calculateRouteFromAtoB (platform) {
                var router = platform.getRoutingService(),
                    routeRequestParams = {
                        mode: 'fastest;car',
                        representation: 'display',
                        routeattributes : 'waypoints,summary,shape,legs',
                        maneuverattributes: 'direction,action',
                        waypoint0: startlat+','+startlng,//'52.5160,13.3779', // Brandenburg Gate
                        waypoint1: endlat+','+endlng,//'52.5206,13.3862'  // Friedrichstraße Railway Station
                    };

                for(i=0; i < alldirections.length;i++)
                {
                    if(alldirections[i] != null || alldirections[i] != '')
                    {

                        if(Number(alldirections[i].split(',')[0]) != 0)
                        {
                            //locations_driver.push([Number(alldirections[i].split(',')[0],Number(alldirections[i].split(',')[1])),'Some Title']);
                            router.calculateRoute(
                                {
                                    mode: 'fastest;car',
                                    representation: 'display',
                                    routeattributes : 'waypoints,summary,shape,legs',
                                    maneuverattributes: 'direction,action',
                                    waypoint0: Number(alldirections[i].split(',')[0])+','+Number(alldirections[i].split(',')[1]),
                                    waypoint1: endlat+','+endlng
                                },
                                onSuccess,
                                onError
                            );
                        }

                    }


                }

                router.calculateRoute(
                    routeRequestParams,
                    onSuccess,
                    onError
                );
            }
            /**
             * This function will be called once the Routing REST API provides a response
             * @param  {Object} result          A JSONP object representing the calculated route
             *
             * see: http://developer.here.com/rest-apis/documentation/routing/topics/resource-type-calculate-route.html
             */
            function onSuccess(result) {
                var route = result.response.route[0];
                /*
                 * The styling of the route response on the map is entirely under the developer's control.
                 * A representitive styling can be found the full JS + HTML code of this example
                 * in the functions below:
                 */
                addRouteShapeToMap(route);
                addManueversToMap(route);

                addWaypointsToPanel(route.waypoint);
                addManueversToPanel(route);
                addSummaryToPanel(route.summary);
                // ... etc.
            }

            /**
             * This function will be called if a communication error occurs during the JSON-P request
             * @param  {Object} error  The error message received.
             */
            function onError(error) {
                alert('Ooops!');
            }
            /**
             * Boilerplate map initialization code starts below:
             */

// set up containers for the map  + panel
            var mapContainer = document.getElementById('map'),
                routeInstructionsContainer = '';//document.getElementById('panel');

            //Step 1: initialize communication with the platform
            var platform = new H.service.Platform({
                app_id: 'DemoAppId01082013GAL',
                app_code: 'AJKnXv84fjrb0KIHawS0Tg',
                useCIT: true,
                useHTTPS: true
            });
            var defaultLayers = platform.createDefaultLayers();

            //Step 2: initialize a map - this map is centered over Berlin
            var map = new H.Map(mapContainer,
                defaultLayers.normal.map,{
                    center: {lat:36.862499, lng:10.195556},
                    zoom: 5
                });

            //Step 3: make the map interactive
            // MapEvents enables the event system
            // Behavior implements default interactions for pan/zoom (also on mobile touch environments)
            var behavior = new H.mapevents.Behavior(new H.mapevents.MapEvents(map));

            // Create the default UI components
            var ui = H.ui.UI.createDefault(map, defaultLayers);

            // Hold a reference to any infobubble opened
            var bubble;

            /**
             * Opens/Closes a infobubble
             * @param  {H.geo.Point} position     The location on the map.
             * @param  {String} text              The contents of the infobubble.
             */
            function openBubble(position, text){
                if(!bubble){
                    bubble =  new H.ui.InfoBubble(
                        position,
                        // The FO property holds the province name.
                        {content: text});
                    ui.addBubble(bubble);
                } else {
                    bubble.setPosition(position);
                    bubble.setContent(text);
                    bubble.open();
                }
            }


            /**
             * Creates a H.map.Polyline from the shape of the route and adds it to the map.
             * @param {Object} route A route as received from the H.service.RoutingService
             */



            function addRouteShapeToMap(route){
                var strip = new H.geo.Strip(),
                    routeShape = route.shape,
                    polyline;

                routeShape.forEach(function(point) {
                    var parts = point.split(',');
                    strip.pushLatLngAlt(parts[0], parts[1]);
                });

                polyline = new H.map.Polyline(strip, {
                    style: {
                        lineWidth: 4,
                        strokeColor: 'rgba(0, 128, 255, 0.7)'
                        //strokeColor: 'rgba({!! Request::get("route_color") !!})'

                    }
                });
                // Add the polyline to the map
                map.addObject(polyline);
                // And zoom to its bounding rectangle
                map.setViewBounds(polyline.getBounds(), true);
            }


            /**
             * Creates a series of H.map.Marker points from the route and adds them to the map.
             * @param {Object} route  A route as received from the H.service.RoutingService
             */
            function addManueversToMap(route){
                var svgMarkup = '<svg width="18" height="18" ' +
                    'xmlns="http://www.w3.org/2000/svg">' +
                    '<circle cx="8" cy="8" r="8" ' +
                    'fill="#1b468d" stroke="white" stroke-width="1"  />' +
                    '</svg>',
                    dotIcon = new H.map.Icon(svgMarkup, {anchor: {x:8, y:8}}),
                    group = new  H.map.Group(),
                    i,
                    j;

                // Add a marker for each maneuver
                for (i = 0;  i < route.leg.length; i += 1) {
                    for (j = 0;  j < route.leg[i].maneuver.length; j += 1) {
                        // Get the next maneuver.
                        maneuver = route.leg[i].maneuver[j];
                        // Add a marker to the maneuvers group
                        var marker =  new H.map.Marker({
                                lat: maneuver.position.latitude,
                                lng: maneuver.position.longitude} ,
                            {icon: dotIcon});
                        marker.instruction = maneuver.instruction;
                        group.addObject(marker);
                    }
                }

                group.addEventListener('tap', function (evt) {
                    map.setCenter(evt.target.getPosition());
                    openBubble(
                        evt.target.getPosition(), evt.target.instruction);
                }, false);

                // Add the maneuvers group to the map
                map.addObject(group);
            }


            /**
             * Creates a series of H.map.Marker points from the route and adds them to the map.
             * @param {Object} route  A route as received from the H.service.RoutingService
             */
            function addWaypointsToPanel(waypoints){

                // var nodeH3 = document.createElement('h3'),
                waypointLabels = [],
                    i;


                for (i = 0;  i < waypoints.length; i += 1) {
                    waypointLabels.push(waypoints[i].label)
                }

                // nodeH3.textContent = waypointLabels.join(' - ');

                //routeInstructionsContainer.innerHTML = '';
                //routeInstructionsContainer.appendChild(nodeH3);
            }

            /**
             * Creates a series of H.map.Marker points from the route and adds them to the map.
             * @param {Object} route  A route as received from the H.service.RoutingService
             */
            function addSummaryToPanel(summary){
                var summaryDiv = document.createElement('div'),
                    content = '';
                content += '<b>Total distance</b>: ' + summary.distance  + 'm. <br/>';
                content += '<b>Travel Time</b>: ' + summary.travelTime.toMMSS() + ' (in current traffic)';


                summaryDiv.style.fontSize = 'small';
                summaryDiv.style.marginLeft ='5%';
                summaryDiv.style.marginRight ='5%';
                summaryDiv.innerHTML = content;
                routeInstructionsContainer.appendChild(summaryDiv);
            }

            /**
             * Creates a series of H.map.Marker points from the route and adds them to the map.
             * @param {Object} route  A route as received from the H.service.RoutingService
             */
            function addManueversToPanel(route){



                var nodeOL = document.createElement('ol'),
                    i,
                    j;

                nodeOL.style.fontSize = 'small';
                nodeOL.style.marginLeft ='5%';
                nodeOL.style.marginRight ='5%';
                nodeOL.className = 'directions';

                // Add a marker for each maneuver
                for (i = 0;  i < route.leg.length; i += 1) {
                    for (j = 0;  j < route.leg[i].maneuver.length; j += 1) {
                        // Get the next maneuver.
                        maneuver = route.leg[i].maneuver[j];

                        var li = document.createElement('li'),
                            spanArrow = document.createElement('span'),
                            spanInstruction = document.createElement('span');

                        spanArrow.className = 'arrow '  + maneuver.action;
                        spanInstruction.innerHTML = maneuver.instruction;
                        li.appendChild(spanArrow);
                        li.appendChild(spanInstruction);

                        nodeOL.appendChild(li);
                    }
                }

                routeInstructionsContainer.appendChild(nodeOL);
            }


            Number.prototype.toMMSS = function () {
                return  Math.floor(this / 60)  +' minutes '+ (this % 60)  + ' seconds.';
            }

            // Now use the map as required...
            calculateRouteFromAtoB(platform);

            $('head').append('<link rel="stylesheet" href="https://js.api.here.com/v3/3.0/mapsjs-ui.css" type="text/css" />');



        </script>



    @endif


@endsection
