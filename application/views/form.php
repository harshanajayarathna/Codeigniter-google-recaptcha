<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Welcome to Google Recaptcha</title>
        <link rel="stylesheet" href="<?php echo base_url() ?>bower_components/boostrap/dist/css/bootstrap.min.css" />
        <link rel="stylesheet" href="<?php echo base_url() ?>bower_components/custom/css/app.css" />

    </head>
    <body>

        <div class="container">
            <div class="row">
                <div class="col-md-12">

                    <div class="bd-callout bd-callout-info">
                        <h2>Google Recaptcha</h2>
                    </div>
                </div>        
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="alert alert-danger print-error-msg" style="display:none"> </div>
                    <div class="alert alert-success print-success-msg" style="display:none"> </div>
                </div>
            </div>
            <div class="row">

                <div class="col-md-12">
                    <form id="form">
                        <div class="form-group">
                            <?php echo $recaptcha; ?>
                        </div>

                        <div class="form-group">
                            <div style="text-align: right">

                                <input type="submit" class="btn btn-success" name="submit" value="Submit"/>

                            </div>
                        </div>
                    </form>
                </div>

            </div>

        </div>


        <script type="text/javascript" src="<?php echo base_url() ?>bower_components/jquery/dist/jquery.min.js" ></script>
        <script type="text/javascript" src="<?php echo base_url() ?>bower_components/boostrap/dist/js/bootstrap.min.js" ></script>

        <script src='<?php echo $this->config->item('GOOGLE_CLIENT_API'); ?>'></script>


        <script>
            $('#form').on('submit', function (e) {
                e.preventDefault();

                var google_recaptcha = '';
                google_recaptcha = grecaptcha.getResponse();
                $.ajax({
                    type: "POST",
                    url: "<?php echo base_url(); ?>form/save",
                    //data: $(this).serialize(),
                    data: {recaptcha: google_recaptcha},
                    dataType: "json",
                    success: function (data) {

                        if ($.isEmptyObject(data.error)) {

                            $(".print-error-msg").css('display', 'none');
                            $(".print-success-msg").css('display', 'block');
                            $(".print-success-msg").html(data.success);
                            setTimeout(function () {
                                $(".print-success-msg").css('display', 'none');
                                $(".print-success-msg").html("");
                                $("#form").trigger("reset");
                                window.location.href = js_base_url + "form";

                            }, 2000);

                        } else {
                            $(".print-success-msg").css('display', 'none');
                            $(".print-error-msg").css('display', 'block');
                            $(".print-error-msg").html(data.error);
                        }
                    }

                });


            });
        </script>



    </body>
</html>