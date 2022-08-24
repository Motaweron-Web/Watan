@extends('Admin/layouts/master')
@section('title')
    {{($setting->title) ?? ''}} | {{$project->name}}
@endsection
@section('page_name') {{$project->name}} @endsection
@section('content')
    <div class="row">
        <div class="col-lg-4">
            <div class="card">
                <div class="card-body">
                    <div class="wideget-user text-center">
                        <div class="wideget-user-desc">
                            <div class="wideget-user-img">
                                <img class="" src="{{getFile($project->image)}}" alt="img"
                                     onclick="window.open(this.src)">
                            </div>
                            <div class="user-wrap">
                                <h4 class="mb-1">{{$project->name}}</h4>
                                <h6 class="text-muted mb-4">{{$project->created_at->diffForHumans()}}</h6>
                                @if($project->project_status == 'new')
                                    <span class="badge badge-info mt-1 mb-1">جديد</span>
                                @elseif($project->project_status == 'ongoing')
                                    <span class="badge badge-warning mt-1 mb-1">مستمر</span>
                                @elseif($project->project_status == 'finished')
                                    <span class="badge badge-primary mt-1 mb-1">مكتمل</span>
                                @else
                                    <span class="badge badge-default mt-1 mb-1">غير معرف</span>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    <div class="float-left">
                        <h3 class="card-title">بيانات الناشر</h3>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="card-body wideget-user-contact">
                    <div class="media mb-5 mt-0">
                        <div class="d-flex ml-3">
                            <span class="user-contact-icon bg-primary"><i class="fa fa-user text-white"></i></span>
                        </div>
                        <div class="media-body">
                            @if($project->user)
                                <a href="#" class="text-dark">{{($project->user->name) ?? ''}}</a>
                                <div class="text-muted fs-14">
                                    <a href="https://wa.me/{{($project->user->whatsapp) ?? ''}}" class="text-green">
                                        واتساب <i class="fab fa-whatsapp"></i>
                                    </a>
                                </div>

                            @elseif ($project->agent)
                                <a href="#" class="text-dark">{{($project->agent->name_ar) ?? 'تم حذفه'}}</a>
                                <div class="text-muted fs-14">
                                    <a href="https://wa.me/{{($project->agent->whatsapp) ?? ''}}" class="text-green">

                                        واتساب <i class="fab fa-whatsapp"></i>
                                    </a>
                                </div>
                            @elseif ($project->company)
                                <a href="#" class="text-dark">{{($project->company->name_ar) ?? ''}}</a>
                                <div class="text-muted fs-14">
                                    <a href="https://wa.me/{{($project->company->whatsapp) ?? ''}}" class="text-green">

                                        واتساب <i class="fab fa-whatsapp"></i>
                                    </a>
                                </div>
                            @else
                                <a href="#" class="text-dark">غير معرف</a>
                            @endif
                        </div>
                    </div>
                    <div class="media mb-5 mt-0">
                        <div class="d-flex ml-3">
                            <span class="user-contact-icon bg-warning"><i class="fa fa-phone text-white"></i></span>
                        </div>
                        <div class="media-body">
                            <a href="#" class="text-dark">الهاتف</a>
                            @if($project->user)
                                <div class="text-muted fs-14">{{($project->user->phone) ?? ''}}</div>
                            @elseif ($project->agent)
                                <div
                                    class="text-muted fs-14">{{($project->agent->phone_code) ?? ''}}{{($project->agent->phone) ?? ''}}</div>
                            @elseif ($project->company)
                                <div class="text-muted fs-14">{{($project->company->number) ?? ''}}</div>
                            @else
                                <a href="#" class="text-dark">غير معرف</a>
                            @endif
                        </div>
                    </div>
                    <div class="media mb-0 mt-0">
                        <div class="d-flex ml-3">
                            <span class="user-contact-icon bg-secondary"><i class="fa fa-info text-white"></i></span>
                        </div>
                        <div class="media-body">
                            <a href="#" class="text-dark">عن الناشر</a>
                            @if ($project->agent)
                                <div class="text-muted fs-14">{{($project->agent->about) ?? ''}}</div>
                            @elseif ($project->company)
                                <div class="text-muted fs-14">{{($project->company->about_ar) ?? ''}}</div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-8">
            <div class="card">
                <div class="wideget-user-tab">
                    <div class="tab-menu-heading">
                        <div class="tabs-menu1">
                            <ul class="nav">
                                <li class=""><a href="#tab-51" class="active show" data-toggle="tab">صور المشروع</a>
                                </li>
                                <li><a href="#tab-81" data-toggle="tab" class="">المخططات الطابقية</a></li>
                                <li><a href="#tab-61" data-toggle="tab" class="">الفيديوهات</a></li>
                                <li><a href="#tab-71" data-toggle="tab" class="">الموقع</a></li>
                                <li><a href="#tab-100" data-toggle="tab" class="">بيانات المشروع</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-content">
                <div class="tab-pane active show" id="tab-51">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                @foreach($attachments['images'] as $row)
                                    <div class="col-lg-4 col-md-6">
                                        <img class="img-fluid rounded mb-5 "
                                             src="{{getFile($row->attachment)}}"
                                             alt="banner">
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane" id="tab-81">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                @foreach($attachments['files'] as $row)
                                    <div class="col-lg-4 col-md-6">
                                        <img class="img-fluid rounded mb-5 "
                                             src="{{getFile($row->attachment)}}"
                                             alt="banner">
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane" id="tab-61">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                @foreach($attachments['videos'] as $row)
                                    <div class="col-lg-6 col-md-6">
                                        <video class="img-fluid rounded mb-5 " controls>
                                            <source src="{{getFile($row->attachment)}}">
                                        </video>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane" id="tab-71">
                    <div class="card">
                        <div class="card-body">
                            <div id="map" style="width: 100%;height: 500px"></div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane" id="tab-100">
                    <div class="card">
                        <div class="card-body">
                            <div id="profile-log-switch">
                                <div class="media-heading">
                                    <h5><strong>تفاصيل و مواصفات</strong></h5>
                                </div>
                                <div class="table-responsive ">
                                    <table class="table row table-borderless">
                                        <tbody class="col-lg-12 col-xl-6 p-0">
                                        <tr>
                                            <td><strong>الرقم المرجعي :</strong> #{{$project->id}}</td>
                                        </tr>
                                        <tr>
                                            <td><strong>النوع :</strong> {{$project->category->name_ar. ' '.$project->sub_category->name_ar}}</td>
                                        </tr>
                                        </tbody>
                                        <tbody class="col-lg-12 col-xl-6 p-0">
                                        <tr>
                                            <td><strong>السعر :</strong> {{$project->min_price .' : '.$project->max_price}} د.ع </td>
                                        </tr>
                                        <tr>
                                            <td><strong>حالة المشروع :</strong>
                                                @if($project->project_status == 'new')
                                                    جديد
                                                @elseif($project->project_status == 'ongoing')
                                                    مستمر
                                                @elseif($project->project_status == 'finished')
                                                    مكتمل
                                                @else
                                                    غير معرف
                                                @endif
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="row profie-img">
                                    <div class="col-md-12">
                                        <div class="media-heading">
                                            <h5><strong>الوصف</strong></h5>
                                        </div>
                                        <p>
                                        {!! $project->desc !!}
                                    </div>
                                </div>
                                <div class="row profie-img">
                                    <div class="col-md-12">
                                        <div class="media-heading">
                                            <h5><strong>شروط الدفع</strong></h5>
                                        </div>
                                        <p>
                                        {!! $project->payment_terms !!}
                                    </div>
                                </div>
                                <div class="row profie-img">
                                    <div class="col-md-12">
                                        <div class="media-heading">
                                            <h5><strong>تفاصيل الدفع</strong></h5>
                                        </div>
                                        <p>
                                        {!! $project->payment_details !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- COL-END -->
    </div>


@endsection
@section('js')
    <script>
        function initAutocomplete() {
            var map = new google.maps.Map(document.getElementById('map'), {
                center: {lat: "30.71541029954", lng: "29.21541910954"},
                zoom: 13,
                mapTypeId: 'roadmap'
            });
            // move pin and current location
            infoWindow = new google.maps.InfoWindow;
            geocoder = new google.maps.Geocoder();
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(function (position) {
                    var pos = {
                        lat: 30.71541029954,
                        lng: 29.21541910954
                    };
                    map.setCenter(pos);
                    var marker = new google.maps.Marker({
                        position: new google.maps.LatLng(pos),
                        map: map,
                        title: 'موقعك الحالي'
                    });
                    markers.push(marker);
                    marker.addListener('click', function () {
                        geocodeLatLng(geocoder, map, infoWindow, marker);
                    });
                    // to get current position address on load
                    google.maps.event.trigger(marker, 'click');
                }, function () {
                    handleLocationError(true, infoWindow, map.getCenter());
                });
            } else {
                // Browser doesn't support Geolocation
                handleLocationError(false, infoWindow, map.getCenter());
            }
            var geocoder = new google.maps.Geocoder();
            // google.maps.event.addListener(map, 'click', function (event) {
            //     SelectedLatLng = event.latLng;
            //     geocoder.geocode({
            //         'latLng': event.latLng
            //     }, function (results, status) {
            //         if (status == google.maps.GeocoderStatus.OK) {
            //             if (results[0]) {
            //                 deleteMarkers();
            //                 addMarkerRunTime(event.latLng);
            //                 SelectedLocation = results[0].formatted_address;
            //                 console.log(results[0].formatted_address);
            //                 splitLatLng(String(event.latLng));
            //                 $("#pac-input").val(results[0].formatted_address);
            //             }
            //         }
            //     });
            // });
            function geocodeLatLng(geocoder, map, infowindow, markerCurrent) {
                var latlng = {lat: markerCurrent.position.lat(), lng: markerCurrent.position.lng()};
                /* $('#branch-latLng').val("("+markerCurrent.position.lat() +","+markerCurrent.position.lng()+")");*/
                // $('#latitude').val(markerCurrent.position.lat());
                // $('#longitude').val(markerCurrent.position.lng());
                geocoder.geocode({'location': latlng}, function (results, status) {
                    if (status === 'OK') {
                        if (results[0]) {
                            map.setZoom(8);
                            var marker = new google.maps.Marker({
                                position: latlng,
                                map: map
                            });
                            markers.push(marker);
                            infowindow.setContent(results[0].formatted_address);
                            SelectedLocation = results[0].formatted_address;
                            $("#pac-input").val(results[0].formatted_address);
                            infowindow.open(map, marker);
                            $('#user_address').text(results[0].formatted_address);
                        } else {
                            window.alert('No results found');
                        }
                    } else {
                        window.alert('فشل من تحديد الموقع حاول في وقت لاحق' + status);
                    }
                });
                SelectedLatLng = (markerCurrent.position.lat(), markerCurrent.position.lng());
            }

            function addMarkerRunTime(location) {
                var marker = new google.maps.Marker({
                    position: location,
                    map: map
                });
                markers.push(marker);
            }

            function setMapOnAll(map) {
                for (var i = 0; i < markers.length; i++) {
                    markers[i].setMap(map);
                }
            }

            function clearMarkers() {
                setMapOnAll(null);
            }

            function deleteMarkers() {
                clearMarkers();
                markers = [];
            }

            // Create the search box and link it to the UI element.
            var input = document.getElementById('pac-input');
            $("#pac-input").val("أبحث هنا ");
            var searchBox = new google.maps.places.SearchBox(input);
            map.controls[google.maps.ControlPosition.TOP_RIGHT].push(input);
            // Bias the SearchBox results towards current map's viewport.
            map.addListener('bounds_changed', function () {
                searchBox.setBounds(map.getBounds());
            });
            var markers = [];
            // Listen for the event fired when the user selects a prediction and retrieve
            // more details for that place.
            searchBox.addListener('places_changed', function () {
                var places = searchBox.getPlaces();
                if (places.length == 0) {
                    return;
                }
                // Clear out the old markers.
                markers.forEach(function (marker) {
                    marker.setMap(null);
                });
                markers = [];
                // For each place, get the icon, name and location.
                var bounds = new google.maps.LatLngBounds();
                places.forEach(function (place) {
                    if (!place.geometry) {
                        console.log("Returned place contains no geometry");
                        return;
                    }
                    var icon = {
                        url: place.icon,
                        size: new google.maps.Size(100, 100),
                        origin: new google.maps.Point(0, 0),
                        anchor: new google.maps.Point(17, 34),
                        scaledSize: new google.maps.Size(25, 25)
                    };
                    // Create a marker for each place.
                    markers.push(new google.maps.Marker({
                        map: map,
                        icon: icon,
                        title: place.name,
                        position: place.geometry.location
                    }));
                    $('#latitude').val(place.geometry.location.lat());
                    $('#longitude').val(place.geometry.location.lng());
                    if (place.geometry.viewport) {
                        // Only geocodes have viewport.
                        bounds.union(place.geometry.viewport);
                    } else {
                        bounds.extend(place.geometry.location);
                    }
                });
                map.fitBounds(bounds);
            });
        }

        function handleLocationError(browserHasGeolocation, infoWindow, pos) {
            infoWindow.setPosition(pos);
            infoWindow.setContent(browserHasGeolocation ?
                'Error: فشل في تحديد الموقع حاول في وقت لاحق' :
                'Error: المتصفح الخاص بك لا يدعم الخرائط');
            infoWindow.open(map);
        }
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDPraQRuDWeIUxsjaCt_Q-l-MFe2snY2ds&libraries=places&callback=initAutocomplete&language=ar&region=EG
async defer"></script>
@endsection


