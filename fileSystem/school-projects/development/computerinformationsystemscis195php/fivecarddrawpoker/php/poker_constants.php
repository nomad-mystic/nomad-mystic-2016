<?php
/**
 * Created by PhpStorm.
 * User: Nomad_Mystic
 * Date: 11/4/2015
 * Time: 1:32 AM
 */
////////////Style
const CARD_IMAGE_PERCENT = '95%';
const HAND_PADDING = '8px';
const POKER_FONT = <<<POKER
     font-family: Impact, "Chaparral Pro";
     padding: .5em 1.5em ;
     font-size: 2em;

POKER;

//Choice and scores
const MAX_CHOICE = 32;

const CHOICE_GROUPED_HAND_FIELD = 0;
const CHOICE_EXPECTED_RETURN_FIELD = 1;
const CHOICE_NAME_FILED = 2;
const CHOICE_KEEP_FILED = 3;
const CHOICE_KEEP_NUMBER_FILED = 4;
const CHOICE_KEEP_BIT_FILED = 5;

const SCORES_GROUPED_HAND_FIELD = 0;
const SCORES_EXPECTED_RETURN_FIELD = 1;
const SCORES_NAME_FIELD = 2;

///////////////////////////////////
const IMAGES = 'images/';
const INCLUDES = 'includes/';
const CARD_BACK = IMAGES . 'back.png';
const CARD_BLANK = IMAGES . 'blank.png';
const HOLD_IMAGE = IMAGES . 'hold.png';


const RANK_COUNT = 13;
const SUIT_COUNT = 4;

///////////////////////////////
const RANK_FIELD = 0;
const SUIT_FIELD = 1;
const RANK_NAMES = [
     'ace',
     '2',
     '3',
     '4',
     '5',
     '6',
     '7',
     '8',
     '9',
     '10',
     'jack',
     'queen',
     'king'
];

const SHORT_RANK_NAMES = [
     'A',
     '2',
     '3',
     '4',
     '5',
     '6',
     '7',
     '8',
     '9',
     'T',
     'J',
     'Q',
     'K',
     'A'
];

const SUIT_NAMES = [

     'clubs',
     'diamonds',
     'hearts',
     'spades'
];

//////////////////////

/////////////Form Constants
const HAND_KEY = 'hand';
const DECK_KEY = 'deck';
const CARD_KEY = 'card';

const KEEP = 'keep';
const DRAW = 'draw';

const CARD_CLASS = 'card_image';
const FINAL_KEY = 'final';

const BALANCE_KEY = 'balance';
const HANDS_PLAYED_KEY = 'hands_played';
const HOLD_KEY = 'hold';

///data attributes
const CARD_ID = 'data-id';
const CARD_SRC = 'data-src';

////hand constants
const HAND_CARDS = 5;

const NOTHING = 'No Pair';
const PAIR_JACKS = 'pair of Jacks or higher';
const LOW_PAIR = 'One Pair, Less than Jacks';
const TWO_PAIR = 'Two Pair';
const TRIPS = 'Three of a Kind';
const STRAIGHT = 'Straight';
const FLUSH = 'Flush';
const BOAT = 'Full House';
const QUADS = 'four of Kind';
const STRAIGHT_FLUSH = 'Straight flush';
const ROYAL_FLUSH = 'royal Flush';

///Payout
const PAYOFFS = [
     NOTHING => 0,
     LOW_PAIR => 0,
     PAIR_JACKS => 1,
     TWO_PAIR => 2,
     TRIPS => 3,
     STRAIGHT => 4,
     FLUSH => 6,
     BOAT => 9,
     QUADS => 25,
     STRAIGHT_FLUSH => 50,
     ROYAL_FLUSH => 800
];









