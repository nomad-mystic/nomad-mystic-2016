
<?php
/**
 * Created by Nomad_Mystic on 11/10/2015.
 */

//header('Content-Type: text/javascript');
require_once('constants.php');
require_once('functions.php');

?>


function init(json_data_1, json_data_2) {
     var ctx = document.getElementById("canvas").getContext("2d");
     var data = {
        labels: [
             '1980',
             '1981',
             '1982',
             '1983',
             '1984',
             '1985',
             '1986',
             '1987',
             '1988',
             '1989',
             '1990',
             '1991',
             '1992',
             '1993',
             '1994',
             '1995',
             '1996',
             '1997',
             '1998',
             '1999',
             '2000',
             '2001',
             '2002',
             '2003',
             '2004',
             '2005',
             '2006',
             '2007',
             '2008'

        ],
        datasets: [
             {
                  label: "My second dataset",
                  fillColor: "rgba(200,233,0,.50)",
                  strokeColor: "rgba(0,0,0,.5)",
                  pointColor: "#2F9099",
                  pointStrokeColor: "#000",
                  pointHighlightFill: "#fff",
                  pointHighlightStroke: "rgba(220,220,220,1)",
                  data: json_data_2

            },
             {
               label: "My First dataset",
                  fillColor: "rgba(197,0,100,.50)",
                  strokeColor: "rgba(0,0,0,.5)",
                  pointColor: "rgba(197,0,100,1)",
                  pointStrokeColor: "#000",
                  pointHighlightFill: "#fff",
                  pointHighlightStroke: "rgba(220,220,220,1)",
                  data: json_data_1
             }

        ]

    };
     var MyNewChart = new Chart(ctx).Line(data);
}

