$(document).ready(function() {

        $('#password').keyup(function()
        {
            var password = $('#password').val();
            
            if (checkStrength(password) == false)
            {
                $('#sign-up').attr('disabled', true);
                $('.enter-password i').removeClass('fa-times').addClass('fa-check');
            }
        });

        $('#confirm-password').blur(function()
        {
            if ($('#password').val() !== $('#confirm-password').val())
            {
                $('#popover-cpassword').removeClass('hide');
                
            }
            else
            {
                $('#popover-cpassword').addClass('hide');
            }
        });
        
    
        $('#password, #confirm-password').keyup(checkPasswordMatch);
    
        function checkPasswordMatch()
        {
            var password = $('#password').val();
            var confirmPassword = $('#confirm-password').val();
            
            if (password == '')
            {
                $('.password-match i').removeClass('fa-check text-success').addClass('fa-times text-danger');
            }
            else if (password != confirmPassword)
            {
                $('.password-match i').removeClass('fa-check text-success').addClass('fa-times text-danger');
            }
            else
            {
                $('.password-match i').removeClass('fa-times text-danger').addClass('fa-check text-success');
            }
        }
        
    
        function checkStrength(password)
        {
            var strength = 0;


            //If password contains both lower and uppercase characters, increase strength value.

            if (password.match(/([a-z].*[A-Z])|([A-Z].*[a-z])/))
            {
                strength += 1;
                $('.low-upper-case i').removeClass('fa-times text-danger').addClass('fa-check text-success');
            }
            else
            {
                $('.low-upper-case i').removeClass('fa-check text-success').addClass('fa-times text-danger');
            }

            //If it has numbers.
            if (password.match(/([0-9])/))
            {
                strength += 1;
                $('.one-number i').removeClass('fa-times text-danger').addClass('fa-check text-success');
            }
            else
            {
                $('.one-number i').removeClass('fa-check text-success').addClass('fa-times text-danger');
            }

            //If it has one special character, increase strength value.
            if (password.match(/([!,%,&,@,#,$,^,*,?,_,~])/))
            {
                strength += 1;
                $('.one-special-char i').removeClass('fa-times text-danger').addClass('fa-check text-success');

            }
            else
            {
                $('.one-special-char i').removeClass('fa-check text-success').addClass('fa-times text-danger');
            }

            if (password.length > 7)
            {
                strength += 1;
                $('.eight-char i').removeClass('fa-times text-danger').addClass('fa-check text-success');

            }
            else
            {
                $('.eight-char i').removeClass('fa-check text-success').addClass('fa-times text-danger');
            }


            // If value is less than 2
            if (strength == 0)
            {
                $('#result').removeClass()
                $('#password-strength').addClass('bg-danger');
                $('#result').addClass('text-danger').text('Very Weak');
                $('#password-strength').css('width', '5%');

            }
            else if (strength < 2)
            {
                $('#result').removeClass()
                $('#password-strength').addClass('bg-danger');
                $('#result').addClass('text-danger').text('Very Weak');
                $('#password-strength').css('width', '10%');

            }
            else if (strength == 2)
            {
                $('#result').addClass('good');
                $('#password-strength').removeClass('bg-danger');
                $('#password-strength').addClass('bg-warning');
                $('#result').addClass('text-warning').text('Weak')
                $('#password-strength').css('width', '55%');
                return 'Weak'

            }
            else if (strength == 4)
            {
                $('#result').removeClass()
                $('#result').addClass('strong');
                $('#password-strength').removeClass('bg-warning');
                $('#password-strength').addClass('bg-success');
                $('#result').addClass('text-success').text('Strong');
                $('#password-strength').css('width', '100%');

                return 'Strong'
            }

        }


    
    
    
    
    
    
    
    });
