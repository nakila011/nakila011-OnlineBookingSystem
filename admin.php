
<!DOCTYPE html>
<html>
	<head>
		<?php include('header.php') ?>
		<title>Admin Login | Online Bus Reservation</title>
	</head>
    <style>
       body {
    background-image: url('./assets/img/bus terminal1.png');
    background-size: cover; 
    background-position: center;     
    background-repeat: no-repeat;   
    background-attachment: fixed;  
    
    
    height: 100vh;
    width: 100vw;

  
    background-color: rgba(0, 0, 0, 0.6); 
    background-blend-mode: overlay;      

    @media (max-width: 768px) {
    body {
        background-size: contain;  
    }
}
.body-overlay {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.5); 
}
  
}
    </style>
	<body id="body">
    		<div class="container">
                <div class="card-header-edge text-white">                 
                </div>
        
        <div class="form-container"> 
        <form id="login-frm">
            <p>Admin Login Panel</p>

            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" name="username" id="username" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" required>
            </div>
            <div class="form-group">
                <button type="submit" name="submit">Login as Admin</button>
                <br>
                <a href="./index.php">Back to Home</a>
            </div>
        </form>
    </div>
        </div>

		</body>
   
        <style>
            

            p {
    text-align: center;
    font-size: 20px;
    font-weight: bold;
    color: #333;
    margin-bottom: 15px;
    padding: 10px 0;
    border-bottom: 2px solid #007bff;
    transition: color 0.3s ease-in-out;
}

p:hover {
    color: navy; 
    border-bottom: 2px solid violet; 
}

.container {
    display: flex;
    justify-content: center;
    align-items: center;
    width: 100%;
}



.form-container {
    background: linear-gradient(135deg, black, white); 
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    width: 100%;
    max-width: 400px;
    padding: 20px;
    color: black; 
    position: relative;
    overflow: hidden;
    transition: transform 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
}


.form-container:hover {
    transform: scale(1.05); 
    box-shadow: 0 6px 12px rgba(0, 0, 0, 0.5);
}


@keyframes glowing {
    0% { box-shadow: 0 0 10px white; }
    50% { box-shadow: 0 0 20px black; }
    100% { box-shadow: 0 0 10px white; }
}

.form-container:hover {
    animation: glowing 1.5s infinite alternate;
}


.form-container p {
    text-align: center;
    font-size: 20px;
    font-weight: bold;
    margin-bottom: 20px;
    padding: 10px 0;
    color: black;
    border-bottom: 2px solid black;
    transition: color 0.3s ease-in-out, border-bottom 0.3s ease-in-out;
}

.form-container p:hover {
    color: white; 
    border-bottom: 2px solid white;
}


        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            font-weight: bold;
            margin-bottom: 5px;
            display: block;
        }

        .form-group input {
            width: 100%;
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
            box-sizing: border-box;
        }

        .form-group input:focus {
            border-color: #007bff;
            outline: none;
        }

        .form-group button {
            width: 100%;
            padding: 10px;
            background-color: #28a745;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
        }

        .form-group button:hover {
            background-color: #218838;
        }

        .form-group a {
            text-decoration: none;
            color: #007bff;
            text-align: right;
            display: block;
            margin-top: 10px;
        }

        .form-group a:hover {
            text-decoration: underline;
        }
    </style>


        <script>
            $(document).ready(function(){
                $('#login-frm').submit(function(e){
                    e.preventDefault()
                    $('#login-frm button').attr('disable',true)
                    $('#login-frm button').html('Checking details...')

                    $.ajax({
                        url:'./login_auth.php',
                        method:'POST',
                        data:$(this).serialize(),
                        error:err=>{
                            console.log(err)
                            alert('An error occured');
                            $('#login-frm button').removeAttr('disable')
                            $('#login-frm button').html('Login')
                        },
                        success:function(resp){
                            if(resp == 1){
                                location.replace('index.php?page=home')
                            }else{
                                alert("Incorrect username or password.")
                                $('#login-frm button').removeAttr('disable')
                                $('#login-frm button').html('Login')
                            }
                        }
                    })

                })
            })
        </script>
</html>