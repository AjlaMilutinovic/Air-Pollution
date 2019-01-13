<!DOCTYPE html>
<html>
<head>
    <title>AirHealth</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> <!-- for the twitter fb logos etc -->
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">  <!-- only way to use the w3.css framework -->
    <meta charset="utf-8">
    <script src="http://d3js.org/d3.v3.min.js"></script>
    <script src="http://d3js.org/topojson.v1.min.js"></script>
    <script src="http://d3js.org/queue.v1.min.js"></script>
    <link rel="stylesheet" href="style_earth.css">
</head>
<body>

<header>
    <div class="wrapper">
        <h1>AirHealth</h1>
        <nav>
            <ul>
                <li><a href="home.php">Home</a></li>
                <li><a href="about_us.php">About us</a></li>
                <li><a href="sign_in.php">Sign in</a></li>

            </ul>
        </nav>
    </div>
</header>
<main class="wrapper_main">

    <br>
    <br>
    <br>
    <br>
    <br>

    <div class="wrapper_earth">
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                var width = 600,
                    height = 500,
                    sens = 0.25,
                    focused;

                //Setting projection

                var projection = d3.geo.orthographic()
                    .scale(245)
                    .rotate([0, 0])
                    .translate([width / 2, height / 2])
                    .clipAngle(90);

                var path = d3.geo.path()
                    .projection(projection);

                //SVG container

                var svg = d3.select(".wrapper_earth").append("svg")
                    .attr("width", width)
                    .attr("height", height);

                //Adding water

                svg.append("path")
                    .datum({type: "Sphere"})
                    .attr("class", "water")
                    .attr("d", path);

                /*var countryTooltip = d3.select(".wrapper_earth").append("div").attr("class", "countryTooltip"),
                    countryList = d3.select(".wrapper_earth").append("select").attr("name", "countries");*/


                queue()
                    .defer(d3.json, "/test2/world-110m.json")
                    .defer(d3.tsv, "/test2/world-110m-country-names.tsv")
                    .await(ready);

                //Main function

                function ready(error, world, countryData) {

                    var countryById = {},
                        countries = topojson.feature(world, world.objects.countries).features;

                    //Adding countries to select

                    // countryData.forEach(function(d) {
                    //     countryById[d.id] = d.name;
                    //     option = countryList.append("option");
                    //     option.text(d.name);
                    //     option.property("value", d.id);
                    // });

                    //Drawing countries on the globe

                    var world = svg.selectAll("path.land")
                        .data(countries)
                        .enter().append("path")
                        .attr("class", "land")
                        .attr("d", path)

                        //Drag event

                        .call(d3.behavior.drag()
                            .origin(function() { var r = projection.rotate(); return {x: r[0] / sens, y: -r[1] / sens}; })
                            .on("drag", function() {
                                var rotate = projection.rotate();
                                projection.rotate([d3.event.x * sens, -d3.event.y * sens, rotate[2]]);
                                svg.selectAll("path.land").attr("d", path);
                                svg.selectAll(".focused").classed("focused", focused = false);
                            }))

                        //Mouse events

                        .on("mouseover", function(d) {
                            countryTooltip.text(countryById[d.id])
                                .style("left", (d3.event.pageX + 7) + "px")
                                .style("top", (d3.event.pageY - 15) + "px")
                                .style("display", "block")
                                .style("opacity", 1);
                        })
                        .on("mouseout", function(d) {
                            countryTooltip.style("opacity", 0)
                                .style("display", "none");
                        })
                        .on("mousemove", function(d) {
                            countryTooltip.style("left", (d3.event.pageX + 7) + "px")
                                .style("top", (d3.event.pageY - 15) + "px");
                        })
                        .on("click", function(d) {
                            window.location.href = 'cities.php?country_id=' + d.id;
                        });

                    //Country focus on option select

                    d3.select("select").on("change", function() {
                        var rotate = projection.rotate(),
                            focusedCountry = country(countries, this),
                            p = d3.geo.centroid(focusedCountry);

                        svg.selectAll(".focused").classed("focused", focused = false);

                        //Globe rotating

                        (function transition() {
                            d3.transition()
                                .duration(2500)
                                .tween("rotate", function() {
                                    var r = d3.interpolate(projection.rotate(), [-p[0], -p[1]]);
                                    return function(t) {
                                        projection.rotate(r(t));
                                        svg.selectAll("path").attr("d", path)
                                            .classed("focused", function(d, i) { return d.id == focusedCountry.id ? focused = d : false; });
                                    };
                                })
                        })();
                    });

                    function country(cnt, sel) {
                        for(var i = 0, l = cnt.length; i < l; i++) {
                            if(cnt[i].id == sel.value) {return cnt[i];}
                        }
                    };

                };
            });

        </script>
    </div>
    <img src="https://www.freelogodesign.org/Content/img/logo-ex-7.png" alt="logo">
</main>
</body>
<footer class="w3-container w3-padding-75 w3-center w3-opacity w3-xlarge">
    <i class="fa fa-facebook-official w3-hover-opacity"></i>
    <i class="fa fa-instagram w3-hover-opacity"></i>
    <i class="fa fa-snapchat w3-hover-opacity"></i>
    <i class="fa fa-twitter w3-hover-opacity"></i>
</footer>
</html>