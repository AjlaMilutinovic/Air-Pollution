<?php
include('database.php');
include ('logger.php');
session_start();
?>
<!doctype html>
<html>
<head>
    <title>
        Index
    </title>
    <link rel="stylesheet" href="styles.css">

    <meta charset="utf-8">
    <title>Earth globe</title>
    <script src="http://d3js.org/d3.v3.min.js"></script>
    <script src="http://d3js.org/topojson.v1.min.js"></script>
    <script src="http://d3js.org/queue.v1.min.js"></script>
    <style type="text/css">


        .water {
            fill: #750000;
            /*fill: #00248F;*/
        }

        .land {
            /*fill: #A98B6F;*/
            fill: #CBCBCB;
            /*stroke: #FFF;*/
            stroke: black;
            stroke-width: 0.7px;
        }

        .land:hover {
            /*fill:#33CC33;*/
            fill: black;
            stroke-width: 1px;
        }

        .focused {
            /*fill: #33CC33;*/
            fill: black;
            stroke:white;
        }

        /*select {*/
            /*position: absolute;*/
            /*top: 20px;*/
            /*left: 580px;*/
            /*border: solid #ccc 1px;*/
            /*padding: 3px;*/
            /*box-shadow: inset 1px 1px 2px #ddd8dc;*/
        /*}*/

        .countryTooltip {
            position: absolute;
            display: none;
            pointer-events: none;
            background: #fff;
            padding: 5px;
            text-align: left;
            border: solid #ccc 1px;
            color: #666;
            font-size: 14px;
            font-family: sans-serif;
        }

        .wrapper{
            width: 70%;
            margin: auto;
            height: 500px;
        }


    </style>


</head>
<body>

<h4>Sign In, Sign Out, Sign Up</h4>

    <?php if(!isset($_SESSION['user_id'])): ?>
        <li>
            <a href="UserSignIn.php">Sign In</a>
        <li><a href="UserSignUp.php">Sign Up</a></li>
        </li>
    <?php else: ?>

        <li><a href="UserSignOut.php">Sign Out</a></li>
    <?php endif; ?>

<?php if(!isset($_SESSION['user_id'])): ?>
    <h5>You are not logged in...</h5>
<?php else: ?>
    <h5>Welcome <?php echo $_SESSION['username'] ?></h5>
    <a href="profile.php?UserID=<?php $_SESSION['user_id'] ?>">Profile</a>
<?php endif; ?>


<div class="wrapper">
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

            var svg = d3.select(".wrapper").append("svg")
                .attr("width", width)
                .attr("height", height);

            //Adding water

            svg.append("path")
                .datum({type: "Sphere"})
                .attr("class", "water")
                .attr("d", path);

            var countryTooltip = d3.select(".wrapper").append("div").attr("class", "countryTooltip"),
                countryList = d3.select(".wrapper").append("select").attr("name", "countries");


            queue()
                .defer(d3.json, "world-110m.json")
                .defer(d3.tsv, "world-110m-country-names.tsv")
                .await(ready);

            //Main function

            function ready(error, world, countryData) {

                var countryById = {},
                    countries = topojson.feature(world, world.objects.countries).features;

                //Adding countries to select

                countryData.forEach(function(d) {
                    countryById[d.id] = d.name;
                    /*option = countryList.append("option");
                    option.text(d.name);
                    option.property("value", d.id);*/
                });

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
                        window.location.href = 'linksCities.php?CountryID=' + d.id;
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


    <h4>Read tables</h4>

    <a href="readCountries.php">View list of countries</a> <br>
    <a href="readCities.php">View list of cities</a> <br>
    <a href="readStations.php">View list of stations</a> <br>
    <a href="readMeasurments.php">View list of measurements</a> <br>

    <h4>Views</h4>

    <a href="views.php">View highest and lowest pollution indexes</a> <br>

<?php



if(isset($_SESSION['isAdmin'])) :
    if ($_SESSION['isAdmin']==1) :?>

<h4>Admin CRUD</h4>

<!--    <a href="editCountries.php">Countries - CREATE, EDIT, DELETE</a> <br>-->
<!--    <a href="editCities.php">Cities - CREATE, EDIT, DELETE</a> <br>-->
<!--    <a href="editStations.php">Stations - CREATE, EDIT, DELETE</a> <br>-->
<!--    <a href="editMeasurments.php">Measurements - CREATE, EDIT, DELETE</a> <br>-->

    <a href="adminPage.php">Admin Page</a>

<?php endif; endif; ?>

<h4>Detailed search</h4>
<a href="information.php"> Queries</a> <br>


    <h4>View measurement data for selected city: </h4>

    <?php
    $citiesQuery = "SELECT * FROM cities";
    $citiesList = mysqli_query($con, $citiesQuery);
    ?>

    <form action="ViewMeasurForCity.php" method="post">
        <table>

            <tr><td>Choose city</td>
                <td>
                    <select name="cit" id="CityFK">

                        <option value=""> Select a city </option>
                        <?php while( $cities = mysqli_fetch_assoc($citiesList)) { ?>
                            <option value="<?php echo $cities['CityName'] ?>"><?php echo $cities['CityName'] ?></option>
                        <?php } ?>
                    </select>
                </td>
            </tr>

            <tr><td></td>
                <td>
                    <button type="submit">Save</button>
                </td>
            </tr>
        </table>
    </form>

    <br><br><br><br><br><br>

</main>



</body>
</html>

<!--Clears the session from linksChangeCountry-->
<?php
if(isset($_SESSION['CountryID'])){

    $_SESSION['CountryID']=NULL;
}
?>