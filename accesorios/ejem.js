function submit(){
    var no_acak = document.getElementById("captcha").value;
    
    var x = document.getElementById("captcha").getAttribute("c");
    if(no_acak == x){
    alert('captcha yang anda masuk benar! \n OK');
    //return true;
    return false;
    }else{
    alert('captcha yang anda masuk salah! \n Wrong captcha');
    acak_captcha();
    return false;
    }
    
    }
    function acak_captcha(){
        var no_acak = Math.floor((Math.random() * 1000000) + 1);
        var posisi_x = Math.floor((Math.random() * 50) + 1);
        var posisi_y = Math.floor((Math.random() * 50) + 10);
        var c = document.getElementById("myCanvas");
        var canvas = c.getContext("2d");
    canvas.clearRect(0, 0, 150, 60);
    var gradient=canvas.createLinearGradient(0,0,c.width,0);
    gradient.addColorStop("0","blue");
    gradient.addColorStop("1","green");
    canvas.fillStyle=gradient;	
    canvas.beginPath();
    canvas.rect(0, 0, 150, 60);
    canvas.fill();	
    
    var ctx = c.getContext("2d");
    ctx.fillStyle="#000000";
    ctx.font = '18px serif';
    ctx.moveTo(0,0);
    ctx.lineTo(150,60);

    ctx.moveTo(50,4);
    ctx.lineTo(200,400);

    ctx.moveTo(70,4);
    ctx.lineTo(200,400);

    ctx.moveTo(90,4);
    ctx.lineTo(200,400);

    ctx.moveTo(0,5);
    ctx.lineTo(200,100);

    ctx.moveTo(100,4);
    ctx.lineTo(200,400);

    ctx.moveTo(0,0);
    ctx.lineTo(300,300);

    ctx.moveTo(100,4);
    ctx.lineTo(400,600);

    ctx.moveTo(100,4);
    ctx.lineTo(700,900);

    ctx.moveTo(100,4);
    ctx.lineTo(900,900);

    ctx.moveTo(100,4);
    ctx.lineTo(1000,900);

    ctx.moveTo(0,0);
    ctx.lineTo(300,400);

    ctx.moveTo(0,0);
    ctx.lineTo(300,600);

    ctx.moveTo(0,0);
    ctx.lineTo(300,900);

    ctx.stroke();
    ctx.strokeText(no_acak, posisi_x, posisi_y);
    document.getElementById("captcha").setAttribute("c", no_acak); 
    }
    window.onload = function() {
    acak_captcha();
    
    }
    