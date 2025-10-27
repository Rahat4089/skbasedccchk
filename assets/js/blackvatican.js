$(document).ready(function () { 
    $("body").hide().fadeIn(1500).delay(6000)
    $("#showcharge").click(function() {
        playsfx();
        $("#charges").slideToggle();
    });
    $("#showcvv").click(function() {
        playsfx();
        $("#cvvs").slideToggle();
    });
    $("#showccn").click(function() {
        playsfx();
        $("#ccns").slideToggle();
    });
    $("#showdead").click(function() {
        playsfx();
        $("#deads").slideToggle();
    });
    $("#clearcharge").click(function() {
        playsfx();
        var x = document.getElementsByClassName("charge");
        for(var i=0; i < x.length; i++){
        x[i].remove();
        }
    });
    $("#clearcvv").click(function() {
        playsfx();
        var x = document.getElementsByClassName("cvv");
        for(var i=0; i < x.length; i++){
        x[i].remove();
        }
    });
    $("#clearccn").click(function() {
        playsfx();
        var x = document.getElementsByClassName("ccn");
        for(var i=0; i < x.length; i++){
        x[i].remove();
        }
    });
    $("#cleardead").click(function() {
        playsfx();
        var y = document.getElementsByClassName("dead");
        for(var i=0; i < y.length; i++){
        y[i].remove();
        }
    });
    $("#format").click(function() {
        var card = $("#cards").val();
        var regex = /\d*\|\d*\|\d*\|\d*/g;
        $("#cards").val(card.match(regex).join("\n"));
    });

    $("#check").click(function() {
        playsfx();
        var card = $("#cards").val();
        var sk = $("#seckey").val();
        var gate = $("#gates").val();
        var currency = $("#curs").val();
        var amount = $("#customs").val();
        var carda = card.split("\n");
        var charge = 0;
        var cvv = 0; 
        var ccn = 0;
        var dead = 0;
        carda.forEach(function(value, index) {
            setTimeout(function() {
                $.ajax({
                    url: 'api/' + gate + '?card=' + value + '&sk=' + sk + '&currency=' + currency + '&amount=' + amount,
                    type: 'GET',
                    async: true,
                    success: function(result) {
                        if (result.match("#CHARGE")) {
                            var charger = result.split("#CHARGE ")[1];
                            $("#charges").append('<tr class="charge"><td scope="col"> Live </td> <td scope="col">' + value + '</td> <td scope="col">' + charger + '</td></tr>');
                            update();
                            charge++;
                        }
                        else if (result.match("#CVV")) {
                            var cvvr = result.split("#CVV ")[1];
                            $("#cvvs").append('<tr class="cvv"><td scope="col"> Live </td> <td scope="col">' + value + '</td> <td scope="col">' + cvvr + '</td></tr>');
                            update();
                            cvv++;
                        }
                        else if (result.match("#CCN")) {
                            var ccnr = result.split("#CCN ")[1];
                            $("#ccns").append('<tr class="ccn"><td scope="col"> Live </td> <td scope="col">' + value + '</td> <td scope="col">' + ccnr + '</td></tr>');
                            update();
                            ccn++;
                        }
                        else if (result.match("#DEAD")) {
                            var deadr = result.split("#DEAD ")[1];
                            $("#deads").append('<tr class="dead"><td scope="col"> Dead </td> <td scope="col">' + value + '</td> <td scope="col">' + deadr + '</td></tr>');
                            update();
                            dead++;
                        }
                        else {
                            $("#debug").html(result);
                        }
                        $('#chargec').html(charge);
                        $('#cvvc').html(cvv);
                        $('#ccnc').html(ccn);
                        $('#deadc').html(dead);
                    }
                });
            }, index * 800);
        });
    });
});

function update() {
    var card = $("#cards").val().split("\n");
    card.splice(0, 1);
    $("#cards").val(card.join("\n"));
}
function playsfx() {
    var x = document.getElementById("bvsfx");  
    x.play(); 
} 
