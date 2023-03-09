@push('css')
    <style>
        #map {
            height: 60vh;
            width: 100%;
        }

        .info.legend {
            background-color: white;
            padding: 1em;
        }

        .legend i {
            width: 18px;
            height: 18px;
            float: left;
            margin-right: 8px;
            opacity: 0.7;
        }
    </style>
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.10.2/themes/smoothness/jquery-ui.css" />
    <script src="https://code.jquery.com/jquery-1.9.1.js"></script>
    <script src="https://code.jquery.com/ui/1.10.2/jquery-ui.js"></script>
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
@endpush
@push('js')
    <!-- <script src="{{ asset('assets/js/custom/leaflet.js') }}"></script> -->
    
    <script type="text/javascript">
        $(function() {

            $("#slider-range").slider({
                range: true,
                min: new Date('2002-01-01').getFullYear(),
                max: new Date('2025-01-01').getFullYear(),
                // step: 2,
                values: [new Date('2003-01-01').getFullYear(), new Date('2022-01-01').getFullYear()],
                slide: function(event, ui) {
                    $("#date").val(ui.values[0] + " - " + ui.values[1]);
                }
            });

            $("#date").val($("#slider-range").slider("values", 0) + "-" + $("#slider-range").slider("values", 1));
        });


        // set map
        // set map
        var map = L.map('map').setView([0.0005512, 123.3319888], 4.5);
        L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 19,
            attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
        }).addTo(map);
        // url geojson
        var geoJsonUrl =
            "https://gist.githubusercontent.com/Sealorent/f9997b35f155423c15707844b6575031/raw/e10e3996b1599c3dc9b3adfbd2640b21df7b211b/boundary_kabupaten_indonesia.geojson";
        // var geoJsonUrl = "https://raw.githubusercontent.com/superpikar/indonesia-geojson/master/indonesia-province.json";

        // control layer
        let controlLayers = L.control.layers('', null, {
            collapsed: false
        }).addTo(map);
        // ajax base layer
        $.ajax({
            dataType: "json",
            url: geoJsonUrl,
        }).done(function(data) {
            var baseLayer = L.geoJson(data).addTo(map);
            controlLayers.addOverlay(baseLayer, 'Kabupaten/Kota');
            L.geoJson(data, {
                onEachFeature: function(feature, layer) {
                    // WADMKK = Kota
                    // WADMPR = Propinsi
                    layer.bindPopup(`<p> Kabupaten : ` + feature.properties.WADMKK +
                        `</p><p> Provinsi :` + feature.properties.WADMPR + `</p>`).addTo(baseLayer);
                }
            }).addTo(map);
            if (baseLayer != null) {
                $("#spinner").attr("hidden", true);
            }
        });

        // color
        function getColourPotensi(d) {
            if (d === 'Tinggi')
                return '#a40404';
            else if (d === 'Rendah')
                return '#80b918';
            else
                return 'white';
        }

        function getColorPotensi(param) {
            return {
                weight: 1,
                opacity: 1,
                color: 'white',
                dashArray: '3',
                fillOpacity: 0.7,
                fillColor: param == 'tinggi' ? '#a40404' : '#80b918',
            };
        }

        //legend
        var potensi = null;

        function getPotensi(result) {
            if (potensi != null) {
                map.removeLayer(potensi);
                legend.remove(potensi);
                controlLayers.removeLayer(potensi);
            }
            legend = L.control({
                position: 'bottomright'
            });
            legend.onAdd = function(map) {
                var div = L.DomUtil.create('div', 'info legend'),
                    grades = ['Tinggi', 'Rendah'],
                    labels = [];
                // loop through our density intervals and generate a label with a colored square for each interval
                for (var i = 0; i < grades.length; i++) {
                    div.innerHTML +=
                        '<i style="background:' + getColourPotensi(grades[i]) + '"></i> ' +
                        grades[i] + '<br>';
                }
                return div;
            };
            legend.addTo(map);

            $.ajax({
                dataType: "json",
                url: geoJsonUrl,
            }).done(function(data) {
                potensi = L.geoJson(data).addTo(map);
                controlLayers.addOverlay(potensi, 'Potensi');
                var layerGrou = L.geoJSON(data, {
                    onEachFeature: function(feature, layer) {
                        result.forEach(res => {
                            layer.bindPopup(`<p style=font-weight:bold;> ` + feature.properties
                                .WADMKK + `</p>`).addTo(potensi);
                            if (res.kota == feature.properties.WADMKK) {
                                var html = "";
                                layer.bindPopup(display(res)).addTo(potensi);
                                layer.setStyle(getColorPotensi(res.potensi));
                            }
                        });
                    },
                    weight: 1,
                });
                if (layerGrou != null) {
                    $("#spinner").attr("hidden", true);
                }
            });

        }

        function display(param) {
            var genotipe = "";
            param.collection_genotipe.forEach(e => {
                genotipe += `<p>` + e.genotipe.toString() + ` =` + e.jumlah.toString() + `</p>`;
            });
            html = `<div>
                    <h6 > Provinsi ` + param.provinsi + `</h6>
                    <p >` + param.kota + `</p>
                    <p >` + param.collection.tempat + `</p>
                    <p >Jumlah kasus =` + param.jumlah_kasus + `</p>
                    <h6 class="fw-bold">Genotipe dan Subtipe :</h6>
                    ` + genotipe + `
                    </div>`;
            return html;
        }


        function getPoint(result) {
            if (potensi != null) {
                map.removeLayer(potensi);
                legend.remove(potensi);
                controlLayers.removeLayer(potensi);
            }

            // function connectTheDots(data){
            //     var c = [];
            //     for(i in result) {
            //         c.push(result['latlong']);
            //     }
            //     return c;
            // }
            // L.polyline(connectTheDots).addTo(map)
            $("#spinner").attr("hidden", true);
            $.each(result, function(key, value) {
                const pointOptions = {
                    radius: 5,
                    stroke: false,
                    color: '#E65217',
                    weight: 20,
                    opacity: 1,
                    fill: true,
                    fillOpacity: 1
                }
                var marker = new L.circleMarker(value['latlong'], pointOptions);
                marker.addTo(map);
            });
        }

        // State Awal Area
        $(document).ready(function() {
            $.ajax({
                type: "get",
                url: "/stateAwalMaps",
            }).done(function(result) {
                if (result == '') {
                    alert('mohon maaf data yang anda cari belum tersedia');
                    $("#spinner").attr("hidden", true);
                    map.removeLayer(potensi);
                    legend.remove(potensi);
                    controlLayers.removeLayer(potensi);
                } else {
                    getPotensi(result);
                }

            });
        });

        var data = '';
        $("input").on("click", function() {
            data = $("input:checked").val();
        });

        $(".filter").on('click', function(event) {
            if (data.length == 0) {
                data = 'area';
            }
            $("#spinner").attr("hidden", false);
            var date = $("#date").val();
            $.ajax({
                type: "get",
                url: "/filter",
                data: {
                    date: $('#date').val(),
                    id_virus: $('#id_virus').val(),
                    select: data,
                    gender: $('#gender').val(),
                },
            }).done(function(result) {
                console.log(result);
                if (result == '') {
                    alert('mohon maaf data yang anda cari belum tersedia');
                    $("#spinner").attr("hidden", true);
                    map.removeLayer(potensi);
                    legend.remove(potensi);
                    controlLayers.removeLayer(potensi);
                } else {
                    if (data == 'area') {
                        getPotensi(result);
                    } else {
                        getPoint(result);
                    }
                }
            });

        });
    </script>
@endpush
