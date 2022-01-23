$(function() {
    $("#prop").change(function()
    {
        var propinsi_kd = $(this).val();
        $.ajax({
            type: "POST",
            dataType: "html",
            url: "../get/get_kab.php",
            data: "kd_prop="+propinsi_kd,
            success: function(msg){
                if(msg == ''){
                    $("select#kab").html('<option value="">-- PILIH KABUPATEN --</option>');
                    $("select#kec").html('<option value="">-- PILIH KECAMATAN --</option>');
                    $("select#kel").html('<option value="">-- PILIH KELURAHAN --</option>');
                }else{
                    $("select#kab").html(msg);
                }
                getKabupaten();
            }
        });
    });
    $("#kab").change(getKabupaten);
    function getKabupaten(){
        var propinsi_kd = $("#prop").val();
        var kabupaten_kd = $("#kab").val();
        $.ajax({
            type: "POST",
            dataType: "html",
            url: "../get/get_kec.php",
            data: "kd_prop="+propinsi_kd+"&kd_kab="+kabupaten_kd,
            success: function(msg){
                if(msg == ''){
                    $("select#kec").html('<option value="">-- PILIH KECAMATAN --</option>');
                    $("select#kel").html('<option value="">-- PILIH KELURAHAN --</option>');
                }else{
                    $("select#kec").html(msg);
                }
                getKecamatan();
            }
        });
    }
    $("#kec").change(getKecamatan);
    function getKecamatan(){
        var propinsi_kd = $("#prop").val();
        var kabupaten_kd = $("#kab").val();
        var kecamatan_kd = $("#kec").val();
        $.ajax({
            type: "POST",
            dataType: "html",
            url: "../get/get_kel.php",
            data: "kd_prop="+propinsi_kd+"&kd_kab="+kabupaten_kd+"&kd_kec="+kecamatan_kd,
            success: function(msg){
                if(msg == ''){
                    $("select#kel").html('<option value="">-- PILIH KELURAHAN --</option>');
                }else{
                    $("select#kel").html(msg);
                }
                getKelurahan();
            }
        });
    }
});