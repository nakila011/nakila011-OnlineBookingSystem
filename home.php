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
}
    </style>
<section id="" class="d-flex align-items-center">
    <div class="container">
    <center>
      <br>
     
      <h1 id="h1">Online Booking System For Bus Operation</h1>

<style>
   
    #h1 {
      
        display: flex;
        justify-content: center;
        align-items: center;
        text-align: center;

       
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);

       
        font-size: 4vw;                           
        font-family: 'Arial', sans-serif;         
        color: #ffffff;                              
        text-shadow: 1px 1px 5px rgba(0, 0, 0, 0.5); 

        
        background: rgba(0, 0, 0, 0.4);             
        padding: 20px 40px;
        border-radius: 8px;                         
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.3);  

        
        line-height: 1.2;                          
        word-spacing: 2px;                          

       
        transition: all 0.3s ease;
    }

    #h1:hover {
        background: rgba(0, 0, 0, 0.6);              
        text-shadow: 2px 2px 8px rgba(0, 0, 0, 0.6); 
    }

    
    @media (max-width: 768px) {
        #h1 {
            font-size: 5vw;                         
            line-height: 2;                           
            padding: 15px 30px;
        }
    }
</style>


      <?php if(!isset($_SESSION['login_id'])): ?>
      	<center><button class="btn btn-danger btn-lg" type="button" id="book_now">Click here to Reserve Your Tickets</button></center>
      <?php else: ?>
        
		<center><br><br><br><h2 id="welcome">Welcome, <?php echo $_SESSION['login_name'] ?></h2></center>
	

   
   <style>

    #welcome {
        font-family: 'Arial', sans-serif;          
        color: #ffffff;                           
        text-shadow: 1px 1px 5px rgba(0, 0, 0, 0.5); 
        transition: all 0.3s ease;
    }

    @media (max-width: 768px) {
        #welcome {
            font-size: 5vw;                          
            padding: 10px 20px;
        }
    }
</style>

      <?php endif; ?>
    </div>
  </section>
  <script>
  	$('#book_now').click(function(){
      uni_modal('Find Schedule','book_filter.php')
  })
  </script>