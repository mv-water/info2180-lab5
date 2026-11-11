//Gets the Id of the button and and when it is clicked it runs the function

document.getElementById('lookup-country').addEventListener("click",function()
{   

    //create a object that can collect the input data from the search and stores it in a variable 
    const query = document.getElementById('country').value.trim();

    //create a object that can send HTTP requests and stores it in the variable 
    const httpRequest = new XMLHttpRequest();
    

    //runs when the server response loads fully
    httpRequest.onload = function(){
        //checks if the request was received
        if(this.status == 200){
            document.getElementById('result').innerHTML = this.responseText;
        }
        else{
            document.getElementById('result').innerHTML = "<p>Request failed</p>"
        }

    };

    //opens the request for the data from world.php and sends it
    httpRequest.open("GET", "world.php?country=" + encodeURIComponent(query), true );
    httpRequest.send();
});


