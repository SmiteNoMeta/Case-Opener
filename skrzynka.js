function generate(ng) {
    $('.raffle-roller-container').css({
        transition: "sdf",
        "margin-left": "0px"
    }, 10).html('');
    var randed2 = randomInt(1,100);
    for(var i = 0;i < 101; i++) {
        var element = '<div id="CardNumber'+i+'" class="item class_blue_item" style="background-image:url('+items.simple.img+');"></div>';
        var randed = randomInt(1,1000);
        if(randed <= 50) {
            element = '<div id="CardNumber'+i+'" class="item class_yellow_item" style="background-image:url('+items.super.img+');"></div>';
        } else if(randed >= 51 && randed <= 200) {
            element = '<div id="CardNumber'+i+'" class="item class_red_item" style="background-image:url('+items.more.img+');"></div>';
        } else if(randed >=201 && randed <= 400) {
            element = '<div id="CardNumber'+i+'" class="item class_pink_item" style="background-image:url('+items.middle.img+');"></div>';
        } else if(randed >=401 && randed <= 700) {
            element = '<div id="CardNumber'+i+'" class="item class_fiolet_item" style="background-image:url('+items.little.img+');"></div>';
        }
        $(element).appendTo('.raffle-roller-container');
    }
    setTimeout(function() {
    if(randed2 <= 3) {
        goRoll(items.super.skin, items.super.img);
    } else if(randed2 >= 3 && randed2 <= 15) {
        goRoll(items.more.skin, items.more.img);
    } else if(randed2 >= 16 && randed2 <= 40) {
        goRoll(items.middle.skin, items.middle.img);
    } else if(randed2 >=41 && randed2 <= 60) {
        goRoll(items.little.skin, items.little.img);
    } else {
        goRoll(items.simple.skin, items.simple.img);
    }
    }
    , 500);  
}

if(document.getElementById('open').innerHTML == 'Tak'){
    generate(1);
    }

function sell(wartosc){
    const sprzedaj = $('.inventory');
    document.getElementById('wartosc').value=wartosc;
    sprzedaj.remove();
    document.getElementById('sprzedaj').submit();
}

function goRoll(skin, skinimg) {
    $('.raffle-roller-container').css({
        transition: "all 8s cubic-bezier(.08,.6,0,1)"
    });
    $('#CardNumber78').css({
        "background-image": "url("+skinimg+")"
    });
    $('#CardNumber78').removeClass()
    $('#CardNumber78').addClass('item')
    if(skinimg == items.super.img) $('#CardNumber78').addClass('class_yellow_item')
    else if(skinimg == items.more.img) $('#CardNumber78').addClass('class_red_item')
    else if(skinimg == items.middle.img) $('#CardNumber78').addClass('class_pink_item')
    else if(skinimg == items.little.img) $('#CardNumber78').addClass('class_fiolet_item')
    else $('#CardNumber78').addClass('class_blue_item')
    setTimeout(function() {
        $('#CardNumber78').addClass('winning-item');
        $('#rolled').html(skin);
        if(skinimg==items.super.img){
            var win_element = "<div class='item class_yellow_item' onclick='sell(items.super.cena)' style='background-image: url("+skinimg+")'></div>"; 
        }
        else if(skinimg==items.more.img) {
            var win_element = "<div class='item class_red_item' onclick='sell(items.more.cena)' style='background-image: url("+skinimg+")'></div>";
        }
        else if(skinimg==items.middle.img) {
            var win_element = "<div class='item class_pink_item' onclick='sell(items.middle.cena)' style='background-image: url("+skinimg+")'></div>";
        }
        else if(skinimg==items.little.img) {
            var win_element = "<div class='item class_fiolet_item' onclick='sell(items.little.cena)' style='background-image: url("+skinimg+")'></div>";
        }
        else if(skinimg==items.simple.img){
            var win_element = "<div class='item class_blue_item' onclick='sell(items.simple.cena)' style='background-image: url("+skinimg+")'></div>";
        }
        $(win_element).appendTo('.inventory');
    }, 8500);
    $('.raffle-roller-container').css('margin-left', '-6770px');
    }
function randomInt(min, max) {
    return Math.floor(Math.random() * (max - min)) + min;
}