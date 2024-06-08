
    <?php
    include "header.php";
    include "config.php";


    $sqll= "UPDATE `offset` SET number =0 WHERE sno =1;";
    mysqli_query($conn, $sqll);

    $sqlll= "SELECT number FROM `offset` WHERE sno =1;";
    $res = mysqli_fetch_assoc(mysqli_query($conn, $sqlll));


    $my_array = array(0,100,200,300,400);

    shuffle($my_array);


    ?>
    <div class="home-section">
        <div class="reelsection" id="box">
        <?php
        foreach ($my_array as $x) {
        
        $sql= "SELECT * FROM `post` ORDER BY post_id DESC LIMIT {$x},1;";
        $result = mysqli_query($conn, $sql);
            while($row= mysqli_fetch_assoc($result)){
                $a =($row['img']) ;
                $b =strval($row['author']) ;
                $c =strval($row['title']) ;
                $d =strval($row['post_date']) ;
                $e =strval($row['description']) ;
                $f =strval($row['url']) ;

        ?>
            <article class="reel">
                <div class="article-wrapper">
                    <figure>
                        <img src="<?php echo $a;?>"
                            alt="" />
                    </figure>
                    <div class="article-body">
                        <h2><?php echo $c;?></h2>
                        <?php //echo $x ; ?>
                        <p><?php echo $e;?></p>
                        <?php //echo $x?>
                        <a href="#" class="read-more">
                            Read more <span class="sr-only"></span>
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" viewBox="0 0 20 20"
                                fill="currentColor">
                                <path fill-rule="evenodd"
                                    d="M12.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-2.293-2.293a1 1 0 010-1.414z"
                                    clip-rule="evenodd" />
                            </svg>
                        </a>
                    </div>
                </div>
            </article>

            <?php }
        }
            if($conn->query($sql) == true){
                // echo "Successfully inserted";
            
            }
            else{
                echo "ERROR: $sql <br> $conn->error";
            }
            
            $conn->close();?>
            
        </div>
    </div>
    <script>
        
        const box = document.getElementById('box')
        box.addEventListener('scroll', (e) => {
            let scrollableHeight = box.scrollHeight - box.clientHeight
            // console.log(scrollableHeight, box.scrollTop)
            if (Math.ceil(box.scrollTop) >= scrollableHeight) {
                console.log('User has scrolled to the bottom of this section!')
                
                
                let names=[0,100,200,300,400]
                //* Randomize array in-place using Durstenfeld shuffle algorithm */
                function shuffleArray(array) {
                    for (var i = array.length - 1; i > 0; i--) {
                        var j = Math.floor(Math.random() * (i + 1));
                        var temp = array[i];
                        array[i] = array[j];
                        array[j] = temp;
                    }
                }
                shuffleArray(names)
                console.log(names);
    //   var a,          
for (let index = 0; index < names.length; index++) {
                const childElement = document.createElement("article")
                childElement.classList = ["reel"]
                let user ={
                    "username":names[index],
                    "ind":index,
                }
                console.log(index);
                fetch("script.php", {
                    "method": "POST",
                    "headers": {
                        "Content-Type": "application/json; charset=utf-8"
                    },
                    'body': JSON.stringify(user)

                }).then(function (response) {
                    return response.text();
                }).then(function (data) {
                    console.log(data);
                    childElement.innerHTML = data;
                })
                box.appendChild(childElement)
                const myTimeout = setTimeout(myGreeting, 5000);

                function myGreeting() {
                console.log(index);
                }
    
}
                
                
            }      
                
        })
    </script>
<?php include "footer.php";?>