<?php include "header.php";?>
    
<div class="home-section">
        <div class="container">
        <ul class="responsive-table">
              <li class="table-header">
                <div class="col col-1">catefoty</div>
                <div class="col col-2">Name</div>
                <!-- <div class="col col-4">Payment Status</div> -->
              </li>
    <?php 
    foreach ($cat as $x) {
    ?>
    
    <li class="table-row">
                <div class="col col-1" data-label="Job Id"><?php echo $x; ?></div>
                <div class="col col-2" data-label="Customer Name"><button type="button" class="btn btn-primary btn-sm onceADayButton" onclick="fetchnews('<?php echo $x; ?>')"><?php echo $x; ?></button></div>
                
                <!-- <div class="col col-4" data-label="Payment Status">Pending</div> -->
              </li>
    <?php } ?>
    </ul>
    <script type="text/javascript">

        alert("hello  <?php 
            // session_start();
            echo $_SESSION["username"];
            ?> , you have the power to update the news of these category , but you can only tap it once a day!!!");


        const fetchnews = async (cat) => {
            //console.log("fetch")
            var url = 'https://newsapi.org/v2/everything?' +
                'q='+cat+'&' +
                'pageSize= 100&' +
                'page=1&' +
                // 'from=2024-02-12&' +
                'from=<?php
                // echo date("d")-1;
                echo date("Y-m-d",strtotime("yesterday")) ?>&' +
                'sortBy=popularity&' +
                'apiKey=141646777ebb47469fb496bbf5a1881f';

            var req = new Request(url);

            let a = await fetch(req)
            let response = await a.json()
            // console.log(response)
            for (var item in response.articles) {
                let g = response.articles[item]
                console.log(g['urlToImage'])
                if (g['urlToImage']== null){
                  console.log(0)
                  continue
                }

                fetch("script.php?id="+cat+"", {
                    "method": "POST",
                    "headers": {
                        "Content-Type": "application/json; charset=utf-8"
                    },
                    'body': JSON.stringify(g)

                }).then(function (response) {
                    return response.text();
                }).then(function (data) {
                    console.log(data);
                })
            }

        }


        document.addEventListener("DOMContentLoaded", function () {
    const onceADayButtons = document.querySelectorAll(".onceADayButton");
  
    // Loop through each button
    onceADayButtons.forEach(function (button) {
      const buttonId = button.innerText.toLowerCase().replace(/\s/g, '_'); // Create a unique ID for each button
  
      // Check if the button has been clicked today
      const lastClickTimestamp = localStorage.getItem(`lastClickTimestamp_${buttonId}`);
      if (lastClickTimestamp) {
        const lastClickDate = new Date(parseInt(lastClickTimestamp));
        const today = new Date();
  
        if (lastClickDate.getDate() === today.getDate() &&
            lastClickDate.getMonth() === today.getMonth() &&
            lastClickDate.getFullYear() === today.getFullYear()) {
          // Button has already been clicked today
          button.disabled = true;
        }
      }
  
      // Add click event listener
      button.addEventListener("click", function () {
        // Disable the button
        button.disabled = true;
  
        // Save the current timestamp to local storage
        const currentTimestamp = new Date().getTime();
        localStorage.setItem(`lastClickTimestamp_${buttonId}`, currentTimestamp);
      });
    });
  });
  
    </script>
<?php 
include "footer.php";
 ?>