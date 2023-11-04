// Function to check if a form is valid
function checkFormValidity(formId) {
    console.log(formId);
    var isValid = true;
    // Reset previous error messages
    $("#" + formId + " .error-message").empty();

    // console.log(formId);
    $("#" + formId).find(".required").each(function() {
        // console.log(formId);
        var $field = $(this);
        var fieldValue = $field.val().trim();

        if (fieldValue === "") {
            isValid = false;
            $field.addClass("error-field");
            $("#" + $field.attr("id") + "-error").text("This field is required.");
        } else {
            $field.removeClass("error-field");
        }

        if ($field.attr("type") === "email") {
            var emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
            if (!emailPattern.test(fieldValue)) {
                formIsValid = false;
                $field.addClass("error-field");
                $("#" + $field.attr("id") + "-error").text("Please enter a valid email address.");
            } else {
                $field.removeClass("error-field");
            }
        }
    });
    return isValid;
}
