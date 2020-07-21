function randomDice(){
    var randomNumber1=Math.floor(Math.random() *6)+1; //random Dice1.

    var randomNumber2=Math.floor(Math.random() *6)+1; //random dice 2.
    
    var randomDiceImage="images/"+"dice"+randomNumber1+".png"; //setting the image path1.
    
    var randomDiceImage2="images/"+"dice"+randomNumber2+".png";//setting the image path2.
    
    var image1=document.querySelectorAll("img")[0];//getting the dice image for player1 in the html using javascript.
    
    var image2=document.querySelectorAll("img")[1];//getting the dice image for player2 in the html using javascript.
    
    image1.setAttribute("src",randomDiceImage);//setting the dice image for player1 in the html using javascript.
    
    image2.setAttribute("src",randomDiceImage2);//setting the dice image for player2 in the html using javascript.
    
    //Conditions for verifying the winner 
    if(randomNumber1>randomNumber2){
        document.querySelector("h2").innerHTML="Player1 is the winner🏁 !!";
        document.querySelector("h1").style.fontSize="5rem";
    }
    
    else if(randomNumber2>randomNumber1){
        document.querySelector("h2").innerHTML="🏁Player2 is the winner!!";
        document.querySelector("h1").style.fontSize="5rem";
    }
    else{
        document.querySelector("h2").innerHTML="🏳️It's a Draw🏳️";
        document.querySelector("h1").style.fontSize="5rem";
    }
}
