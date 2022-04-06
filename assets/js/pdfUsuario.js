$(document).on('click','.pdfFunction',function(){
  var id = $(this).attr('id');
  $.ajax({
    data:{'id':id},
    url:'pdfUsuario.php',
    type:'POST',
    success: function(success){
      var empleadoJson=(success);
      objEmpleado=JSON.parse(empleadoJson);
      var n_empleado=Object.values(objEmpleado[0]);
      var rfc=Object.values(objEmpleado[1]);
      var nombre_s=Object.values(objEmpleado[2]);
      var puesto=Object.values(objEmpleado[3]);
      var adm_general=Object.values(objEmpleado[4]);
      var n_serie=Object.values(objEmpleado[5]);
      var ip_address=Object.values(objEmpleado[6]);
      var perfil=Object.values(objEmpleado[7]);
      var tipo_entrega=Object.values(objEmpleado[8]);
      var proveedor=Object.values(objEmpleado[9]);

        var doc = new jsPDF()

        doc.setFontSize(18)
        doc.setFont('helvetica')
        doc.setFontType('bold')
        doc.text(20, 20, nombre_s)

        doc.setFontSize(10)
        doc.setFont('helvetica')
        doc.setFontType('normal')
        doc.text(160, 16,'No. Empleado: '+n_empleado)

        doc.setFontType('bold')
        doc.setFontSize(12)
        doc.text(16,35, 'RFC:')
        doc.setFontType('normal')
        doc.text(30,35, rfc)

        doc.setFontType('bold')
        doc.text(16,45, 'Puesto:')
        doc.setFontType('normal')
        doc.text(36,45, puesto)

        doc.setFontType('bold')
        doc.text(16,55, 'Administración:')
        doc.setFontType('normal')
        doc.text(52,55, adm_general)

        doc.setDrawColor(0)
        doc.roundedRect(10, 10, 185, 55, 3, 3, 'D')

        doc.setFontSize(16)
        doc.setFont('helvetica')
        doc.setFontType('bold')
        doc.text(20, 85, 'Equipo:  '+n_serie)

        doc.setFontSize(12)
        doc.text(16,100, 'Dirección IP:')
        doc.setFontType('normal')
        doc.text(45,100, ip_address)

        doc.setFontType('bold')
        doc.text(16,110, 'Perfil:')
        doc.setFontType('normal')
        doc.text(32,110, perfil)

        doc.setFontType('bold')
        doc.text(16,120, 'Tipo de entrega:')
        doc.setFontType('normal')
        doc.text(53,120, tipo_entrega)

        doc.setFontType('bold')
        doc.text(16,130, 'Proveedor:')
        doc.setFontType('normal')
        doc.text(42,130, proveedor)

        doc.setDrawColor(0)
        doc.roundedRect(10, 75, 185, 65, 3, 3, 'D')

        //doc.output('dataurlnewwindow');
        doc.save(nombre_s+'.pdf');
    }
  });
});
