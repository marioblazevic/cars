// Registracija

window.onload = function(){

    $("#aktuelno").animate({
        letterSpacing: '8px'
      },3000);

    document.getElementById('btnSalji').addEventListener('click',provera);

}

function provera(){
    
    var imePrezime,reImePrezime,username,password,email,reUserName,reEmail,rePassword,password1;
    
    reImePrezime = /^[A-ZČĆŽŠĐ][a-zčćžšđ]{2,19}(\s[A-ZČĆŽŠĐ][a-zčćžšđ]{2,19})?$/;
    rePassword = /^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/;
    reEmail = /^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/;
    reUserName = /^[A-Za-z0-9]+(?:[ _-][A-Za-z0-9]+)*$/;
    var nizGreske= new Array();

    imePrezime = document.querySelector('#tbImePrezime').value;
    password = document.getElementById('tbPassword').value;
    password1 = document.getElementById('tbPassword1').value;
    email = document.getElementById('tbEmail').value;
    username = document.getElementById('tbUserName').value;
    console.log(password);

    if(!reImePrezime.test(imePrezime)){
        nizGreske.push("Lose uneto ime!");
    }

    if(!reUserName.test(username)){
        nizGreske.push("Neispravan username!");
    }
    if(!reEmail.test(email)){
        nizGreske.push("Neispravan email!");
    }
    if(!rePassword.test(password)){
        nizGreske.push("Password mora sadrzati barem jednu cifru i 8 karaktera!");
    }
    if(password!=password1){
        nizGreske.push("Sifre se ne poklapaju!");
    }

    var ispis = "<ul>";
    if(nizGreske.length>0){
        for(var i=0; i<nizGreske.length; i++){
            ispis += "<li>"+nizGreske[i]+"</li>";
        }
        ispis+="</ul>";
        document.getElementById('errors').innerHTML = ispis;
    }else{

        $.ajax({
            type:'post',
            url:'modules/registeruser.php',
            data:{
                send:"Neka vrednost",
                podatakIme:imePrezime,
                podatakEmail:email,
                podatakPassword:password,
                podatakUserName:username
            },
            success:function(podaci){
                alert('Uspesno ste se registrovali!');
                window.location = "index.php";
            },
            error: function(xhr,status,error){
                // var stiglo = JSON.parse(xhr.responseText);
                // var ispis = "";
                // for(var i=0; i<stiglo.length; i++){
                //     ispis+="<li>"+stiglo[i]+"</li>";
                // }
                // document.getElementById('ispis').innerHTML = ispis;
                // Ovde je ispis parsiranih gresaka koje je vratio server

                var poruka = "Stranica nije pronadjena!";
                    switch(xhr.status){
                        case 201 : poruka="Uspesno!"; break;
                        case 404 : poruka="Stranica nije pronadjena!"; break;
                        case 409 : poruka="Username ili email vec postoji!"; break;
                        case 422 : poruka="Podaci nisu validni!";
                        console.log(xhr.responseText);
                        break;
                        case 500 : poruka="Greska!"; break;
                    }
                    document.getElementById('errors').innerHTML = poruka;
            }
        });

    }

}

$(document).ready(function(){

    $('#ddlKategorije').change(function(){
        alert('asadsdsa');
    });

    // Delete korisnika

    $('.delete-user').click(function(){
        var id = $(this).data('id');
        console.log(id);

        $.ajax({
            method:'post',
            url:'modules/ajax_delete_user.php',
            dataType:'json',
            data:{
                id: id
            },
            success:function(podaci){
                alert('korisnik je uspesno obrisan!');
                window.location = "admin.php";

            },
            error:function(xhr,statusTxt,error){
                console.log(error);
                var status = xhr.status;
                switch(status){
                    case 500 : alert("Greska na serveru!"); break;
                    case 404 : alert("Stranica nije pronadjena!"); break;
                    default : alert("Greska " + status + " - " + statusTxt); break;
                }
            }
        });

    });

    $('.update-user').click(function(){
        var id = $(this).data('id');

        $.ajax({
            method:'post',
            url:'modules/ajax_get_user.php',
            dataType:'json',
            data:{
                id:id
            },
            success:function(podaci){
                $('#tbImePrezime').val(podaci.imePrezime);
                $('#tbUserName').val(podaci.username);
                $('#tbPassword').val(podaci.password);
                $('#tbEmail').val(podaci.email);
                $('#ddlUloga').val(podaci.idUloga);
                $('#idKor').val(podaci.idKorisnik);
                console.log(podaci);
            },
            error:function(xhr,statusTxt,error){
                var status = xhr.status;
                switch(status){
                    case 500 : alert("Greska na serveru!"); break;
                    case 404 : alert("Stranica nije pronadjena!"); break;
                    default : alert("Greska " + status + " - " + statusTxt); break;
                }
            }
        });

    });

    $('#btnIzmeniKor').click(function(){
        imePrezime = document.querySelector('#tbImePrezime').value;
        password = document.getElementById('tbPassword').value;
        email = document.getElementById('tbEmail').value;
        username = document.getElementById('tbUserName').value;
        id = document.getElementById('idKor').value;
        var uloga = $('#ddlUloga').val();

        reImePrezime = /^[A-ZČĆŽŠĐ][a-zčćžšđ]{2,19}(\s[A-ZČĆŽŠĐ][a-zčćžšđ]{2,19})?$/;
        rePassword = /^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/;
        reEmail = /^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/;
        reUserName = /^[A-Za-z0-9]+(?:[ _-][A-Za-z0-9]+)*$/;
        var nizGreske= new Array();

        if(!reImePrezime.test(imePrezime)){
            nizGreske.push("Lose uneto ime!");
        }
    
        if(!reUserName.test(username)){
            nizGreske.push("Neispravan username!");
        }
        if(!reEmail.test(email)){
            nizGreske.push("Neispravan email!");
        }
        if(!rePassword.test(password)){
            nizGreske.push("Password mora sadrzati barem jednu cifru i 8 karaktera!");
        }

        var ispis = "<ul>";
    if(nizGreske.length>0){
        for(var i=0; i<nizGreske.length; i++){
            ispis += "<li>"+nizGreske[i]+"</li>";
        }
        ispis+="</ul>";
        document.getElementById('errors').innerHTML = ispis;
    }else{
        console.log(imePrezime);
        console.log(password);
        console.log(email);
        console.log(username);
        console.log(id);
        console.log(uloga);

        $.ajax({
            type:'post',
            url:'modules/ajax_modify_user.php',
            data:{
                send:"Neka vrednost",
                podatakIme:imePrezime,
                podatakEmail:email,
                podatakPassword:password,
                podatakUserName:username,
                podatakUloga:uloga,
                podatakId:id
            },
            success:function(podaci){
                console.log(podaci); // Ovde pomocu try i catch bloka ispisujemo greske ako ih ima iz php-a jer ne postoji drugi nacin da ih vidimo jer server uvek vraca 200
                alert('Uspesna izmena!');
                window.location = "admin.php";
            },
            error: function(xhr,status,error){
                // var stiglo = JSON.parse(xhr.responseText);
                // var ispis = "";
                // for(var i=0; i<stiglo.length; i++){
                //     ispis+="<li>"+stiglo[i]+"</li>";
                // }
                // document.getElementById('ispis').innerHTML = ispis;
                // Ovde je ispis parsiranih gresaka koje je vratio server iz niza greske

                var poruka = "Stranica nije pronadjena!";
                    switch(xhr.status){
                        case 201 : poruka="Uspesno!"; break;
                        case 404 : poruka="Stranica nije pronadjena!"; break;
                        case 409 : poruka="Username ili email vec postoji!"; break;
                        case 422 : poruka="Podaci nisu validni!";
                        console.log(xhr.responseText);
                        break;
                        case 500 : poruka="Greska!"; break;
                    }
                    document.getElementById('errors').innerHTML = poruka;
            }
        });

    }


        
    });

    // Dodaj novog korisnika..

    $('#btnDodaj').click(function(){
        imePrezime = document.querySelector('#tbImePrezime1').value;
        password = document.getElementById('tbPassword1').value;
        email = document.getElementById('tbEmail1').value;
        username = document.getElementById('tbUserName1').value;
        var uloga = $('#ddlUloga1').val();

        reImePrezime = /^[A-ZČĆŽŠĐ][a-zčćžšđ]{2,19}(\s[A-ZČĆŽŠĐ][a-zčćžšđ]{2,19})?$/;
        rePassword = /^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/;
        reEmail = /^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/;
        reUserName = /^[A-Za-z0-9]+(?:[ _-][A-Za-z0-9]+)*$/;
        var nizGreske= new Array();

        if(!reImePrezime.test(imePrezime)){
            nizGreske.push("Lose uneto ime!");
        }
    
        if(!reUserName.test(username)){
            nizGreske.push("Neispravan username!");
        }
        if(!reEmail.test(email)){
            nizGreske.push("Neispravan email!");
        }
        if(!rePassword.test(password)){
            nizGreske.push("Password mora sadrzati barem jednu cifru i 8 karaktera!");
        }

        var ispis = "<ul>";
    if(nizGreske.length>0){
        for(var i=0; i<nizGreske.length; i++){
            ispis += "<li>"+nizGreske[i]+"</li>";
        }
        ispis+="</ul>";
        document.getElementById('errors1').innerHTML = ispis;
    }else{
        $.ajax({
            type:'post',
            url:'modules/ajax_add_user.php',
            data:{
                send:"Neka vrednost",
                podatakIme:imePrezime,
                podatakEmail:email,
                podatakPassword:password,
                podatakUserName:username,
                podatakUloga:uloga,
            },
            success:function(podaci){
                console.log(podaci); // Ovde pomocu try i catch bloka ispisujemo greske ako ih ima iz php-a jer ne postoji drugi nacin da ih vidimo jer server uvek vraca 200
                alert('Uspesno dodat korisnik!');
                window.location = "admin.php";
            },
            error: function(xhr,status,error){
                // var stiglo = JSON.parse(xhr.responseText);
                // var ispis = "";
                // for(var i=0; i<stiglo.length; i++){
                //     ispis+="<li>"+stiglo[i]+"</li>";
                // }
                // document.getElementById('ispis').innerHTML = ispis;
                // Ovde je ispis parsiranih gresaka koje je vratio server iz niza greske

                var poruka = "Stranica nije pronadjena!";
                    switch(xhr.status){
                        case 201 : poruka="Uspesno!"; break;
                        case 404 : poruka="Stranica nije pronadjena!"; break;
                        case 409 : poruka="Username ili email vec postoji!"; break;
                        case 422 : poruka="Podaci nisu validni!";
                        console.log(xhr.responseText);
                        break;
                        case 500 : poruka="Greska!"; break;
                    }
                    document.getElementById('errors').innerHTML = poruka;
            }
        });

    }


        
    });

    $("#noAcc").click(function(){
        alert("Da biste glasali morate biti ulogovani!");
    }); 


    // Kontakt


    $('#btnKontakt').click(function(){
        imePrezime = document.querySelector('#tbImePrezime').value;
        naslov = document.querySelector('#tbNaslov').value;
        tekst = document.querySelector('#taTekst').value;
       

        reImePrezime = /^[A-ZČĆŽŠĐ][a-zčćžšđ]{2,19}(\s[A-ZČĆŽŠĐ][a-zčćžšđ]{2,19})?$/;
        reNaslov = /^[A-ZČĆŽŠĐ][a-zčćžšđ]{2,19}(\s[A-ZČĆŽŠĐ][a-zčćžšđ]{2,19})*$/;

       
        var nizGreske= new Array();

        if(!reImePrezime.test(imePrezime)){
            nizGreske.push("Lose uneto ime i prezime!");
        }
        if(!reNaslov.test(naslov)){
            nizGreske.push("Lose unet naslov!");
        }
        if(tekst==""){
            nizGreske.push("Unesite tekst!");
        }
    
        

        var ispis = "<ul>";
    if(nizGreske.length>0){
        for(var i=0; i<nizGreske.length; i++){
            ispis += "<li>"+nizGreske[i]+"</li>";
        }
        ispis+="</ul>";
        document.getElementById('errors').innerHTML = ispis;
    }else{
        console.log(imePrezime);
        console.log(naslov);
        console.log(tekst);

        $.ajax({
            type:'post',
            url:'modules/ajax_contact.php',
            data:{
                send:"Neka vrednost",
                podatakIme:imePrezime,
                podatakNaslov:naslov,
                podatakTekst:tekst
            },
            success:function(podaci){
                console.log(podaci); // Ovde pomocu try i catch bloka ispisujemo greske ako ih ima iz php-a jer ne postoji drugi nacin da ih vidimo jer server uvek vraca 200
                alert('Poruka uspesno poslata!');
                window.location = "index.php";
            },
            error: function(xhr,status,error){
                // var stiglo = JSON.parse(xhr.responseText);
                // var ispis = "";
                // for(var i=0; i<stiglo.length; i++){
                //     ispis+="<li>"+stiglo[i]+"</li>";
                // }
                // document.getElementById('ispis').innerHTML = ispis;
                // Ovde je ispis parsiranih gresaka koje je vratio server iz niza greske

                var poruka = "Stranica nije pronadjena!";
                    switch(xhr.status){
                        case 201 : poruka="Uspesno!"; break;
                        case 404 : poruka="Stranica nije pronadjena!"; break;
                        case 409 : poruka="Username ili email vec postoji!"; break;
                        case 422 : poruka="Podaci nisu validni!";
                        console.log(xhr.responseText);
                        break;
                        case 500 : poruka="Greska!"; break;
                    }
                    document.getElementById('errors').innerHTML = poruka;
            }
        });

    }


        
    });
    

});

