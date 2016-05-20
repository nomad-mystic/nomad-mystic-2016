<?php
/**
 * Created by PhpStorm.
 * User: Nomad_Mystic
 * Date: 10/7/2015
 * Time: 3:25 PM
 */

$murder_rate_2012 = array(
     'theNorthEast' => array(
          array (
               'stateName' => 'Connecticut',
               'stateRate' => 146
          ),
          array (
               'stateName' => 'Maine',
               'stateRate' => 25
          ),
          array (
               'stateName' => 'Massachusetts',
               'stateRate' => 121
          ),
          array (
               'stateName' => 'New Jersey',
               'stateRate' => 388
          ),
          array (
               'stateName' => 'New Hampshire',
               'stateRate' => 15
          ),
          array (
               'stateName' => 'New York',
               'stateRate' => 684
          ),
           array (
                'stateName' => 'Pennsylvania',
                'stateRate' => 685
           ),
          array (
               'stateName' => 'Rhode Island',
               'stateRate' => 34
          ),
          array (
               'stateName' => 'Vermont',
               'stateRate' => 8
          )
     ),
     'theMidwest' => array(
          array (
               'stateName' => 'Illinois',
               'stateRate' => 744
          ),
          array (
               'stateName' => 'Indiana',
               'stateRate' => 310
          ),
          array (
               'stateName' => 'Michigan',
               'stateRate' => 689
          ),
          array (
               'stateName' => 'Ohio',
               'stateRate' => 495
          ),
          array (
               'stateName' => 'Wisconsin',
               'stateRate' => 173
          )
     ),
     'theWestNorthCentral' => array(
          array (
               'stateName' => 'Iowa',
               'stateRate' => 45
          ),
          array (
               'stateName' => 'Kansas',
               'stateRate' => 84
          ),
          array (
               'stateName' => 'Minnesota',
               'stateRate' => 99
          ),
          array (
               'stateName' => 'Missouri',
               'stateRate' => 389
          ),
          array (
               'stateName' => 'Nebraska',
               'stateRate' => 53
          ),
          array (
               'stateName' => 'North Dakota',
               'stateRate' => 28
          ),
          array (
               'stateName' => 'South Dakota',
               'stateRate' => 25
          )
     ),
     'theSouth' => array(
          array (
               'stateName' => 'Delaware',
               'stateRate' => 57
          ),
          array (
               'stateName' => 'District of Columbia',
               'stateRate' => 88
          ),
          array (
               'stateName' => 'Florida',
               'stateRate' => 1009
          ),
          array (
               'stateName' => 'Georgia',
               'stateRate' => 581
          ),
          array (
               'stateName' => 'Maryland',
               'stateRate' => 369
          ),
          array (
               'stateName' => 'North Carolina',
               'stateRate' => 479
          ),
          array (
               'stateName' => 'South Carolina',
               'stateRate' => 324
          ),
          array (
               'stateName' => 'Virginia',
               'stateRate' => 314
          ),
          array (
               'stateName' => 'West Virginia',
               'stateRate' => 72
          )
     ),
     'theEastSouthCentral' => array(
          array (
               'stateName' => 'Alabama',
               'stateRate' => 342
          ),
          array (
               'stateName' => 'Kentucky',
               'stateRate' => 195
          ),
          array (
               'stateName' => 'Mississippi',
               'stateRate' => 220
          ),
          array (
               'stateName' => 'Tennessee',
               'stateRate' => 388
          )
     ),
     'theSouthWestCentral' => array(
          array (
               'stateName' => 'Arkansas',
               'stateRate' => 173
          ),
          array (
               'stateName' => 'Louisiana',
               'stateRate' => 495
          ),
          array (
               'stateName' => 'Oklahoma',
               'stateRate' => 216
          ),
          array (
               'stateName' => 'Texas',
               'stateRate' => 1144
          )
     ),
     'theWest' => array(
          array (
               'stateName' => 'Arizona',
               'stateRate' => 358
          ),
          array (
               'stateName' => 'Colorado',
               'stateRate' => 162
          ),
          array (
               'stateName' => 'Idaho',
               'stateRate' => 29
          ),
          array (
               'stateName' => 'Montana',
               'stateRate' => 27
          ),
          array (
               'stateName' => 'Nevada',
               'stateRate' => 124
          ),
          array (
               'stateName' => 'New Mexico',
               'stateRate' => 116
          ),
          array (
               'stateName' => 'Utah',
               'stateRate' => 50
          ),
          array (
               'stateName' => 'Wyoming',
               'stateRate' => 14
          )
     ),
     'thePacific' => array(
          array (
               'stateName' => 'Alaska',
               'stateRate' => 30
          ),
          array (
               'stateName' => 'California',
               'stateRate' => 1884
          ),
          array (
               'stateName' => 'Hawaii',
               'stateRate' => 29
          ),
          array (
               'stateName' => 'Oregon',
               'stateRate' => 92
          ),
          array (
               'stateName' => 'Washington',
               'stateRate' => 206
          )
     )
);
echo json_encode($murder_rate_2012);





