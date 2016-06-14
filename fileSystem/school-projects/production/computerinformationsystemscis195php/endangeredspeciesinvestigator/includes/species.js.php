<?php
/**
 * Created by PhpStorm.
 * User: Nomad_Mystic
 * Date: 12/3/2015
 * Time: 5:25 PM
 */

 header('Content-Type: text/javascript');

?>

$(document).ready(function() {

     $( "#selectableArea" ).selectable({
          selected: function(event, ui) {
               var $selected = ui.selected;

               revelInfoBox($selected);
          }
     });

     function revelInfoBox($selected) {
          var $selected_id = $selected.id;
          var $info_area = $('#js_info_area');
          var $found_item = $info_area.find('#panel' + $selected_id);
          var $find_visible = $info_area.find('.clicked');

          if ($selected_id) {
               if (!$found_item.hasClass('clicked')) {
                    $find_visible.stop().velocity({
                         opacity: 0
                    }, 200);
                    $find_visible.removeClass('clicked');

                    $found_item.stop().velocity({
                         opacity: 1
                    }, 500);
                    $found_item.addClass('clicked');
               } else {
                    $found_item.stop().velocity({
                         opacity: 0
                    }, 500);
                    $found_item.removeClass('clicked');
               }
          } // End if($selected_id)
     } // End revelInfoBox()
 }); // End ready