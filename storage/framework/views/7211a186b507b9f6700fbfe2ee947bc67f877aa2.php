<div id="gotoTop" class="icon-angle-up"></div>

<script src="<?php echo e(asset('themes/frontend/raovat/js/jquery.js')); ?>"></script>
<script src="<?php echo e(asset('themes/frontend/raovat/js/plugins.min.js')); ?>"></script>
<script src="<?php echo e(asset('themes/frontend/raovat/js/components/bs-select.js')); ?>"></script>
<script src="<?php echo e(asset('themes/frontend/raovat/js/components/bs-switches.js')); ?>"></script>
<script src="<?php echo e(asset('themes/frontend/raovat/js/components/rangeslider.min.js')); ?>"></script>
<script src="<?php echo e(asset('themes/frontend/raovat/js/functions.js')); ?>"></script>
<script src="<?php echo e(asset('themes/frontend/raovat/js/lazysizes.min.js')); ?>"></script>



<script>
    $(function() {

        $("#form-booking").submit(function(e) {
            //  $(".form-process").show();
            e.preventDefault();
            var form = $(this);
            var url = form.attr('action');
            $.ajax({
                type: "POST",
                url: url,
                data: form.serialize(),
                success: function(response) {
                    form[0].reset();
                    //  $(".form-process").hide();
                    alert(response.message);
                    location.reload();
                },
                error: function(response) {
                    //  $(".form-process").hide();
                    // Get errors
                    if (typeof response.responseJSON.errors !== 'undefined') {
                        var errors = response.responseJSON.errors;
                        // Foreach and show errors to html
                        var elementErrors = '';
                        $.each(errors, function(index, item) {
                            if (item === 'CSRF token mismatch.') {
                                item = "<?php echo app('translator')->get('CSRF token mismatch.'); ?>";
                            }
                            elementErrors += '<p>' + item + '</p>';
                        });
                        $(".form-result").html(elementErrors);
                    } else {
                        var errors = response.responseJSON.message;
                        if (errors === 'CSRF token mismatch.') {
                            $(".form-result").html("<?php echo app('translator')->get('CSRF token mismatch.'); ?>");
                        } else if (errors === 'The given data was invalid.') {
                            $(".form-result").html("<?php echo app('translator')->get('The given data was invalid.'); ?>");
                        } else {
                            $(".form-result").html(errors);
                        }
                    }
                }
            });
        });

        // Form ajax default
        $(".form_ajax").submit(function(e) {
            e.preventDefault();
            var form = $(this);
            var url = form.attr('action');
            $.ajax({
                type: "POST",
                url: url,
                data: form.serialize(),
                success: function(response) {
                    form[0].reset();
                    alert(response.message);
                    location.reload();
                },
                error: function(response) {
                    // Get errors
                    console.log(response);
                    var errors = response.responseJSON.errors;
                    // Foreach and show errors to html
                    var elementErrors = '';
                    $.each(errors, function(index, item) {
                        if (item === 'CSRF token mismatch.') {
                            item = "<?php echo app('translator')->get('CSRF token mismatch.'); ?>";
                        }
                        elementErrors += '<p>' + item + '</p>';
                    });
                }
            });
        });

        // Add to cart
        $(document).on('click', '.add-to-cart', function() {
            let _root = $(this);
            let _html = _root.html();
            let _id = _root.attr("data-id");
            let _quantity = _root.attr("data-quantity") ?? $("#quantity").val();
            if (_id > 0) {
                _root.html("<?php echo app('translator')->get('Processing...'); ?>");
                var url = "<?php echo e(route('frontend.order.add_to_cart')); ?>";
                $.ajax({
                    type: "POST",
                    url: url,
                    data: {
                        "_token": "<?php echo e(csrf_token()); ?>",
                        "id": _id,
                        "quantity": _quantity
                    },
                    success: function(data) {
                        _root.html(_html);
                        window.location.reload();
                    },
                    error: function(data) {
                        // Get errors
                        var errors = data.responseJSON.message;
                        alert(errors);
                        location.reload();
                    }
                });
            }
        });

        $(".update-cart").change(function(e) {
            e.preventDefault();
            var ele = $(this);
            $.ajax({
                url: '<?php echo e(route('frontend.order.cart.update')); ?>',
                method: "PATCH",
                data: {
                    _token: '<?php echo e(csrf_token()); ?>',
                    id: ele.parents("tr").attr("data-id"),
                    quantity: ele.parents("tr").find(".qty").val()
                },
                success: function(response) {
                    window.location.reload();
                }
            });
        });

        $(".remove-from-cart").click(function(e) {
            e.preventDefault();
            var ele = $(this);
            if (confirm("<?php echo e(__('Are you sure want to remove?')); ?>")) {
                $.ajax({
                    url: '<?php echo e(route('frontend.order.cart.remove')); ?>',
                    method: "DELETE",
                    data: {
                        _token: '<?php echo e(csrf_token()); ?>',
                        id: ele.parents("tr").attr("data-id")
                    },
                    success: function(response) {
                        window.location.reload();
                    }
                });
            }
        });

    });

    const filterArray = (array, fields, value) => {
        fields = Array.isArray(fields) ? fields : [fields];
        return array.filter((item) => fields.some((field) => item[field] === value));
    };

    jQuery(document).ready(function() {

        $(".price-range-slider").ionRangeSlider({
            grid: true,
            // type: "double",
            min: 100000,
            max: 100000000,
            from: <?php echo e(isset($params['price']) ? $params['price'] : '500000'); ?>,
            to: 50000000,
            postfix: " VNĐ",
            // max_postfix: "+",
        });

        $(".area-range-slider").ionRangeSlider({
            grid: true,
            // type: "double",
            min: 10,
            max: 1000,
            from: <?php echo e(isset($params['spft']) ? $params['spft'] : '50'); ?>,
            to: 250,
            postfix: " m2.",
            // max_postfix: "+",
        });

        $(".price-range-slider").on("change", function() {
            var data = $(this).data("from"); // reading input data-from attribute
            $('#rg_price').val(data);
        });
        $(".area-range-slider").on("change", function() {
            var data = $(this).data("from"); // reading input data-from attribute
            $('#rg_spft').val(data);
        });

        jQuery(".bt-switch").bootstrapSwitch();
        jQuery('.more-search').click(function() {
            jQuery('.expand-link').slideToggle(400);
        });

        $("#signup_form").submit(function(e) {

            $("#signup_result .alert").text("<?php echo app('translator')->get('Processing...'); ?>");
            $("#signup_result").show();

            e.preventDefault();

            var form = $(this);
            var url = form.attr('action');

            $.ajax({
                type: "POST",
                url: url,
                data: new FormData($(this)[0]), //form.serialize(),
                processData: false,
                contentType: false,
                success: function(data) {
                    // alert(data.message);
                    // location.reload();
                    $('#signup').modal('hide');
                    $('#sign_up_success').modal('show');
                },
                error: function(data) {
                    // Get errors
                    var errors = data.responseJSON.errors;
                    // Foreach and show errors to html
                    var elementErrors = '';
                    $.each(errors, function(index, item) {
                        if (item === 'CSRF token mismatch.') {
                            item = "<?php echo app('translator')->get('CSRF token mismatch.'); ?>";
                        }
                        elementErrors += '<p>' + item + '</p>';
                    });
                    $("#signup_result .alert").html(elementErrors);
                }
            });

        });

    });
</script>

<?php if(isset($web_information->source_code->footer)): ?>
    <?php echo $web_information->source_code->footer; ?>

<?php endif; ?>
<?php /**PATH C:\xampp\htdocs\raovat\resources\views/frontend/panels/scripts.blade.php ENDPATH**/ ?>