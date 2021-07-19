<script src="js/jquery.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script>
    $(document).ready(function () {
        $('[data-toggle="tooltip"]').tooltip();
    });
</script>
<!-- Bootstrap core JS-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"></script>
<!-- Core theme JS-->
<script src="js/scripts.js"></script>

<script src="vendor/jquery-easing/jquery.easing.min.js"></script>
<script src="vendor/scrollreveal/scrollreveal.min.js"></script>
<script src="vendor/magnific-popup/jquery.magnific-popup.min.js"></script>

<script src="js/creative.min.js"></script>
<script>

    function checkPass() {
        //Store the password field objects into variables ...
        var pass1 = $("#register-form #password");
        var pass2 = $("#register-form #password_confirm");

        console.log(pass1.value, pass2);
        //Store the Confimation Message Object ...
        var message = $('#confirmMessage');
        //Set the colors we will be using ...
        var goodColor = "#66cc66";
        var badColor = "#ff6666";
        //Compare the values in the password field
        //and the confirmation field
        if (pass1.val() == pass2.val()) {
            //The passwords match.
            //Set the color to the good color and inform
            //the user that they have entered the correct password
            pass2.css("backgroundColor", goodColor);
            message.css("color", goodColor);
            message.html("Passwords Match");
        } else {
            //The passwords do not match.
            //Set the color to the bad color and
            //notify the user.
            pass2.css("backgroundColor", badColor);
            message.css("color", badColor);
            message.html("Passwords Do Not Match!");
        }
    }

    function validatephone(phone) {
        var maintainplus = '';
        var numval = phone.value
        if (numval.charAt(0) == '+') {
            var maintainplus = '';
        }
        curphonevar = numval.replace(/[\\A-Za-z!"£$%^&\,*+_={};:'@#~,.Š\/<>?|`¬\]\[]/g, '');
        phone.value = maintainplus + curphonevar;
        var maintainplus = '';
        phone.focus;
    }

    // validates text only
    function Validate(txt) {
        txt.value = txt.value.replace(/[^a-zA-Z-'\n\r.]+/g, '');
    }

    // validate email
    function email_validate(email) {
        var regMail = /^([_a-zA-Z0-9-]+)(\.[_a-zA-Z0-9-]+)*@([a-zA-Z0-9-]+\.)+([a-zA-Z]{2,3})$/;

        if (regMail.test(email) == false) {
            document.getElementById("status").innerHTML = "<span class='warning'>Email address is not valid yet.</span>";
        } else {
            document.getElementById("status").innerHTML = "<span class='valid'>Thanks, you have entered a valid Email address!</span>";
        }
    }

    // validate date of birth
    function dob_validate(dob) {
        var regDOB = /^(\d{1,2})[-\/](\d{1,2})[-\/](\d{4})$/;

        if (regDOB.test(dob) == false) {
            document.getElementById("statusDOB").innerHTML = "<span class='warning'>DOB is only used to verify your age.</span>";
        } else {
            document.getElementById("statusDOB").innerHTML = "<span class='valid'>Thanks, you have entered a valid DOB!</span>";
        }
    }

    // validate address
    function add_validate(address) {
        var regAdd = /^(?=.*\d)[a-zA-Z\s\d\/]+$/;

        if (regAdd.test(address) == false) {
            document.getElementById("statusAdd").innerHTML = "<span class='warning'>Address is not valid yet.</span>";
        } else {
            document.getElementById("statusAdd").innerHTML = "<span class='valid'>Thanks, Address looks valid!</span>";
        }
    }


</script>