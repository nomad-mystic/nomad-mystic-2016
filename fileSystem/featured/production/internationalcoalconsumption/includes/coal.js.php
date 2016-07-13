<?php
/**
 * Created by Nomad_Mystic on 11/10/2015.
 */

header('Content-Type: text/javascript');
require_once('constants.php');
require_once('functions.php');

?>
function init(json_data_1, json_data_2, validated_country_1, validated_country_2) {
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
                  label: validated_country_1,
                  backgroundColor: "rgba(197, 0, 100, .25)",
                  borderColor: "rgba(197,0,100, 1)",
                  borderWidth: 5,
                  pointBorderWidth: 8,
                  data: json_data_1
             },
             {
                  label: validated_country_2,
                  backgroundColor: "rgba(75, 192, 192, 0.25)",
                  borderColor: "rgba(75, 192, 192, 1)",
                  borderWidth: 5,
                  pointBorderWidth: 8,
                  pointBorderColor: 'rgba(75, 192, 192, 1)',
                  data: json_data_2
            }
        ]
     }; // end data
     var MyNewChart = new Chart.Line(ctx, {
          data: data
     });
} // end init

