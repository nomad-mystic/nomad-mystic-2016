<?php
/**
 * Created by PhpStorm.
 * User: Nomad_Mystic
 * Date: 4/7/2016
 * Time: 10:02 PM
 */

require_once('assets/includes/constants.php');

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>The Pie Chart Maker</title>

    <link rel="stylesheet" href="assets/jquery-ui/overcast/jquery-ui.min.css">
    <link rel="stylesheet" href="assets/jquery-ui/overcast/theme.css">
    <link rel="stylesheet" href="assets/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/flatUI/dist/css/flat-ui.min.css">
    <!--my styles-->
    <link rel="stylesheet" href="assets/includes/pie_builder.css.php">

</head>
<body>

<section id="introductionToProjectSection">
    <div class="container">
        <article>
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <h3>You can use this dialog to create a dynamic pie chart from your input!</h3>
                    <div id="show_dialog_button">
                        <a class="btn btn-primary" data-toggle="modal" href="#pieChartModal">Create Pie Chart</a>
                    </div>
                </div>
            </div>
        </article>
    </div>
</section><!--end introductionToProjectSection-->

<section id="pie_chart_dialog">
<div class="modal fade" id="pieChartModal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Create a Dynamic Pie Chart</h4>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <div class="row">
                        <section class="user-form">
                            <div class="col-sm-6">
                                <fieldset id="<?php echo CHART_INPUTS; ?>">
                                    <legend>Create Your Chart:</legend>
                                    <div class="form-group">
                                        <label for="<?php echo NUMBER_OF_SLICES; ?>" class="label">Number of Slices?</label>
                                        <input type="number" name="<?php echo NUMBER_OF_SLICES; ?>" min="1" max="4"
                                               id="<?php echo NUMBER_OF_SLICES; ?>" class="form-control">
                                    </div>
                                    <!--Input Fields Added by Javascript-->
                                    <article class="input_fields"></article>
                                </fieldset>
                            </div>
                        </section>
                        <section id="canvas_parent">
                            <div class="col-sm-6">
                                <canvas id="<?php echo CHART_OUTPUT; ?>" width="350px" height="350px" class="center-block"></canvas>
                                <h2 class="<?php echo CHART_TITLE; ?>"></h2>
                            </div>
                        </section>
                    </div><!--end .row-->
                </div><!--end Container-->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary buildChartModalButton">Build Chart</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
</section>

<!--jquery jquery-ui and other libraries-->
<script src="assets/jquery/jquery.min.js"></script>
<script src="assets/jquery-ui/jquery-ui.min.js"></script>
<script src="assets/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="assets/chart_js/Chart.js"></script>
<!--my scripts-->
<script src="assets/includes/pie_builder.js.php"></script>
</body>
</html>
