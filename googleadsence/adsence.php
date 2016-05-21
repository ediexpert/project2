<?php
session_start();
if($con = mysql_connect("localhost","root","")){
	//echo "Database Connected";
	if(mysql_select_db("tinycent01", $con)){
		//echo "DB Selected";
	}else{
		echo mysql_error();
	}
}
echo $session_id = session_id();
echo "IP: " . $ip= $_SERVER["REMOTE_ADDR"]; 
$agent =$_SERVER["HTTP_USER_AGENT"];
?>








<script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
<script>
<!-- setting cookie -->
function setCookie(cname, cvalue, exdays) {
			var d = new Date();
			d.setTime(d.getTime() + (exdays*24*60*60*1000));
			var expires = "expires="+d.toUTCString();
			document.cookie = cname + "=" + cvalue + "; " + expires;
			console.log("cookie set!");
		}
		<!-- end setting cookie -->
<!-- get cookie -->
		function getCookie(cname) {
			var name = cname + "=";
			var ca = document.cookie.split(';');
			for(var i=0; i<ca.length; i++) {
				var c = ca[i];
				while (c.charAt(0)==' ') c = c.substring(1);
				if (c.indexOf(name) == 0) return c.substring(name.length,c.length);
			}
			return "";
		}
<!-- end get cookie -->		
<!-- check cookie -->

function checkCookie() {
			console.log("start!");
			var username=getCookie("username");
			if (username!="") {
				//alert("Welcome again " + username);
				console.log("cookie is set already, hide ads!");
				showads = false;
			}else{
			console.log("else");
				/*username = "abc";
				if (username != "" && username != null) {
					setCookie("username", username, 2);
					
				}*/
			}
		}

<!-- end check cokie-->		
<!-- start code -->
					jQuery(function( $ ){
					var isOverGoogleAd = false;
					$( ".adsbygoogle" )
						.mouseover(
							function(){
								isOverGoogleAd = true;
							}
						)
						.mouseout(
							function(){
								isOverGoogleAd = false;
							}
						)
					;
					$( window ).blur(
						function(){
							if (isOverGoogleAd){
								console.log("you clicked on ad!");
								 /*$(".adslot_1").hide();*/
								 $(".adsbygoogle").delay(2200).fadeOut(300);
								 setCookie("username","adseenin2days",2);
								 <?php mysql_query("INSERT INTO clicked (ip) VALUES ('$ip')");?>
							}
						}
					)
					
					.focus()
					;

				});
				
				<!-- end code -->
				
				
				$( document ).ready(function() {
		//document.cookie = "username=; expires=Thu, 01 Jan 1970 00:00:00 UTC";
    checkCookie();
	if(showads){
			console.log("Show ad!!!");
		}else{			
			
			console.log("Hide ad!!!");
			$(".adslot_1").hide();
		}
});
</script>

// <script type="text/javascript">
//             window.onload = function(){
//                 var bsDiv = document.getElementById("box-shadow-div");
//                 var x, y;
//     // On mousemove use event.clientX and event.clientY to set the location of the div to the location of the cursor:
//                 window.addEventListener('mousemove', function(event){
//                     x = event.clientX;
//                     y = event.clientY;                    
//                     if ( typeof x !== 'undefined' ){
//                         bsDiv.style.left = x + "px";
//                         bsDiv.style.top = y + "px";
//                     }
//                 }, false);
//             }
//         </script>
<script type="text/javascript">
            window.onload = function(){
                var bsDiv = document.getElementById("box-shadow-div");
                var x, y;
    // On mousemove use event.clientX and event.clientY to set the location of the div to the location of the cursor:
                window.addEventListener('mousemove', function(event){
                    x = event.clientX;
                    y = event.clientY;                    
                    if ( typeof x !== 'undefined' ){
                        bsDiv.style.left = x + "px";
                        bsDiv.style.top = y + "px";
                    }
                }, false);
            }
        </script>
		
		<style type="text/css">
            #box-shadow-div{
                position: fixed;
                width: 300px;
                /*height: 100px;*/
                /*border-radius: 100%;*/
                /*background-color:black;*/
                box-shadow: 0 0 10px 10px black;
                top: 49%;
                left: 48.85%;
            }

            iframe{
            	opacity:0.1;

            }
        </style>
		
<body>

	<h1>
		Tracking Google AdSense Clicks 
	</h1>

	<p>
		Google AdSense elements on webpage will be displayed untill you click on the ad. After click all ads will be hide for next 2 days.
	</p>

	<!--- Google adsense. -->
	<?php 
	function show_ad(){
		$session_id = session_id();
		$qry = mysql_query("SELECT * FROM clickme WHERE session = '$session_id'");
		if(mysql_num_rows($qry) == 1){
			echo '<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
		              <!-- usermy_blog_right 1 -->
		              <ins class="adsbygoogle adslot_1"
							id="box-shadow-div"
		                   style="display:block"
		                   data-ad-client="ca-pub-4192276482554399"
		                   data-ad-slot="4412000668"
		                   data-ad-format="auto"></ins>
		              <script>
		              (adsbygoogle = window.adsbygoogle || []).push({});
		              </script>';
		}else{
			echo "no match!";
		}

	}




?>


<?php 
show_ad();
?>
 
			  
	 

	<p>
		Here is some more content for the page. To fill up some
		space,Here is some more content for the page. To fill up some
		space,Here is some more content for the page. To fill up some
		space,Here is some more content for the page. To fill up some
		space,Here is some more content for the page. To fill up some
		space,
	</p>
<button type="button" onclick="document.cookie=&quot;username=;expires=Wed 01 Jan 1970&quot;">Delete Cookie 2</button>


</body>
</html>