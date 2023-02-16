function calcular(ci,nombre,math,fis,prog) {
    
    if ((ci != "") && (nombre != "") && (math != "") && (fis != "none") && (prog != "none")) {

        if ((math >= 0) && (math <= 20) && (fis >= 0) && (fis <= 20) && (prog >= 0) && (prog <= 20)){
          
            var params = {
                "ci": ci,
                "nombre": nombre,
                "math": math,
                "fis": fis,
                "prog":prog,
            };

            $.ajax({

                type: "post",
                url: "php/operacion.php",
                data: params,
                success: function(respuesta){
                    document.getElementById("resp").innerHTML = respuesta;
                    
                },
                fail:function(){
                    document.getElementById("resp").innerHTML = 'Fallo de ajax';
                },
                beforeSend:function(){
                    document.getElementById("resp").innerHTML = 'Esperando respuesta de ajax';
                }        
        
            });

        }
        else{
            document.getElementById("resp").innerHTML = 'Las notas deben estar entre 0 y 20';
        }
        
    }
    else{
        document.getElementById("resp").innerHTML = 'Vacio';
    }

}