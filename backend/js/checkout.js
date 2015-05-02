    function isNumberKey(evt){
		var charCode = (evt.which) ? evt.which : evt.keyCode;
		if (charCode > 31 && (charCode < 48 || charCode > 57))
			return false;
		return true;
	}
		
    $(document).ready(function() {
        /* Attach a submit handler to the form */
        $("#checkout").submit(function(event) {
            /* Stop form from submitting normally */
            event.preventDefault();
            /* Get some values from elements on the page: */
            var values = $(this).serialize();
            /* Send the data using post and put the results in a div */
            $.ajax({
                url: "checkout.php",
                type: "post",
				dataType: "json",
                data: values,
                success: function(data){
						$('#message').html(data['message']);
						if(data['checkout_id']){
							$('#name').val('');
							$('#email').val('');
							$('#phone').val('');
							$('#code').val('');
						}
						console.log(data);
                },
                error:function(){
                    alert("failure");
                }
            });
        });
    });