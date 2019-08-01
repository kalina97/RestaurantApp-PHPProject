//alert();
//funkcija za back to top dugme
$("#dugmence").click(function(e) {
    e.preventDefault();
    $('html, body').animate({
        scrollTop: 0
    }, 800);
});


//klijentska validacija
function provera()
{
    var ime,reIme,prezime,rePrezime,usrname,reUser,email, reEmail,sifra,reSira,nizGreske;

    ime= document.getElementById("ime");
    usrname= document.getElementById("username");
    prezime= document.getElementById("prezime");
    email = document.getElementById("email");
    reIme= /^[A-Z][a-z]{2,9}$/;
    rePrezime= /^[A-Z][a-z]{2,14}$/;
    reEmail = /^[a-z][A-z\.\-0-9]{4,35}\@[a-z]{2,5}(\.[a-z]{2,5}){1,3}$/;
    sifra=document.getElementById("password");
    reSifra=/^([A-Za-z\d]){8,}$/;
    nizGreske=[];
    reUser=/^[a-z0-9\_]{4,15}$/;

    if(!reIme.test(ime.value))
    {
        ime.style.border="2px solid red";
        ime.style.borderRadius = "5px";
        nizGreske.push("Name is not ok");
        document.getElementById('eror1').innerHTML = "Name is not correct! Try again!";
    }
    else
    {
        ime.style.border = "2px solid #00ff00";
        ime.style.borderRadius = "5px";
        document.getElementById('eror1').innerHTML = "";
    }

    if(!rePrezime.test(prezime.value))
    {
        prezime.style.border= "2px solid red";
        prezime.style.borderRadius = "5px";
        nizGreske.push("Surname is not ok");
        document.getElementById('eror2').innerHTML = "Surname is not correct! Try again!!";
    }
    else
    {
        prezime.style.border = "2px solid #00ff00";
        prezime.style.borderRadius = "5px";
        document.getElementById('eror2').innerHTML = "";
    }



    if(!reUser.test(usrname.value))
    {
        usrname.style.border= "2px solid red";
        usrname.style.borderRadius = "5px";
        nizGreske.push("Username is not ok");
        document.getElementById('erorUser').innerHTML = "Username is not correct! Try again!";
    }
    else
    {
        usrname.style.border = "2px solid #00ff00";
        usrname.style.borderRadius = "5px";
        document.getElementById('erorUser').innerHTML = "";
    }





    if(!reEmail.test(email.value))
    {
        email.style.border = "2px solid red";
        email.style.borderRadius = "5px";
        nizGreske.push("Email is not ok");
        document.getElementById('erorMail').innerHTML = "Email is not correct! Try again!";
    }
    else
    {
        email.style.border = "2px solid #00ff00";
        email.style.borderRadius = "5px";
        document.getElementById('erorMail').innerHTML = "";
    }


    if(!reSifra.test(sifra.value))
    {
        sifra.style.border= "2px solid red";
        sifra.style.borderRadius = "5px";
        nizGreske.push("Password is not ok");
        document.getElementById('erorS').innerHTML = "Password is not correct! Try again!";
    }
    else
    {
        sifra.style.border = "2px solid #00ff00";
        sifra.style.borderRadius = "5px";
        document.getElementById('erorS').innerHTML = "";
    }


//slanje podataka serveru, nakon sto su dobro popunjena polja forme


    if(nizGreske.length>0){

        var ispis="<ol class='lista'>";
        ispis += "<h3 class='pomeri'>Errors:</h3>";
        for(var i=0;i<nizGreske.length;i++){
            ispis += "<li>" + nizGreske[i] + "</li>";
        }

        ispis += "</ol>";

        document.querySelector("#poruka1").innerHTML=ispis;
    }
    else{
        const BASE_URL = "http://localhost/SajtPHP2019/";
        $("#dugme").click(function(){

            function getFormData() {
                var obj = {
                    firstName : $("#ime").val(),
                    lastName : $("#prezime").val(),
                    email : $("#email").val(),
                    username : $("#username").val(),
                    sifra: $("#password").val(),
                    send : true
                };
                console.log(obj);
                return obj;
            }

            function callAjax(obj) {
                $.ajax({
                    url : BASE_URL + "modules/register.php",
                    type : "post",
                    data : obj,
                    success : function(data, xhr) {
                        //alert('You have successfully registered');
                        $("#poruka1").html("<h1 class='naslov'>You have successfully registered!</h1>");
                    },
                    error : function(xhr, status, error) {
                        var poruka = "Doslo je do greske.";
                        switch(xhr.status) {

                            case 404 :
                                poruka = "Page not found!";
                                break;
                            case 409:
                                poruka = "User already exists!";
                                break;
                            case 422:
                                poruka = "Invalid data!";

                                break;
                            case 500:
                                poruka = "Server error!";
                                break;
                                console.log(xhr);
                        }
                        $("#poruka1").html(poruka);
                    }

                });
            }
            var formData = getFormData();
            callAjax(formData);
        });
    }

}


////////////////////////////////
//provera podataka za login


    function loginProvera() {

        var email, sifra, regMail, regSifra, nizGreske;

        email = document.getElementById("email");
        sifra = document.getElementById("password");
        regMail = /^[a-z][A-z\.\-0-9]{4,35}\@[a-z]{2,5}(\.[a-z]{2,5}){1,3}$/;
        regSifra = /^([A-Za-z\d]){8,}$/;
        nizGreske = [];


        if (!regMail.test(email.value)) {
            email.style.border = "2px solid red";
            email.style.borderRadius = "5px";
            nizGreske.push("Email is not ok");
            document.getElementById('erorMail').innerHTML = "Email is not correct! Try again!";
        } else {
            email.style.border = "2px solid #00ff00";
            email.style.borderRadius = "5px";
            document.getElementById('erorMail').innerHTML = "";
        }


        if (!regSifra.test(sifra.value)) {
            sifra.style.border = "2px solid red";
            sifra.style.borderRadius = "5px";
            nizGreske.push("Password is not ok");
            document.getElementById('erorS').innerHTML = "Password is not correct! Try again!";
        } else {
            sifra.style.border = "2px solid #00ff00";
            sifra.style.borderRadius = "5px";
            document.getElementById('erorS').innerHTML = "";
        }

        if (nizGreske.length > 0) {

            var ispis = "<ol class='lista'>";
            ispis += "<h3 class='pomeri'>Errors:</h3>";
            for (var i = 0; i < nizGreske.length; i++) {
                ispis += "<li>" + nizGreske[i] + "</li>";
            }

            ispis += "</ol>";

            document.querySelector("#poruka1").innerHTML = ispis;
        } else {
            //const BASE_URL = "http://localhost/SajtPHP2019/";
            $("#dugmee").click(function () {

                /*function getFormData() {
                    var obj = {
                        email: $("#email").val(),
                        password: $("#password").val(),
                        send: true
                    };
                    console.log(obj);
                    return obj;
                }
*/

                // function callAjax(obj) {
                $.ajax({
                    url: "http://localhost/SajtPHP2019/modules/login.php",
                    type: "post",
                    dataType: "json",
                    data: {
                        email: $("#email").val(),
                        password: $("#password").val(),
                        send: true
                    },
                    success: function (podaci) {
                        //alert();
                        window.location.href = podaci['lokacija'];
                    },
                    error: function (xhr, status, errMsg) {
                        console.log(xhr.status);
                        var odgovor = JSON.parse(xhr.responseText);
                        switch (odgovor['eror']) {
                            case '500':
                                //window.location.href = "views/login.php";
                                $("#poruka1").html("<h3>Server error!</h3>");
                                break;
                            case '422':
                                //window.location.href = "index.php?page=login";
                                $("#poruka1").html("<h3>You must first register!</h3>");
                                break;
                            case '409':
                                //window.location.href = "views/login.php";
                                $("#poruka1").html("<h3>User already exists!</h3>");
                                break;
                            case '404':
                                //window.location.href = "views/login.php";
                                $("#poruka1").html("<h3>Page not found!</h3>");
                                break;
                        }
                    }
                });
                // var formData = getFormData();
                //callAjax(formData);
                //  }
                //});


            });

        }

    }



//deo za kontakt


 function contact() {

    var email = document.getElementById("email");
    var firstName = document.getElementById("firstName");
     var comment = document.getElementById("comment");
     var password = document.getElementById("password");
    var reEmail = /^[a-z][A-z\.\-0-9]{4,35}\@[a-z]{2,5}(\.[a-z]{2,5}){1,3}$/;
     var reName = /^[A-Z][a-z]{2,9}$/;
     var rePassword = /^([A-Za-z\d]){8,}$/;
     var errors = [];
     if (!reName.test(firstName.value)){
         errors.push("Incorrect name");
         document.getElementById('eror1').innerHTML = "Name is not correct! Try again!";
         document.getElementById("firstName").style.border = "2px solid red";
         firstName.style.borderRadius = "5px";

     }
     else {
         firstName.style.borderRadius = "5px";
         document.getElementById("firstName").style.border = "2px solid #00ff00";
         document.getElementById('eror1').innerHTML = "";
     }

     if (!rePassword.test(password.value)){
         errors.push("Incorrect password");
         document.getElementById('erorS').innerHTML = "Password is not correct! Try again!";
         document.getElementById("password").style.border = "2px solid red";
         password.style.borderRadius = "5px";

     }
     else {
         password.style.borderRadius = "5px";
         document.getElementById("password").style.border = "2px solid #00ff00";
         document.getElementById('erorS').innerHTML = "";
     }



     if (!reEmail.test(email.value)){
         errors.push("Incorrect email");
         email.style.borderRadius = "5px";
         document.getElementById('erorMail').innerHTML = "Email is not correct! Try again!";
         document.getElementById("email").style.border = "2px solid red";
     }
     else {
         document.getElementById('erorMail').innerHTML = "";
         email.style.borderRadius = "5px";
         document.getElementById("email").style.border = "2px solid #00ff00";
     }

     if(comment.value == ""){
         comment.style.borderRadius = "5px";
         document.getElementById('erorC').innerHTML = "You must type a comment!";
         errors.push("Please type a comment");
         document.getElementById("comment").style.border = "2px solid red";
     }
     else {
         document.getElementById('erorC').innerHTML = "";
         comment.style.borderRadius = "5px";
         document.getElementById("comment").style.border = "2px solid #00ff00";
    }
     if (errors.length > 0) {

         var ispis = "<ol class='lista'>";
         ispis += "<h3 class='pomeri'>Errors:</h3>";
         for (var i = 0; i < errors.length; i++) {
             ispis += "<li>" + errors[i] + "</li>";
         }

         ispis += "</ol>";

         document.querySelector("#poruka2").innerHTML = ispis;
     }

     else{
         $('#potvrdi').click(function () {

             $.ajax({
                 url:"http://localhost/SajtPHP2019/modules/kontakt.php",
                 type:"post",
                 //dataType:"json",
                 data:{
                     firstName:$('#firstName').val(),
                     email:$('#email').val(),
                     password:$('#password').val(),
                     comment:$('#comment').val(),
                     send:true
                 },
                 success:function (data) {

                        // alert('Uspesno');


                   //window.location.href=podaci['odg'];
                         $("#poruka2").html("<h3>You sent an email to the admin!</h3>");
                     },

                 error:function (xhr,status,errMsg) {
                     console.log(xhr.responseText);

                     $("#poruka2").html("<h3>Some errors occured!</h3>");
                     //alert('Greska');

                 }
             });

         });
     }
}







//validacija za rezervacije

$('#but').click(function () {


    var email,datum,vreme,reEmail,brojGostiju,nizGreske;

    //ime= document.getElementById("ime1");
    //email= document.getElementById("mail");
    datum = document.getElementById("book_date");
    vreme=document.getElementById("book_time");
    //reIme=/^[A-Z][a-z]{2,9}$/;
    //reEmail = /^[a-z][A-z\.\-0-9]{4,35}\@[a-z]{2,5}(\.[a-z]{2,5}){1,3}$/;
    brojGostiju=document.getElementById("gosti");
    nizGreske=[];

    if(datum.value == ""){
        datum.style.border = "2px solid red";
        datum.style.borderRadius = "5px";
        nizGreske.push("Choose a date");
        document.getElementById('erorD').innerHTML = "You must choose a date!";
    }
    else{

        datum.style.border = "2px solid #00ff00";
        datum.style.borderRadius = "5px";
        document.getElementById('erorD').innerHTML = "";



    }

   /*
    if (!reIme.test(ime.value)){
        nizGreske.push("Incorrect name");
        document.getElementById('eror1').innerHTML = "Name is not correct! Try again!";
        document.getElementById("ime1").style.border = "2px solid red";
        ime.style.borderRadius = "5px";

    }
    else {
        ime.style.borderRadius = "5px";
        document.getElementById("ime1").style.border = "2px solid #00ff00";
        document.getElementById('eror1').innerHTML = "";
    }
*/



    if(vreme.value == ""){
        vreme.style.border = "2px solid red";
        vreme.style.borderRadius = "5px";
        nizGreske.push("Choose a time");
        document.getElementById('erorV').innerHTML = "You must choose a time!";
    }
    else{

        vreme.style.border = "2px solid #00ff00";
        vreme.style.borderRadius = "5px";
        document.getElementById('erorV').innerHTML = "";



    }


    if(brojGostiju.value == "0"){
        brojGostiju.style.border = "2px solid red";
        brojGostiju.style.borderRadius = "5px";
        nizGreske.push("Choose number of guests");
        document.getElementById('erorGS').innerHTML = "You must type number of guests!";
    }
    else{

        brojGostiju.style.border = "2px solid #00ff00";
        brojGostiju.style.borderRadius = "5px";
        document.getElementById('erorGS').innerHTML = "";

    }


    /*
    if(!reEmail.test(email.value))
    {
        email.style.border = "2px solid red";
        email.style.borderRadius = "5px";
        nizGreske.push("Email is not ok");
        document.getElementById('erorMail').innerHTML = "Email is not correct! Try again!";
    }
    else
    {
        email.style.border = "2px solid #00ff00";
        email.style.borderRadius = "5px";
        document.getElementById('erorMail').innerHTML = "";
    }

  */



//slanje podataka serveru, nakon sto su dobro popunjena polja forme


    if(nizGreske.length>0){

        var ispis="<ol class='lista'>";
        ispis += "<h3 class='pomeri'>Errors:</h3>";
        for(var i=0;i<nizGreske.length;i++){
            ispis += "<li>" + nizGreske[i] + "</li>";
        }

        ispis += "</ol>";

        document.querySelector("#poruka4").innerHTML=ispis;
    }
    else{

       //$("#but").click(function(e){
           //e.preventDefault();
            $.ajax({
                    url :"http://localhost/SajtPHP2019/modules/registerRez.php",
                    type : "post",
                    dataType:"json",
                    data : {
                        //name : $("#ime1").val(),
                        //email : $("#mail").val(),
                        datum: $("#book_date").val(),
                        vreme: $("#book_time").val(),
                        gosti: $("#gosti").val(),
                        send : true
                    },
                    success : function(data, xhr) {
                        //alert('Uspešno ste uneli rezervaciju');
                        $("#poruka4").html("<h1 class='naslov'>Successful reservation!</h1>");
                    },
                    error : function(xhr, status, error) {
                        var poruka = "Something went wrong";
                        switch(xhr.status) {

                            case 404 :
                                poruka = "Page not found!";
                                break;
                            case 409:
                                poruka = "User already exists!";
                                break;
                            case 422:
                                poruka = "Invalid data!";

                                break;
                            case 500:
                                poruka = "Server Error!";
                                break;
                                console.log(xhr);
                        }
                        $("#poruka4").html(poruka);
                    }

                });


     // });
    }

});


//anketa


$('input:submit[name=anketa]').on('click',function (e) {
    e.preventDefault();
    var id = $(this).data("id");
    var radio = document.getElementsByName("radio"+id);
    for(var i=0;i<radio.length;i++){
        if(radio[i].checked){
            var odgovor=radio[i].value;
        }
    }
    $.ajax({
        url:"http://localhost/SajtPHP2019/modules/anketa.php",
        method:"post",
        dataType:"json",
        data:{ anketa:"ok",
               id:id,
               odgovor:odgovor
        },
        success:function (data) {
            //alert(data['odg']);
			
            $("#poruka"+id).html("<h3 id='naslov336'>Success Vote!</h3>");

        },
        error:function (xhr,status,errMes) {
            $("#poruka"+id).html("<h3 id='naslov336'>You have already voted!</h3>");
        }
    });
});
















$('#link').on('click',function () {
   var id=$(this).attr("data-id");

   window.location.href=("index.php?page=news&id=" + id);

});







        $('#dugme225').click(function (e) {

          e.preventDefault();
          var datum=document.getElementById("jojdat");
            var comment = document.getElementById("comment1");
            var errors=[];

            if(comment.value == ""){
                comment.style.borderRadius = "5px";
                document.getElementById('erorC').innerHTML = "You must type a comment!";
                errors.push("Please type a comment");
                document.getElementById("comment1").style.border = "2px solid red";
            }
            else {
                document.getElementById('erorC').innerHTML = "";
                comment.style.borderRadius = "5px";
                document.getElementById("comment1").style.border = "2px solid #00ff00";
            }


            if(datum.value == ""){
                datum.style.border = "2px solid red";
                datum.style.borderRadius = "5px";
                errors.push("Choose a date");
                document.getElementById('erordatum').innerHTML = "You must choose a date!";
            }
            else{

                datum.style.border = "2px solid #00ff00";
                datum.style.borderRadius = "5px";
                document.getElementById('erordatum').innerHTML = "";



            }








            if(errors.length>0){

                var ispis="<ol class='lista'>";
                ispis += "<h3 class='pomeri'>Errors:</h3>";
                for(var i=0;i<errors.length;i++){
                    ispis += "<li>" + errors[i] + "</li>";
                }

                ispis += "</ol>";

                document.querySelector("#poruka5").innerHTML=ispis;
            }


  else{


        var id = $(this).attr("data-id");

            $.ajax({
                url:"http://localhost/SajtPHP2019/modules/insertKom.php",
                method:"post",
                dataType:"json",
                data:{
                    send:true,
                    datum:$("#jojdat").val(),
                    comment:$('#comment1').val(),
                    id:id,
                },
                success:function (data) {
                    console.log(data);
                      //alert(data["uspeh"]);

                    var ispis = "<h3 class='pozadi'>By: " + data.ime +  " | " + data.datum  + " | " + "<span class='icon-chat'></span></h3>"
                        + "<div class='komentic'>"+
                    "<textarea id='oblast' rows='3' cols='76' disabled='true'>" + data.komentar + "</textarea>"+
                    "</div>";

                    $("#poruka5").html("<h2 id='naslov'>You commented on this news!</h2>");


                    $("#prikazi").append(ispis);
                    $("#jojdat").attr("disabled",true);
                    $("#comment1").attr("disabled",true);
                    $("#dugme225").attr("disabled",true);
                    $("#jojdat").css("border","1px solid black");
                    $("#comment1").css("border","1px solid black");

                },
                error:function (xhr,status,errMes) {
                    //alert("Nije stigao");
                    console.log(xhr.responseText);
                }
            });



        }






});










  //linkovi validacija


$('#buton').click(function () {


    var ime,putanja,reIme,nizGreske;

    ime= document.getElementById("nlink");
    putanja= document.getElementById("hlink");
    //roditelj = document.getElementById("plink");
    reIme=/^[A-Z][a-z]{2,9}$/;
    //reRoditelj = /^[0-9]{1}$/;
    nizGreske=[];

    if(putanja.value == ""){
        putanja.style.border = "2px solid red";
        putanja.style.borderRadius = "5px";
        nizGreske.push("Please type link href");
        document.getElementById('erorDl').innerHTML = "You must type link href!";
    }
    else{

        putanja.style.border = "2px solid #00ff00";
        putanja.style.borderRadius = "5px";
        document.getElementById('erorDl').innerHTML = "";

    }


    if (!reIme.test(ime.value)){
        nizGreske.push("Incorrect name");
        document.getElementById('eror19').innerHTML = "Name is not correct! Try again!";
        document.getElementById("nlink").style.border = "2px solid red";
        ime.style.borderRadius = "5px";

    }
    else {
        ime.style.borderRadius = "5px";
        document.getElementById("nlink").style.border = "2px solid #00ff00";
        document.getElementById('eror19').innerHTML = "";
    }




//slanje podataka serveru, nakon sto su dobro popunjena polja forme


    if(nizGreske.length>0){

        var ispis="<ol class='lista'>";
        ispis += "<h3 class='pomeri'>Errors:</h3>";
        for(var i=0;i<nizGreske.length;i++){
            ispis += "<li>" + nizGreske[i] + "</li>";
        }

        ispis += "</ol>";

        document.querySelector("#poruka45").innerHTML=ispis;
    }
    else{


        $.ajax({
            url :"http://localhost/SajtPHP2019/modules/insertLink.php",
            type : "post",
            dataType:"json",
            data : {
                ime : $("#nlink").val(),
                putanja : $("#hlink").val(),
                roditelj: $("#plink").val(),
                send : true
            },
            success : function(data, xhr) {
                //alert('Uspešno ste uneli rezervaciju');
                $("#poruka45").html("<h1 class='naslov'>You inserted a link!</h1>");
            },
            error : function(xhr, status, error) {
                var poruka = "Something went wrong";
                switch(xhr.status) {

                    case 404 :
                        poruka = "Page not found!";
                        break;
                    case 409:
                        poruka = "User already exists!";
                        break;
                    case 422:
                        poruka = "Invalid data!";

                        break;
                    case 500:
                        poruka = "Server Error!";
                        break;
                        console.log(xhr);
                }
                $("#poruka4").html(poruka);
            }

        });



    }

});



//obrok validacija



$('#buton11').click(function () {


    var ime,nizGreske,reIme;
    reIme=/^[A-Z][a-z]{2,9}$/;
    ime= document.getElementById("meal");
    nizGreske=[];

    if (!reIme.test(ime.value)){
        nizGreske.push("Incorrect name");
        document.getElementById('erorDl1').innerHTML = "Name is not correct! Try again!";
        document.getElementById("meal").style.border = "2px solid red";
        ime.style.borderRadius = "5px";

    }
    else{

        ime.style.border = "2px solid #00ff00";
        ime.style.borderRadius = "5px";
        document.getElementById('erorDl1').innerHTML = "";

    }



//slanje podataka serveru, nakon sto su dobro popunjena polja forme


    if(nizGreske.length>0){

        var ispis="<ol class='lista'>";
        ispis += "<h3 class='pomeri'>Errors:</h3>";
        for(var i=0;i<nizGreske.length;i++){
            ispis += "<li>" + nizGreske[i] + "</li>";
        }

        ispis += "</ol>";

        document.querySelector("#poruka454").innerHTML=ispis;
    }
    else{


        $.ajax({
            url :"http://localhost/SajtPHP2019/modules/insertMeal.php",
            type : "post",
            dataType:"json",
            data : {
                ime : $("#meal").val(),
                send : true
            },
            success : function(data, xhr) {
                //alert('Uspešno ste uneli rezervaciju');
                $("#poruka454").html("<h1 class='naslov'>You inserted a meal!</h1>");
            },
            error : function(xhr, status, error) {
                var poruka = "Something went wrong";
                switch(xhr.status) {

                    case 404 :
                        poruka = "Page not found!";
                        break;
                    case 409:
                        poruka = "User already exists!";
                        break;
                    case 422:
                        poruka = "Invalid data!";

                        break;
                    case 500:
                        poruka = "Server Error!";
                        break;
                        console.log(xhr);
                }
                $("#poruka4").html(poruka);
            }

        });



    }

});




//osoblje validacija


/*
$('#buton33').click(function () {


    var slika,zanimanje,podaci,reZan,nizGreske,reImePrezime;
    reImePrezime=/^[A-Z]+$/;
    slika=document.getElementById("slika");
    zanimanje=document.getElementById("zanimanje");
    podaci=document.getElementById("podaci");
    reZan=/^[A-Z][a-z]{2,9}$/;
    nizGreske=[];

    if (!reImePrezime.test(podaci.value)){
        nizGreske.push("Incorrect name and surname");
        document.getElementById('erorns').innerHTML = "Name and surname is not correct! Try again!";
        document.getElementById("podaci").style.border = "2px solid red";
        podaci.style.borderRadius = "5px";

    }
    else{

        podaci.style.border = "2px solid #00ff00";
        podaci.style.borderRadius = "5px";
        document.getElementById('erorns').innerHTML = "";

    }


    if (!reZan.test(zanimanje.value)){
        nizGreske.push("Incorrect occupation");
        document.getElementById('erorocc').innerHTML = "Occupation is not typed! Try again!";
        document.getElementById("zanimanje").style.border = "2px solid red";
        zanimanje.style.borderRadius = "5px";

    }
    else{

        zanimanje.style.border = "2px solid #00ff00";
        zanimanje.style.borderRadius = "5px";
        document.getElementById('erorocc').innerHTML = "";

    }

    if(slika.value == ""){

        nizGreske.push("You must upload picture");
        document.getElementById('erorpic').innerHTML = "Picture is not uploaded! Try again!";
    }

    else{
        document.getElementById('erorpic').innerHTML = "";

    }


//slanje podataka serveru, nakon sto su dobro popunjena polja forme


    if(nizGreske.length>0){

        var ispis="<ol class='lista'>";
        ispis += "<h3 class='pomeri'>Errors:</h3>";
        for(var i=0;i<nizGreske.length;i++){
            ispis += "<li>" + nizGreske[i] + "</li>";
        }

        ispis += "</ol>";

        document.querySelector("#poruka455").innerHTML=ispis;
    }
    else{


        $.ajax({
            url :"http://localhost/SajtPHP2019/modules/insertStaff.php",
            type : "post",
            dataType:"json",
            data : {
                file : $("#slika").val(),
                podaci: $("#podaci").val(),
                zanimanje: $("#zanimanje").val(),
                send : true
            },
            success : function(data, xhr) {
                //alert('Uspešno ste uneli rezervaciju');
                $("#poruka455").html("<h1 class='naslov'>You inserted a staff!</h1>");
            },
            error : function(xhr, status, error) {
                var poruka = "Something went wrong";
                switch(xhr.status) {

                    case 404 :
                        poruka = "Page not found!";
                        break;
                    case 409:
                        poruka = "User already exists!";
                        break;
                    case 422:
                        poruka = "Invalid data!";

                        break;
                    case 500:
                        poruka = "Server Error!";
                        break;
                        console.log(xhr);
                }
                $("#poruka4").html(poruka);
            }

        });



    }

});



*/


//validacija za pitanja iz ankete


$('#butonque').click(function () {


    var pitanje,nizGreske,rePit;
    rePit=/^[A-Z][\sa-z0-9]+$/;
    pitanje= document.getElementById("ankpitanje");
    nizGreske=[];

    if (!rePit.test(pitanje.value)){
        nizGreske.push("Incorrect format for question");
        document.getElementById('erorpoll').innerHTML = "Question is not correct! Try again!";
        document.getElementById("ankpitanje").style.border = "2px solid red";
        pitanje.style.borderRadius = "5px";

    }
    else{

        pitanje.style.border = "2px solid #00ff00";
        pitanje.style.borderRadius = "5px";
        document.getElementById('erorpoll').innerHTML = "";

    }



//slanje podataka serveru, nakon sto su dobro popunjena polja forme


    if(nizGreske.length>0){

        var ispis="<ol class='lista'>";
        ispis += "<h3 class='pomeri'>Errors:</h3>";
        for(var i=0;i<nizGreske.length;i++){
            ispis += "<li>" + nizGreske[i] + "</li>";
        }

        ispis += "</ol>";

        document.querySelector("#poruka4545").innerHTML=ispis;
    }
    else{


        $.ajax({
            url :"http://localhost/SajtPHP2019/modules/insertPoll.php",
            type : "post",
            dataType:"json",
            data : {
                pitanje : $("#ankpitanje").val(),
                send : true
            },
            success : function(data, xhr) {
                //alert('Uspešno ste uneli rezervaciju');
                $("#poruka4545").html("<h1 class='naslov'>You inserted a Question!</h1>");
            },
            error : function(xhr, status, error) {
                var poruka = "Something went wrong";
                switch(xhr.status) {

                    case 404 :
                        poruka = "Page not found!";
                        break;
                    case 409:
                        poruka = "User already exists!";
                        break;
                    case 422:
                        poruka = "Invalid data!";

                        break;
                    case 500:
                        poruka = "Server Error!";
                        break;
                        console.log(xhr);
                }
                $("#poruka4545").html(poruka);
            }

        });



    }

});



//validacija za insert odgovora u anketu

$('#butonanswers').click(function () {


    var pitanje,odgovor,reOdg,nizGreske;
    odgovor=document.getElementById("anketaodgovor");
    pitanje= document.getElementById("anketapitanje");
    reOdg=/^[A-Z][\sa-z0-9]+$/;
    nizGreske=[];


    if (pitanje.value==""){
        nizGreske.push("Please choose a question");
        document.getElementById('erorua').innerHTML = "Question is not chosen! Try again!";
        document.getElementById("anketapitanje").style.border = "2px solid red";
        pitanje.style.borderRadius = "5px";

    }
    else{

        pitanje.style.border = "2px solid #00ff00";
        pitanje.style.borderRadius = "5px";
        document.getElementById('erorua').innerHTML = "";

    }


    if (!reOdg.test(odgovor.value)){
        nizGreske.push("Incorrect format for answer");
        document.getElementById('erorans').innerHTML = "Answer is not correct! Try again!";
        document.getElementById("anketaodgovor").style.border = "2px solid red";
        odgovor.style.borderRadius = "5px";

    }
    else{

        odgovor.style.border = "2px solid #00ff00";
        odgovor.style.borderRadius = "5px";
        document.getElementById('erorans').innerHTML = "";

    }



//slanje podataka serveru, nakon sto su dobro popunjena polja forme


    if(nizGreske.length>0){

        var ispis="<ol class='lista'>";
        ispis += "<h3 class='pomeri'>Errors:</h3>";
        for(var i=0;i<nizGreske.length;i++){
            ispis += "<li>" + nizGreske[i] + "</li>";
        }

        ispis += "</ol>";

        document.querySelector("#poruka4554").innerHTML=ispis;
    }
    else{


        $.ajax({
            url :"http://localhost/SajtPHP2019/modules/insertAnswer.php",
            type : "post",
            dataType:"json",
            data : {
                pitanje : $("#anketapitanje").val(),
                odgovor: $("#anketaodgovor").val(),
                send : true
            },
            success : function(data) {
                //alert(data["Answer"]);
                $("#poruka4554").html("<h1 class='naslov'>You inserted an Answer!</h1>");
            },
            error : function(xhr, status, error) {
                console.log(xhr.responseText);
                var poruka = "Something went wrong";
                switch(xhr.status) {

                    case 404 :
                        poruka = "Page not found!";
                        break;
                    case 409:
                        poruka = "User already exists!";
                        break;
                    case 422:
                        poruka = "Invalid data!";

                        break;
                    case 500:
                        poruka = "Server Error!";
                        break;
                        console.log(xhr);
                }
                $("#poruka4554").html(poruka);
            }

        });



    }

});





window.setInterval("contact()",8000);
//window.setInterval("validacijaRez()",8000);
window.setInterval("provera()",8000);
window.setInterval("loginProvera()",8000);
