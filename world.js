//Gets the Id of the button and and when it is clicked it runs the function

function search(type){

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

    const url = "world.php?country=" + encodeURIComponent(query) + "&search=" + type;
    httpRequest.open("GET", url, true);
    httpRequest.send();

}

document.getElementById('lookup-country').addEventListener("click",function()
{   
    search("country");

});

document.getElementById('lookup-city').addEventListener("click",function()
{   
    search("city");

});

