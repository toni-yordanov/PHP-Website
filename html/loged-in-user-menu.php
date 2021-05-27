<!DOCTYPE html>
<html>
    <head>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="../js/FlowTypeJS/flowtype.js"></script>
        <script src="../js/jquerymenu.js"></script>
    </head>
    <body>
        <div class="header row">
            <div class="col-pc-4 col-xs-9">
                <div class="site-branding padding-left-right">
                    <img alt="logo" src="../pictures/logo.png">
                    <p>Me<span class="bone">ubilair</span></p>
                </div>
            </div>

        
            <div class="col-pc-8 col-xs-3">
                    <nav class="menu">
                        <ul class="active">
                            <li><a href="index.php" class="current">Home</a></li>
                            <li><a href="catalogPage.php?varname=<?php echo "Bedroom" ?>">Bedroom</a></li>
                            <li><a href="catalogPage.php?varname=<?php echo "Bathroom" ?>">Bathroom</a></li>
                            <li><a href="catalogPage.php?varname=<?php echo "Garden" ?>">Garden</a></li>
                            <li><a href="contact.php">Contact</a></li>
                            <li><a href="profile.php">Profile</a></li>
                            <li><a href="log-in.php">Logout</a></li>
                        </ul>
                    </nav>
                <a class="toggle-nav" href="#"><i class="fas fa-bars"></i></a>
            </div>
        </div>
        
        <script>
            $(function () {
                $('body').flowtype({
                   minimum   : 500,
                   maximum   : 1920,
                   minFont   : 12,
                   maxFont   : 40,
                   fontRatio : 90
                });
            });
            
            $(document).ready(function(){
         $(".menu a, .footer a[href='#myPage']").on('click', function(event) {
        
           if (this.hash !== "") {
        
            event.preventDefault();
        
            var hash = this.hash;
        
           $('html, body').animate({
              scrollTop: $(hash).offset().top
            }, 900, function(){
        
              window.location.hash = hash;
              });
            }
          });
        })
            
        </script>
    </body>
</html>
