<?php
/**
 * Created by PhpStorm.
 * User: Nomad_Mystic
 * Date: 11/4/2015
 * Time: 1:35 AM
 */


function make_deck() {

     $deck = [];
     for($rank = 0; $rank < RANK_COUNT; $rank++) {
          for($suit = 0; $suit < SUIT_COUNT; $suit++) {
               $deck[] = [$rank, $suit];
          }
     }
     shuffle($deck);

     return $deck;
}

function deal(&$deck) {

     if (get_session_value(FINAL_KEY) === '' || get_session_value(FINAL_KEY)) {
          $hand = array_slice($deck, 0, HAND_CARDS);
          $deck = array_slice($deck, HAND_CARDS);
          set_session_value(HAND_KEY, $hand);
          set_session_value(DECK_KEY, $deck);
          set_session_value(FINAL_KEY, FALSE);
          set_session_value(HANDS_PLAYED_KEY, (get_session_value(HANDS_PLAYED_KEY) + 1));
          set_session_value(BALANCE_KEY, (get_session_value(BALANCE_KEY) - 1));
          save_session();
          return $hand;
     }
     $hand = get_session_value(HAND_KEY);
     $deck = get_session_value(DECK_KEY);
     return $hand;
}

function show_hand($hand) {
     echo '<div id="hand">' . "\n";
     for ($card = 0; $card < HAND_CARDS; $card++) {
          show_card($hand[$card], $card);

     }
     echo '</div>' . "\n";
}

function show_user()
{
     $balance = get_session_value(BALANCE_KEY);
     $hands_played = get_session_value(HANDS_PLAYED_KEY);
     if ($hands_played !== '' && $hands_played !== 0) {
          $expected = number_format($balance / $hands_played, 4);
     } else {
          $expected = 'UNKNOWN';
     }

     echo '<div id="user_pane">' . "\n";
     echo      get_session_value(SESSION_USER_KEY) . ' [<a id="logout" href="' . LOGOUT_PAGE . '">LOGOUT</a>]' . "<br>\n";
     echo '    BALANCE: ' . colored_number($balance) . "<br>\n";
     echo '    HANDS PLAYED: ' . $hands_played . "<br>\n";
     echo '    EXPECTED RETURN: ' . colored_number($expected) . ' UNITS/HAND';
     echo '</div>' . "\n";
}

function colored_number($number)
{
     return '<span style="color: ' . ($number < 0 ? "red" : "green") . ';">' . $number . '</span>';
}

function show_card($card, $id)
{

     echo '<div class="card" ';
     echo ' ' . CARD_ID . '="' . $id . '"' . "\n";
     echo '>' . "\n";
     echo '          <img class="card_image"';

     echo 'src="' . card_name($card) . '"';
     echo '>' . "\n";
     echo '                 <img class="hold_image"';
     echo ' id="' . HOLD_KEY . $id . '"';
     echo ' src="' . HOLD_IMAGE . '">' . "\n";
     echo '</div>' . "\n";

}

function card_name($card)
{
     $ranks = RANK_NAMES;
     $suit = SUIT_NAMES;
     return IMAGES . $ranks[$card[RANK_FIELD]] . '_of_' . $suit[$card[SUIT_FIELD]] . '.png';
}

function show_draw_button()
{
     echo '<div id="info">' . "\n";
     echo '    <span id="draw_button">Draw</span>' . "\n";
     echo '</div>' . "\n";
}
function show_type($hand)
{
     $type = hand_type($hand);
     $payoffs = PAYOFFS;
     $payoff = $payoffs[$type];

     echo '<div id="info">' . "\n";
     echo '    <span id="hand_type">' . $type . '</span>' . "\n";
     echo '    <span id="payoff" style="color: ' . ($payoff > 0 ? "green" : "red") . '">Payoff: ' . $payoff . '</span>' . "\n";
     echo '</div>' . "\n";
}

function show_content($hand, $final=FALSE)
{
     echo '<div id="content">' . "\n";
     show_hand($hand);
     if ($final) {
          show_type($hand);
          echo '<div id="redraw_button">Redraw</div>';
     } else {
          show_draw_button();
     }
     echo '</div>';
}

function output_form($hand, $deck)
{

     echo '<form method="POST" action="draw.php" id="draw_form">' . "\n";
//     echo '    <input type="hidden" name="' . HAND_KEY . '" value="' . urlencode(json_encode($hand)) . '">' . "\n";
//     echo '    <input type="hidden" name="' . DECK_KEY . '" value="' . urlencode(json_encode($deck)) . '">' . "\n";


     for ($card = 0; $card < HAND_CARDS; $card++) {
          echo '    <input type="hidden" name="' . CARD_KEY . $card . '" id="' . CARD_KEY . $card . '" value="' . KEEP . '">' . "\n";
     }
     echo '</form>';
}
function draw_cards(&$hand, &$deck)
{
     if (get_session_value(FINAL_KEY)) {
          return;
     }
     for ($card = 0; $card < HAND_CARDS; $card++) {
          $draw = $_POST[CARD_KEY . $card];
          if ($draw === DRAW) {
               $hand[$card] = $deck[0];
               $deck = array_slice($deck, 1);
          }
     }
     $type = hand_type($hand);
     $payoffs = PAYOFFS;
     set_session_value(BALANCE_KEY, get_session_value(BALANCE_KEY) + $payoffs[$type]);
     set_session_value(HAND_KEY, $hand);
     set_session_value(DECK_KEY, $deck);
     set_session_value(FINAL_KEY, TRUE);
     save_session();
}

function  grouped_hand($hand)
{
     $suits = [[], [], [], []];
     foreach ($hand as $card) {
          if ($card[RANK_FIELD] === 0){
               $suits[$card[SUIT_FIELD]][] = [13, $card[SUIT_FIELD]];
          } else {
               $suits[$card[SUIT_FIELD]][] = $card;
          }
     }
     foreach ($suits as &$suit) {
          rsort($suit);
     }
     usort($suits, function($v1, $v2) {
          $l1 = count($v1);
          $l2 = count($v2);

          if ($l1 < $l2) {
               return 1;
          }
          if ($l2 < $l1) {
               return -1;
          }
          for ($i=0; 1 < $l1; $i++) {
               if ($v1[$i][RANK_FIELD] < $v2[$i][RANK_FIELD]) {
                    return 1;
               }
               if ($v2[$i][RANK_FIELD] < $v1[$i][RANK_FIELD]) {
                    return -1;
               }
          }
          return 0;
     });
     $groups = array_map(function($group){
          $names = array_map(function($card) {
               $rank_names = SHORT_RANK_NAMES;
               return $rank_names[$card[RANK_FIELD]];
          }, $group);
          return join("", $names);
     }, $suits);
     $filtered = array_filter($groups, function($group) {
          return strlen($group) > 0;
     });
     $grouped = '(' . join(")(", $filtered) . ')';
     return $grouped;
}

function generate_choices($hand)
{
     $choices = [];
     $grouped_hands = [];
     for ($choice_bits = 0; $choice_bits < MAX_CHOICE; $choice_bits++) {
        $keep = [];
          if ($choice_bits & 1) $keep[] = $hand[0];
          if ($choice_bits & 2) $keep[] = $hand[1];
          if ($choice_bits & 4) $keep[] = $hand[2];
          if ($choice_bits & 8) $keep[] = $hand[3];
          if ($choice_bits & 16) $keep[] = $hand[4];
          $group = grouped_hand($keep);
          $choice = [$group, 0, "", $keep, count($keep), $choice_bits];
          $grouped_hands[] = $group;
          $choices[] = $choice;
     }
     $group_where = "'" . join("', '", $grouped_hands) . "'";
     $query = <<<QUERY
SELECT draw_values.grouped_hand, expected_return, name
FROM draw_values
LEFT JOIN interesting_hands
ON draw_values.grouped_hand = interesting_hands.grouped_hand
WHERE draw_values.grouped_hand IN ($group_where);
QUERY;

     $db = new mysqli(DB_SERVER, DB_USER, DB_PASSWORD, DB_DATABASE);
     $result = $db->query($query);
     $scores = $result->fetch_all(MYSQLI_NUM);
     $scores_assoc = [];
//     var_dump($scores);

     foreach($scores as $score) {
          $scores_assoc[$score[SCORES_GROUPED_HAND_FIELD]] = $score;
     }
//     foreach ($choices as &$choice) {
//          $score = $scores_assoc[$choice[CHOICE_GROUPED_HAND_FIELD]];
//          $choice[CHOICE_EXPECTED_RETURN_FIELD] = $score[SCORES_EXPECTED_RETURN_FIELD];
//          $choice[CHOICE_NAME_FILED] = $score[SCORES_NAME_FIELD];
//     }
//     var_dump($choices);
     return $choices;
}

function show_choices($choices)
{
     echo '<div id="choices">' . "\n";
     foreach ($choices as $choice) {
          if ($choice[CHOICE_NAME_FILED]) {
               echo $choice[CHOICE_GROUPED_HAND_FIELD] . " " . $choice[CHOICE_NAME_FILED] . "<br>";
               echo $choice[CHOICE_EXPECTED_RETURN_FIELD];
          }
     }
     echo '</div>' . "\n";
}
function output_choices($hand)
{
     $choices = generate_choices($hand);
     show_choices($choices);
}