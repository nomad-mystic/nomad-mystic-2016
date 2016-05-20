<?php
/**
 * Created by PhpStorm.
 * User: Nomad_Mystic
 * Date: 10/7/2015
 * Time: 3:25 PM
 */

$murder_rate_2011 = array(
     'theNorthEast' => array(
          array (
               'stateName' => 'Connecticut',
               'stateRate' => 129
          ),
          array (
               'stateName' => 'Maine',
               'stateRate' => 26
          ),
          array (
               'stateName' => 'Massachusetts',
               'stateRate' => 184
          ),
          array (
               'stateName' => 'New Jersey',
               'stateRate' => 380
          ),
          array (
               'stateName' => 'New Hampshire',
               'stateRate' => 16
          ),
          array (
               'stateName' => 'New York',
               'stateRate' => 769
          ),
           array (
                'stateName' => 'Pennsylvania',
                'stateRate' => 639
           ),
          array (
               'stateName' => 'Rhode Island',
               'stateRate' => 20
          ),
          array (
               'stateName' => 'Vermont',
               'stateRate' => 11
          )
     ),
     'theMidwest' => array(
          array (
               'stateName' => 'Illinois',
               'stateRate' => 781
          ),
          array (
               'stateName' => 'Indiana',
               'stateRate' => 306
          ),
          array (
               'stateName' => 'Michigan',
               'stateRate' => 617
          ),
          array (
               'stateName' => 'Ohio',
               'stateRate' => 500
          ),
          array (
               'stateName' => 'Wisconsin',
               'stateRate' => 138
          )
     ),
     'theWestNorthCentral' => array(
          array (
               'stateName' => 'Iowa',
               'stateRate' => 44
          ),
          array (
               'stateName' => 'Kansas',
               'stateRate' => 111
          ),
          array (
               'stateName' => 'Minnesota',
               'stateRate' => 75
          ),
          array (
               'stateName' => 'Missouri',
               'stateRate' => 366
          ),
          array (
               'stateName' => 'Nebraska',
               'stateRate' => 68
          ),
          array (
               'stateName' => 'North Dakota',
               'stateRate' => 24
          ),
          array (
               'stateName' => 'South Dakota',
               'stateRate' => 20
          )
     ),
     'theSouth' => array(
          array (
               'stateName' => 'Delaware',
               'stateRate' => 48
          ),
          array (
               'stateName' => 'District of Columbia',
               'stateRate' => 108
          ),
          array (
               'stateName' => 'Florida',
               'stateRate' => 984
          ),
          array (
               'stateName' => 'Georgia',
               'stateRate' => 549
          ),
          array (
               'stateName' => 'Maryland',
               'stateRate' => 399
          ),
          array (
               'stateName' => 'North Carolina',
               'stateRate' => 498
          ),
          array (
               'stateName' => 'South Carolina',
               'stateRate' => 320
          ),
          array (
               'stateName' => 'Virginia',
               'stateRate' => 304
          ),
          array (
               'stateName' => 'West Virginia',
               'stateRate' => 87
          )
     ),
     'theEastSouthCentral' => array(
          array (
               'stateName' => 'Alabama',
               'stateRate' => 299
          ),
          array (
               'stateName' => 'Kentucky',
               'stateRate' => 151
          ),
          array (
               'stateName' => 'Mississippi',
               'stateRate' => 232
          ),
          array (
               'stateName' => 'Tennessee',
               'stateRate' => 380
          )
     ),
     'theSouthWestCentral' => array(
          array (
               'stateName' => 'Arkansas',
               'stateRate' => 160
          ),
          array (
               'stateName' => 'Louisiana',
               'stateRate' => 506
          ),
          array (
               'stateName' => 'Oklahoma',
               'stateRate' => 212
          ),
          array (
               'stateName' => 'Texas',
               'stateRate' => 1130
          )
     ),
     'theWest' => array(
          array (
               'stateName' => 'Arizona',
               'stateRate' => 397
          ),
          array (
               'stateName' => 'Colorado',
               'stateRate' => 155
          ),
          array (
               'stateName' => 'Idaho',
               'stateRate' => 35
          ),
          array (
               'stateName' => 'Montana',
               'stateRate' => 29
          ),
          array (
               'stateName' => 'Nevada',
               'stateRate' => 139
          ),
          array (
               'stateName' => 'New Mexico',
               'stateRate' => 158
          ),
          array (
               'stateName' => 'Utah',
               'stateRate' => 50
          ),
          array (
               'stateName' => 'Wyoming',
               'stateRate' => 18
          )
     ),
     'thePacific' => array(
          array (
               'stateName' => 'Alaska',
               'stateRate' => 30
          ),
          array (
               'stateName' => 'California',
               'stateRate' => 1792
          ),
          array (
               'stateName' => 'Hawaii',
               'stateRate' => 20
          ),
          array (
               'stateName' => 'Oregon',
               'stateRate' => 84
          ),
          array (
               'stateName' => 'Washington',
               'stateRate' => 163
          )
     )
);
echo json_encode($murder_rate_2011);





