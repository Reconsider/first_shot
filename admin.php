<?php
    session_start();
    echo $_SESSION['username'];
    echo "<a href='logout.php'>Log Out</a>";
    $uname=$_GET['uname'];

?>
<html>
    </head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <script src="js/jquery.js"></script>
        <script src="js/ajax.js"></script>
        <style type="text/css">
            #container{
                width: 900px;margin: 0 auto;
            }
            #messages{
                width: 100%;margin: 0;
            }
           
            #messages ul{
                list-style: none outside none;
               margin: 0;
                border-radius: 8px;
            }
            #messages ul li{
                padding: 10px;font-size: 12px;border-radius: 10px;
            }
        ul.tabs {
        margin: 5px 0 6px;
        padding: 0;
        }
        ul.tabs li {
        display: inline;
        list-style: none outside none;
        }
         ul.tabs li a {
        background-color: #464C54;
        /*background-image: url("images/tab_off.jpg");*/
        background-position: center bottom;
        background-repeat: repeat-x;
/*        border: 1px solid #464C54;*/
        color: #FFEBB5;
        font-family: Verdana,Arial,Helvetica,sans-serif;
        font-size: 9px;
/*        font-weight: bold;*/
        padding: 8px 14px;
        text-decoration: none;
        text-transform: uppercase;
        }
        ul.tabs li a:hover {
        background-color: #2F343A;
        border-color: #2F343A;
        }
        ul.tabs li a.active {
        background-color: #FFFFFF;
        border-color: #464C54 #464C54 #FFFFFF;
        border-style: solid;
        border-width: 1px;
        color: #282E32;
        }
        .content {
        background-color: #FFFFFF;
        border: 1px solid #464C54;
        font-family: Arial,Helvetica,sans-serif;
        }
        #content_2, #content_3, #content_5, #content_6 {
        display: none;
        }
                </style>
                <script type="text/javascript">
                    $(document).ready(function(){
            $("a.tab").click(function () {
                $(".active").removeClass("active");
                $(this).addClass("active");
                $(".content").slideUp();
                var content_show = $(this).attr("title");
                $("#"+content_show).slideDown();
            });
            $("a.tab").focus(function () {
                $(".active").removeClass("active");
                $(this).addClass("active");
                $(".content").slideUp();
                var content_show = $(this).attr("title");
                $("#"+content_show).slideDown();
            });
        });
        </script>
</head>
<body>
   <div id="container">
    <div id="tabbed_box_1" class="tabbed_box">
        <div class="tabbed_area">
    <ul class="tabs">
        <li><a href="#" title="content_1" class="tab">Conversation</a></li>
    </ul>
    <div id="content_1" class="content">
      <div id="heading">
          <p>All Conversations<p>
        </div>
      <div id="messages">
          <ul>
                  <?php include 'common.php';
                     $query=mysql_query("SELECT * from messages ORDER BY date DESC;",connect());
                        while($info2 = mysql_fetch_array($query)){
                        $from=$info2['sender'];
                        $to=$info2['receiver'];
                        $msg=$info2['message'];
                        $date=$info2['date'];
                       echo "<li><div style='border-radius:10px;background-color:whitesmoke;'>
                               From : ".$from." &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;To : ".$to."&nbsp;&nbsp;&nbsp;&nbsp;  Date & Time : ".$date." <br/><br/>
                               Message :&nbsp;&nbsp; ".$msg."
                              <hr>
                             </div></li>";
                        }
                      ?>
          </ul>
      </div>
    </div>
            
    </div><!--END Tabbed_area-->
    </div><!--END Tabbed_box_1-->
  </div>
</body>
</html>
