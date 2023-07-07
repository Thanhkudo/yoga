<script src="<?php echo e(asset('themes/frontend/yoga/js/all.min.js')); ?>"></script>
<script src="<?php echo e(asset('themes/frontend/yoga/js/jquery.min.js')); ?>"></script>
<script src="<?php echo e(asset('themes/frontend/yoga/js/popper.min.js')); ?>"></script>
<script src="<?php echo e(asset('themes/frontend/yoga/js/bootstrap.min.js')); ?>"></script>
<script src="<?php echo e(asset('themes/frontend/yoga/js/jquery.sticky.js')); ?>"></script>
<script src="<?php echo e(asset('themes/frontend/yoga/js/jquery.magnific-popup.min.js')); ?>"></script>
<script src="<?php echo e(asset('themes/frontend/yoga/js/slick.min.js')); ?>"></script>
<script src="<?php echo e(asset('themes/frontend/yoga/js/lazysizes.min.js')); ?>"></script>
<script src="<?php echo e(asset('themes/frontend/yoga/js/main.js')); ?>"></script>


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
        $(document).on('click', '.add_to_cart', function() {
            let _root = $(this);
            let _id = _root.attr("data-id");
            let _quantity =$(".prd_quantity").val();
            add_to_cart(_id, _quantity);
        });

        function add_to_cart(_id, _quantity){
            if (_id > 0 && _quantity > 0) {
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
        }
        
        $(".update-cart").change(function(e) {
            e.preventDefault();
            var ele = $(this);
            $.ajax({
                url: '<?php echo e(route('frontend.order.cart.update')); ?>',
                method: "PATCH",
                data: {
                    _token: '<?php echo e(csrf_token()); ?>',
                    id: ele.parents(".quantity").attr("data-id"),
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
                        id: ele.attr("data-id")
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
 
</script>
<?php if(isset($web_information->source_code->footer)): ?>
    <?php echo $web_information->source_code->footer; ?>

<?php endif; ?>
<?php /**PATH C:\xampp\htdocs\yoga\resources\views/frontend/panels/scripts.blade.php ENDPATH**/ ?>