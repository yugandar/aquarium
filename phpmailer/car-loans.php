<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>APGVB</title>
<link href="css/mainstyle.css" rel="stylesheet" type="text/css" />
<link href="css/jquery-ui.css" rel="stylesheet" />
<link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon"> 
<!--[if lte IE 6]>
<link href="css/ie6.css" rel="stylesheet" type="text/css" />
<![endif]-->
<script src='https://www.google.com/recaptcha/api.js'></script>
<script src="js/jquery.js"></script>
<script src="js/jquery-ui.min.js">


</script>

<script type="text/javascript" src="js/carloans.js"></script>
	
	
  <title>APGVB</title>
</head>
<div class="outer">
    <div class="outerOne">
        <div class="headder">
        <!---<div class="flag"><img src="images/Indian Animated Flag 1.gif" width="70px" />
        <p><br /><br /><br />We Are Proud to be Indians</p>
        </div>--->


        </div> <!--header-->
        <div class="container">


               <div class="menuOuter">
                <div class="menu">
                    <ul>
                       <li><a href="index.php" >Home</a></li>
                        <li><a href="about-us.php">About Us</a></li>
                        <li><a href="careers.php">Careers</a></li>
                        <li><a href="organography.php">Organisational Structure</a></li>
                        <li><a href="feedback.php">Feedback </a></li>
                        <li><a href="complaints.php">Complaints</a></li>
                        <li><a href="#">Staff Corner</a></li>
                    </ul>
                </div>
               </div>




                <h1 style="line-height:30px; text-align:center;">Car Loans</h1>
                <div class="carLoanHead"> ON-LINE CAR LOAN APPLICATION FORM FOR INDIVIDUALS </div>
                <div class="carLoanHead1"> Please fill in your details for Car Loan </div>
                 <div class="innerpageConEdu">
                 <form id="fm" name="fm"  action="carloansmail.php" method="post" onSubmit="return formvalid()">
                    <div class="eduLoanrow">
                    <div class="sno">&nbsp;</div>
                     <div class="eduleft" >Full name of first/sole applicant  </div>
                        <div class="eduleftSmall"><select class="eduselect"><option select="selected" >Select</option>
                                   <option select="selected">Mr.</option>
                                   <option select="selected">Mrs.</option>
                                   <option select="selected">Miss</option>
                        </select>
                        </div>
                       <div class="eduright" style="mrgin-left:0px;"> <input id="name" name="name" type="text" class="edutboxBig" > </div>

                    </div>

                   <div class="eduLoanrow">
                    <div class="sno">&nbsp;</div>
                     <div class="eduleft">Address:</div>

                       <div class="eduright" style="mrgin-left:0px;"><textarea id="address" name="address" class="eduAddress"></textarea>  </div>

                       <div class="eduleft rightOnly">Select State:</div>
                       <div class="eduright" style="mrgin-left:0px;"> <select id="state" name="state" class="eduselectBig" >
                            <option value="0" select="selected">Select State</option>
                            <option value="Andhra Pradesh" select="selected">Andhra Pradesh</option>
                       </select></div>
                    </div>



                   <div class="eduLoanrow">
                    <div class="sno">&nbsp;</div>
                     <div class="eduleft">City:</div>

                       <div class="eduright" style="mrgin-left:0px;">
                             <input id="city" name="city" type="text" class="edutboxBig" >
                       </div>

                       <div class="eduleft rightOnly">Pin:</div>
                       <div class="eduright" style="mrgin-left:0px;"> <input id="pin" name="pin" type="text" class="edutboxBig" ></div>
                    </div>

                    <div class="eduLoanrow">
                    <div class="sno">&nbsp;</div>
                     <div class="eduleft"> Phone:</div>

                       <div class="eduright" style="mrgin-left:0px;">
                            <input type="text" id="l" name="l" class="edutboxSmall" > <input id="landnum" name="landnum" type="text" class="edutbox" >
                       </div>

                       <div class="eduleft rightOnly">Mobile:</div>
                       <div class="eduright" style="mrgin-left:0px;"> <input id="phone" name="phone" type="text" class="edutboxBig" ></div>
                    </div>

                    <div class="eduLoanrow">
                    <div class="sno">&nbsp;</div>
                     <div class="eduleft">Email:</div>
                       <div class="eduright" style="mrgin-left:0px;">
                            <input type="text" id="email" name="email" class="edutboxBig" >
                       </div>
                        <div class="eduleft rightOnly">Permanant Account Number:</div>
                       <div class="eduright" style="mrgin-left:0px;"> <input id="ac" name="ac" type="text" class="edutboxBig" ></div>
                    </div>

                    <div class="eduLoanrow">
                    <div class="sno">&nbsp;</div>
                     <div class="eduleft">Date Of Birth:</div>
                       <div class="eduright" style="mrgin-left:0px;">
                            <select id="date" name="date" class="CarSelect">
                            <option value="0" select="selected" >Select Date</option>
                                   <option value="01">01</option>
                                   <option value="02">02</option>
                                   <option value="03">03</option>
                                   <option value="04">04</option>
                                   <option value="05">05</option>
                                   <option value="06">06</option>
                                   <option value="07">07</option>
                                   <option value="08">08</option>
                                   <option value="09">09</option>
                                   <option value="10">10</option>
                                   <option value="11">11</option>
                                   <option value="12">12</option>
                                   <option value="13">13</option>
                                   <option value="14">14</option>
                                   <option value="15">15</option>
                                   <option value="16">16</option>
                                   <option value="17">17</option>
                                   <option value="18">18</option>
                                   <option value="19">19</option>
                                   <option value="20">20</option>
                                   <option value="21">21</option>
                                   <option value="22">22</option>
                                   <option value="23">23</option>
                                   <option value="24">24</option>
                                   <option value="25">25</option>
                                   <option value="26">26</option>
                                   <option value="27">27</option>
                                   <option value="28">28</option>
                                   <option value="29">29</option>
                                   <option value="30">30</option>
                                   <option value="31">31</option>
                            </select>

                            <select id="month" name="month" class="CarSelect">
                            <option value="0" select="selected" >Select Month</option>
                                   <option value="January">Jan</option>
                                   <option value="February">Feb</option>
                                   <option value="March">Mar</option>
                                   <option value="April">April</option>
                                   <option value="May">May</option>
                                   <option value="June">June</option>
                                   <option value="July">July</option>
                                   <option value="August">August</option>
                                   <option value="September">September</option>
                                   <option value="October">October</option>
                                   <option value="November">November</option>
                                   <option value="December">December</option>
                            </select>
                            <select id="year" name="year" class="CarSelect">
                            <option value="0" select="selected" >Select Year</option>
                                   <option value="2014">2014</option>
                                   <option value="2013">2013</option>
                                   <option value="2012">2012</option>
                                   <option value="2011">2011</option>
                                   <option value="2010">2010</option>
                                   <option value="2009">2009</option>
                                   <option value="2008">2008</option>
                                   <option value="2007">2007</option>
                                   <option value="2006">2006</option>
                                   <option value="2005">2005</option>
                                   <option value="2004">2004</option>
                                   <option value="2003">2003</option>
                                   <option value="2002">2002</option>
                                   <option value="2001">2001</option>
                                   <option value="2000">2000</option>
                                   <option value="1999">1999</option>
                                   <option value="1998">1998</option>
                                   <option value="1997">1997</option>
                                   <option value="1996">1996</option>
                                   <option value="1995">1995</option>
                                   <option value="1994">1994</option>
                                   <option value="1993">1993</option>
                                   <option value="1992">1992</option>
                                   <option value="1991">1991</option>
                                   <option value="1990">1990</option>
                                   <option value="1989">1989</option>
                            </select>
                       </div>

                    </div>
                      <div class="eduLoanrow"  style="margin-top:20px;">
                    <div class="sno">&nbsp;</div>
                     <div class="eduleft">Cost of vehicle (on road price) / please enter <span class="mandatary">Rs.</span>in figures only :</div>
                       <div class="eduright" style="mrgin-left:0px;">
                           <br /><BR /><BR /><br /> <input id="vechilecost" name="vechilecost" type="text" class="edutboxBig" >
                       </div>
                        <div class="eduleft rightOnly">Loan amt. required/
please enter <span class="mandatary">Rs.</span> in figures only:</div>
                       <div class="eduright" style="mrgin-left:0px;"><br /><br /><br /> <input id="amtrequired" name="amtrequired" type="text" class="edutboxBig" ></div>
                    </div>

                    <div class="eduLoanrow">
                    <div class="sno">&nbsp;</div>
                     <div class="eduleft" style="margin-top:20px;"> <input  id="agree" name="agree" type="checkbox" /> I Agree</div>

                    </div>

                      </div>


<div class="g-recaptcha" id="cap" data-sitekey="6Lezwh0TAAAAAOUumAXQ7r-gqfJxKzvoJzb2m4h3"></div>
                       <div class="eduleft" style=" width:300px; margin-left:250px; margin:20px 0 20px 450px; ">
                       <input type="submit" value="submit" id="submit" name="submit" class="button" /> &nbsp;&nbsp;&nbsp;
                       <input type="button" value="CLOSE" class="button" />
                       </div>
                    </form>
                       <div class="clear"></div>
                       <P style="text-align: center">This site best viewed on resolution 1024 x 600   � 2005 Copyright Andhra Pradesh Grameena vikas Bank   </P>

        </div> <!--Container-->
        <div class="footer">
            <div class="copy">All Copyrights @ Andhra Pradesh Grameena Vikas Bank </div>
            <div class="visitorsLing">

              Visitors Count: <img src="http://www.hit-counts.com/counter.php?t=12&amp;digits=6&amp;ic=150&amp;cid=853098" border="0" >

            </div> <!--visitors-->
            <div class="briha"><a href="http://brihaspathi.com/" target="_blank"><img src="images/footerlogo.png" border="0" /></a></div>
        </div>





    </div>
</div>




<script>
  $(function() {
    $( "#tabs" ).tabs();
  });
</script>

<script>
  $(function() {
    $( "#speed" ).selectmenu();

    $( "#files" ).selectmenu();

    $( "#number" )
      .selectmenu()
      .selectmenu( "menuWidget" )
        .addClass( "overflow" );
  });
  </script>


<script src="js/jquery-ui.js"></script>
<body>

</body>

</html>
