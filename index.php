<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ajax</title>
</head>
<body>

    <h1 id="success-data"></h1>

    <p id="error-msg" style="color: red;"></p>
    <table>
        <tr>
            <td>name:</td>
            <td><input type="text" id="name" name="name" placeholder="name"></td>
        </tr>
        <tr>
            <td>Email:</td>
            <td><input type="email" id="email" name="email" placeholder="email"></td>
        </tr>
        <tr>
            <td>Phone:</td>
            <td><input type="tel" id="phone" name="phone" placeholder="phone number"></td>
        </tr>
        <tr>
            <td></td>
            <td><button type="submit" id="form-submit-btn">submit</button></td>
        </tr>
    </table>


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script> 
    
    $(document).ready(function(){
        $('#form-submit-btn').on('click', function(){
            let name = $('#name').val();
            let email = $('#email').val();
            let phone = $('#phone').val();

            if(name == '' || email == '' || phone == ''){
                $('#error-msg').text('The field is required.');       
            }
            else{
                $.ajax({
                    url: 'save.php',
                    type: 'POST',
                    data: {
                        fast_name:name,
                        your_email:email,
                        your_phone:phone
                    },
                    success: function(response){
                        $('#success-data').text(response)
                        $('input').val('')
                    }
                });
            }
        });
    });
    
</script>
</body>
</html>





