//za brisanje korisnika

$('.btnuser').click(function(){
    var id = $(this).attr("data-id");
    $.ajax({
        url:'http://localhost/SajtPHP2019/modules/deleteUser.php',
        type:'POST',
        data:{
            id:id
        },
        success:function(data){
            console.log(data);
            alert("User deleted!");
        },
        error:function(status,xhr,error){
            console.log(status);
        }


    });


});


//za brisanje rezervacija


$('.rezBrisi').click(function(){
    var id = $(this).attr('data-id');
    $.ajax({
        url:'http://localhost/SajtPHP2019/modules/deleteRez.php',
        type:'POST',
        data:{

            id:id
        },
        success:function(data){
            console.log(data);
            alert("Reservation deleted");
        },
        error:function(status,xhr,error){
            console.log(status);
        }


    });


});



//za brisanje linkova

$('.linkBrisi').click(function(){
    var id = $(this).attr('data-id');
    $.ajax({
        url:'http://localhost/SajtPHP2019/modules/deleteLink.php',
        type:'POST',
        data:{

            id:id
        },
        success:function(data){
            console.log(data);
            alert("Link deleted");
        },
        error:function(status,xhr,error){
            console.log(status);
        }


    });


});



//za brisanje obroka

$('.obrokBrisi').click(function(){
    var id = $(this).attr('data-id');
    $.ajax({
        url:'http://localhost/SajtPHP2019/modules/deleteObrok.php',
        type:'POST',
        data:{

            id:id
        },
        success:function(data){
            console.log(data);
            alert("Meal deleted");
        },
        error:function(status,xhr,error){
            console.log(status);
        }


    });


});



//za brisanje osoblja

$('.osobljeBrisi').click(function(){
    var id = $(this).attr('data-id');
    $.ajax({
        url:'http://localhost/SajtPHP2019/modules/deleteOsoblje.php',
        type:'POST',
        data:{

            id:id
        },
        success:function(data){
            console.log(data);
            alert("Staff deleted");
        },
        error:function(status,xhr,error){
            console.log(status);
        }


    });


});



//za brisanje specijaliteta

$('.specBrisi').click(function(){
    var id = $(this).attr('data-id');
    $.ajax({
        url:'http://localhost/SajtPHP2019/modules/deleteSpec.php',
        type:'POST',
        data:{

            id:id
        },
        success:function(data){
            console.log(data);
            alert("Speciality deleted");
        },
        error:function(status,xhr,error){
            console.log(status);
        }


    });


});



//za brisanje vesti

$('.vestBrisi').click(function(){
    var id = $(this).attr('data-id');
    $.ajax({
        url:'http://localhost/SajtPHP2019/modules/deleteNews.php',
        type:'POST',
        data:{

            id:id
        },
        success:function(data){
            console.log(data);
            alert("News deleted");
        },
        error:function(status,xhr,error){
            console.log(status);
        }


    });


});



//za brisanje vesti

$('.komBrisi').click(function(){
    var id = $(this).attr('data-id');
    $.ajax({
        url:'http://localhost/SajtPHP2019/modules/deleteKom.php',
        type:'POST',
        data:{

            id:id
        },
        success:function(data){
            console.log(data);
            alert("Comment deleted");
        },
        error:function(status,xhr,error){
            console.log(status);
        }


    });


});


//za brisanje pitanja iz ankete

$('.ankBrisi').click(function(){
    var id = $(this).attr('data-id');
    $.ajax({
        url:'http://localhost/SajtPHP2019/modules/deleteQue.php',
        type:'POST',
        data:{

            id:id
        },
        success:function(data){
            console.log(data);
            alert("Question deleted");
        },
        error:function(status,xhr,error){
            console.log(status);
        }


    });


});





//za brisanje odgovora iz ankete

$('.odgBrisi').click(function(){
    var id = $(this).attr('data-id');
    $.ajax({
        url:'http://localhost/SajtPHP2019/modules/deleteOdg.php',
        type:'POST',
        data:{

            id:id
        },
        success:function(data){
            //console.log(data);
            alert("Answer deleted");
        },
        error:function(status,xhr,error){
            console.log(status);
        }


    });


});




//za brisanje jela

$('.jeloBrisi').click(function(){
    var id = $(this).attr('data-id');
    $.ajax({
        url:'http://localhost/SajtPHP2019/modules/deleteJelo.php',
        type:'POST',
        data:{

            id:id
        },
        success:function(data){
            //console.log(data);
            //alert(id);
            alert("Dish deleted");
        },
        error:function(status,xhr,error){
            console.log(xhr.status);
        }


    });


});




//za brisanje deserta

$('.desBrisi').click(function(){
    var id = $(this).attr('data-id');
    $.ajax({
        url:'http://localhost/SajtPHP2019/modules/deleteDesert.php',
        type:'POST',
        data:{

            id:id
        },
        success:function(data){
            //console.log(data);
            alert("Dessert deleted");
        },
        error:function(status,xhr,error){
            console.log(status);
        }


    });


});




//za brisanje pica

$('.piceBrisi').click(function(){
    var id = $(this).attr('data-id');
    $.ajax({
        url:'http://localhost/SajtPHP2019/modules/deletePice.php',
        type:'POST',
        data:{

            id:id
        },
        success:function(data){
            //console.log(data);
            alert("Drink deleted");
        },
        error:function(status,xhr,error){
            console.log(status);
        }


    });


});












