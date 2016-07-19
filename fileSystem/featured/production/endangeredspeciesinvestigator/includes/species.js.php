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

//     $('#selectableArea .individualThumbItem').selectable({
//          selected: function(evnt, ui) {
//               evnt.preventDefault();
//               var $selected = ui.selected;
//               revelInfoBox($selected);
//          }
//     });

     function revelInfoBox(selectedElementId) {

//          var $selected_id = $selected.id;
          var $info_area = $('#js_info_area');
          var $found_item = $info_area.find('#panel-' + selectedElementId);
          var $find_visible = $info_area.find('.clicked');

          if (selectedElementId) {
               if (!$found_item.hasClass('clicked')) {
                    $find_visible.stop().velocity({
                         opacity: 0,
                         zIndex: 0
                    }, 200);
                    $find_visible.addClass('displayNone');
                    $find_visible.removeClass('clicked');

                    $found_item.stop().velocity({
                         opacity: 1,
                         zIndex: 100
                    }, 500);
                    $found_item.addClass('clicked');
                    $found_item.removeClass('displayNone');
               } else {
                    $found_item.stop().velocity({
                         opacity: 0,
                         zIndex: 0
                    }, 500);
                    $found_item.removeClass('clicked');
                    $found_item.addClass('displayNone');
               }
          } // End if($selected_id)
     } // End revelInfoBox()

     // building thumbnails
     var buildThumbnails = function() {
          $.get('data/animalRecords.json', function(data) {
               var selectableArea = $('#selectableArea');
               var chosenAnimals = $('.chosenAnimals').html();
               console.log(data);
               console.log(data.animals);
               console.log(chosenAnimals);
               var html = '';

               data.animals.forEach(function(animal) {
                    if (animal.type === chosenAnimals) {
                         html += '<div class="col-xs-6 col-sm-4 col-md-3 col-lg-3 individualThumbItem ui-state-default" id="' + animal.id + '">';
                         html += '     <div class="animalThumbnail">';
                         html += '<a href="#"><img class="img-responsive center-block" ' +
                                    'src="' + animal.thumb + '" ' +
                                    'alt="' + animal.scientific +'" ' +
                                    '></a>';
                         html += '</div>';
                         html += '</div><!--end col-->';
                    }
               });

               selectableArea.html(html);

               $('.individualThumbItem').on('click', function(evnt) {
                    console.log($(this).attr('id'));
                    evnt.preventDefault();
                    var selectedElementId = $(this).attr('id');
                    revelInfoBox(selectedElementId);
               });
          });
     };
     buildThumbnails();
 }); // End ready