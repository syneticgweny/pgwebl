@extends('layout.template')

@section('styles')
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
        integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/leaflet.draw/1.0.4/leaflet.draw.css">

    <link rel="stylesheet" href="https://unpkg.com/leaflet-routing-machine@latest/dist/leaflet-routing-machine.css" />


    <style>
        #map {
            width: 100%;
            height: calc(100vh - 56px);
        }
    </style>
@endsection

@section('content')
    <div id="map"></div>

    <!-- Modal Create Point-->
    <div class="modal fade" id="CreatePointModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Create Point</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="POST" action="{{ route('points.store') }}" enctype="multipart/form-data">
                    <div class="modal-body">
                        @csrf

                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control" id="name" name="name"
                                placeholder="Fill point name">
                        </div>

                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea class="form-control" id="description" name="description" rows="3"></textarea>
                        </div>

                        <div class="mb-3">
                            <label for="geom_point" class="form-label">Geometry</label>
                            <textarea class="form-control" id="geom_point" name="geom_point" rows="3"></textarea>
                        </div>

                        <div class="mb-3">
                            <label for="image" class="form-label">Photo</label>
                            <input type="file" class="form-control" id="image_point" name="image"
                                onchange="document.getElementById('preview-image-point').src = window.URL.createObjectURL(this.files[0])">
                            <img src="" alt="" id="preview-image-point" class="img-thumbnail"
                                width="400">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal Create Polyline-->
    <div class="modal fade" id="CreatePolylineModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Create Polyline</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="POST" action="{{ route('polylines.store') }}" enctype="multipart/form-data">
                    <div class="modal-body">
                        @csrf

                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control" id="name" name="name"
                                placeholder="Fill polyline name">
                        </div>

                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea class="form-control" id="description" name="description" rows="3"></textarea>
                        </div>

                        <div class="mb-3">
                            <label for="geom_polyline" class="form-label">Geometry</label>
                            <textarea class="form-control" id="geom_polyline" name="geom_polyline" rows="3"></textarea>
                        </div>

                        <div class="mb-3">
                            <label for="image" class="form-label">Photo</label>
                            <input type="file" class="form-control" id="image_polyline" name="image"
                                onchange="document.getElementById('preview-image-polyline').src = window.URL.createObjectURL(this.files[0])">
                            <img src="" alt="" id="preview-image-polyline" class="img-thumbnail"
                                width="400">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal Create Polygons-->
    <div class="modal fade" id="CreatePolygonsModal" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Create Polygon</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="POST" action="{{ route('polygons.store') }}" enctype="multipart/form-data">
                    <div class="modal-body">
                        @csrf

                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control" id="name" name="name"
                                placeholder="Fill polygons name">
                        </div>

                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea class="form-control" id="description" name="description" rows="3"></textarea>
                        </div>

                        <div class="mb-3">
                            <label for="geom_polygon" class="form-label">Geometry</label>
                            <textarea class="form-control" id="geom_polygon" name="geom_polygon" rows="3"></textarea>
                        </div>

                        <div class="mb-3">
                            <label for="image" class="form-label">Photo</label>
                            <input type="file" class="form-control" id="image_polygon" name="image"
                                onchange="document.getElementById('preview-image-polygon').src = window.URL.createObjectURL(this.files[0])">
                            <img src="" alt="" id="preview-image-polygon" class="img-thumbnail"
                                width="400">
                        </div>

                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
        integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet.draw/1.0.4/leaflet.draw.js"></script>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

    <script src="https://unpkg.com/@terraformer/wkt"></script>

    <script src="https://unpkg.com/leaflet-routing-machine@latest/dist/leaflet-routing-machine.js"></script>

    <script>
        var map = L.map('map').setView([-5.065273384634835, 104.89055766392508], 9);

        L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);

        // GeoJSON Admin Lampung
        var adminLampung = L.geoJson(null, {
            style: {
                color: "#3388ff",
                weight: 2,
                opacity: 1,
                fillOpacity: 0.2
            },
            onEachFeature: function(feature, layer) {
                if (feature.properties && feature.properties.name) {
                    layer.bindTooltip(feature.properties.name);
                }
            }
        });

        $.getJSON("{{ asset('storage/geojson/AdminLampung.geojson') }}", function(data) {
            adminLampung.addData(data);
            map.addLayer(adminLampung);
        });


        /* Digitize Function */
        var drawnItems = new L.FeatureGroup();
        map.addLayer(drawnItems);

        var drawControl = new L.Control.Draw({
            draw: {
                position: 'topleft',
                polyline: true,
                polygon: true,
                rectangle: true,
                circle: true,
                marker: true,
                circlemarker: true
            },
            edit: false
        });

        map.addControl(drawControl);

        map.on('draw:created', function(e) {
            var type = e.layerType,
                layer = e.layer;

            console.log(type);

            var drawnJSONObject = layer.toGeoJSON();
            var objectGeometry = Terraformer.geojsonToWKT(drawnJSONObject.geometry);

            console.log(drawnJSONObject);
            // console.log(objectGeometry);

            if (type === 'polyline') {
                $('#geom_polyline').val(objectGeometry);
                $('#CreatePolylineModal').modal('show');
                console.log("Create " + type);

            } else if (type === 'polygon' || type === 'rectangle') {
                $('#geom_polygon').val(objectGeometry);
                $('#CreatePolygonsModal').modal('show');
                console.log("Create " + type);

            } else if (type === 'marker') {
                console.log("Create " + type);

                $('#geom_point').val(objectGeometry);

                // nanti memunculkan modal create marker
                $('#CreatePointModal').modal('show');
            } else {
                console.log('_undefined_');
            }

            drawnItems.addLayer(layer);
        });

        // GeoJSON Point
        var point = L.geoJson(null, {
            onEachFeature: function(feature, layer) {

                var routeedit = "{{ route('points.edit', ':id') }}";
                routeedit = routeedit.replace(':id', feature.properties.id);

                var popupContent = "<strong>Nama:</strong> " + feature.properties.name + "<br>" +
                    "<strong>Deskripsi:</strong> " + feature.properties.description + "<br>" +
                    "<strong>Dibuat:</strong> " + feature.properties.created_at + "<br>" +
                    "<img src='{{ asset('storage/images') }}/" + feature.properties.image +
                    "' width='200' alt=''>" + "<br>" +
                    "<div class='row mt-4'>" +
                    "<div class='col-6 text-end'>" +
                    "<a href='" + routeedit +
                    "'  class='btn btn-sm btn-warning'><i class='fa-solid fa-pen-to-square'></i></a>" +
                    "</div>" +
                    "<div class='col-6'>" +
                    "<form method='POST' action='{{ url('points') }}/" + feature.properties.id + "'>" +
                    '{{ csrf_field() }}' + '@method('DELETE')' +
                    "<button type='submit' class= 'btn btn-sm btn-danger' onclick='return confirm(`Yakin akan dihapus?`)'><i class='fa-solid fa-trash'></i></button>" +
                    "</form>" +
                    "</div>" +
                    "</div>" + "<br>" + "<p>Dibuat Oleh: " + feature.properties.user_created + "</p>";

                layer.on({
                    click: function(e) {
                        // Tampilkan popup
                        layer.bindPopup(popupContent).openPopup();

                        // Ambil lokasi pengguna dan buat rute
                        navigator.geolocation.getCurrentPosition(function(position) {
                            var userLatLng = L.latLng(position.coords.latitude, position
                                .coords.longitude);
                            var tujuan = e.latlng;

                            // Hapus routing sebelumnya jika ada
                            if (typeof window.routingControl !== "undefined" && window
                                .routingControl !== null) {
                                map.removeControl(window.routingControl);
                            }

                            // Buat routing baru
                            window.routingControl = L.Routing.control({
                                waypoints: [
                                    userLatLng,
                                    tujuan
                                ],
                                routeWhileDragging: false,
                                draggableWaypoints: false,
                                addWaypoints: false,
                                createMarker: function(i, wp) {
                                    return L.marker(wp.latLng).bindPopup(i ===
                                        0 ? "Anda" : feature.properties.name
                                        );
                                }
                            }).addTo(map);
                        }, function() {
                            alert("Gagal mendapatkan lokasi pengguna.");
                        });
                    },
                    mouseover: function(e) {
                        layer.bindTooltip(feature.properties.name);
                    },
                });
            },
        });
        $.getJSON("{{ route('api.points') }}", function(data) {
            point.addData(data);
            map.addLayer(point);
        });

        // Fungsi untuk mencari lokasi pengguna dan membuat rute ke tujuan (misalnya, pantai)
        map.locate({
            setView: true,
            maxZoom: 9
        });

        map.on('locationfound', function(e) {
            // Lokasi pengguna (koordinat saat ini)
            var userLatLng = e.latlng;

            // Titik tujuan: ganti koordinat ini dengan titik pantai tujuan
            layer.on('click', function(e) {
                var tujuanPantai = e.latlng; // atau dari geometry GeoJSON
                // Panggil ulang routing di sini
            });


            // Tampilkan marker pengguna
            L.marker(userLatLng).addTo(map).bindPopup("Lokasi Anda").openPopup();

            // Routing dari lokasi pengguna ke tujuan
            L.Routing.control({
                waypoints: [
                    userLatLng,
                    tujuanPantai
                ],
                routeWhileDragging: false,
                show: false,
                createMarker: function(i, wp, nWps) {
                    return L.marker(wp.latLng, {
                        draggable: false
                    }).bindPopup(i === 0 ? "Awal (Anda)" : "Tujuan (Pantai)");
                }
            }).addTo(map);
        });

        map.on('locationerror', function(e) {
            alert("Lokasi tidak ditemukan. Pastikan izin lokasi diaktifkan.");
        });


        // GeoJSON Polylines
        var polylines = L.geoJson(null, {
            onEachFeature: function(feature, layer) {

                var routeedit = "{{ route('polylines.edit', ':id') }}";
                routeedit = routeedit.replace(':id', feature.properties.id);

                var popupContent = "Nama: " + feature.properties.name + "<br>" +
                    "Deskripsi: " + feature.properties.description + "<br>" +
                    "Panjang: " + feature.properties.length_km.toFixed(2) + "km<br>" +
                    "Dibuat: " + feature.properties.created_at + "<br>" +
                    "<img src='{{ asset('storage/images') }}/" + feature.properties.image + "' width='200'>" +
                    "<br>" +
                    "<div class='row mt-4'>" +
                    "<div class='col-6 text-end'>" +
                    "<a href='" + routeedit +
                    "'  class='btn btn-sm btn-warning'><i class='fa-solid fa-pen-to-square'></i></a>" +
                    "</div>" +
                    "<div class='col-6'>" +
                    "<form method='POST' action='{{ url('polylines') }}/" + feature.properties.id + "'>" +
                    '{{ csrf_field() }}' + '@method('DELETE')' +
                    "<button type='submit' class= 'btn btn-sm btn-danger' onclick='return confirm(`Yakin akan dihapus?`)'><i class='fa-solid fa-trash'></i></button>" +
                    "</form>" +
                    "</div>" +
                    "</div>" + "<br>" + "<p>Dibuat Oleh: " + feature.properties.user_created + "</p>";
                layer.on({
                    click: function(e) {
                        polylines.bindPopup(popupContent);
                    },
                    mouseover: function(e) {
                        polylines.bindTooltip(feature.properties.name);
                    },
                });
            },
        });
        $.getJSON("{{ route('api.polylines') }}", function(data) {
            polylines.addData(data);
            map.addLayer(polylines);
        });

        // GeoJSON Polygons
        var polygons = L.geoJson(null, {
            onEachFeature: function(feature, layer) {

                var routeedit = "{{ route('polygons.edit', ':id') }}";
                routeedit = routeedit.replace(':id', feature.properties.id);

                var popupContent = "Nama: " + feature.properties.name + "<br>" +
                    "Deskripsi: " + feature.properties.description + "<br>" +
                    "Luas: " + feature.properties.area_km2.toFixed(2) + "km<sup>2</sup><br>" +
                    "Dibuat: " + feature.properties.created_at + "<br>" +
                    "<img src='{{ asset('storage/images') }}/" + feature.properties.image + "' width='200'>" +
                    "<br>" +
                    "<div class='row mt-4'>" +
                    "<div class='col-6 text-end'>" +
                    "<a href='" + routeedit +
                    "'  class='btn btn-sm btn-warning'><i class='fa-solid fa-pen-to-square'></i></a>" +
                    "</div>" +
                    "<div class='col-6'>" +
                    "<form method='POST' action='{{ url('polygons') }}/" + feature.properties.id + "'>" +
                    '{{ csrf_field() }}' + '@method('DELETE')' +
                    "<button type='submit' class= 'btn btn-sm btn-danger' onclick='return confirm(`Yakin akan dihapus?`)'><i class='fa-solid fa-trash'></i></button>" +
                    "</form>" +
                    "</div>" +
                    "</div>" + "<br>" + "<p>Dibuat Oleh: " + feature.properties.user_created + "</p>";
                layer.on({
                    click: function(e) {
                        polygons.bindPopup(popupContent);
                    },
                    mouseover: function(e) {
                        polygons.bindTooltip(feature.properties.name);
                    },
                });
            },
        });
        $.getJSON("{{ route('api.polygons') }}", function(data) {
            polygons.addData(data);
            map.addLayer(polygons);
        });
    </script>
@endsection

</html>
