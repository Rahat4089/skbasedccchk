<?php
include 'config.php';
if($login ==  true) {
extract($_POST);
if($unv == $unv) {
}
else {
   header("Location: ./login");
}
}
?>
<!DOCTYPE html>
<html>
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
      <link rel="stylesheet" type="text/css" href="assets/css/blackvaticans.css">
      <link rel="icon" href="assets/img/logo.ico" type="image/ico">
      <audio id="bvsfx" src="assets/sfx/click.mp3"></audio>
      <title>GENZ CHECKER</title>
   </head>
   <body>
      <div class="p-3">
         <div class="row">

         <div class="col-md-3 mb-2">
               <div class="card h-100 bvborder">
                  <div class="card-header">CC Scraper</div>
                  <div class="card-body" id="generator">
                     <div class="p-1">
                        <input id="channels" class="form-control" rows="1" placeholder="Telegram Channel"></input>
                     </div>

                     <div class="p-1">
                        <input id="pages" class="form-control" rows="1" placeholder="Amount of CC"></input>
                     </div>
                     <div class="p-1">
                        <button class="btn btn-outline-light btn-block" id="scrape">Scrape</button>
                     </div>
                     <div class="p-1">
                     <div>Note: Click the button once and wait, because scraping may take time. </div>
                     </div>
                  </div>
                  

               </div>
            </div>

            <div class="col-md mb-2">
               <div class="card h-100 bvborder">
                  <div class="card-header">Credit Cards</div>
                  <div class="card-body h-100">
                     <div class="px-3">
                        <textarea class="form-control" id="cards" rows="9"></textarea>
                        <div class="pt-2">
                        <input class="form-control" id="seckey" rows="1" placeholder="Example: sk_live_xxxxxxxxx (Leave blank if you dont have one.)"></input>
                        <div class="pt-2">
                           <select id="gates" class="form-control">
                              <?php foreach ($apiname as $key => $apiname) {
                                echo '<option value="'.$fname[$key].'">'.$apiname.'</option>';}?>
                           </select>
                        </div>
                        <div class="pt-2">
                           <button class="btn btn-outline-light btn-block" id="check">Check</button>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="col-md-3 mb-2">
               <div class="card h-100 bvborder">
                  <div class="card-header text-center">GENZ CHECKER</div>
                  <div class="card-body">
                     <div id="response">
                     <img src="assets/img/logo.png" class="bvlogo">
                     </div>                  
                  </div>
                  <div class="card-footer"> <center>Custom charge amount</center>
                     <div class="p-1">
                     <select id="curs" class="form-control">
                     <option value="usd">USD (USA)</option>
                     <option value="cad">CAD (CANADA)</option>
                     <option value="inr">INR (INDIA)</option>
                     <option value="php">PHP (PHILIPPINES)</option>
                     <option value="eur">EUR (SPAIN)</option>
                     <option value="cny">CNY (CHINA)</option>
                     <option value="mxn">MXN (MEXICO)</option>
                     <option value="afn">AFN (AFGHANISTAN)</option>
                     </select>
                     </div>
                     <div class="p-1">
                        <input id="customs" class="form-control" rows="1" placeholder="EX: 1-1000"></input>
                     </div>
                  </div>
                  <div class="card-footer">
                     <center>
                        <div class="px-1">
                           <div class="row" id="counter">
                           <div class="col">                  
                                 CHARGED: 0<span id="chargec">0</span>
                              </div>
                              <div class="col">                  
                                 CVV: 0<span id="cvvc">0</span>
                              </div>
                              <div class="col">   
                                 CCN: 0<span id="ccnc">0</span>
                              </div>
                              <div class="col">
                                 DEAD: 0<span id="deadc">0</span>
                              </div>
                           </div>
                        </div>
                     </center>
                  </div>
               </div>
            </div>
         </div>
         <div class="response">
         <div class="pt-2">
            
         <div class="card mb-3">
            <div class="card bvborder">
               <div class="card-header" style="text-align: left">
                  CHARGED
                  <button class="btn btn-outline-light btn-sm" id="showcharge"> Show/Hide
                  </button>
                  <button class="btn btn-outline-light btn-sm" id="clearcharge"> Clear
                  </button>
               </div>
               <div class="card-body">
               <table class="table table-borderless blackvatican border-top">
    <tr>
      <td scope="col">Status</td>
      <td scope="col">Card</td>
      <td scope="col">Response</td>
   </tr>
      <tbody id="charges">
      </tbody>
               </table>
             </div>
          </div>
       </div>

            <div class="card mb-3">
            <div class="card bvborder">
               <div class="card-header" style="text-align: left">
                  CVV
                  <button class="btn btn-outline-light btn-sm" id="showcvv"> Show/Hide
                  </button>
                  <button class="btn btn-outline-light btn-sm" id="clearcvv"> Clear
                  </button>
               </div>
               <div class="card-body">
               <table class="table table-borderless blackvatican border-top">
    <tr>
      <td scope="col">Status</td>
      <td scope="col">Card</td>
      <td scope="col">Response</td>
   </tr>
      <tbody id="cvvs">
      </tbody>
               </table>
             </div>
          </div>
       </div>

       <div class="card mb-3">
            <div class="card bvborder">
               <div class="card-header" style="text-align: left">
                  CCN
                  <button class="btn btn-outline-light btn-sm" id="showccn"> Show/Hide
                  </button>
                   <button class="btn btn-outline-light btn-sm" id="clearccn"> Clear
                  </button>
               </div>
               <div class="card-body">
                  <table class="table table-borderless blackvatican border-top">
    <tr>
      <td scope="col">Status</td>
      <td scope="col">Card</td>
      <td scope="col">Response</td>
   </tr>
      <tbody id="ccns">
      </tbody>
               </table>
               </div>
            </div>
         </div>

         <div class="card mb-3">
            <div class="card bvborder">
               <div class="card-header" style="text-align: left">
                  Dead
                  <button class="btn btn-outline-light btn-sm" id="showdead"> Show/Hide
                  </button>
                   <button class="btn btn-outline-light btn-sm" id="cleardead"> Clear
                  </button>
               </div>
               <div class="card-body">
                  <table class="table table-borderless blackvatican border-top">
    <tr>
      <td scope="col">Status</td>
      <td scope="col">Card</td>
      <td scope="col">Response</td>
   </tr>
      <tbody id="deads">
      </tbody>
               </table>
               </div>
            </div>
         </div>
      </div>
<div id="debug"></div>
</div>
   </body>
   <script src="assets/js/jquery-3.6.0.min.js" type="text/javascript"></script>
   <script src="assets/js/jquery.redirect.js" type="text/javascript"></script>
   <script src="assets/js/blackvatican.js" type="text/javascript"></script>
   <script src="assets/js/generator.js" type="text/javascript"></script>
   <script src="assets/js/bootstrap.bundle.min.js" type="text/javascript"></script>
</html>